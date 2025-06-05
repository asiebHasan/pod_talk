@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <header class="site-header d-flex flex-column justify-content-center align-items-center" style="min-height: 300px;">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 col-12 text-center">

                    <h2 class="mb-0">Login</h2>
                </div>

            </div>
        </div>
    </header>
    </header>
    <section class="login-section section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-12">
                    <div class="login-form">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" value="{{ old('email') }}" required autocomplete="email"
                                    autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="password" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Login</button>
                        </form>
                        <div class="mt-3">
                            <a href="{{ route('register') }}">Don't have an account? Register here</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="login-image">
                        <img src="{{ asset('images/pod-talk-logo.png') }}" class="img-fluid" alt="Login Image">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
