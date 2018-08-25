<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('o_users', function ($table) {
            // Id
            $table->increments('id');
            $table->string('username')->unique();
    // tambahin nama
            $table->string('nama');
            // Attr
            $table->string('password', 127);
            
            // Timestamp
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
        Schema::drop('o_users');
    }
}
