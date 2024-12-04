<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reading_sessions', function (Blueprint $table) {
            $table->id('session_id'); // Id unik untuk setiap sesi membaca (primary key)
            $table->unsignedBigInteger('book_id'); // Referensi ke tabel books (foreign key)
            $table->unsignedBigInteger('user_id'); // Referensi ke tabel user (foreign key)
            $table->datetime('start_time'); // Waktu mulai sesi membaca
            $table->datetime('end_time')->nullable(); // Waktu selesai sesi membaca
            $table->integer('pages_read'); // Jumlah halaman yang dibaca dalam sesi ini
            $table->timestamps(); // Kolom create_at dan update_at untuk mencatat kapan hubungan dibuat atau diubah

            // Menambahkan foreign key untuk book_id
            $table->foreign('book_id')->references('book_id')->on('books')->onDelete('cascade');

            // Menambahkan foreign key untuk user_id
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reading_sessions');
    }
};
