<?php

namespace App\Http\Controllers\Admin;

use App\Affiliate;
use App\Email;
use App\Http\Controllers\Controller;
use App\Mail\SuperAdminHasSale;
use App\Mail\UserHasCompletedInitiation;
use App\Mail\UserHasSale;
use App\OwnedTheme;
use App\Program;
use App\Sale;
use App\Theme;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class InitiationController extends Controller {

	public function __construct() {
		$this->middleware('auth');
		$this->middleware('admin');
		$this->middleware('inactive');
		$this->middleware('verified');
	}

	public function index() {
		$user = User::find(Auth::id());
		$programs = Program::all();
		$themes = Theme::all();

		return view('admin.initiation')->with([
			'user' => $user,
			'programs' => $programs,
			'themes' => $themes,
		]);
	}

	public function show(Request $request) {
		$program = Program::where('name', $request->program)->get()->first();

		$request->validate([
			'paypal_address' => 'required|email|max:255|unique:users',
		]);

		session([
			'transaction_type' => 'initiation',
			'last_name' => $request->last_name,
			'first_name' => $request->first_name,
			'age' => $request->age,
			'gender' => $request->gender,
			'email_contact' => $request->email_contact,
			'phone' => $request->phone,
			'country' => $request->country,
			'city' => $request->city,
			'paypal_address' => $request->paypal_address,
			'program' => $request->program,
		]);

		if ($request->program == 'Mini') {
			session(['theme_mini' => $request->theme_mini]);
		} elseif ($request->program == 'Maxi') {
			session([
				'theme_maxi_1' => $request->theme_maxi_1,
				'theme_maxi_2' => $request->theme_maxi_2,
				'theme_maxi_3' => $request->theme_maxi_3,
			]);
		}

		return view('admin.initiation-summary')->with([
			'request' => $request,
			'program' => $program,
		]);

	}

	public function store() {
		$user = User::find(Auth::id());
		$program = Program::where('name', session('program'))->first();

		$referral =
		Affiliate::where('id', $user->affiliate_id)
			->first();

		$referral_pending_emails =
		Email::where('affiliate_id', $referral->id)
			->where('status', 'En attente')
			->take($program->gains_per_email_limit);

		$user->last_name = session('last_name');
		$user->first_name = session('first_name');
		$user->age = session('age');
		$user->gender = session('gender');
		$user->email_contact = session('email_contact');
		$user->phone = session('phone');
		$user->country = session('country');
		$user->city = session('city');
		$user->status = "Actif";
		$user->paypal_address = session('paypal_address');
		$user->save();

		$referral->gains_per_email_limit += $program->gains_per_email_limit;
		$referral->save();

		$referral_pending_emails->update(['status' => 'Approuvé']);

		$affiliate =
		Affiliate::create([
			'id' => $user->id,
			'program' => $program->name,
			'gains_per_email' => $program->gains_per_email,
			'gains_per_sale' => $program->gains_per_sale,
			'gains_per_email_limit' => 10,
		]);

		$sale =
		Sale::create([
			'affiliate_id' => $referral->id,
			'product' => $program->name,
			'status' => "Approuvé",
			'tag' => "is-success",
			'referral_value' => $program->price * $referral->gains_per_sale,
			'real_value' => $program->price,
			'benefits' => $program->price - ($program->price * $referral->gains_per_sale),
			'gains_per_email_limit' => $program->gains_per_email_limit,
			'requested' => false,
		]);

		if ($program->name == "Mini") {
			OwnedTheme::create([
				'affiliate_id' => $user->id,
				'theme_id' => session('theme_mini'),
			]);
		}

		if ($program->name == "Maxi") {
			OwnedTheme::create([
				'affiliate_id' => $user->id,
				'theme_id' => session('theme_maxi_1'),
			]);

			OwnedTheme::create([
				'affiliate_id' => $user->id,
				'theme_id' => session('theme_maxi_2'),
			]);

			OwnedTheme::create([
				'affiliate_id' => $user->id,
				'theme_id' => session('theme_maxi_3'),
			]);
		}

		session()->forget([
			'transaction_type', 'last_name', 'first_name', 'age', 'gender', 'email_contact', 'phone', 'country', 'city', 'program', 'theme_mini', 'theme_maxi_1', 'theme_maxi_2', 'theme_maxi_3', 'paypal_address',
		]);

		Mail::to($user->email)
			->send(new UserHasCompletedInitiation($user));

		Mail::to(User::find($referral->id)->email)
			->send(new UserHasSale($sale, $referral, User::find($referral->id)));

		Mail::to(User::find(1)->email)
			->send(new SuperAdminHasSale($sale, $affiliate, $referral, $user));

		return redirect('admin')->with('completed-initiation', 'done');
	}
}
