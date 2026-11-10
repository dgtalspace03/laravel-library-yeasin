<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class books extends Model
{
   protected $fillable = [
    'title',
    'author_name',
    'category',
    'thumbnail',
    'total_copies',
    'available_copies'
   ];
}
