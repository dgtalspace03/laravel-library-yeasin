<?php

namespace App\Http\Controllers;

use App\Models\books;
use App\Models\Borrow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class BorrowController extends Controller
{
    public function borrow($id){
       $book=books::findOrFail($id);
       if($book->available_copies==0){
        return redirect()->route('home')->with('error', 'No copies available.');
       }
       $userId=Auth::id();
       $chk=Borrow::where([
        'user_id'=>$userId,
        'book_id'=>$book->id
       ])->first();
        if($chk){
            return redirect()->route('home')->with('error', 'Book Already borrowed');
        }
        Borrow::create([
        'user_id'=>$userId,
        'book_id'=>$book->id
        ]);
        $book->available_copies-=1;
       
        $book->save();
        return redirect()->route('home')->with('success', 'Book borrowed successfully.');
    }
}
