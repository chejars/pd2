<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\AuthorizationController;
use App\Http\Controllers\DataController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Author routes
Route::get('/', [HomeController::class, 'index']);
Route::get('/authors', [AuthorController::class, 'list']);
Route::get('/authors/create', [AuthorController::class, 'create']);
Route::post('/authors/put', [AuthorController::class, 'put']);
Route::get('/authors/update/{author}', [AuthorController::class, 'update']);
Route::post('/authors/patch/{author}', [AuthorController::class, 'patch']);
Route::post('/authors/delete/{author}', [AuthorController::class, 'delete']);

// Book routes
Route::get('/books', [GameController::class, 'list']);
Route::get('/books/create', [GameController::class, 'create']);
Route::post('/books/put', [GameController::class, 'put']);
Route::get('/books/update/{book}', [GameController::class, 'update']);
Route::post('/books/patch/{book}', [GameController::class, 'patch']);
Route::post('/books/delete/{book}', [GameController::class, 'delete']);

// Game routes
Route::get('/games', [GameController::class, 'list']);
Route::get('/games/create', [GameController::class, 'create']);
Route::post('/games/put', [GameController::class, 'put']);
Route::get('/games/update/{game}', [GameController::class, 'update']);
Route::post('/games/patch/{game}', [GameController::class, 'patch']);
Route::post('/games/delete/{game}', [GameController::class, 'delete']);

// Auth routes
Route::get('/login', [AuthorizationController::class, 'login'])->name('login');
Route::post('/auth', [AuthorizationController::class, 'authenticate']);
Route::get('/logout', [AuthorizationController::class, 'logout']);

// Data routes
Route::prefix('data')->group(function () {
    Route::get('/get-top-books', [DataController::class, 'getTopBooks']);
    Route::get('/get-book/{book}', [DataController::class, 'getBook']);
    Route::get('/get-related-
    books/{book}', [DataController::class, 'getRelatedBooks']);
    });