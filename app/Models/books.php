<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
   public function borrows():HasMany{
      return $this->hasMany(Borrow::class);
   }
}
