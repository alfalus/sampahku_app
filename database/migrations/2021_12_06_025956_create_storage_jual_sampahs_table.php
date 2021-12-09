<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStorageJualSampahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('storage_jual_sampah', function (Blueprint $table) {
            $table->increments('id_storage');
            $table->unsignedInteger('id_user');
            $table->unsignedInteger('id_order_jual');
            $table->unsignedInteger('id_item');
            $table->integer('total_bobot');
            $table->integer('total_harga_aset');
            $table->timestamp('last_update');
            $table->string('status');

        });

        Schema::table('storage_jual_sampah', function (Blueprint $table) {
            $table->foreign('id_user')->references('id_user')->on('user');
            $table->foreign('id_order_jual')->references('id_order_jual')->on('order_jual');
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
        Schema::dropIfExists('storage_jual_sampah');
    }
}
