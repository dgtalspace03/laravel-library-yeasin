<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
 public function books()
{
    return view('admin.books');
}

public function createBook()
{
    return view('admin.books-create');
}

public function storeBook(Request $request)
{
    // validate + save later
    return redirect()->route('admin.books');
}
public function loans() { return view('admin.loan'); }
public function users() { return view('admin.user'); }
}
