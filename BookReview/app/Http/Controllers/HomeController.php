<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Review;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $booksCount = Book::count();
        $reviewsCount = Review::count();
        return view('index', compact('booksCount', 'reviewsCount'));
    }
}
