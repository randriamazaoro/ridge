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

class FinanceController extends Controller
{
    public function index()
	{
		$sales = Sale::paginate(5);
		$emails = Email::paginate(5);
		$affiliates = Affiliate::paginate(5);

		$pending_transfer_requests = 
		TransferRequest::pending()
			->paginate(5);

		$paid_transfer_requests = 
		TransferRequest::paid()
			->paginate(5);

		return view('superadmin.finances')->with([
			'sales' => $sales, 
			'emails' => $emails,
			'affiliates' => $affiliates,
			'pending_transfer_requests' => $pending_transfer_requests,
			'paid_transfer_requests' => $paid_transfer_requests,
		]);
	}
}
