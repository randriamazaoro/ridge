<?php

namespace App\Http\Controllers;

use App\Affiliate;
use App\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use PayPal\Api\Amount;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;

class PaypalController extends Controller
{

    private $_api_context;

    public function __construct()
    {
        // setup PayPal api context
        $this->_api_context = new ApiContext(new OAuthTokenCredential(config('paypal.client_id'), config('paypal.secret')));
        $this->_api_context->setConfig(config('paypal.settings'));
    }

    public function expressCheckout(Request $request)
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
            $redirect_urls->setReturnUrl(url('/paypal/express-checkout-success')) /** Specify return URL **/
                ->setCancelUrl(url('/admin/initiation'));

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
            $redirect_urls->setReturnUrl(url('/paypal/express-checkout-success')) /** Specify return URL **/
                ->setCancelUrl(url('/admin/settings/upgrade'));
        }

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));

        try {
            $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PPConnectionException $ex) {
            if (config('app.debug')) {
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
        session('paypal_payment_id', $payment->getId());

        if (isset($redirect_url)) {
            // redirect to paypal
            return redirect()->away($redirect_url);
        }

        return redirect('admin/initiation')->with(['paypal' => 'danger', 'message' => 'Il y a eu un problème avec PayPal']);

    }

    public function expressCheckoutSuccess(Request $request)
    {
        // Get the payment ID before session clear
        $payment_id = $request->paymentId;

        // clear the session payment ID

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

}
