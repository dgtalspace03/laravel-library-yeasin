<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Borrow extends Model
{
    protected function casts(): array
    {
        return [
            'borrowed_at' => 'datetime',
            'returned_at' => 'datetime',
            'due_at'    => 'datetime'
        ];
    }

    protected $fillable = [
        'book_id',
        'user_id',
        'returned_at',
        'due_at',


    ];
    public function book(): BelongsTo
    {
        return $this->belongsTo(books::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
