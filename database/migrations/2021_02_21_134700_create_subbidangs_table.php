<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubbidangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subbidang', function (Blueprint $table) {
            $table->id();
            $table->string('kode_subBidang');
            $table->string('nama_subBidang');
            $table->bigInteger('bidang_id')->unsigned();
            $table->foreign('bidang_id')->references('id')->on('bidang');
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
        Schema::dropIfExists('subbidang');
    }
}
