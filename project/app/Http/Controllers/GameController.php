<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Game;
use App\Http\Requests\GameRequest;

class GameController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function list()
    {
        $items = Game::orderBy('name', 'asc')->get();
        return view(
            'games.list',
            [
                'title' => 'Spēles',
                'items' => $items
            ]
        );
    }

    public function create()
    {
        $authors = Author::orderBy('name', 'asc')->get();
        return view(
            'game.form',
            [
                'title' => 'Pievienot spēli',
                'game' => new Game(),
                'authors' => $authors,
            ]
        );
    }

    private function saveGameData(Game $game, GameRequest $request)
    {
        $validatedData = $request->validated();
        $game->fill($validatedData);
        $game->display = (bool) ($validatedData['display'] ?? false);
        
        if ($request->hasFile('image')) {
            $uploadedFile = $request->file('image');
            $extension = $uploadedFile->clientExtension();
            $name = uniqid();
            $game->image = $uploadedFile->storePubliclyAs(
                '/',
                $name . '.' . $extension,
                'uploads'
            );
        }

        $game->save();
    }
    public function put(GameRequest $request)
    {
        $game = new Game();
        $this->saveGameData($game, $request);
        return redirect('/games');
    }

    public function patch(Game $game, GameRequest $request)
    {
        $this->saveGameData($game, $request);
        return redirect('/games/update/' . $game->id);
    }

    public function update(Game $game)
    {
        $authors = Author::orderBy('name', 'asc')->get();
            return view(
            'game.form',
            [
                'title' => 'Rediģēt spēli',
                'game' => $game,
                'authors' => $authors,
            ]
        );
    }

    public function delete(Game $game)
    {
        $game->delete();
        return redirect('/games');
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
            'steam_page' => 'steam_lapa',
            'image' => 'attēls',
            'display' => 'publicēt',
        ];
    }
}
