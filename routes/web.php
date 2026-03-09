<?php

use App\Livewire\Users\UserManagement;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::get('users', UserManagement::class)->name('users.render');
});

require __DIR__ . '/settings.php';
