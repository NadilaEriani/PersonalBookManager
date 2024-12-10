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
        Schema::create('books', function (Blueprint $table) {
            $table->id('book_id'); // Primary key
            $table->unsignedBigInteger('user_id'); // Foreign key
            $table->string('title', 100);
            $table->string('author');
            $table->enum('status', ['sudah dibaca', 'sedang dibaca', 'ingin dibaca']);
            $table->text('review')->nullable();
            $table->integer('rating')->nullable();
            $table->dateTime('date_added');
            $table->dateTime('date_finished')->nullable();
            $table->timestamps();

            // Foreign key constraint
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
