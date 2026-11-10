<?php

namespace App\Http\Controllers;

use App\Models\books;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
 public function books()
{
     $books= books::all();
    return view('admin.books',compact('books'));
}

public function createBook()
{

    return view('admin.books-create');
}
public function editBookRender($id)
{
    $book=books::findOrFail($id);

    return view('admin.books-edit',compact('book'));
}
public function editBook(Request $request,$id)
{
    $book=books::findOrFail($id);
    $request->validate([
        'title'=>'required|string|min:3|max:50',
        'author'=>'required|string|min:3|max:50',
        'category'=>'required|string|min:3|max:50',
        'quantity'=>'numeric|required|min:1|max:1000',
        'thumbnail'=>'image|max:5060'
    ]);
    $title=$request->input('title');
    $author_name=$request->input('author');
    $category=$request->input('category');
    $available_copies=$request->input('quantity');
    $path=$book->thumbnail;
    if($request->hasFile('thumbnail')){
    Storage::disk('public')->delete($book->thumbnail);
     $thumbnail=$request->file('thumbnail');
    
    $path=$thumbnail->store('thumblain','public');
    }
    $book_change=$available_copies-$book->available_copies;
    
    books::where('id',$id)->update([
    'title'=>$title,
    'author_name'=>$author_name,
    'available_copies'=>$available_copies,
    'total_copies'=>$book->total_copies+$book_change,
    'category'=>$category,
    'thumbnail'=>$path
    ]);

    return redirect(route('admin.books'));
}

public function storeBook(Request $request)
{
    $request->validate([
        'title'=>'required|string|min:3|max:50',
        'author'=>'required|string|min:3|max:50',
        'category'=>'required|string|min:3|max:50',
        'quantity'=>'numeric|required|min:1|max:1000',
        'thumbnail'=>'image|required|max:5060'
    ]);
    $title=$request->input('title');
    $author_name=$request->input('author');
    $category=$request->input('category');
    $total_copies=$request->input('quantity');
    $thumbnail=$request->file('thumbnail');

    $path=$thumbnail->store('thumblain','public');

    books::create([
    'title'=>$title,
    'author_name'=>$author_name,
    'available_copies'=>$total_copies,
    'total_copies'=>$total_copies,
    'category'=>$category,
    'thumbnail'=>$path
    ]);
    

    return redirect()->route('admin.books');
}
public function loans() { return view('admin.loan'); }
public function users() { 

    $users=User::all();
    return view('admin.user',compact('users')); 
 }
 public function editRole(Request $request,$id){
    $user=User::findOrFail($id);
    $request->validate([
        'role'=>'string|required|min:4|max:5',
        'status'=>'string|required|min:6|max:9',
    ]);
    $role= $request->input('role');
    $status= $request->input('status');
    
    $user->role=$role;
    $user->status=$status;
    $user->save();
     return redirect()->route('admin.users')->with('success', 'Account Status Updated Successfully');
 }
}
