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

class UpgradeController extends Controller
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
		$affiliate = Affiliate::find(Auth::id());
		$affiliate_program = Program::where('name', $affiliate->program)->get()->first();
		$programs = Program::where('id','>',$affiliate_program->id)->get();
		$themes = Theme::all();

		return view('admin.upgrade')->with([
			'affiliate_program' => $affiliate_program,
			'programs' => $programs,
			'themes' => $themes,
		]);
	}

	public function show(Request $request)
	{
		$program = Program::where('name',$request->program)->get()->first();
		$affiliate = Affiliate::find(Auth::id());
		$affiliate_program = Program::where('name',$affiliate->program)->first();

		session([
			'transaction_type' => 'upgrade',
			'program' => $request->program,
		]);

		if($request->program == 'Maxi'){
			session([
				'theme_maxi_1' => $request->theme_maxi_1,
				'theme_maxi_2' => $request->theme_maxi_2,
				'theme_maxi_3' => $request->theme_maxi_3,
			 ]);
		}

		return view('admin.upgrade-summary')->with([
			'request' => $request,
			'program' => $program,
			'affiliate_program' => $affiliate_program,
		]);
	}

	public function store()
	{
		$user = User::find(Auth::id());
		$affiliate = Affiliate::find(Auth::id());
		$program = Program::where('name',session('program'))->first();
		$affiliate_program = Program::where('name',$affiliate->program)->first();
		
		$sale = new Sale;

		$affiliate->program = $program->name;
		$affiliate->gains_per_email = $program->gains_per_email;
		$affiliate->gains_per_sale = $program->gains_per_sale;
		$affiliate->save();

		$sale->affiliate_id = 1;
		$sale->product = $program->name;
		$sale->status = "Approuvé";
		$sale->tag = "is-success";
		$sale->referral_value = 0;
		$sale->real_value = $program->price - $affiliate_program->price;
		$sale->benefits = $program->price - $affiliate_program->price;
		$sale->gains_per_email_limit = $program->gains_per_email_limit;
		$sale->requested = false;
		$sale->save();

		if($program->name == "Maxi"){
			$owned_themes = new OwnedTheme;
			$owned_themes->affiliate_id = $user->id;
			$owned_themes->theme_id = session('theme_maxi_1');
			$owned_themes->save();

			$owned_themes = new OwnedTheme;
			$owned_themes->affiliate_id = $user->id;
			$owned_themes->theme_id = session('theme_maxi_2');
			$owned_themes->save();

			$owned_themes = new OwnedTheme;
			$owned_themes->affiliate_id = $user->id;
			$owned_themes->theme_id = session('theme_maxi_3');
			$owned_themes->save();
		}

		session()->forget([
			'transaction_type', 'program', 'theme_mini', 'theme_maxi_1', 'theme_maxi_2', 'theme_maxi_3',
		]);

		return redirect('admin')->with([
    						'code' => 'transfer-requested',
    						'image' => $program->name,
    						'title' => 'La mise à niveau de votre programme a été réussie !',
    						'subtitle' => 'Nouveau programme: Pack '.$program->name,
    						]);
	}

}
