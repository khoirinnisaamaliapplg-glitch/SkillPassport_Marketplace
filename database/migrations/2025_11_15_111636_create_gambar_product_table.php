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
        Schema::create('gambar_product', function (Blueprint $table) {
            $table->bigIncrements('id_gambar'); // primary key
            $table->unsignedBigInteger('id_produk'); // foreign key ke tabel produk
            $table->string('nama_gambar');
            $table->timestamps();

            // Kalau ingin relasi FK (optional)
            $table->foreign('id_produk')->references('id_produk')->on('produk')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gambar_product');
    }
};
