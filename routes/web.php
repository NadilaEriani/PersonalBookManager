<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TagController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware\Authenticate;

// Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
Route::middleware('auth')->group(function () {
    Route::resource('books', BookController::class);
    Route::resource('genres', GenreController::class);
    Route::resource('tags', TagController::class);
});
// Route::middleware([Authenticate::class])->group(function () {
//     Route::resource('books', BookController::class);
//     Route::resource('genres', GenreController::class);
//     Route::resource('tags', TagController::class);
// });

Route::get('logout', function () {
    Auth::logout();
    return redirect('login');
});
