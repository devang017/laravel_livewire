<?php

use App\Livewire\Permissions\CreatePermission;
use App\Livewire\Permissions\EditPermission;
use App\Livewire\Permissions\PermissionList;
use App\Livewire\Roles\CreateRole;
use App\Livewire\Roles\EditRole;
use App\Livewire\Roles\RoleList;
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

    Route::get('roles', RoleList::class)->name('roles');
    Route::get('roles/create', CreateRole::class)->name('roles.create');
    Route::get('roles/{id}/edit', EditRole::class)->name('roles.edit');

    Route::get('permissions', PermissionList::class)->name('permissions');
    Route::get('permissions/create', CreatePermission::class)->name('permissions.create');
    Route::get('permissions/{id}/edit', EditPermission::class)->name('permissions.edit');
});

require __DIR__ . '/settings.php';
