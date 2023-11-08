<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Book extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = ['created_at', 'updated_at'];
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function getYearAttribute()
    {
        return Carbon::parse($this->PublicationYear)->format('Y');
    }
    public static function getGenres()
    {
        return ['Detective', 'Romance', 'Comedy', 'Science'];
    }
}
