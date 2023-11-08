<?php

namespace App\Models;

use App\Models\Region;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Flower extends Model
{
    use HasFactory;

    public function getNameFlowerAttribute() {
        return $this->flower->name;
    }
    public function getAllRegionAttribute() {
        $region = DB::table('regions')
        ->select('region_name')
        ->join('flowers', 'flower_id', '=', 'flowers.id')
        ->where('flowers.id','=', $this->id)
        ->get();
        return $region;
    }
    public function regions(){
        return $this->hasMany(Region::class);
    }
}
