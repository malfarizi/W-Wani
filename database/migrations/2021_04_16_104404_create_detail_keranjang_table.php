<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailKeranjangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_keranjang', function (Blueprint $table) {
            $table->increments('id_detail_keranjang');
            $table->unsignedInteger('id_keranjang');
            $table->foreign('id_keranjang')->references('id_keranjang')->on('keranjang');
            $table->integer('qty');
            $table->double('subtotal');
            $table->unsignedInteger('id_produk');
            $table->foreign('id_produk')->references('id_produk')->on('produk');
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
        Schema::dropIfExists('detail_keranjang');
    }
}
