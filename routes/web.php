<?php

use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');

Route::middleware(['auth', 'verified'])->prefix('campanha')->name('campanha.')->group(function () {
    Route::view('/', 'internal.index')->name('index');
    Route::view('/create', 'internal.create')->name('create');
});

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
