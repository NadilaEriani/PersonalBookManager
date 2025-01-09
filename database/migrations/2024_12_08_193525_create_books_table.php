<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    // Tambahkan kolom 'cover_image' pada migrasi
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id('book_id');
            $table->unsignedBigInteger('user_id');
            $table->string('title', 100);
            $table->string('author');
            $table->enum('status', ['sudah dibaca', 'sedang dibaca', 'ingin dibaca']);
            $table->text('review')->nullable();
            $table->integer('rating')->nullable();
            $table->string('cover_image')->nullable(); // Tambahkan kolom untuk foto
            $table->dateTime('date_added');
            $table->dateTime('date_finished')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
