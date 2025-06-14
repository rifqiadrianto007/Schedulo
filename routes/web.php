<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VenueController;
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

Route::get('venue', [VenueController::class, 'showUserVenue'])->name('venue');

Route::get('admVenue/tambah', [VenueController::class, 'create'])->name('admVenue.tambah')->middleware('auth', 'admin');

Route::get('venue/tambah', [VenueController::class, 'create'])->name('venue.create')->middleware('auth', 'admin');

Route::post('venue/tambah', [VenueController::class, 'store'])->name('venue.store')->middleware('auth', 'admin');

Route::get('admVenue/edit/{id}', [VenueController::class, 'edit'])->name('admVenue.edit')->middleware('auth', 'admin');

Route::post('admVenue/update/{id}', [VenueController::class, 'update'])->name('admVenue.update')->middleware('auth', 'admin');

Route::get('/admVenue', [VenueController::class, 'index'])->name('admVenue')->middleware('auth', 'admin');

Route::delete('admVenue/delete/{id}', [VenueController::class, 'destroy'])->name('admVenue.delete')->middleware('auth', 'admin');

Route::get('event', function () {
    return view('event');
})->name('event');

Route::get('admDashboard', function () {
    return view('admDashboard');
})->name('admDashboard')->middleware('auth', 'admin');

Route::get('admEvent', function () {
    return view('admEvent');
})->name('admEvent')->middleware('auth', 'admin');

Route::get('/form-event', function () {
    return view('formEvent');
})->name('form.event')->middleware('auth');
