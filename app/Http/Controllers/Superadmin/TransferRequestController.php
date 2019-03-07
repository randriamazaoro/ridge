<?php

namespace App\Http\Controllers\Superadmin;

use App\Affiliate;
use App\Category;
use App\Comment;
use App\Email;
use App\Mail\UserHasReceivedTransfer;
use App\OwnedTheme;
use App\Post;
use App\Program;
use App\Sale;
use App\Theme;
use App\TransferRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;

class TransferRequestController extends Controller
{
	public function __construct()
	{
	    $this->middleware('auth');
	    $this->middleware('superadmin');
	}  
	
    public function show($id)
	{
		$user = User::findOrFail($id);
		$affiliate = Affiliate::findOrFail($id);

		$transfer_request = 
		TransferRequest::where('affiliate_id',$id)
			->pending()
			->first();

		return view('superadmin.transfer-request')->with([
			'user' => $user,
			'affiliate' => $affiliate,
			'transfer_request' => $transfer_request,
		]);
	}

	public function update($id)
	{
		$user = User::findOrFail($id);
		$affiliate = Affiliate::findOrFail($id);

		$transfer_request = 
		TransferRequest::where('affiliate_id',$id)
			->pending()
			->first();

		$transfer_request->update([
				'status' => 'Payé',
			]);

		$requested_emails = 
		Email::where('affiliate_id',$id)
			->where('requested',true);

		$affiliate->gains_per_email_limit -= $requested_emails->count();
		$affiliate->save();

		$requested_emails->update([
				'requested' => false,
				'status' => 'Payé',
				'tag' => 'is-primary',
			]);

		$requested_sales = 
		Sale::where('affiliate_id',$id)
			->where('requested',true)
			->update([
				'requested' => false,
				'status' => 'Payé',
				'tag' => 'is-primary',
			]);

		Mail::to($user->email)
			->queue(new UserHasReceivedTransfer($transfer_request, $user));

		return redirect('superadmin/finances')->with([
    					'code' => 'transfer-completed',
    					'image' => 'money-bag',
    					'title' => 'Demande de transfert marqué comme réussit !',
    					'subtitle' => '',
    					]);

	}
}
