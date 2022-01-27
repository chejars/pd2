<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Http\Requests\AuthorRequest;

class AuthorController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    private function saveAuthorData(Author $author, AuthorRequest $request)
    {
        $validatedData = $request->validated();
        $author->fill($validatedData);
        $author->save();
    }

    public function put(AuthorRequest $request)
    {
        $author = new Author();
        $this->saveAuthorData($author, $request);
        return redirect('/authors');
    }
    public function patch(Author $author, AuthorRequest $request)
    {
        $this->saveAuthorData($author, $request);
        return redirect('/authors');
    }

        // display all authors
    public function list()
    {
        $items = Author::orderBy('name', 'asc')->get();
        return view(
            'author.list',
            [
                'title' => 'Autori',
                'items' => $items
            ]
        );
    }

    public function create()
    {
        return view(
            'author.form',
            [
                'title' => 'Pievienot autoru',
                'author' => new Author()
            ]
        );
    }

    public function update(Author $author)
    {
        return view(
            'author.form',
            [
                'title' => 'Rediģēt autoru',
                'author' => $author
            ]
        );
    }

    public function delete(Author $author)
    {
        $author->delete();
        return redirect('/authors');
    }
}
