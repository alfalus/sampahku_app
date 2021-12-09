<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->increments('id_produk');
            $table->unsignedInteger('id_user');
            $table->string('nama_produk');
            $table->string('kategori');
            $table->integer('qty');
            $table->timestamp('tanggal_pembuatan')->nullable();
            $table->integer('harga_produk');
            $table->string('deskripsi')->nullable();

        });

        Schema::table('produk', function (Blueprint $table) {
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
        Schema::dropIfExists('produk');
    }
}
