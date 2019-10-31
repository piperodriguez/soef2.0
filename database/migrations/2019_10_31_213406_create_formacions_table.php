<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formacion', function (Blueprint $table) {
            $table->bigIncrements('id_formacion');
            $table->unsignedBigInteger('estudio_id');
            $table->foreign('estudio_id')->references('id_estudio')->on('nivel_estudios');
            $table->longText('institucion');
            $table->integer('id_persona');
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
        Schema::dropIfExists('formacion');
    }
}
