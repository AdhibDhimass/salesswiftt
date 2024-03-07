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
        Schema::create('detailpenjualan', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('penjualanid');
            $table->unsignedBigInteger('produkid');
            $table->integer('qty');
            $table->decimal('subtotal', 10, 2);
            $table->timestamps();

            $table->foreign('penjualanid')->references('id')->on('penjualan');
            $table->foreign('produkid')->references('id')->on('produk');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detailpenjualan');
    }
};
