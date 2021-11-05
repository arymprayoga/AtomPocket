<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->string('deskripsi')->nullable();
            $table->date('tanggal');
            $table->string('nilai');
            $table->unsignedBigInteger('dompet_id');
            $table->unsignedBigInteger('kategori_id');
            $table->unsignedBigInteger('status_id');
            $table->timestamps();
            $table->foreign('dompet_id')->references('id')->on('dompet');
            $table->foreign('kategori_id')->references('id')->on('kategori');
            $table->foreign('status_id')->references('id')->on('transaksi_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
}
