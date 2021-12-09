<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemasukansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemasukan', function (Blueprint $table) {
            $table->increments('id_debit_user');
            $table->unsignedInteger('id_user');
            $table->unsignedInteger('id_order_jual');
            $table->integer('total_jual');
            $table->string('status');
            $table->integer('uang_masuk');

        });

        Schema::table('pemasukan', function (Blueprint $table) {
            $table->foreign('id_user')->references('id_user')->on('user');
            $table->foreign('id_order_jual')->references('id_order_jual')->on('order_jual');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pemasukan');
    }
}
