<?php
namespace App\Http\Controllers;

use App\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{

    public function paymentInfo(Request $request)
    {
        if ($request->tx) {
            if ($payment = Payment::where('transaction_id', $request->tx)->first()) {
                $payment_id = $payment->id;
            } else {
                $payment = new Payment;
                $payment->item_number = $request->item_number;
                $payment->transaction_id = $request->tx;
                $payment->currency_code = $request->cc;
                $payment->payment_status = $request->st;
                $payment->save();
            }

            if (session('transaction_type') == "initiation") {
                return redirect()->action('Admin\InitiationController@store');
            }

            if (session('transaction_type') == "upgrade") {
                return redirect()->action('Admin\UpgradeController@store');
            }

        } else {
            return redirect('admin/initiation')->with(['paypal' => 'danger', 'message' => 'Il y a eu un problème lors de la transaction avec PayPal']);
        }
    }
}
