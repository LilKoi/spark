<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthorRequest;
use App\Http\Service\AuthorService;
use Illuminate\Http\Request;
use App\Http\Resources\AuthorResource;

class AuthorController
{
    protected $service;
    public function __construct(AuthorService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return $this->service->getAthor();
    }
    public function store(AuthorRequest $request)
    {
        $data = $request->validated();
        return new AuthorResource($this->service->createAuthor($data));
    }
    public function show(int $id):AuthorResource
    {
        return new AuthorResource($this->service->showAuthor($id));
    }
    public function edit()
    {
        
    }
    public function update(AuthorRequest $request)
    {
        $data = $request->validated();
        return new AuthorResource($this->service->updateAuthor($data));
    }
    public function destroy($id):void
    {
        $this->service->delete($id);
    }
}