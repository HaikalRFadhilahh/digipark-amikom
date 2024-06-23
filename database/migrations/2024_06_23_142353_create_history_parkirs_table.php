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
        Schema::create('history_parkirs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_kartu')->nullable();
            $table->foreign('id_kartu')->references('id')->on('kartu_mahasiswas')->onDelete('set null');
            $table->string('nomer_kendaraan');
            $table->time('jam_masuk');
            $table->date('tanggal_masuk');
            $table->time('jam_keluar');
            $table->date('tanggal_keluar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('history_parkirs');
    }
};
