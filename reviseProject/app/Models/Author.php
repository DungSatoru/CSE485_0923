<?php

namespace App\Models;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    /* Liệt kê từng trường 1 để validated. */
    // protected $fillable = ['name', 'email', 'birthdate', 'gender'];

    protected $guarded = ['created_at', 'updated_at'];
    /* Tức là bỏ qua 2 trường này và chấp nhận tất cả trường còn lại. */

    // protected $timestamps = false;
    use HasFactory;
    /* Tạo một hàm: get[Tên]Attribute thì trong file index sẽ gọi ra bằng cách: $model->[tên]*/
    public function getAgeAttribute()
    {
        return date_diff(date_create(($this->birthdate)), date_create('now'))->y;
        /* Lấy thời gian hiện tại trừ đi thời gian trong database  */
        /* date_diff: Là để trừ dữ liệu kiểu DateTime() hoặc Date() */
        /* date_create: Là hàm ép kiểu biến trở thành kiểu DateTime() trong PHP. 
        Nếu không có tham số gì thì nó sẽ trả về thời gian hiện tại */
    }
    public function getGenderNameAttribute()
    {
        /* 0 là Nữ, 1 là Nam */
        return $this->gender == '0' ? 'Female' : 'Male';
    }
    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
