<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
 public function index(){
    return view('admin');
 }
 
 public function addBook(Request $request){
   $request->validate([
   'title'=>'string|min:3|max:100',
   'author'=>'string|min:3|max:50',
   'category'=>'string|min:3|max:20',
   'total_copies'=>'integer|min:1',
   'thumblain'=>'image|max:5060'
   ]);
   $title= $request->input('title');
   $author=$request->input('title');
   $category=$request->input('category');
   $total_copies=$request->input('total_copies');
   $file=$request->file('thumblain');
   dd($title,$author,$category,$total_copies,$file);
 }
}
