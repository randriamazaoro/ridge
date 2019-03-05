<?php

namespace App\Http\Controllers;

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
    		'email' => 'required|email'
    	]);

        Mail::to($request->email)->send(new UserHasRequestedEbook());

    	return back()->with([
                        'code' => 'ebook-sent',
                        'image' => 'envelope',
                        'title' => 'Un e-mail contenant votre e-book vous a été envoyé !',
                        'subtitle' => '',
                        ]);
        }
}
