<?php

namespace App\Http\Controllers\Superadmin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('superadmin');
    }

    public function index()
    {
        $user = User::find(Auth::id());

        return view('superadmin.settings')->with([
            'user' => $user,
        ]);
    }

    public function update(Request $request, $q)
    {
        $user = User::find(Auth::id());

        if ($q == "name") {
            $request->validate([
                'name' => 'required|string|max:255',
            ]);

            $user->name = $request->name;
            $user->save();

        }

        if ($q == "email") {

            $request->validate([
                'email' => 'required|string|email|max:255|unique:users',
            ]);

            $user->email = $request->email;
            $user->save();

        }

        if ($q == "password"){

            $request->validate([
                'current_password' => ['required', 'min:6'],
                'new_password' => ['required', 'min:6', 'confirmed'],
            ]);

            $current_password = $request->current_password;

            if (Hash::check($current_password, $user->password)){
                $user->password == Hash::make($request->new_password);
                $user->save();
            }

            else{
                return back()->with([
                    'code' => 'password-incorrect',
                    'image' => 'cross',
                    'title' => 'Votre mot de passe actuel est erroné !',
                    'subtitle' => 'Veuillez réessayer.',
                ]);
            }
        }

        if ($q == "paypal") {

            $request->validate([
                'paypal_address' => 'required|string|email|max:255|unique:users',
            ]);

            $user->paypal_address = $request->paypal_address;
            $user->save();

        }

        return back()->with([
            'code' => 'settings-updated',
            'image' => 'gear',
            'title' => 'Vos modifications ont bien été enregistrées !',
            'subtitle' => '',
        ]);
    }
}
