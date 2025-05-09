<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookBrowseController;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Book browsing routes (accessible to all authenticated users)
    Route::get('/browse', [BookBrowseController::class, 'index'])->name('books.browse');

    // Book management routes (admin and petugas only)
    Route::middleware([IsAdmin::class])->group(function () {
        Route::resource('books', BookController::class);
        Route::resource('categories', CategoryController::class);
    });

    // Loan routes
    Route::resource('loans', LoanController::class);
    Route::post('/loans/{loan}/approve', [LoanController::class, 'approve'])->name('loans.approve');
    Route::post('/loans/{loan}/return', [LoanController::class, 'return'])->name('loans.return');
    Route::post('/loans/{loan}/cancel', [LoanController::class, 'cancel'])->name('loans.cancel');

    // User routes (admin only)
    Route::middleware([IsAdmin::class])->group(function () {
        Route::resource('users', UserController::class);
    });

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
