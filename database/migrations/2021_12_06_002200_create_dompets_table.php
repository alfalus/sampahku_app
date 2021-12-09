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
            $table->unsignedInteger('id_kredit_user');
            $table->unsignedInteger('id_debit_user');
            $table->integer('uang_keluar');
            $table->integer('uang_masuk');
            $table->unsignedInteger('id_penarikan_user');
            $table->integer('total_semua_penarikan');

        });

        Schema::table('dompet', function (Blueprint $table) {
            $table->foreign('id_kredit_user')->references('id_kredit_user')->on('pengeluaran');
            $table->foreign('id_debit_user')->references('id_debit_user')->on('pemasukan');
            $table->foreign('id_penarikan_user')->references('id_penarikan_user')->on('riwayat_penarikan');
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
