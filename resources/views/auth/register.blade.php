@extends('layouts.app')

@section('content')
<main class="page-view auth-area px-3 py-5">
    <form class="auth-card surface p-4 p-md-5 demo-form" method="POST" action="{{ route('register') }}">
        @csrf

        <div class="navbar-brand d-flex align-items-center mb-4">
            <span class="brand-mark">P</span>PageTurn
        </div>

        <h1 class="h2 fw-bold">{{ __('Create your account') }}</h1>
        <p class="text-secondary mb-4">
            {{ __('Join the library and keep your books together.') }}
        </p>

        {{-- Name --}}
        <div class="mb-3">
            <label for="name" class="form-label fw-semibold">{{ __('Name') }}</label>
            <input id="name" type="text"
                class="form-control form-control-lg @error('name') is-invalid @enderror"
                name="name" value="{{ old('name') }}" placeholder="Enter your name"
                required autocomplete="name" autofocus>

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- Email --}}
        <div class="mb-3">
            <label for="email" class="form-label fw-semibold">{{ __('Email Address') }}</label>
            <input id="email" type="email"
                class="form-control form-control-lg @error('email') is-invalid @enderror"
                name="email" value="{{ old('email') }}" placeholder="Enter your email"
                required autocomplete="email">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- Password --}}
        <div class="mb-3">
            <label for="password" class="form-label fw-semibold">{{ __('Password') }}</label>
            <input id="password" type="password"
                class="form-control form-control-lg @error('password') is-invalid @enderror"
                name="password" placeholder="Create a password"
                required autocomplete="new-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- Confirm Password --}}
        <div class="mb-4">
            <label for="password-confirm" class="form-label fw-semibold">{{ __('Confirm Password') }}</label>
            <input id="password-confirm" type="password"
                class="form-control form-control-lg"
                name="password_confirmation" placeholder="Enter password again"
                required autocomplete="new-password">
        </div>

        {{-- Submit --}}
        <button class="btn btn-primary btn-lg w-100" type="submit">
            {{ __('Create account') }} →
        </button>

        <p class="text-center text-secondary mt-4 mb-0">
            {{ __('Already a member?') }}
            <a href="{{ Route::has('login') ? route('login') : '#signin' }}"
                class="fw-bold text-decoration-none">{{ __('Sign in') }}</a>
        </p>
    </form>
</main>
@endsection