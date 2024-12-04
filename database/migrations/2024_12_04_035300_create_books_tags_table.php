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
        Schema::create('books_tags', function (Blueprint $table) {
            $table->id('book_tag_id'); // Id unik untuk book_tag (primary key)
            $table->unsignedBigInteger('book_id'); // Referensi ke tabel books (foreign key)
            $table->unsignedBigInteger('tag_id'); // Referensi ke tabel tags (foreign key)
            $table->timestamps(); // Kolom create_at dan update_at untuk mencatat kapan hubungan dibuat atau diubah

            // Menambahkan foreign key untuk book_id
            $table->foreign('book_id')->references('book_id')->on('books')->onDelete('cascade');

            // Menambahkan foreign key untuk tag_id
            $table->foreign('tag_id')->references('tag_id')->on('tags')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books_tags');
    }
};
