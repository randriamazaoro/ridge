<?php

namespace App\Http\Controllers;

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


class AdminController extends Controller
{
	
	public function __construct()
	{
	    $this->middleware('auth');
	    $this->middleware('admin');
	    $this->middleware('active');
	    $this->middleware('verified');
	}  

	public function index()
	{
		$user = user::find(Auth::id());
		$affiliate = Affiliate::find(Auth::id());
		$themes = Theme::paginate(3);

		$owned_themes = 
		OwnedTheme::where('affiliate_id', Auth::id())
			->paginate(3);

		$transfer_request = 
		TransferRequest::where('affiliate_id', Auth::id())
			->where('status','En attente')
			->first();

		$emails = 
		Email::where('affiliate_id', $affiliate->id)
			->paginate(5);

		$pending_emails = 
		Email::where('affiliate_id', $affiliate->id)
			->pending();
		$pending_emails_value = 
		$pending_emails->count() * $affiliate->gains_per_email;

		$approuved_emails = 
		Email::where('affiliate_id', $affiliate->id)
			->approuved();
		$approuved_emails_value = 
		$approuved_emails->count() * $affiliate->gains_per_email;

		$paid_emails = 
		Email::where('affiliate_id', $affiliate->id)
			->paid();
		$paid_emails_value = 
		$paid_emails->count() * $affiliate->gains_per_email;

		// Sales
		$sales = 
		Sale::where('affiliate_id', $affiliate->id)
			->paginate(5);

		$approuved_sales_value = 
		Sale::where('affiliate_id', $affiliate->id)
			->approuved()
			->sum('referral_value');

		$paid_sales_value = 
		Sale::where('affiliate_id', $affiliate->id)
			->paid()
			->sum('referral_value');


		return view('admin.index')->with([
			'user' => $user, 
			'affiliate' => $affiliate,
			'transfer_request' => $transfer_request,
			'owned_themes' => $owned_themes,
			'themes' => $themes,

			// Email variables
			'emails' => $emails,
			'pending_emails_value' => $pending_emails_value,
			'approuved_emails_value' => $approuved_emails_value,
			'paid_emails_value' => $paid_emails_value,

			// Sales variables
			'sales' => $sales,
			'approuved_sales_value' => $approuved_sales_value,
			'paid_sales_value' => $paid_sales_value,
		]);

	}

}
