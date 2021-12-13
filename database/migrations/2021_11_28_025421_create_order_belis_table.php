<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderBelisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_beli', function (Blueprint $table) {
            $table->increments('id_order_beli');
            $table->unsignedInteger('id_transaksi_beli');
            $table->unsignedInteger('id_produk');
            $table->integer('qty');
            $table->integer('sub_total');

        });

        Schema::table('order_beli', function (Blueprint $table) {
            $table->foreign('id_transaksi_beli')->references('id_transaksi')->on('transaksi');
            $table->foreign('id_produk')->references('id_produk')->on('produk');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_beli');
    }
}
