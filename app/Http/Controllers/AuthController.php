<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController as FortifyController;
use Laravel\Fortify\Http\Requests\LoginRequest;

class AuthController extends  FortifyController
{
    /*
    *    Redirect to admin login page
    */
    public function adminLogin()
    {
        if (Auth::check() && Auth::user()->hasRole('admin')) {
            return redirect()->route('admin.dashboard');
        }

        return view('auth.admin-login');
    }


   public function store(LoginRequest $request)
    {
        $response = parent::store($request);

        $user = Auth::user();

        if ($user->hasRole('admin')) {
            return redirect()->route('admin.dashboard');
        }

        return '/dashboard';
    }
}
