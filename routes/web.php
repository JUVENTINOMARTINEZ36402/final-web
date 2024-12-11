<?php

use App\Http\Controllers\TicketController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [EventController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // CRUD de eventos
    Route::resource('events', EventController::class);
});

Route::get('/tickets/buy/{event}', [TicketController::class, 'buy'])->name('tickets.buy');
Route::post('/tickets/store', [TicketController::class, 'store'])->name('tickets.store');
Route::get('/tickets', [TicketController::class, 'index'])->name('tickets.index');

require __DIR__.'/auth.php';
