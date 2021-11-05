<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDompetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dompet', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('referensi');
            $table->string('deskripsi');
            $table->unsignedBigInteger('status_id');
            $table->timestamps();
            $table->foreign('status_id')->references('id')->on('status_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dompet');
    }
}
