<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSatpelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('satpel', function (Blueprint $table) {
            $table->increments('id_satpel');
            $table->unsignedInteger('id_user');
            $table->string('nama_satpel');
            $table->string('alamat');
            $table->string('no_hp');
            $table->timestamp('tanggal_update')->nullable();
            $table->string('status')->nullable();

        });

        Schema::table('satpel', function (Blueprint $table) {
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
        Schema::dropIfExists('satpel');
    }
}
