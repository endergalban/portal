<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Eloquent\SoftDeletes;

class CreateCaracteristicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caraceristicas', function (Blueprint $table) {
            $table->increments('id')->comment('Identificador de la caracteristica del producto a publicar');
            $table->integer('atributo_producto_id')->unsigned()->comment('Identificador del atributo del producto');
            $table->integer('publicacion_id')->unsigned()->comment('Identificador de la publicación');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('atributo_producto_id')->references('id')->on('atributo_productos')->onDelete('cascade');
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
        Schema::dropIfExists('caraceristicas');
    }
}
