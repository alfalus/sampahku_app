<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Transaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->increments('id_transaksi');
            $table->unsignedInteger('id_user');
            $table->unsignedInteger('id_relasi_user');
            $table->string('tipe_transaksi');
            $table->integer('total_nominal');
            $table->string('metode_pembayaran');
            $table->timestamp('tanggal')->nullable();
            $table->string('status');
            $table->string('deskripsi')->nullable();

        });

        Schema::table('transaksi', function (Blueprint $table) {
            $table->foreign('id_user')->references('id_user')->on('user');
            $table->foreign('id_relasi_user')->references('id_user')->on('user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
}
