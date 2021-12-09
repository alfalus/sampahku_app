<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiwayatPenarikansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_penarikan', function (Blueprint $table) {
            $table->increments('id_penarikan_user');
            $table->unsignedInteger('id_user');
            $table->unsignedInteger('id_penarikan');
            $table->integer('uang_ditarik');
            $table->string('status');
            $table->integer('total_semua_penarikan');

        });

        Schema::table('riwayat_penarikan', function (Blueprint $table) {
            $table->foreign('id_user')->references('id_user')->on('user');
            $table->foreign('id_penarikan')->references('id_penarikan')->on('penarikan_saldo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('riwayat_penarikan');
    }
}
