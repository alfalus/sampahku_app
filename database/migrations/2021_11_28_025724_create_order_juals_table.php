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
            $table->unsignedInteger('id_user');
            $table->unsignedInteger('id_relasi_user');
            $table->unsignedInteger('id_item');
            $table->integer('bobot');
            $table->integer('total_jual');
            $table->timestamp('tanggal');
            $table->string('status');
            $table->string('deskripsi');

        });

        Schema::table('order_jual', function (Blueprint $table) {
            $table->foreign('id_user')->references('id_user')->on('user');
            $table->foreign('id_relasi_user')->references('id_user')->on('user');
            $table->foreign('id_item')->references('id_item')->on('sampah');
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
