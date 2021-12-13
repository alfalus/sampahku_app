<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderJualsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_jual', function (Blueprint $table) {
            $table->increments('id_order_jual');
            $table->unsignedInteger('id_transaksi_jual');
            $table->unsignedInteger('id_sampah');
            $table->integer('bobot');
            $table->integer('sub_total');

        });

        Schema::table('order_jual', function (Blueprint $table) {
            $table->foreign('id_transaksi_jual')->references('id_transaksi')->on('transaksi');
            $table->foreign('id_sampah')->references('id_sampah')->on('sampah');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_jual');
    }
}
