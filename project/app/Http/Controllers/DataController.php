<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Book;
use App\Models\Game;

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

    public function getTopGames()
    {
        $game = Game::where('display', true)
        ->inRandomOrder()
        ->take(3)
        ->get();
        return $game;
    }
    // Metode atgriež izvēlēto Game ierakstu, ja tas ir publicēts
    public function getGame(Game $game)
    {
        $selectedGame = Game::where([
            'id' => $game->id,
            'display' => true,
        ])
        ->firstOrFail();
        return $selectedGame;
    }

    // Metode atgriež 3 publicētus Game ierakstus nejaušā secībā,
    // izņemot izvēlēto Game ierakstu
    public function getRelatedGames(Game $game)
    {
        $games = Game::where('display', true)
        ->where('id', '<>', $game->id)
        ->inRandomOrder()
        ->take(3)
        ->get();
        return $games;
    }
}
