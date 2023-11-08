<?php

namespace App\Http\Controllers;
use App\Models\Artwork;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request){
        $womenCount = Artwork::count();
        return view('Home', compact('womenCount'));
    }
}
