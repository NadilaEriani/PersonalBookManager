<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware\Authenticate;
// Default Routes
// Redirect root URL to login
Route::get('/', function () {
    return redirect('/login');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();
Route::get('logout', function () {
    Auth::logout();
    return redirect('login');
});

// User Routes
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::resource('books', BookController::class);
    Route::patch('/books/{book}/update-status', [BookController::class, 'updateStatus'])->name('books.updateStatus');
    Route::patch('/books/{book}/update-date', [BookController::class, 'updateDate'])->name('books.updateDate');

    // User-specific routes
    Route::get('/profile', [UserController::class, 'showProfile'])->name('users.profile');
    Route::resource('users', UserController::class); // Pastikan resource di bawah
});
