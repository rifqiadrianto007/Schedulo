<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('login', function () {
    return view('login');
})->name('login');

Route::post('/login', [AuthController::class, 'proses'])->name('login.proses');

Route::get('/admin', function() {
    return 'Dashboard admin';
})->name('admin.dashboard')->middleware('auth');

Route::get('regis', function () {
    return view('regis');
})->name('regis');

Route::get('venue', function () {
    return view('venue');
})->name('venue');

Route::get('event', function () {
    return view('event');
})->name('event');

Route::get('admDashboard', function () {
    return view('admDashboard');
})->name('admDashboard');

Route::get('admEvent', function () {
    return view('admEvent');
})->name('admEvent');

Route::get('admVenue', function () {
    return view('admVenue');
})->name('admVenue');
