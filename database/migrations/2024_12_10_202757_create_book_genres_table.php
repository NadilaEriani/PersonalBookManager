<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('book_genres', function (Blueprint $table) {
            $table->id('book_genre_id'); // Primary key
            $table->unsignedBigInteger('book_id'); // Foreign key ke tabel books
            $table->unsignedBigInteger('genre_id'); // Foreign key ke tabel genres
            $table->timestamps(); // Kolom created_at dan updated_at

            // Tambahkan foreign key constraint
            $table->foreign('book_id')->references('book_id')->on('books')->onDelete('cascade');
            $table->foreign('genre_id')->references('genre_id')->on('genres')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_genres');
    }
};
