<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->increments('id_user');
            $table->unsignedInteger('id_role');
            $table->string('email');
            $table->string('password');
            $table->timestamp('tanggal_dibuat')->nullable();
            $table->timestamp('tanggal_update')->nullable();
            $table->string('status');

        });

        Schema::table('user', function (Blueprint $table) {
            $table->foreign('id_role')->references('id_role')->on('role')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
}
