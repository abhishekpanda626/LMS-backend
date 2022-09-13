<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class books_users extends Model
{
    public $timestamps=false;
    use HasFactory;
    protected $fillable = [
        'book_id',
        'user_id'
    ];
    
    public function user()
   {
       return $this->hasMany(User::class);
   }
   public function book()
   {
       return $this->hasMany(Book::class);
   }
}
