<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::redirect('/', '/admin/books')->name('index');

        Route::get('books', [AdminController::class, 'books'])->name('books');
        Route::get('books/create', [AdminController::class, 'createBook'])->name('books.create');
        Route::post('books', [AdminController::class, 'storeBook'])->name('books.store');

        Route::get('loans', [AdminController::class, 'loans'])->name('loans');
        Route::get('users', [AdminController::class, 'users'])->name('users');
    });

Route::get('/admin/user', function () {});
