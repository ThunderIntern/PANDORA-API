<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StokHeader extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stok_header', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomor');
            $table->string('jenis');
            $table->dateTime('tanggal');
            $table->unsignedInteger('id_gudang');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id_gudang')->references('id')->on('gudang')->onDelete('cascade');

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stok_header');
    }
}
