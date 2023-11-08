<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $authorsCount = Author::count();
        $booksCount = Book::count();
        return view('index', compact('authorsCount', 'booksCount'));
    }
}
