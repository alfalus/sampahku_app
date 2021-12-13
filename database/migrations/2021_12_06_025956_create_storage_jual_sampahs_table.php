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
        Schema::create('storage_jual', function (Blueprint $table) {
            $table->increments('id_storage');
            $table->unsignedInteger('id_user');

        });

        Schema::table('storage_jual', function (Blueprint $table) {
            $table->foreign('id_user')->references('id_user')->on('user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('storage_jual');
    }
}
