<?php

namespace App\Http\Controllers;

use App\NewsletterEmail;
use Illuminate\Http\Request;
use Mail;
use App\Mail\UserHasRequestedEbook;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;


class NewsletterController extends Controller
{
    public function store(Request $request)
    {
    	$request->validate([
    		'email' => 'required|email|unique:newsletter_emails'
    	]);

    	$newsletter_emails = new NewsletterEmail;
        $newsletter_emails->email = $request->email;
    	$newsletter_emails->token = str_random(32);
        $newsletter_emails->downloaded = false;
    	$newsletter_emails->save();

        Mail::to($request->email)->send(new UserHasRequestedEbook($newsletter_emails->token));

    	return back()->with([
                        'code' => 'ebook-sent',
                        'image' => 'envelope',
                        'title' => 'Un e-mail contenant votre e-book vous a été envoyé !',
                        'subtitle' => '',
                        ]);
    }

    public function download($token)
    {
        $newsletter_email = NewsletterEmail::where('token', $token)->first();

        if (isset($newsletter_email) && $newsletter_email->downloaded == false){

            $newsletter_email->downloaded = true;
            return Storage::download('SuperAffiliation.pdf');
        }

        return redirect('/');
    }
}
