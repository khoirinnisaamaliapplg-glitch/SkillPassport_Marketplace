<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->id('id_produk'); // Primary key
            
            $table->unsignedBigInteger('id_user'); // <-- DITAMBAHKAN DI SINI
            
            $table->unsignedBigInteger('id_kategori'); // Foreign key kategori
            $table->string('nama_produk', 100);
            $table->integer('harga');
            $table->integer('stok');
            $table->text('deskripsi')->nullable();
            $table->date('tanggal_upload')->nullable();
            $table->unsignedBigInteger('id_toko'); // Foreign key toko
            $table->timestamps();

            // Foreign key
            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
            $table->foreign('id_kategori')->references('id_kategori')->on('kategori')->onDelete('cascade');
            $table->foreign('id_toko')->references('id_toko')->on('toko')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};
