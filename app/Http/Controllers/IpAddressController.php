<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class IpAddressController extends Controller
{
    public function index()
    {
        $user = [];
        if (Auth::check()) {
            $user = auth()->user();
            // dump($user);
        }
        
        return view('manage-ip-address.index', compact('user'));
    }
}
