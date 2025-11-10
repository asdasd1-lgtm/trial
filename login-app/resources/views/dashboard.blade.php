@extends('layouts.app')

@section('content')
    <header>
        <h1>Dashboard</h1>
        <p>You are signed in to {{ config('app.name') }}.</p>
    </header>

    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <div class="form-actions" style="justify-content: flex-end;">
            <button type="submit" class="primary">Sign out</button>
        </div>
    </form>
@endsection
