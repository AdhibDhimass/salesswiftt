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
            $table->unsignedBigInteger('userid');
            $table->unsignedBigInteger('pelangganid');
            $table->double('diskon');
            $table->double('totalharga');
            $table->double('pembayaran');
            $table->date('tanggalpenjualan');
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('userid')->references('id')->on('users');
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
