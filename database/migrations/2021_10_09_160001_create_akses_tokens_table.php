<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAksesTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('akses_token', function (Blueprint $table) {
            $table->increments('id_session');
            $table->unsignedInteger('id_user');
            $table->string('token');
            $table->timestamp('tanggal_dibuat')->nullable();
        });

        Schema::table('akses_token', function (Blueprint $table) {
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
        Schema::dropIfExists('akses_token');
    }
}
