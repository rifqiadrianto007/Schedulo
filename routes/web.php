<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VenueController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AdminController;

// Homepage
Route::get('/', [EventController::class, 'homepage'])->name('home');

// Auth
Route::get('login', fn() => view('login'))->name('login');
Route::post('/login', [AuthController::class, 'proses'])->name('login.proses');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('regis', fn() => view('regis'))->name('regis');
Route::post('/regis', [AuthController::class, 'register'])->name('register.proses');

// Venue (User & Admin)
Route::get('venue', [VenueController::class, 'showUserVenue'])->name('venue');
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admVenue', [VenueController::class, 'index'])->name('admVenue');
    Route::get('admVenue/tambah', [VenueController::class, 'create'])->name('admVenue.tambah');
    Route::get('venue/tambah', [VenueController::class, 'create'])->name('venue.create');
    Route::post('venue/tambah', [VenueController::class, 'store'])->name('venue.store');
    Route::get('admVenue/edit/{id}', [VenueController::class, 'edit'])->name('admVenue.edit');
    Route::post('admVenue/update/{id}', [VenueController::class, 'update'])->name('admVenue.update');
    Route::delete('admVenue/delete/{id}', [VenueController::class, 'destroy'])->name('admVenue.delete');
});

<<<<<<< HEAD
// Event (User & Admin)
Route::get('/event', [EventController::class, 'index'])->name('event');
=======
Route::get('/venue', [VenueController::class, 'showLokasi'])->name('venue');

Route::get('admVenue/tambah', [VenueController::class, 'create'])->name('admVenue.tambah')->middleware('auth', 'admin');

Route::get('venue/tambah', [VenueController::class, 'create'])->name('venue.create')->middleware('auth', 'admin');

Route::post('venue/tambah', [VenueController::class, 'store'])->name('venue.store')->middleware('auth', 'admin');

Route::get('admVenue/edit/{id}', [VenueController::class, 'edit'])->name('admVenue.edit')->middleware('auth', 'admin');

Route::post('admVenue/update/{id}', [VenueController::class, 'update'])->name('admVenue.update')->middleware('auth', 'admin');

Route::get('/admVenue', [VenueController::class, 'index'])->name('admVenue')->middleware('auth', 'admin');

Route::delete('admVenue/delete/{id}', [VenueController::class, 'destroy'])->name('admVenue.delete')->middleware('auth', 'admin');

Route::get('/event', [EventController::class, 'index'])->name('event');

>>>>>>> f27ffc2 (detail pop up)
Route::get('event', [EventController::class, 'showAdmEvent'])->name('event');
Route::get('/event/fetch/{id}', [EventController::class, 'fetchDetailAjax'])->name('event.fetch.ajax');
Route::get('/event/{id}', [EventController::class, 'showPublicDetail'])->name('event.detail'); 
Route::middleware('auth')->group(function () {
    Route::get('event/tambah', [EventController::class, 'create'])->name('event.create');
    Route::post('event/tambah', [EventController::class, 'store'])->name('event.store');
    Route::get('/event/{id}/edit', [EventController::class, 'edit'])->name('event.edit');
    Route::post('/event/{id}/update', [EventController::class, 'update'])->name('event.update');
    Route::get('/eventStatus', [EventController::class, 'showEvent'])->name('eventStatus');
    Route::get('/form-event', [EventController::class, 'create'])->name('form.event');
});

<<<<<<< HEAD
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/event', [EventController::class, 'eventList'])->name('eventList');
    Route::get('admEvent', [EventController::class, 'eventList'])->name('admEvent');
    Route::get('/admEvent/pengajuan', [EventController::class, 'showPendingEvents'])->name('admPengajuanEvent');
    Route::get('/admFormDataEvent/{id}', [EventController::class, 'show'])->name('form.dataEvent');
    Route::post('/admFormDataEvent/{id}/updateStatus', [EventController::class, 'updateStatus'])->name('event.updateStatus');
    Route::get('/eventDetailAdm/{id}', [EventController::class, 'showDetail'])->name('event.detailAdm');
    Route::delete('/admEvent/{id}', [AdminController::class, 'destroy'])->name('admEventDelete');
});

// Dashboard Admin
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('admDashboard', [AdminController::class, 'dashboard'])->name('admDashboard');
});
=======
Route::get('event/tambah', [EventController::class, 'create'])->name('event.create')->middleware('auth');

Route::post('event/tambah', [EventController::class, 'store'])->name('event.store')->middleware('auth');

Route::get('/event/{id}/edit', [EventController::class, 'edit'])->name('event.edit')->middleware('auth');

Route::post('/event/{id}/update', [EventController::class, 'update'])->name('event.update')->middleware('auth');

Route::get('/eventStatus', [EventController::class, 'showEvent'])->name('eventStatus')->middleware('auth');

Route::get('admDashboard', function () {
    return view('admDashboard');
})->name('admDashboard')->middleware('auth', 'admin');

Route::get('admDashboard', [AdminController::class, 'dashboard'])->name('admDashboard')->middleware('auth', 'admin');

Route::delete('/admEvent/{id}', [AdminController::class, 'destroy'])->name('admEventDelete')->middleware('auth', 'admin');

Route::get('/admin/event', [EventController::class, 'eventList'])->name('eventList')->middleware('auth', 'admin');

Route::get('admEvent', function () {
    return view('admEvent');
})->name('admEvent')->middleware('auth', 'admin');

Route::get('/form-event', [EventController::class, 'create'])->name('form.event')->middleware('auth');


Route::get('/admEvent/pengajuan', [EventController::class, 'showPendingEvents'])->name('admPengajuanEvent')->middleware('auth', 'admin');

Route::get('/admFormDataEvent/{id}', [EventController::class, 'show'])->name('form.dataEvent')->middleware('auth', 'admin');

Route::post('/admFormDataEvent/{id}/updateStatus', [EventController::class, 'updateStatus'])->name('event.updateStatus')->middleware('auth', 'admin');

Route::get('/eventDetailAdm/{id}', [EventController::class, 'showDetail'])->name('event.detailAdm')->middleware('auth', 'admin');
>>>>>>> f27ffc2 (detail pop up)

// API
Route::get('/api/event/{id}', function ($id) {
    return App\Models\Event::findOrFail($id);
});
