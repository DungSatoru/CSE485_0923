<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('flowers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->string('image_url');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flowers');
    }
};
// (id: Khóa chính, tự động tăng; name: Tên loài hoa; description: Mô
// tả về loài hoa; image_url: Đường dẫn ảnh loài hoa; created_at: Thời gian tạo;
// updated_at: Thời gian cập nhật gần nhất)
