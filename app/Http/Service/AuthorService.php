<?php

namespace App\Http\Service;
use App\Models\Author;
use Illuminate\Database\Eloquent\Model;
use App\Http\Repositories\AuthorRepositories;
class AuthorService
{
    protected $model;
    protected $rep;
    public function __construct(Author $author, AuthorRepositories $authorRepositories)
    {
        $this->rep = $authorRepositories;
        $this->model = $author;
    }

    public function createAuthor($data):Model
    {
        $author = new Author();
        $author->fill($data);
        $author->save();
        return $author;
    }

    public function showAuthor(int $id):Model
    {
        return $this->findAuthor($id);
    }

    public function updateAuthor($data):Model
    {
        $author = $this->findAuthor($data['id']);
        $author->fill($data);
        $author->save();
        return $author;
    }

    public function getAthor()
    {
        // return $this->rep->getRepAthor();
        return $this->model->with(['books','like'])->get();
    }

    private function findAuthor(int $id):Model
    {
        return $this->model->find($id);
    }

    public function delete(int $id)
    {
        $this->model->find($id)->delete();
    }
}