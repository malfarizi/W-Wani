<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembeliTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembeli', function (Blueprint $table) {
            $table->increments('id_pembeli');
            $table->string('nama_pembeli');
            $table->string('email');
            $table->string('password');
            $table->enum('jk', ['laki-laki','perempuan']);
            $table->string('no_telp');
            $table->string('foto')->nullable();
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
        Schema::dropIfExists('pembeli');
    }
}
