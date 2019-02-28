<?php

namespace App\Http\Controllers;

use App\Affiliate;
use App\Invoice;
use App\Program;
use Illuminate\Http\Request;
use PayPal\Api\Amount;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use Srmklive\PayPal\Services\ExpressCheckout;

class PaypalController extends Controller
{

    private $_api_context;

    public function __construct()
    {
        // setup PayPal api context
        $this->_api_context = new ApiContext(new OAuthTokenCredential(config('paypal.client_id'), config('paypal.secret')));
        $this->_api_context->setConfig(config('paypal.settings'));
    }

    public function payWithpaypal(Request $request)
    {

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $item = new Item();

        if (session('transaction_type') == "initiation") {

            $program = Program::where('name', session('program'))->first();

            $item->setName('Pack ' . $program->name) /** item name **/
                ->setCurrency('EUR')
                ->setQuantity(1)
                ->setPrice($program->price); /** unit price **/

            $item_list = new ItemList();
            $item_list->setItems(array($item));

            $amount = new Amount();
            $amount->setCurrency('EUR')
                ->setTotal($program->price);

            $transaction = new Transaction();
            $transaction->setAmount($amount)
                ->setItemList($item_list)
                ->setDescription('Initiation de votre programme Ridge sur le Pack ' . $program->name);

            $redirect_urls = new RedirectUrls();
            $redirect_urls->setReturnUrl(url('/admin/initiation/store')) /** Specify return URL **/
                ->setCancelUrl(url('/admin/initiation/summary'));

        }

        if (session('transaction_type') == "upgrade") {

            $affiliate = Affiliate::find(Auth::id());
            $program = Program::where('name', session('program'))->first();
            $affiliate_program = Program::where('name', $affiliate->program)->first();

            $item->setName('Pack ' . $program->name) /** item name **/
                ->setCurrency('EUR')
                ->setQuantity(1)
                ->setPrice($program->price - $affiliate_program->price); /** unit price **/

            $item_list = new ItemList();
            $item_list->setItems(array($item));

            $amount = new Amount();
            $amount->setCurrency('EUR')
                ->setTotal($program->price - $affiliate_program->price);

            $transaction = new Transaction();
            $transaction->setAmount($amount)
                ->setItemList($item_list)
                ->setDescription('Mise à niveau de votre programme Ridge sur le Pack ' . $program->name);

            $redirect_urls = new RedirectUrls();
            $redirect_urls->setReturnUrl(URL::route('/admin/upgrade/store')) /** Specify return URL **/
                ->setCancelUrl(URL::route('/admin/settings/upgrade/summary'));
        }

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));

        try {
            $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PPConnectionException $ex) {
            if (\Config::get('app.debug')) {
                echo "Exception: " . $ex->getMessage() . PHP_EOL;
                $err_data = json_decode($ex->getData(), true);
                exit;
            } else {
                die('Some error occur, sorry for inconvenient');
            }
        }

        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }

        // add payment ID to session
        Session::put('paypal_payment_id', $payment->getId());

        if (isset($redirect_url)) {
            // redirect to paypal
            return Redirect::away($redirect_url);
        }

        returnredirect('admin/initiation')->with(['paypal' => 'danger', 'message' => 'Il y a eu un problème avec PayPal']);

    }

    public function getPaymentStatus()
    {
        // Get the payment ID before session clear
        $payment_id = Session::get('paypal_payment_id');

        // clear the session payment ID
        Session::forget('paypal_payment_id');

        if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
            return redirect('admin/initiation')->with(['paypal' => 'danger', 'message' => 'Il y a eu un problème avec PayPal']);
        }

        $payment = Payment::get($payment_id, $this->_api_context);

        // PaymentExecution object includes information necessary
        // to execute a PayPal account payment.
        // The payer_id is added to the request query parameters
        // when the user is redirected from paypal back to your site
        $execution = new PaymentExecution();
        $execution->setPayerId(Input::get('PayerID'));

        //Execute the payment
        $result = $payment->execute($execution, $this->_api_context);

        echo '<pre>';
        print_r($result);
        echo '</pre>';exit; // DEBUG RESULT, remove it later

        if ($result->getState() == 'approved') { // payment made
            if (session('transaction_type') == "initiation") {
                return redirect()->action('Admin\InitiationController@store');
            }

            if (session('transaction_type') == "upgrade") {
                return redirect()->action('Admin\UpgradeController@store');
            }
        }
        return redirect('admin/initiation')->with(['paypal' => 'danger', 'message' => 'Il y a eu un problème avec PayPal']);
    }

    public function expressCheckout(Request $request)
    {

        // get new invoice id
        $invoice_id = Invoice::count() + 1;

        // Get the cart data
        $cart = $this->getCart($invoice_id);

        // create new invoice
        $invoice = new Invoice();
        $invoice->title = $cart['invoice_description'];
        $invoice->price = $cart['total'];
        $invoice->save();

        // send a request to paypal
        // paypal should respond with an array of data
        // the array should contain a link to paypal's payment system
        $response = $this->provider->setExpressCheckout($cart);

        // if there is no link redirect back with error message
        if (!$response['paypal_link']) {
            return redirect('admin/initiation')->with(['paypal' => 'danger', 'message' => 'Il y a eu un problème avec PayPal']);
            // For the actual error message dump out $response and see what's in there
        }

        // redirect to paypal
        // after payment is done paypal
        // will redirect us back to $this->expressCheckoutSuccess
        return redirect($response['paypal_link']);
    }

    private function getCart($invoice_id)
    {
        if (session('transaction_type') == "initiation") {

            $program = Program::where('name', session('program'))->first();

            return [
                // if payment is not recurring cart can have many items
                // with name, price and quantity
                'items' => [
                    [
                        'name' => $program->name,
                        'price' => $program->price,
                        'qty' => 1,
                    ],

                ],

                // return url is the url where PayPal returns after user confirmed the payment
                'return_url' => url('/paypal/express-checkout-success'),
                // every invoice id must be unique, else you'll get an error from paypal
                'invoice_id' => $invoice_id,
                'invoice_description' => "Initiation / Pack " . $program->name . " #" . $invoice_id,
                'cancel_url' => url('admin/initiation'),

                'total' => $program->price,
            ];
        }

        if (session('transaction_type') == "upgrade") {

            $affiliate = Affiliate::find(Auth::id());
            $program = Program::where('name', session('program'))->first();
            $affiliate_program = Program::where('name', $affiliate->program)->first();

            return [
                // if payment is not recurring cart can have many items
                // with name, price and quantity
                'items' => [
                    [
                        'name' => $program->name,
                        'price' => $program->price - $affiliate_program->price,
                        'qty' => 1,
                    ],

                ],

                // return url is the url where PayPal returns after user confirmed the payment
                'return_url' => url('/paypal/express-checkout-success'),
                // every invoice id must be unique, else you'll get an error from paypal
                'invoice_id' => $invoice_id,
                'invoice_description' => "Upgrade / Pack " . $program->name . " #" . $invoice_id,
                'cancel_url' => url('admin/settings/upgrade'),

                'total' => $program->price - $affiliate_program->price,
            ];
        }
    }

    public function expressCheckoutSuccess(Request $request)
    {

        // check if payment is recurring
        $recurring = $request->input('recurring', false) ? true : false;

        $token = $request->get('token');

        $PayerID = $request->get('PayerID');

        // initaly we paypal redirects us back with a token
        // but doesn't provice us any additional data
        // so we use getExpressCheckoutDetails($token)
        // to get the payment details
        $response = $this->provider->getExpressCheckoutDetails($token);

        // if response ACK value is not SUCCESS or SUCCESSWITHWARNING
        // we return back with error
        if (!in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
            return redirect('/')->with(['code' => 'danger', 'message' => 'Il y a eu une erreur lors du payement !']);
        }

        // invoice id is stored in INVNUM
        // because we set our invoice to be xxxx_id
        // we need to explode the string and get the second element of array
        // witch will be the id of the invoice
        $invoice_id = explode('_', $response['INVNUM'])[1];

        // get cart data
        $cart = $this->getCart($recurring, $invoice_id);

        // if payment is not recurring just perform transaction on PayPal
        // and get the payment status
        $payment_status = $this->provider->doExpressCheckoutPayment($cart, $token, $PayerID);
        $status = $payment_status['PAYMENTINFO_0_PAYMENTSTATUS'];

        // find invoice by id
        $invoice = Invoice::find($invoice_id);

        // set invoice status
        $invoice->payment_status = $status;

        // save the invoice
        $invoice->save();

        // App\Invoice has a paid attribute that returns true or false based on payment status
        // so if paid is false return with error, else return with success message
        if ($invoice->paid) {

            // Process storing information according to transaction type
            if (session('transaction_type') == "initiation") {
                return redirect()->action('Admin\InitiationController@store');
            }

            if (session('transaction_type') == "upgrade") {
                return redirect()->action('Admin\UpgradeController@store');
            }
        }

        return redirect('admin/initiation')->with(['code' => 'danger', 'message' => 'Il y a eu une erreur lors du payement !']);
    }
}
