<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\auth;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('login', function () {
    return view('login');
})->name('login');

Route::post('/login', [AuthController::class, 'proses'])->name('login.proses');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('regis', function () {
    return view('regis');
})->name('regis');

Route::post('/regis', [AuthController::class, 'register'])->name('register.proses');

Route::get('venue', function () {
    return view('venue');
})->name('venue');

Route::get('event', function () {
    return view('event');
})->name('event');

Route::get('admDashboard', function () {
    return view('admDashboard');
})->name('admDashboard')->middleware('auth', 'admin');

Route::get('admEvent', function () {
    return view('admEvent');
})->name('admEvent')->middleware('auth', 'admin');

Route::get('admVenue', function () {
    return view('admVenue');
})->name('admVenue')->middleware('auth', 'admin');

Route::get('formEvent', function () {
    return view('formEvent');
})->name('formEvent');
