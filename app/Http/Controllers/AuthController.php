<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController as FortifyController;
use Laravel\Fortify\Http\Requests\LoginRequest;

class AuthController extends  FortifyController
{
    public function login()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('welcome');
    }

    public function store(LoginRequest $request)
    {
        $response = parent::store($request);

        if (Auth::check()) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->back();
        }
    }
}
