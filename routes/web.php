<?php

use App\Events\PrivateEvent;
use App\Events\PublicEvent;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\User;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//the public route
Route::get('/public',function (){
    broadcast(new PublicEvent(User::find(1)));

    return "the public event has been fired";
});


//the private route
Route::get('/private',function (){
    broadcast(new PrivateEvent(User::find(1)));
    return "the private event has been fired";
});         


