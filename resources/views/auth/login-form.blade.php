@extends('auth.layouts.master')



@section('head-tag')
    <title>ورود به حساب کاربری</title>
@endsection

@section('content')
<div>
    <h2 class="login-title">ورود به حساب کاربری</h2>

    <form action="{{ route('login') }}" method="POST" class="login-form">
        @csrf
        <div>
            <label for="email">ایمیل </label>
            <input id="email" type="text" placeholder="me@example.com" name="email" autocomplete="off" />
            @error('email')
            <span class="alerterr">{{ $message }}</span>
            @enderror

        </div>

        <div>
            <label for="password">رمز</label>
            <input id="password" type="password" placeholder="password" name="password" autocomplete="off" />
            @error('password')
            <span class="alerterr">{{ $message }}</span>
            @enderror
        </div>

        <button class="btn btn--form" type="submit" value="Log in">
            وارد شوید
        </button>
    </form>
</div>
@endsection
