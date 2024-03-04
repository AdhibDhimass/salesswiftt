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
        Schema::create('penjualan', function (Blueprint $table) {
            $table->id('id');
            $table->date('tanggalpenjualan');
            $table->string('kasir');
            $table->double('totalharga');
            $table->double('pembayaran');
            $table->unsignedBigInteger('pelangganid');
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('pelangganid')->references('id')->on('pelanggan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjualan');
    }
};
