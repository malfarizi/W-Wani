<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alat', function (Blueprint $table) {
            $table->increments('id_alat');
            $table->string('nama_alat');
            $table->double('harga');
            $table->text('desc');
            $table->string('foto');
            $table->string('kategori');
            $table->string('status');
            $table->unsignedInteger('id_mitra');
            $table->foreign('id_mitra')->references('id_mitra')->on('mitra');
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
        Schema::dropIfExists('alat');
    }
}
