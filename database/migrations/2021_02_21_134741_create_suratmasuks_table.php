<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratmasuksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suratmasuks', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_surat');
            $table->date('tgl_dokumen');
            $table->bigInteger('subBidang_id')->unsigned();
            $table->foreign('subBidang_id')->references('id')->on('subbidang');
            $table->string('nama_surat');
            $table->string('sumber_surat');
            $table->string('perihal');
            $table->date('tgl_masuk');
            $table->string('isi_surat');
            $table->string('file');
            $table->string('format');
            $table->string('prioritas');
            $table->boolean('read')->nullable();
            $table->string('keterangan')->nullable();
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
        Schema::dropIfExists('suratmasuks');
    }
}
