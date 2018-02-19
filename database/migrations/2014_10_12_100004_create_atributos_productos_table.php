<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtributosProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('atributo_productos', function (Blueprint $table) {
            $table->increments('id')->comment('Identificador del atributo para el producto');
            $table->integer('atributo_id')->unsigned()->comment('Identificador del atributo');
            $table->integer('producto_id')->unsigned()->comment('Identificador del producto');
            $table->timestamps();
            $table->foreign('atributo_id')->references('id')->on('atributos')->onDelete('cascade');
            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('atributo_productos');
        Schema::enableForeignKeyConstraints();
    }
}
