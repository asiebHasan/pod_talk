@extends('layouts.app')

@section('title', 'dashboard')

@section('content')
    <header class="site-header d-flex flex-column justify-content-center align-items-center"
        style="min-height: 360px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12 text-center">
                    <h2 class="mb-0">Welcome, {{ Auth::user()->name }}!</h2>
                </div>
            </div>
        </div>
    </header>

    <section class="dashboard-section section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-12">
                    
                    <p>This is your dashboard where you can manage your account and settings.</p>
                    <!-- Add more dashboard content here -->
                </div>
            </div>
        </div>
    </section>

@endsection