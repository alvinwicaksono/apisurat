<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKlasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql2')->create('tklasis', function (Blueprint $table) {
            $table->id('ID');
            $table->string('NamaKlasis');
            $table->integer('ThnBuka')->nullable();
            $table->string('KodeKlasis');
            $table->integer('ThnTutup')->nullable();
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
        Schema::dropIfExists('tklasis');
    }
}
