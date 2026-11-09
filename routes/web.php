<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin',[AdminController::class,'index'])->middleware(['auth','admin']);
Route::post('/admin/add-book',[AdminController::class,'addBook'])->middleware(['auth','admin'])->name('addBook');
