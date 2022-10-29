<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book_like extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'book_id',
        'like'
    ];

   /**
    * Get the user that owns the Book_like
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
   public function user(): BelongsTo
   {
       return $this->belongsTo(User::class, 'user_id');
   }
   /**
    * Get the book that owns the Book_like
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
   public function book(): BelongsTo
   {
       return $this->belongsTo(Book::class, 'book_id');
   }
}
