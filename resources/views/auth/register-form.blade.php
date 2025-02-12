@extends('auth.layouts.master')



@section('head-tag')
    <title>ساخت حساب کاربری</title>
@endsection

@section('content')
<div>
    <h2 class="login-title">ورود به حساب کاربری</h2>

    <form action="{{ route('register') }}" method="POST" class="login-form">
        @csrf
        <div>
            <label for="first_name">نام </label>
            <input id="first_name" type="text" placeholder="محمدرضا" name="first_name" autocomplete="off" />
            @error('first_name')
            <span class="alerterr">{{ $message }}</span>
            @enderror

        </div>

        <div>
            <label for="last_name">نام خانوادکی </label>
            <input id="last_name" type="text" placeholder="توکلی" name="last_name" autocomplete="off" />
            @error('last_name')
            <span class="alerterr">{{ $message }}</span>
            @enderror

        </div>

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
