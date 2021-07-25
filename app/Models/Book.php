<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Like;
class Book extends Model
{
    protected $table = 'book';

    protected $fillable = [
        'name', 'author_id'
    ];
    public function likes()
    {
        return $this->morphMany(Like::class,'likeable', 'type', 'type_id');
    }
}
