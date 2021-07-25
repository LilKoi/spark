<?php

namespace App\Models;

Use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table = 'like';
    protected $fillable = [
        'type','type_id'
    ];
    public function likeable()
    {
        return $this->morphTo();
    }
}