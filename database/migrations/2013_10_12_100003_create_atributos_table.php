<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Eloquent\SoftDeletes;

class CreateAtributosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atributos', function (Blueprint $table) {
            $table->increments('id')->comment('Identificador del atributo');
            $table->integer('entidad_id')->unsigned()->comment('Identificador de la entidad o tabla virtual');
            $table->string('descripcion')->comment('Descripción del item de la tabla virtual');
            $table->integer('orden')->comment('Orden del item de la tabla virtual');
            $table->boolean('estado')->default(1)->comment('Estado del atributo (0 = inactivo, 1 = activo)');
            $table->integer('padre')->unsigned()->comment('Tabla virtual padre');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('entidad_id')->references('id')->on('entidades')->onDelete('cascade');
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
        Schema::dropIfExists('atributos');
        Schema::enableForeignKeyConstraints();
    }
}
