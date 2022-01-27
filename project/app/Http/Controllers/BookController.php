<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Book;
use App\Http\Requests\BookRequest;

class BookController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function list()
    {
        $items = Book::orderBy('name', 'asc')->get();
        return view(
            'book.list',
            [
                'title' => 'Grāmatas',
                'items' => $items
            ]
        );
    }

    public function create()
    {
        $authors = Author::orderBy('name', 'asc')->get();
        return view(
            'book.form',
            [
                'title' => 'Pievienot grāmatu',
                'book' => new Book(),
                'authors' => $authors,
            ]
        );
    }

    private function saveBookData(Book $book, BookRequest $request)
    {
        $validatedData = $request->validated();
        $book->fill($validatedData);
        $book->display = (bool) ($validatedData['display'] ?? false);
        
        if ($request->hasFile('image')) {
            $uploadedFile = $request->file('image');
            $extension = $uploadedFile->clientExtension();
            $name = uniqid();
            $book->image = $uploadedFile->storePubliclyAs(
                '/',
                $name . '.' . $extension,
                'uploads'
            );
        }

        $book->save();
    }
    public function put(BookRequest $request)
    {
        $book = new Book();
        $this->saveBookData($book, $request);
        return redirect('/books');
    }

    public function patch(Book $book, BookRequest $request)
    {
        $this->saveBookData($book, $request);
        return redirect('/books/update/' . $book->id);
    }

    public function update(Book $book)
    {
        $authors = Author::orderBy('name', 'asc')->get();
            return view(
            'book.form',
            [
                'title' => 'Rediģēt grāmatu',
                'book' => $book,
                'authors' => $authors,
            ]
        );
    }

    public function delete(Book $book)
    {
        $book->delete();
        return redirect('/books');
    }

    public function messages()
    {
        return [
            'required' => 'Lauks ":attribute" ir obligāts',
            'min' => 'Laukam ":attribute" jābūt vismaz :min simbolus garam',
            'max' => 'Lauks ":attribute" nedrīkst būt garāks par :max simboliem',
            'boolean' => 'Lauka ":attribute" vērtībai jābūt "true" vai "false"',
            'unique' => 'Šāda lauka ":attribute" vērtība jau ir reģistrēta',
            'numeric' => 'Lauka ":attribute" vērtībai jābūt skaitlim',
            'image' => 'Laukā ":attribute" jāpievieno korekts attēla fails',
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'nosaukums',
            'author_id' => 'autors',
            'description' => 'apraksts',
            'price' => 'cena',
            'year' => 'gads',
            'image' => 'attēls',
            'display' => 'publicēt',
        ];
    }
}
