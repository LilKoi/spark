<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;

class SearchController
{
    protected $book;
    protected $author;
    public function __construct(Book $book, Author $author)
    {
        $this->book = $book;
        $this->author = $author;
    }

    public function search(Request $request)
    {
        $find = array('book','author');
        $find['book'] = $this->book->where('name','like', '%'.$request->search.'%')->get();
        $find['author'] = $this->author->where('name','like', '%'.$request->search.'%')->get();
        return $find;
    }
}