<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/user', [UserController::class, 'index']);

Route::resource('events', EventController::class);
