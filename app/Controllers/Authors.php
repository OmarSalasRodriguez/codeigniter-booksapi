<?php

namespace App\Controllers;

use App\Models\AuthorModel;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\BookModel;

class Authors extends BaseController
{
    private readonly AuthorModel $model;

    public function __construct()
    {
        $this->model = model(AuthorModel::class);
    }

    public function index(): string
    {
        $data['authors'] = $this->model->orderBy('id', 'desc')->findAll();

        return view('authors/list', $data);
    }

    public function show($id): string
    {
        $id = (int) $id;
        $author = $this->model->find($id);

        if (!$author) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Author not found");
        }

        $bookModel = model(BookModel::class);
        $data['author'] = $author;
        $data['books'] = $bookModel->where('author_id', $id)->findAll();

        return view('authors/authors-show', $data);
    }

    public function new(): string
    {
        return view('authors/authors-create');
    }

    public function create(): ResponseInterface
    {
        $rules = [
            'name' => 'required|min_length[3]|max_length[255]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->model->insert(['name' => $this->request->getPost('name')]);

        return redirect()->to('/authors')->with('message', 'Author created successfully');
    }

    public function edit($id): string
    {
        $id = (int) $id;
        $author = $this->model->find($id);

        if (!$author) {
            throw new PageNotFoundException("Author not found");
        }

        return view('authors/authors-edit', ['id' => $id, 'author' => $author]);
    }

    public function update($id): ResponseInterface
    {
        $id = (int) $id;
        $author = $this->model->find($id);

        if (!$author) {
            throw new PageNotFoundException("Author not found");
        }

        $rules = [
            'name' => 'required|min_length[3]|max_length[255]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->model->update($id, ['name' => $this->request->getPost('name')]);

        return redirect()->to('/authors')->with('message', 'Author updated successfully');
    }

    public function delete($id): ResponseInterface
    {
        $id = (int) $id;
        $author = $this->model->find($id);

        if (!$author) {
            throw new PageNotFoundException("Author not found");
        }

        $this->model->delete($id);

        return redirect()->to('/authors')->with('message', 'Author deleted successfully');
    }
}
