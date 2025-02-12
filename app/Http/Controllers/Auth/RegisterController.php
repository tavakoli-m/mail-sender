<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterUserRequest;
use App\Jobs\WelcomeEmailNotificationJob;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function registerForm(){
        return view('auth.register-form');
    }

    public function register(RegisterUserRequest $request){

        $credentials = $request->validated();

        $credentials['password'] = Hash::make($credentials['password']);

        $user = User::create($credentials);

        Auth::login($user);

        WelcomeEmailNotificationJob::dispatch($user);

        return to_route('dashboard');
    }
}
