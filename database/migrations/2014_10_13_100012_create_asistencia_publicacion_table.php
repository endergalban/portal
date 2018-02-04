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
            $table->integer('user_id')->unsigned()->comment('Identificador del usuario que solicita la asistencia');
            $table->integer('publicacion_id')->unsigned()->comment('Identificador de la publicación');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
