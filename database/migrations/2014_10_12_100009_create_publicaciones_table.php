<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Eloquent\SoftDeletes;

class CreatePublicacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publicaciones', function (Blueprint $table) {
            $table->increments('id')->comment('Identificador de la publicación');
            $table->integer('producto_id')->unsigned()->comment('Identificador del producto');
            $table->integer('user_id')->unsigned()->comment('Identificador del usuario quien publica');
            $table->string('descripcion')->comment('Descripción de la publicación');
            $table->boolean('estado')->default(1)->comment('Estado de la publicación (0 = inactivo, 1 = activo, 2 = vendido, 3 = de baja)');
            $table->float('monto', 12, 2)->comment('Monto de la publicación');
            $table->integer('cantidad')->comment('cantidad de poductos publicados');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('publicaciones');
    }
}
