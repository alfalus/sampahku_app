<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('data_user', function (Blueprint $table) {
        //     $table->increments('id_data_user');
        //     $table->unsignedInteger('id_user');
        //     $table->unsignedInteger('id_relasi_user')->nullable();
        //     $table->unsignedInteger('id_dompet')->nullable();
        //     $table->string('nama_user');
        //     $table->string('jenis_kel')->nullable();
        //     $table->string('ttl')->nullable();
        //     $table->string('jabatan')->nullable();
        //     $table->string('no_hp');
        //     $table->string('nama_instansi')->nullable();
        //     $table->string('alamat');
        // });

        // Schema::table('data_user', function (Blueprint $table) {
        //     $table->foreign('id_user')->references('id_user')->on('user');
        //     $table->foreign('id_relasi_user')->references('id_user')->on('user');
        //     // $table->foreign('id_dompet')->references('id_dompet')->on('dompet');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_user');
    }
}
