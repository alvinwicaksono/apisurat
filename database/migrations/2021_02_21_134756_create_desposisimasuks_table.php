<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesposisimasuksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('desposisimasuk', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('suratmasuk_id')->unsigned();
            $table->foreign('suratmasuk_id')->references('id')->on('suratmasuks');
            $table->bigInteger('penerima_id')->unsigned();
            $table->foreign('penerima_id')->references('id')->on('penerima');
            $table->string('pic')->nullable();
            $table->string('instruksi');
            $table->string('isi_desposisi')->nullable();
            $table->string('kecepatan')->nullable();
            $table->date('tgl_selesai')->nullable();
            $table->boolean('arsip')->default(0);
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
        Schema::dropIfExists('desposisimasuk');
    }
}
