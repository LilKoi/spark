<?php

namespace App\Http\Service;

use App\Models\Book;
use Illuminate\Database\Eloquent\Model;
use App\Http\Repositories\BookRepositories;

class BookService
{
    protected $model;
    protected $rep;
    public function __construct(Book $book, BookRepositories $bookRepositories)
    {
        $this->rep = $bookRepositories;
        $this->model = $book;
    }

    public function createBook($data): Model
    {
        $book = new Book();
        $book->fill($data);
        $book->save();
        return $book;
    }

    public function showBook(int $id): Model
    {
        return $this->findBook($id);
    }

    public function updateBook($data): Model
    {
        $book = $this->findBook($data['id']);
        $book->fill($data);
        $book->save();
        return $book;
    }

    public function getBook($data)
    {
        return $this->rep->getRepBook($data);
        // return $this->model->with(['book','like'])->get();
    }

    private function findBook(int $id): Model
    {
        return $this->model->find($id);
    }

    public function delete(int $id)
    {
        $this->model->find($id)->delete();
    }
}
