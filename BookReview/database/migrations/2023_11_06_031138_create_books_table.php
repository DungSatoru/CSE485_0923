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
        Schema::create('books', function (Blueprint $table) {
            $table->unsignedBigInteger('BookID', true);
            $table->string('Title');
            $table->string('Author');
            $table->enum('Genre', ['Detective', 'Romance', 'Comedy', 'Science']);
            $table->date('PublicationYear');
            $table->string('ISBN', 20);
            $table->string('CoverImageUrl');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
