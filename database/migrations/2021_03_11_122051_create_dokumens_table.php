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
            $table->string('NamaDokumen');
            $table->string('Keterangan');
            $table->string('TglBuat');
            $table->string('Pengarang');
            $table->date('TglMasuk');
            $table->bigInteger('LEMBAGA_ID');
            $table->foreign('LEMBAGA_ID')->references('id')->on('tlembaga');
            $table->bigInteger('BOX_ID');
            $table->foreign('BOX_ID')->references('id')->on('tbox');
            $table->bigInteger('SUBBIDANG_ID');
            $table->foreign('SUBBIDANG_ID')->references('id')->on('subbidang');
            $table->bigInteger('FORMAT_ID');
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
        Schema::dropIfExists('tdokumen');
    }
}
