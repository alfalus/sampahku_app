<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemStoragesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_storage', function (Blueprint $table) {
            $table->increments('id_item_storage');
            $table->unsignedInteger('id_storage');
            $table->unsignedInteger('id_transaksi_jual');
            $table->unsignedInteger('id_pengurangan')->nullable();
            $table->unsignedInteger('id_sampah');
            $table->integer('total_bobot_transaksi');
            $table->integer('total_pengurangan')->nullable();
            $table->integer('total_bobot_real');
            $table->integer('total_harga_aset');
            $table->timestamp('update_terakhir')->nullable();

        });

        Schema::table('item_storage', function (Blueprint $table) {
            $table->foreign('id_storage')->references('id_storage')->on('storage_jual');
            $table->foreign('id_transaksi_jual')->references('id_transaksi')->on('transaksi');
            $table->foreign('id_pengurangan')->references('id_pengurangan')->on('pengurangan_item');
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
        Schema::dropIfExists('item_storage');
    }
}
