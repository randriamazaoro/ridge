<?php

namespace App\Http\Controllers;

use App\Affiliate;
use App\Invoice;
use App\OwnedTheme;
use App\Program;
use App\Sale;
use App\Theme;
use App\User;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;

class PaypalController extends Controller
{

	protected $provider;

	public function __construct() {
    	$this->provider = new ExpressCheckout();
	}

	public function expressCheckout(Request $request) {

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

            $program = Program::where('name',session('program'))->first();

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
                'invoice_description' => "Initiation / Pack " . $program->name ." #" . $invoice_id ,
                'cancel_url' => url('admin/initiation'),
            
                'total' => $program->price,
            ];
        }

        if (session('transaction_type') == "upgrade") {
            
            $affiliate = Affiliate::find(Auth::id());
            $program = Program::where('name',session('program'))->first();
            $affiliate_program = Program::where('name',$affiliate->program)->first();

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
                'invoice_description' => "Upgrade / Pack " . $program->name ." #" . $invoice_id ,
                'cancel_url' => url('admin/settings/upgrade'),
            
                'total' => $program->price - $affiliate_program->price,
            ];
        }
    }

   	public function expressCheckoutSuccess(Request $request) {

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

            if (session('transaction_type') == "upgrade"){
                return redirect()->action('Admin\UpgradeController@store');
            }
        }
        
        return redirect('admin/initiation')->with(['code' => 'danger', 'message' => 'Il y a eu une erreur lors du payement !']);
    }
}
