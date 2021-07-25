<?php

namespace App\Http\Controllers;
use App\Models\Like;
use Illuminate\Http\Request;

class LikeController
{
    protected $like;
    public function __construct(Like $like)
    {
        $this->like = $like;
    }

    public function like(Request $request)
    {
        $like = new Like();
        $like->type = $request->type;
        $like->type_id = $request->type_id;
        $like->save();
    }
}