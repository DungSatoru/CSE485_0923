<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Review extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function book()
    {
        return $this->belongsTo(Book::class, 'BookID');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'UserID');
    }
    public function getDayAttribute()
    {
        return Carbon::parse($this->ReviewDate)->diffForHumans();
    }
}
