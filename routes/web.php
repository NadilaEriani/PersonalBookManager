<?php

use App\Http\Controllers\BookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware\Authenticate;

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::middleware([Authenticate::class])->group(function () {
    Route::resource('books', BookController::class);
});

Route::get('logout', function () {
    Auth::logout();
    return redirect('login');
});
