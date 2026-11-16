<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/siswa/dashboard', function () {
    return view('siswa.dashboard');
});