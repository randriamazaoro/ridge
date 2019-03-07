<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\User;
use Mail;
use App\Mail\SuperAdminHasNewMessage;

class ContactController extends Controller
{
    
    public function index()
    {
    	return view('contact.index');
    }

    public function store(Request $request){
    	$this->validate($request,[
    		'name' => 'required|max:255|alpha',
    		'email' => 'required|email',
            'subject' => 'required|max:255',
    		'message' => 'required'
    	]);

    	Contact::create($request->all());
    	Mail::to(User::find(1))->send(new SuperAdminHasNewMessage($request));

    	return back()->with([
    					'code' => 'message-sent',
    					'image' => 'envelope-1',
    					'title' => 'Votre e-mail a bien été envoyée !',
    					'subtitle' => 'Nous allons vous repondre dans les plus brefs délais.',
    					]);
    }
}
