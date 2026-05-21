@extends('layouts.app')

@include('auth.styles')

@section('content')
<section class="auth-wrap">
    <div class="auth-copy">
        <h1>Create Account</h1>
        <p class="lede">Use a strong password. Laravel will hash it before saving it.</p>
    </div>

    <form class="auth-card panel" action="{{ route('register.store') }}" method="POST">
        @csrf

        <label>
            <span>Name</span>
            <input type="text" name="name" value="{{ old('name') }}" autocomplete="name" required autofocus>
        </label>

        <label>
            <span>Email</span>
            <input type="email" name="email" value="{{ old('email') }}" autocomplete="email" required>
        </label>

        <label>
            <span>Password</span>
            <input type="password" name="password" autocomplete="new-password" required>
        </label>

        <label>
            <span>Confirm Password</span>
            <input type="password" name="password_confirmation" autocomplete="new-password" required>
        </label>

        <button class="btn btn-primary" type="submit">Create Account</button>

        <p class="auth-link">
            Already registered?
            <a href="{{ route('login') }}">Login</a>
        </p>
    </form>
</section>
@endsection
