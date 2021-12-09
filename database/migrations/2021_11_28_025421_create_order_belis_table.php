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
            $table->unsignedInteger('id_user');
            $table->unsignedInteger('id_relasi_user');
            $table->unsignedInteger('id_produk');
            $table->integer('qty');
            $table->integer('total_beli');
            $table->timestamp('tanggal');
            $table->string('status');
            $table->string('deskripsi');

        });

        Schema::table('order_beli', function (Blueprint $table) {
            $table->foreign('id_user')->references('id_user')->on('user');
            // $table->foreign('id_relasi_user')->references('id_relasi_user')->on('penarikan_saldo');
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
