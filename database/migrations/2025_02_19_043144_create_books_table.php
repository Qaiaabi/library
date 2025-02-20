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
            $table->id();
            $table->string('judul')->nullable();
            $table->string('penulis')->nullable();
            $table->string('penerbit')->nullable();
            $table->string('tahun_terbit')->nullable(); // Diperbaiki dari 'tahut_terbit'
            $table->text('deskripsi')->nullable(); // Menggunakan 'text' karena deskripsi bisa panjang
            $table->string('gambar')->nullable();
            $table->string('stock')->nullable();

            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade'); // Diperbaiki

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
