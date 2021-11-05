<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDompetTable extends Migration
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
            $table->string('referensi')->nullable();
            $table->string('deskripsi')->nullable();
            $table->unsignedBigInteger('status_id');
            $table->timestamps();
            $table->foreign('status_id')->references('id')->on('dompet');
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
