<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VenueController;
use App\Http\Controllers\EventController;
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

Route::get('/event', [EventController::class, 'index'])->name('event');

Route::get('event', [EventController::class, 'showAdmEvent'])->name('event');

Route::get('event/tambah', [EventController::class, 'create'])->name('event.create')->middleware('auth');

Route::post('event/tambah', [EventController::class, 'store'])->name('event.store')->middleware('auth');

Route::get('/event/{id}/edit', [EventController::class, 'edit'])->name('event.edit')->middleware('auth');

Route::post('/event/{id}/update', [EventController::class, 'update'])->name('event.update')->middleware('auth');

Route::get('/eventStatus', [EventController::class, 'showEvent'])->name('eventStatus');

Route::get('admDashboard', function () {
    return view('admDashboard');
})->name('admDashboard')->middleware('auth', 'admin');

Route::get('admEvent', function () {
    return view('admEvent');
})->name('admEvent')->middleware('auth', 'admin');

Route::get('/form-event', [EventController::class, 'create'])->name('form.event')->middleware('auth');

Route::get('/admEvent/pengajuan', [EventController::class, 'showPendingEvents'])->name('admPengajuanEvent')->middleware('auth', 'admin');

Route::get('/admFormDataEvent/{id}', [EventController::class, 'show'])->name('form.dataEvent')->middleware('auth', 'admin');

Route::post('/admFormDataEvent/{id}/updateStatus', [EventController::class, 'updateStatus'])->name('event.updateStatus')->middleware('auth', 'admin');

