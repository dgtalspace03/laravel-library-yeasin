<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Mcp\Request;

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->middleware('suspend')->name('home');
Route::get('/home',function ( ){
    return redirect()->route('home');
});
Route::middleware(['auth', 'admin','suspend'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::redirect('/', '/admin/books')->name('index');

        Route::get('books', [AdminController::class, 'books'])->name('books');
        Route::get('books/create', [AdminController::class, 'createBook'])->name('books.create');
        Route::get('books/edit/{id}', [AdminController::class, 'editBookRender'])->name('books.edit');
        Route::post('books/edit/{id}', [AdminController::class, 'editBook'])->name('books.editreq');
        Route::post('books', [AdminController::class, 'storeBook'])->name('books.store');

        Route::get('borrows', [AdminController::class, 'borrows'])->name('borrows');
        Route::get('users', [AdminController::class, 'users'])->name('users');
        Route::post('user/edit-role/{id}',[AdminController::class,'editRole'])->name('edit-role');
    });

Route::post('/borrow-book/{id}',[BorrowController::class,'borrow'])->middleware(['auth','suspend'])->name('borrow-book');
Route::post('/return-book/{id}',[BorrowController::class,'return_book'])->middleware(['auth','suspend'])->name('return-book');
Route::get('/profile',[ProfileController::class,'index'])->name('profile');

Route::get('/suspend',function (Request $request){
    if(Auth::user()->status=='active'){
        return redirect(route('home'));
    }
    return view('suspend');
})->name('suspend');

