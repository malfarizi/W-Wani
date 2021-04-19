<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMitraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mitra', function (Blueprint $table) {
            $table->increments('id_mitra');
            $table->string('nama_mitra');
            $table->string('email');
            $table->string('password');
            $table->enum('jk',['laki-laki','perempuan']);
            $table->string('no_telp');
            $table->string('foto')->nullable();
            $table->string('status');
            $table->string('level');
            $table->string('no_rek');
            $table->string('nama_rekening');
            $table->string('nama_bank');
            $table->unsignedInteger('id_alamat');
            $table->foreign('id_alamat')->references('id_alamat')->on('alamat');
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
        Schema::dropIfExists('mitras');
    }
}
