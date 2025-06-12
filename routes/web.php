<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PodcasterController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/list', function () {
    return view('list');
})->name('list');

Route::get('/details', function () {
    return view('details');
})->name('details');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/become-podcaster', [PodcasterController::class, 'becomePodcasterForm'])->name('podcaster.become');
    Route::post('/dashboard/become-podcaster', [PodcasterController::class, 'becomePodcaster'])->name('podcaster.register');
});

require __DIR__.'/auth.php';
