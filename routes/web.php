<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'pengunjung.formpublic')->name('pengunjung.form');
Route::view('/dashboard', 'admin.home')->name('admin.dashboard');
Route::view('/tamu', 'admin.bukutamu')->name('admin.bukutamu');
