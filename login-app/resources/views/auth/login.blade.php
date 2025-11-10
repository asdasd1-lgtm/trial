@extends('layouts.app')

@section('content')
    <header>
        <h1>Welcome back</h1>
        <p>Please sign in with your account credentials.</p>
    </header>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-error">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}" novalidate>
        @csrf

        <div class="form-field">
            <label for="email">Email</label>
            <input
                id="email"
                name="email"
                type="email"
                value="{{ old('email') }}"
                autocomplete="email"
                required
                placeholder="you@example.com"
            >
            @error('email')
                <p class="form-helper">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-field">
            <label for="password">Password</label>
            <input
                id="password"
                name="password"
                type="password"
                autocomplete="current-password"
                required
                placeholder="••••••••"
            >
            @error('password')
                <p class="form-helper">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-actions">
            <label for="remember">
                <input id="remember" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                Remember me
            </label>

            <button type="submit" class="primary">
                Sign in
            </button>
        </div>
    </form>

    <p class="muted">
        Use <strong>test@example.com</strong> and password <strong>password</strong> (seeded user).
    </p>
@endsection
