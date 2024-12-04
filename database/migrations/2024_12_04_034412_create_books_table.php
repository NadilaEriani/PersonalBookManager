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
            $table->id('book_id'); // Id unik untuk buku (primary key)
            $table->unsignedBigInteger('user_id'); // Referensi ke tabel user (foreign key)
            $table->string('title', 100); // Judul buku
            $table->string('author'); // Nama penulis buku
            $table->enum('status', ['sudah dibaca', 'sedang dibaca', 'ingin dibaca']); // Status bacaan buku
            $table->text('review')->nullable(); // Ulasan atau catatan pribadi pengguna tentang buku
            $table->integer('rating')->nullable(); // Peringkat buku berdasarkan preferensi pengguna
            $table->datetime('date_added')->nullable(); // Tanggal saat buku ditambahkan ke daftar
            $table->datetime('date_finished')->nullable(); // Tanggal saat buku selesai dibaca
            $table->timestamps();
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
