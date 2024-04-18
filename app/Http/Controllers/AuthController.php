<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $checkLoginCred = $request->only('email', 'password');
        if (Auth::attempt($checkLoginCred)) {
            return redirect('index')->withSuccess('Successfully Loggedin!');
        }
        Session::flash('errorMessage', "Your login credentials are incorrect!");
        return redirect('login');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return redirect('index');
    }
}
