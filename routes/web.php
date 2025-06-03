<?php

use Illuminate\Support\Facades\Route;

Route::get('home', function () {
    return view('home');
})->name('home');

Route::get('login', function () {
    return view('login');
})->name('login');

Route::get('regis', function () {
    return view('regis');
})->name('regis');

Route::get('/venue', function () {
    return view('venue');
});

Route::get('detailVenue', function () {
    return view('detailVenue');
});

Route::get('detailEvent', function () {
    return view('detailEvent');
});
