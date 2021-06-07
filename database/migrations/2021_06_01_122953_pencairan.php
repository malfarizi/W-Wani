<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pencairan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pencairan', function (Blueprint $table) {
        $table->increments('id_pencairan');
        $table->unsignedInteger('id_mitra');
        $table->foreign('id_mitra')->references('id_mitra')->on('mitra');
        $table->string('jumlah');
        $table->string('status_pencairan');
        $table->string('profit');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pencairan');
    }
}
