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
        Schema::create('regions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('flower_id');
            $table->foreign('flower_id')->references('id')->on('flowers');
            $table->string('region_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('regions');
    }
};
// Bảng regions: (id: Khóa chính, tự động tăng; flower_id: Khóa ngoại liên kết với
// bảng flowers; region_name: Tên khu vực phân bố; created_at: Thời gian tạo;
// updated_at: Thời gian cập nhật gần nhất)

