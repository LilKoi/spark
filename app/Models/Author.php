<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Book;
use App\Models\Like;
class Author extends Model
{   
    protected $table = 'author';
    protected $fillable = [
        'name'
    ];

    public function books()
    {
        return $this->hasMany(Book::class, 'author_id','id');
    }
    public function like()
    {
        return $this->morphMany(Like::class, 'type', 'type_id');
    }
}
