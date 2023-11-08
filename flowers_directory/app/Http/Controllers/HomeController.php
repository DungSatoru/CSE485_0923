<?php

namespace App\Http\Controllers;

use App\Models\Flower;
use App\Models\Region;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $flowerCount = Flower::count();
        $RegionCount = Region::count();
        return view("home", compact("flowerCount","RegionCount"));
    }
}
