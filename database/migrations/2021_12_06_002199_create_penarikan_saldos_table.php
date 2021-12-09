<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenarikanSaldosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penarikan_saldo', function (Blueprint $table) {
            $table->increments('id_penarikan');
            $table->unsignedInteger('id_user');
            $table->unsignedInteger('id_relasi_user');
            $table->timestamp('tanggal_penarikan');
            $table->integer('uang_ditarik');

        });

        Schema::table('penarikan_saldo', function (Blueprint $table) {
            $table->foreign('id_user')->references('id_user')->on('user');
            // $table->foreign('id_relasi_user')->references('id_relasi_user')->on('penarikan_saldo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penarikan_saldo');
    }
}
