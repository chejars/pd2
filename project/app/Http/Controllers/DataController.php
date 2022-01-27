<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Book;

class DataController extends Controller
{
    // Metode atgriež 3 publicētus Book ierakstus nejaušā secībā
    public function getTopBooks()
    {
        $books = Book::where('display', true)
        ->inRandomOrder()
        ->take(3)
        ->get();
        return $books;
    }
    // Metode atgriež izvēlēto Book ierakstu, ja tas ir publicēts
    public function getBook(Book $book)
    {
        $selectedBook = Book::where([
            'id' => $book->id,
            'display' => true,
        ])
        ->firstOrFail();
        return $selectedBook;
    }

    // Metode atgriež 3 publicētus Book ierakstus nejaušā secībā,
    // izņemot izvēlēto Book ierakstu
    public function getRelatedBooks(Book $book)
    {
        $books = Book::where('display', true)
        ->where('id', '<>', $book->id)
        ->inRandomOrder()
        ->take(3)
        ->get();
        return $books;
    }
}
