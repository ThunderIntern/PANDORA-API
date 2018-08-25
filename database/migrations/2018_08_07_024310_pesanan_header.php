<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PesananHeader extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanan_header', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomor')->unique();
            $table->dateTime('tanggal');
            $table->double('total');
            $table->double('ongkos_kirim');
            $table->string('id_user');
            $table->timestamps();
            $table->softDeletes();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesanan_header');
    }
}
