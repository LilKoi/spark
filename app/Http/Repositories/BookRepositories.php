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

    public function getRepBook($data = null)
    { 
        // if($data->sort){dd();}
        $book = $this->model->with('likes')->get();
        return $book;   
    }
}