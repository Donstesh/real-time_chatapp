<?php

use Illuminate\Support\Facades\Route;
use App\Events\MessageSent;
//test if broadcast is working 
Route::get('/test-event', function () {
    broadcast(new MessageSent(auth()->user(), 'Hello from test!'))->toOthers();
    return 'Event broadcasted!';
})->middleware('auth');

Route::get('/chat', function () {
    return view('chat');
})->middleware('auth');


Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
