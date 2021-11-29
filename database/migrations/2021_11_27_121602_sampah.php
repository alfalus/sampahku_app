<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Sampah extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sampah', function (Blueprint $table) {
            $table->increments('id_item');
            $table->string('nama_kategori');
            $table->integer('harga_jual_warga');
            $table->integer('harga_jual_rt');
        });

        // Schema::table('sampah', function (Blueprint $table) {
        //     $table->foreign('id_user')->references('id_user')->on('order_jual');
        //     $table->foreign('id_relasi_user')->references('id_user')->on('order_jual');
        //     // $table->foreign('id_dompet')->references('id_dompet')->on('dompet');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sampah');
    }
}
