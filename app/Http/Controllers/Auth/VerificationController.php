<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Affiliate;
use App\Email;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\VerifiesEmails;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectTo = 'email/verification';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
        $this->middleware('verified')->only('storeEmail');
    }

    public function storeEmail()
    {
        $user = User::find(Auth::id());
        $affiliate = Affiliate::where('id', $user->affiliate_id)->first();
        $emails_count = Email::where('affiliate_id',$affiliate->id)->get()->count();
        $status = $emails_count < $affiliate->gains_per_email_limit ? "Approuvé" : "En attente";
        $tag = $emails_count < $affiliate->gains_per_email_limit ? "is-success" : "is-warning";
        
        Email::create([
            'affiliate_id' => $affiliate->id,
            'email' => $user->email,
            'referral_value' => $affiliate->gains_per_email,
            'status' => $status,
            'tag' => $tag,
            'requested' => false,
        ]);

        return redirect('admin/initiation')->with('completed-register','done');
    }

}
