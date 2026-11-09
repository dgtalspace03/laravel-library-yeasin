@extends('layouts.app')

@section('content')
<main class="page-view auth-area px-3 py-5">
    <form class="auth-card surface p-4 p-md-5 demo-form" method="POST" action="{{ route('login') }}">
        @csrf

        <div class="navbar-brand d-flex align-items-center mb-4">
            <span class="brand-mark">P</span>PageTurn
        </div>

        <h1 class="h2 fw-bold">{{ __('Welcome back') }}</h1>
        <p class="text-secondary mb-4">
            {{ __('Sign in to see your borrowed books and reading history.') }}
        </p>

        {{-- Email --}}
        <div class="mb-3">
            <label for="email" class="form-label fw-semibold">{{ __('Email Address') }}</label>
            <input id="email" type="email"
                class="form-control form-control-lg @error('email') is-invalid @enderror"
                name="email" value="{{ old('email') }}" placeholder="Enter your email"
                required autocomplete="email" autofocus>

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
                name="password" placeholder="Enter your password"
                required autocomplete="current-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- Remember Me --}}
        <div class="form-check mb-4">
            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                {{ old('remember') ? 'checked' : '' }}>
            <label class="form-check-label" for="remember">
                {{ __('Remember Me') }}
            </label>
        </div>

        {{-- Submit --}}
        <button class="btn btn-primary btn-lg w-100" type="submit">
            {{ __('Sign in') }} →
        </button>

        @if (Route::has('password.request'))
            <div class="text-center mt-3">
                <a class="btn btn-link text-decoration-none" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            </div>
        @endif

        <p class="text-center text-secondary mt-4 mb-0">
            {{ __('New to PageTurn?') }}
            <a href="{{ Route::has('register') ? route('register') : '#signup' }}"
                class="fw-bold text-decoration-none">{{ __('Create an account') }}</a>
        </p>
    </form>
</main>
@endsection