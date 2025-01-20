<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\DeviceManagementController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MovieController;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

    
Route::get('/movies/{movie}', [MovieController::class, 'show'])->name('movies.show');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile/devices', [DeviceManagementController::class, 'index'])->name('profile.devices');
    Route::get('/profile/devices/list', [DeviceManagementController::class, 'listDevices'])->name('profile.devices.list');
    Route::post('/profile/devices/track', [DeviceManagementController::class, 'trackNewDevice'])->name('profile.devices.track');
    Route::delete('/profile/devices/{id}', [DeviceManagementController::class, 'signOutDevice'])->name('profile.devices.signout');
    Route::post('/profile/devices/signout-all', [DeviceManagementController::class, 'signOutAllDevices'])->name('profile.devices.signout.all');
});

require __DIR__.'/auth.php';
