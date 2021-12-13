<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDompetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dompet', function (Blueprint $table) {
            $table->increments('id_dompet');
            $table->unsignedInteger('id_penarikan_user');
            $table->unsignedInteger('id_transaksi');
            $table->integer('total_penarikan');
            $table->integer('total_transaksi');

        });

        Schema::table('dompet', function (Blueprint $table) {
            $table->foreign('id_penarikan_user')->references('id_penarikan_user')->on('riwayat_penarikan');
            $table->foreign('id_transaksi')->references('id_transaksi')->on('transaksi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dompet');
    }
}
