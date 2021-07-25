<?php

namespace App\Http\Repositories;
use App\Models\Author;

class AuthorRepositories
{
    protected $model;
    public function __construct(Author $author)
    {
        $this->model = $author;
    }

    public function getRepAthor()
    {
        return $this->model->with('books')->get();
    }
}