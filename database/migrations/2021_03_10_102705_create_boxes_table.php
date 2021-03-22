<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql2')->create('tbox', function (Blueprint $table) {
            $table->id('ID');
            $table->string('KodeBox');
            $table->string('NamaBox');
            $table->bigInteger('RAK_ID')->unsigned();
            $table->foreign('RAK_ID')->references('id')->on('trak');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbox');
    }
}
