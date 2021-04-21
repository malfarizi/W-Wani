<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdukTable extends Migration
{
    public function up()
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->increments('id_produk');
            $table->string('nama_produk');
            $table->string('deskripsi');
            $table->integer('qty');
            $table->double('harga');
            $table->string('satuan');
            $table->integer('berat');
            $table->string('foto');
            $table->unsignedInteger('id_mitra');
            $table->foreign('id_mitra')->references('id_mitra')->on('mitra');
            $table->unsignedInteger('id_kategori');
            $table->foreign('id_kategori')->references('id_kategori')->on('kategori');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('produk');
    }
}
