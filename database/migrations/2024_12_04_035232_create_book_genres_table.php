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
        Schema::create('book_genres', function (Blueprint $table) {
            $table->id('book_genre_id'); // Id unik untuk book_genre (primary key)
            $table->unsignedBigInteger('book_id'); // Referensi ke tabel books (foreign key)
            $table->unsignedBigInteger('genre_id'); // Referensi ke tabel genres (foreign key)
            $table->timestamps(); // Kolom create_at dan update_at untuk mencatat kapan hubungan dibuat atau diubah

            // Menambahkan foreign key untuk book_id
            $table->foreign('book_id')->references('book_id')->on('books')->onDelete('cascade');

            // Menambahkan foreign key untuk genre_id
            $table->foreign('genre_id')->references('genre_id')->on('genres')->onDelete('cascade');        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_genres');
    }
};
