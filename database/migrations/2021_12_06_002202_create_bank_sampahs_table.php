<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBankSampahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banksampah', function (Blueprint $table) {
            $table->increments('id_banksampah');
            $table->unsignedInteger('id_user');
            $table->unsignedInteger('id_satpel')->nullable();
            $table->unsignedInteger('id_dompet')->nullable();
            $table->string('nama_banksampah');
            $table->string('jenis_kel')->nullable();
            $table->string('tanggal_lahir')->nullable();
            $table->string('no_hp');
            $table->string('alamat');
            $table->timestamp('tanggal_update')->nullable();
            $table->string('status')->nullable();

        });

        Schema::table('banksampah', function (Blueprint $table) {
            $table->foreign('id_user')->references('id_user')->on('user');
            $table->foreign('id_satpel')->references('id_satpel')->on('satpel');
            $table->foreign('id_dompet')->references('id_dompet')->on('dompet');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('banksampah');
    }
}
