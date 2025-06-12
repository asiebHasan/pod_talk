@extends('layouts.app')

@section('title', 'dashboard')

@section('content')
    <header class="site-header d-flex flex-column justify-content-center align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12 text-center">
                    <h2 class="mb-0">Welcome, {{ Auth::user()->name }}!</h2>
                    @if (Auth::user()->isPodcaster())
                        <p class="lead">You are a Podcaster. Manage your podcasts and episodes here.</p>
                    @else
                        <a href="{{ route('podcaster.become') }}" class="btn custom-btn smoothscroll mt-3">Become a
                            Pod-Caster</a>
                    @endif

                </div>
            </div>
        </div>
    </header>

    <section class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12 text-center">
                    <h3 class="mb-4">Your Dashboard</h3>
                    <p class="lead">Here you can manage your account, view your activity, and access various features.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Account Settings</h5>
                            <p class="card-text">Update your profile information, change your password, and manage your
                                account settings.</p>
                            <a href="{{ route('profile.edit') }}" class="btn custom-btn smoothscroll mt-3">Edit Profile</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Activity Log</h5>
                            <p class="card-text">View your recent activities, including login history and actions taken on
                                the platform.</p>
                            <a href="" class="btn custom-btn smoothscroll mt-3">View Activity</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Support</h5>
                            <p class="card-text">Need help? Contact our support team for assistance with any issues you may
                                have.</p>
                            <a href="" class="btn custom-btn smoothscroll mt-3">Contact Support</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
