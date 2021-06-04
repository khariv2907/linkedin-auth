@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            LinkedIn OAuth
        </div>
        <div class="card-body">
            <h5 class="card-title">Welcome to the LinkedIn OAuth Demonstration</h5>
            @auth
                <hr>
                <div class="mb-3 row">
                    <div class="col-sm-2">Name</div>
                    <div class="col-sm-10">{{ $user->name }}</div>
                </div>
                <div class="mb-3 row">
                    <div class="col-sm-2">Email</div>
                    <div class="col-sm-10">{{ $user->email }}</div>
                </div>
                <hr>
                <a href="{{ route('auth.logout') }}" class="btn btn-primary">Disconnect</a>
            @endauth
            @guest
                <a href="{{ route('auth.linkedin.redirect') }}" class="btn btn-primary">Connect LinkedIn</a>
            @endguest
        </div>
    </div>
@endsection
