<?php

use App\Livewire\Users\CreateUser;
use App\Livewire\Users\EditUser;
use App\Livewire\Users\UserList;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::get('users', UserList::class)->name('users');
    Route::get('users/create', CreateUser::class)->name('users.create');
    Route::get('users/{id}/edit', EditUser::class)->name('users.edit');
});

require __DIR__ . '/settings.php';
