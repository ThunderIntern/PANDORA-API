<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PesananDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanan_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sku');
            $table->integer('jumlah_barang');
            $table->double('harga');
            $table->double('harga_promo');
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
        Schema::dropIfExists('pesanan_detail');
    }
}
