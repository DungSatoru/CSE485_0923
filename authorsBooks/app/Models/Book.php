<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Author;
use Illuminate\Support\Facades\DB;

class Book extends Model
{
    use HasFactory;
    protected $enumTypes = ['Tâm lý', 'Ngôn tình', 'Tiểu thuyết', 'Giáo dục'];

    public function getAuthorNameAttribute()
    {
        $name = DB::table('authors')
            ->select('authors.name')
            ->join('books', 'authors.id', '=', 'books.author_id')
            ->where('author_id', '=', $this->author_id)
            ->value('authors.name');
        return $name;
    }

    public function getEnumTypes()
    {
        return $this->enumTypes;
    }

    public function author()
    {
        return $this->hasOne(Author::class);
    }
}
