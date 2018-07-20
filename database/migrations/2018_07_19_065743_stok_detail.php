<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StokDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stok_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kuantitas');
            $table->string('satuan');
            $table->unsignedInteger('id_stok_header');
            $table->unsignedInteger('id_barang');
            $table->foreign('id_stok_header')->references('id')->on('stok_header')->onDelete('cascade');
            $table->foreign('id_barang')->references('id')->on('barang')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stok_detail');
    }
}
