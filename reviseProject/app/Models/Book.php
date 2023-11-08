<?php

namespace App\Models;

use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Book extends Model
{
    protected $guarded = ['created_at', 'updated_at'];
    protected $enumTypes = ['Trinh Thám', 'Ngôn Tình', 'Phiêu Lưu'];

    use HasFactory;
    public function author()
    {
        return $this->hasOne(Author::class);
    }
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
    public function getPublishDateAttribute()
    { {
            return date('d/m/Y', strtotime($this->published_date));
        }
    }
}
