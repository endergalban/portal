<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsistenciaPublicacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asistencia_publicacion', function (Blueprint $table) {
            $table->integer('asistencia_id')->unsigned()->comment('Identificador de la asistencia');
            $table->integer('publicacion_id')->unsigned()->comment('Identificador de la publicación');
            $table->foreign('asistencia_id')->references('id')->on('asistencias')->onDelete('cascade');
            $table->foreign('publicacion_id')->references('id')->on('publicaciones')->onDelete('cascade');
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
        Schema::dropIfExists('asistencia_publicacion');
    }
}
