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
    public function index(Request $request)
    {
        $search = $request->query('search');
        $search_category = $request->query('category') ?? 'All';
       
            $books = books::query()
            ->when($search_category && $search_category !== 'All',fn($q) => $q->where('category',$search_category))
            ->when($search,fn($q) => $q->where(fn($sub) => $sub
            ->where('title','like',"%$search%")
            ->orWhere('author_name','like',"%$search%")
            ))
            ->get();
      
        $borrowedIds = null;
        if (Auth::check()) {
            $borrowedIds = Borrow::where('user_id', Auth::id())
                ->whereNull('returned_at')
                ->pluck('book_id');
        }

        return view('index', compact('books', 'borrowedIds', 'search', 'search_category'));
    }
}
