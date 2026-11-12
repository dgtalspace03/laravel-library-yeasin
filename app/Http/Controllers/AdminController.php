<?php

namespace App\Http\Controllers;

use App\Models\books;
use App\Models\Borrow;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function books(Request $request)
    {   $search=$request->query('search');
        $category= $request->query('category');
        $stock=$request->query('stock');
        $books = books::query()
        ->when($search,fn($q) => $q->where(fn($sub) => $sub
        ->where('title','like',"%$search%")
        ->orWhere('author_name','like',"%$search%")
        ->orWhere('category','like',"%$search%")))
        ->when($category && $category!='All',fn($q) => $q->where('category',$category))
        ->when($stock=='In Stocks',fn($q) => $q->where('available_copies' ,'>', 0))
        ->when($stock=='Out Of Stocks',fn($q) => $q->where('available_copies' , 0))
        ->get();
        return view('admin.books', compact('books','search','category','stock'));
    }

    public function createBook()
    {

        return view('admin.books-create');
    }
    public function editBookRender($id)
    {
        $book = books::findOrFail($id);

        return view('admin.books-edit', compact('book'));
    }
    public function editBook(Request $request, $id)
    {
        $book = books::findOrFail($id);
        $request->validate([
            'title' => 'required|string|min:3|max:50',
            'author' => 'required|string|min:3|max:50',
            'category' => 'required|string|min:3|max:50',
            'quantity' => 'numeric|required|min:0|max:1000',
            'thumbnail' => 'image|max:5060'
        ]);
        $title = $request->input('title');
        $author_name = $request->input('author');
        $category = $request->input('category');
        $available_copies = $request->input('quantity');
        $path = $book->thumbnail;
        if ($request->hasFile('thumbnail')) {
            Storage::disk('public')->delete($book->thumbnail);
            $thumbnail = $request->file('thumbnail');

            $path = $thumbnail->store('thumblain', 'public');
        }
        $book_change = $available_copies - $book->available_copies;

        books::where('id', $id)->update([
            'title' => $title,
            'author_name' => $author_name,
            'available_copies' => $available_copies,
            'total_copies' => $book->total_copies + $book_change,
            'category' => $category,
            'thumbnail' => $path
        ]);

        return redirect(route('admin.books'));
    }

    public function storeBook(Request $request)
    {
        $request->validate([
            'title' => 'required|string|min:3|max:50',
            'author' => 'required|string|min:3|max:50',
            'category' => 'required|string|min:3|max:50',
            'quantity' => 'numeric|required|min:1|max:1000',
            'thumbnail' => 'image|required|max:5060'
        ]);
        $title = $request->input('title');
        $author_name = $request->input('author');
        $category = $request->input('category');
        $total_copies = $request->input('quantity');
        $thumbnail = $request->file('thumbnail');

        $path = $thumbnail->store('thumblain', 'public');

        books::create([
            'title' => $title,
            'author_name' => $author_name,
            'available_copies' => $total_copies,
            'total_copies' => $total_copies,
            'category' => $category,
            'thumbnail' => $path
        ]);


        return redirect()->route('admin.books');
    }
    public function borrows(Request $request)
    {
        $filter=$request->query('filter');
        $borrow_books=Borrow::query()
        
        ->when($filter=='Not Returned',fn($q) => $q->where('returned_at',null))
        ->when($filter=='On Time',fn($q) => $q->whereColumn('returned_at','<=','due_at'))
        ->when($filter=='Due',fn($q) => $q->whereColumn('returned_at','>','due_at'))
        ->get();
        return view('admin.borrows',compact('borrow_books','filter'));
    }
    public function users(Request $request)
    {
        $search=$request->query('search');
        $role=$request->query('role');
        $status=$request->query('status');

        $users = User::query()
        ->when($search,fn($q) => $q->where(fn($sub) => $sub
        ->where('name','like',"%$search%"))
        ->orWhere('email','like',"%$search%"))
        ->when($role && $role!='all',fn($q) => $q->where('role',$role))
        ->when($status && $status!='all',fn($q) => $q->where('status',$status))
        ->get();
        return view('admin.user', compact('users','search','role','status'));
    }
    public function editRole(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'role' => 'string|required|min:4|max:5',
            'status' => 'string|required|min:6|max:9',
        ]);
        $role = $request->input('role');
        $status = $request->input('status');

        $user->role = $role;
        $user->status = $status;
        $user->save();
        return redirect()->route('admin.users')->with('success', 'Account Status Updated Successfully');
    }
}
