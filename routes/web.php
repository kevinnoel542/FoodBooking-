<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // User dashboard
    Route::get('/dashboard', function () {
        return view('user.dashboard');
    })->name('dashboard');

    // User booking routes
    Route::get('/bookings/create', [BookingController::class, 'create'])->name('bookings.create');
    Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
    Route::get('/my-bookings', [BookingController::class, 'myBookings'])->name('bookings.my');
});

// Admin routes with middleware
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // Foods index (list all foods)
    Route::get('foods', [FoodController::class, 'index'])->name('foods.index');

    // Show create food form
    Route::get('foods/create', [FoodController::class, 'create'])->name('foods.create');

    // Store new food
    Route::post('foods', [FoodController::class, 'store'])->name('foods.store');

    // Show edit form for food
    Route::get('foods/{food}/edit', [FoodController::class, 'edit'])->name('foods.edit');

    // Update food data
    Route::put('foods/{food}', [FoodController::class, 'update'])->name('foods.update');

    // Delete food
    Route::delete('foods/{food}', [FoodController::class, 'destroy'])->name('foods.destroy');

    // Bookings index, edit, update for admin
    Route::get('bookings', [BookingController::class, 'adminIndex'])->name('bookings.index');
    Route::get('bookings/{booking}/edit', [BookingController::class, 'adminEdit'])->name('bookings.edit');
    Route::put('bookings/{booking}', [BookingController::class, 'adminUpdate'])->name('bookings.update');
});

require __DIR__.'/auth.php';
