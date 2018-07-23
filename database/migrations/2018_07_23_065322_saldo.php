<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Saldo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saldo', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('tanggal');
            $table->double('jumlah');
            $table->text('keterangan');
            $table->unsignedInteger('id_wallet');
            $table->foreign('id_wallet')->references('id')->on('wallet')->onDelete('cascade');
          $table->timeStamps();
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
        Schema::dropIfExists('saldo');
    }
}
