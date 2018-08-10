<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StatusPengiriman extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status_pengiriman', function (Blueprint $table) {
            $table->increments('id');
            $table->string('status');
            $table->dateTime('tanggal');
            $table->text('lokasi');
            $table->unsignedInteger('id_pengiriman');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id_pengiriman')->references('id')->on('pengiriman')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('status_pengiriman');
    }
}
