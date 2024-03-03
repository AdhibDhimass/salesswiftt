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
        Schema::create('produk', function (Blueprint $table) {
            $table->id('id');
            $table->string('namaproduk', 255);
            $table->integer('stok');
            $table->double('harga_beli');
            $table->double('harga_jual');
            $table->unsignedBigInteger('id_kategori');
            $table->timestamps();

            $table->foreign('id_kategori')->references('id')->on('kategori');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};
