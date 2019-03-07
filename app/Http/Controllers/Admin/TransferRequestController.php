<?php

namespace App\Http\Controllers\Admin;

use App\Affiliate;
use App\Email;
use App\Mail\SuperAdminHasSale;
use App\Mail\SuperAdminHasTransferRequest;
use App\Mail\UserHasCompletedInitiation;
use App\Mail\UserHasRequestedTransfer;
use App\Mail\UserHasSale;
use App\OwnedTheme;
use App\Program;
use App\Sale;
use App\Theme;
use App\TransferRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;

class TransferRequestController extends Controller
{

	public function __construct()
	{
	    $this->middleware('auth');
	    $this->middleware('admin');
	    $this->middleware('active');
	    $this->middleware('verified');
	}      


    public function store()
	{
		$user = User::find(Auth::id());
		$affiliate = Affiliate::find(Auth::id());

		$check_existing_transfer_request = 
		TransferRequest::where('status','En attente')
			->where('affiliate_id',Auth::id())
			->get()
			->first();

		if (isset($check_existing_transfer_request)) {
			return redirect('admin');
		}

		$emails = 
		Email::where('affiliate_id', $affiliate->id)
			->where('status','Approuvé');

		$sales = 
		Sale::where('affiliate_id', $affiliate->id)
			->where('status','Approuvé');

		$total_value = 
		$sales->sum('referral_value') + ($emails->count() * $affiliate->gains_per_email);

		if($total_value > 10){
			$emails->update(['requested' => true]);
			$sales->update(['requested' => true]);

			$transfer_request = 
			TransferRequest::create([
				'affiliate_id' => $user->id,
				'amount' => $total_value,
				'status' => 'En attente',
			]);

			Mail::to($user)
				->send(new UserHasRequestedTransfer($transfer_request, $user));

			Mail::to(config('app.email'))
				->send(new SuperAdminHasTransferRequest($transfer_request));

			return back()->with([
    						'code' => 'transfer-requested',
    						'image' => 'money-bag',
    						'title' => 'Votre demande de virement nous a été transmise !',
    						'subtitle' => 'Montant: '. $total_value,
    						]);
		}

		return redirect('admin');
	}

	public function destroy()
	{
		$affiliate = Affiliate::find(Auth::id());

		$transfer_request = 
		TransferRequest::where('status','En attente')
			->where('affiliate_id',Auth::id())
			->get()
			->first()
			->delete();

		$emails = 
		Email::where('affiliate_id', $affiliate->id)
			->where('requested', true)
			->update(['requested' => false]);

		$sales = 
		Sale::where('affiliate_id', $affiliate->id)
			->where('requested', true)
			->update(['requested' => false]);

		return back()->with([
    					'code' => 'transfer-canceled',
    					'image' => 'trash',
    					'title' => 'Votre demande de transfert a bien été annulée !',
    					'subtitle' => '',
    					]);

	}
}
