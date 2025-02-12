<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginForm(){
        return view('auth.login-form');
    }

    public function login(LoginUserRequest $request){

        $credentials = $request->validated();

        if(!Auth::attempt($credentials,true)){
            return back()->withErrors(['email' => 'Email Or Password Is Not Correct']);
        }

        $request->session()->regenerate();

        return redirect('/dashboard');
    }
}
