<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Http\Service\BookService;
use Illuminate\Http\Request;
use App\Http\Resources\BookResource;

class BookController
{
    protected $service;
    public function __construct(BookService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        return $this->service->getBook($request);
    }
    public function store(BookRequest $request)
    {
        $data = $request->validated();
        return new BookResource($this->service->createBook($data));
    }
    public function show(int $id):BookResource
    {
        return new BookResource($this->service->showBook($id));
    }
    public function edit()
    {
        
    }
    public function update(BookRequest $request)
    {
        $data = $request->validated();
        return new BookResource($this->service->updateBook($data));
    }
    public function desroy()
    {
        // $this->service->delete($id);   
    }
}