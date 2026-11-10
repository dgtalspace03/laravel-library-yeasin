<?php

namespace App\Http\Controllers;

use App\Models\books;
use App\Models\Borrow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $books=books::all();
        $borrowedIds=null;
        if(Auth::check()){
            $borrowedIds = Borrow::where('user_id', Auth::id())
            ->whereNull('returned_at')
            ->pluck('book_id');
        }
       
        return view('index',compact('books','borrowedIds'));
    }
}
