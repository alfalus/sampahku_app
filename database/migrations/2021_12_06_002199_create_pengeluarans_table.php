<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengeluaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengeluaran', function (Blueprint $table) {
            $table->increments('id_kredit_user');
            $table->unsignedInteger('id_user');
            $table->unsignedInteger('id_order_beli');
            $table->integer('total_beli');
            $table->string('status');
            $table->integer('uang_keluar');

        });

        Schema::table('pengeluaran', function (Blueprint $table) {
            $table->foreign('id_user')->references('id_user')->on('user');
            $table->foreign('id_order_beli')->references('id_order_beli')->on('order_beli');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengeluaran');
    }
}
