<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemesananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemesanan', function (Blueprint $table) {
            $table->increments('id_pemesanan');
            $table->unsignedInteger('id_pembeli');
            $table->foreign('id_pembeli')->references('id_pembeli')->on('pembeli');
            $table->double('total_harga');
            $table->date('tanggal');
            $table->string('kurir');
            $table->string('etd');
            $table->string('service');
            $table->text('alamat_lengkap');
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
        Schema::dropIfExists('pemesanan');
    }
}
