<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
        {
            return view('public', ['title' => 's9_eisaks_a']);
        }
}
