<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokumensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql2')->create('tdokumen', function (Blueprint $table) {
            $table->id('ID');
            $table->string('BatasAkses');
            $table->string('KodeDokumen');
            $table->string('NamaDokumen');
            $table->string('Keterangan');
            $table->string('TglBuat');
            $table->string('Pengarang');
            $table->string('jumdok');
            $table->string('file');
            $table->date('TglMasuk');
            $table->bigInteger('LEMBAGA_ID')->unsigned();
            $table->foreign('LEMBAGA_ID')->references('id')->on('tlembaga');
            $table->bigInteger('BOX_ID')->unsigned();
            $table->foreign('BOX_ID')->references('id')->on('tbox');
            $table->bigInteger('SUBBIDANG_ID')->unsigned();
            $table->foreign('SUBBIDANG_ID')->references('id')->on('tsubbidang');
            $table->bigInteger('FORMAT_ID')->unsigned();
            $table->foreign('FORMAT_ID')->references('id')->on('tformat');
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
        Schema::dropIfExists('dokumens');
    }
}
