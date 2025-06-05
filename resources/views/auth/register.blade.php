@extends('layouts.app')

@section('title', 'Register') {{-- Fixed title --}}

@section('content')
    <header class="site-header d-flex flex-column justify-content-center align-items-center" style="min-height: 300px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12 text-center">
                    <h2 class="mb-0">Register</h2>
                </div>
            </div>
        </div>
    </header> {{-- Removed duplicate closing tag --}}

    <section class="login-section section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-12">
                    <div class="login-image">
                        <img src="{{ asset('images/pod-talk-logo.png') }}" class="img-fluid" alt="Login Image">
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="login-form">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            
                            {{-- Added Name Field --}}
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" value="{{ old('name') }}" required autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" value="{{ old('email') }}" required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="password" name="password" required>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                {{-- Removed error handling for confirmation --}}
                                <input type="password" class="form-control"
                                    id="password_confirmation" name="password_confirmation" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Register</button>
                        </form>
                        <div class="mt-3">
                            <a href="{{ route('login') }}">Already have an account? Login here</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection