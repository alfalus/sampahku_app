<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenguranganItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengurangan_item', function (Blueprint $table) {
            $table->increments('id_pengurangan');
            $table->unsignedInteger('id_user');
            $table->unsignedInteger('id_item');
            $table->integer('total_pengurangan');
            $table->string('detail');

        });

        Schema::table('pengurangan_item', function (Blueprint $table) {
            $table->foreign('id_user')->references('id_user')->on('user');
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
        Schema::dropIfExists('pengurangan_item');
    }
}
