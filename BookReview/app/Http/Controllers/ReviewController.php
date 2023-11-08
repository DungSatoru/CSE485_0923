<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index(string $id)
    {
        $reviews = Review::where('BookID', '=', $id)->get();;
        return view('reviews.index', compact('reviews'));
    }
}
