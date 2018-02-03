<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Eloquent\SoftDeletes;

class CreatePublicacionImagenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publicacion_imagenes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('publicacion_id')->unsigned()->comment('Identificador de la publicación');
            $table->string('ruta')->comment('Ubicación de la imagen');
             $table->boolean('estado')->default(1)->comment('Estado de la publicación (0 = inactivo, 1 = activo)');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('publicacion_id')->references('id')->on('publicaciones')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compras');
    }
}
