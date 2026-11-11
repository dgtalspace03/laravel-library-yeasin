<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
   public function index(){
   /** @var \App\Models\User $user */
    $user=Auth::user();
    $active_borrow=$user->borrows()->where('returned_at',null)->get();
    $returned_book = $user->borrows()->whereNotNull('returned_at')->get();
  
    return view('profile',compact('user','active_borrow','returned_book'));
   }
}
