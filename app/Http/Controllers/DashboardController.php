<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.dashboard');
    }

    // public function settings()
    // {
    //     return view('dashboard.settings');
    // }

    // public function notifications()
    // {
    //     return view('dashboard.notifications');
    // }

    // public function support()
    // {
    //     return view('dashboard.support');
    // }
}
