<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaranAlatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran_alat', function (Blueprint $table) {
            $table->increments('id_pembayaran_alat');
            $table->unsignedInteger('id_pemesanan_alat');
            $table->foreign('id_pemesanan_alat')->references('id_pemesanan_alat')->on('pemesanan_alat');
            $table->date('tanggal');
            $table->string('status');
            $table->string('foto');
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
        Schema::dropIfExists('pembayaran_alat');
    }
}
