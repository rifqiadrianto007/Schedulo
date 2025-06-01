<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('login', function () {
    return view('login');
});

Route::get('regis', function () {
    return view('regis');
});

Route::get('venue', function () {
    return view('venue');
});

Route::get('detailVenue', function () {
    return view('detailVenue');
});

Route::get('detailEvent', function () {
    return view('detailEvent');
});
