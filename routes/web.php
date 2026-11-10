<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::redirect('/', '/admin/books')->name('index');

        Route::get('books', [AdminController::class, 'books'])->name('books');
        Route::get('books/create', [AdminController::class, 'createBook'])->name('books.create');
        Route::get('books/edit/{id}', [AdminController::class, 'editBookRender'])->name('books.edit');
        Route::post('books/edit/{id}', [AdminController::class, 'editBook'])->name('books.editreq');
        Route::post('books', [AdminController::class, 'storeBook'])->name('books.store');

        Route::get('loans', [AdminController::class, 'loans'])->name('loans');
        Route::get('users', [AdminController::class, 'users'])->name('users');
        Route::post('user/edit-role/{id}',[AdminController::class,'editRole'])->name('edit-role');
    });

Route::post('/borrow-book/{id}',[BorrowController::class,'borrow'])->middleware(['auth'])->name('borrow-book');
Route::get('/profile',[ProfileController::class,'index']);

