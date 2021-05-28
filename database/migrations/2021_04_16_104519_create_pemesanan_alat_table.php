<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemesananAlatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemesanan_alat', function (Blueprint $table) {
            $table->integer('id_pemesanan_alat');
            $table->unsignedInteger('id_alat');
            $table->foreign('id_alat')->references('id_alat')->on('alat');
            $table->unsignedInteger('id_mitra');
            $table->foreign('id_mitra')->references('id_mitra')->on('mitra');
            $table->date('tanggal');
            $table->integer('luas_tanah');
            $table->integer('total_harga');
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
        Schema::dropIfExists('pemesanan_alat');
    }
}
