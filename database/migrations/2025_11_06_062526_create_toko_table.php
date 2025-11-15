<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('toko', function (Blueprint $table) {
            $table->id('id_toko'); // Primary key
            $table->unsignedBigInteger('id_user');
            $table->string('nama_toko', 100);
            $table->text('deskripsi')->nullable();
            $table->string('gambar', 100)->nullable();
            $table->string('kontak_toko', 13)->nullable();
            $table->text('alamat')->nullable();
            $table->timestamps();

            // Foreign key (setelah kolom id_user dibuat)
            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('toko');
    }
};
