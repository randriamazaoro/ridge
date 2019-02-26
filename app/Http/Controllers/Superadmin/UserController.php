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

class UserController extends Controller
{
    public function index()
	{
		$users = User::paginate(5);
		$affiliates = Affiliate::all();

		return view('superadmin.users')->with([
			'users' => $users, 
			'affiliates' => $affiliates,
		]);
	}

	public function show($id)
	{
		$user = user::findOrFail($id);
		$affiliate = Affiliate::find($id);
		$themes = Theme::paginate(3);

		$owned_themes = 
		OwnedTheme::affiliate($id)
			->paginate(3);

		$transfer_request = 
		TransferRequest::affiliate($id)
			->pending()
			->first();

		if($user->status == "Actif"){

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


			return view('superadmin.active-user')->with([
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

		else{

			return view('superadmin.inactive-user')->with([
				'user' => $user,
			]);
		}
	}
}
