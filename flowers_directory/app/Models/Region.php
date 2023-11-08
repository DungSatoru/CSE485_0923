<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Flower;

class Region extends Model
{
    use HasFactory;
    public function flower(){
        return $this->belongsTo(Flower::class, 'flower_id');
    }
}
