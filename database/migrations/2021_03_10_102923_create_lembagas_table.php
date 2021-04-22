<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLembagasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql2')->create('tlembaga', function (Blueprint $table) {
            $table->id('ID');
            $table->date('TglBerdiri')->nullable();
            $table->string('Alamat');
            $table->string('NamaLembaga');
            $table->string('Status');
            $table->string('KodeLembaga');
            $table->bigInteger('KLASIS_ID')->unsigned();
            $table->foreign('KLASIS_ID')->references('ID')->on('tklasis');
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
        Schema::dropIfExists('tlembaga');
    }
}
