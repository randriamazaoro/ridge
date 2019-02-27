<?php

namespace App\Http\Controllers;

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

class SuperAdminController extends Controller
{
    
    public function __construct()
	{
	    $this->middleware('auth');
	    $this->middleware('superadmin');
	}  

	public function index()
	{
		$users = User::all();
		$affiliates = Affiliate::all();
		$emails = Email::all();
		$sales = Sale::all();
		$programs = Program::all();
		$themes = Theme::all();

		return view('superadmin.index')->with([
			'users' => $users, 
			'affiliates' => $affiliates,
			'emails' => $emails,
			'sales' => $sales,
			'programs' => $programs,
			'themes' => $themes,
		]);
	}	
	
}
