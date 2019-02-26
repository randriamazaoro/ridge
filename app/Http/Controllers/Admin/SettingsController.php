<?php

namespace App\Http\Controllers\Admin;

use App\Affiliate;
use App\Email;
use App\Http\Controllers\Controller;
use App\Program;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
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
        $user = User::find(Auth::id());
        $affiliate = Affiliate::find(Auth::id());
        $program =
        Program::where('name', $affiliate->program)
            ->first();

        return view('admin.settings')->with([
            'user' => $user,
            'affiliate' => $affiliate,
            'program' => $program,
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

            $emails = Email::where('email', $user->email)->get();

            $user->email = $request->email;
            $user->save();

            foreach ($emails as $email) {
                $email->email = $request->email;
                $email->save();
            }

        }

        if ($q == "paypal") {

            $request->validate([
                'paypal_address' => 'required|string|email|max:255|unique:users',
            ]);

            $user->paypal_address = $request->paypal_address;
            $user->save();

        }

        if ($q == 'personal') {

            $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'age' => 'required|integer',
                'gender' => 'required|string',
            ]);

            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->age = $request->age;
            $user->gender = $request->gender;
            $user->save();

        }

        if ($q == "contact") {
            $request->validate([
                'email_contact' => 'email|string|max:255',
                'phone' => 'string|max:255',
                'country' => 'required|string',
                'city' => 'required|string',
            ]);

            $user->email_contact = $request->email_contact;
            $user->phone = $request->phone;
            $user->country = $request->country;
            $user->city = $request->city;
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
