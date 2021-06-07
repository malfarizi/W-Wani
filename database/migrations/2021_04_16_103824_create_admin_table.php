<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('nama_admin');
            $table->string('password');
            $table->enum('jk',['laki-laki', 'perempuan']);
            $table->string('no_telp');
            $table->string('foto')->nullable();
            $table->string('nama_bank');
            $table->string('no_rek');
            $table->string('nama_rek');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin');
    }
}
