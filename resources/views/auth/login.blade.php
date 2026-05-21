@extends('layouts.app')

@include('auth.styles')

@section('content')
<section class="auth-wrap">
    <div class="auth-copy">
        <h1>Login</h1>
        <p class="lede">Access the product manager with your secure account.</p>
    </div>

    <form class="auth-card panel" action="{{ route('login.store') }}" method="POST">
        @csrf

        <label>
            <span>Email</span>
            <input type="email" name="email" value="{{ old('email') }}" autocomplete="email" required autofocus>
        </label>

        <label>
            <span>Password</span>
            <input type="password" name="password" autocomplete="current-password" required>
        </label>

        <label class="check-row">
            <input type="checkbox" name="remember" value="1">
            <span>Remember me</span>
        </label>

        <button class="btn btn-primary" type="submit">Login</button>

        <p class="auth-link">
            Need an account?
            <a href="{{ route('register') }}">Create one</a>
        </p>
    </form>
</section>
@endsection
