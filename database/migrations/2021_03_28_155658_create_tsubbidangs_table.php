<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTsubbidangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql2')->create('tsubbidang', function (Blueprint $table) {
            $table->id();
            $table->string('kode_subBidang');
            $table->string('nama_subBidang');
            $table->bigInteger('bidang_id')->unsigned();
            $table->foreign('bidang_id')->references('id')->on('tbidang');
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
        Schema::dropIfExists('tsubbidangs');
    }
}
