<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Pengiriman extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengiriman', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomor_resi');
            $table->dateTime('tanggal_pengiriman');
            $table->text('biodata_pengirim');
            $table->string('nama_pengirim');
            $table->text('biodata_penerima');
            $table->string('nama_penerima');
            $table->string('jasa_ekspedisi');
            $table->string('tipe_paket');
            $table->text('geolocation');
            $table->unsignedInteger('id_pesanan_header');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id_pesanan_header')->references('id')->on('pesanan_header')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengiriman');
    }
}
