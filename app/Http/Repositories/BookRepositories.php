<?php

namespace App\Http\Repositories;
use App\Models\Book;

class BookRepositories
{
    protected $model;
    public function __construct(Book $book)
    {
        $this->model = $book;
    }

    public function getRepBook($data)
    { 
        if($data->sort){
            $book = $this->model->withCount('likes')->orderByDesc('likes_count')->get();    
        }else{
            $book = $this->model->get();
        }
        return $book;   
    }
}