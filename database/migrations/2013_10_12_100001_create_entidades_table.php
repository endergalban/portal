<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Eloquent\SoftDeletes;

class CreateEntidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entidades', function (Blueprint $table) {
            $table->increments('id')->comment('Identificador de la entidad');
            $table->string('descripcion')->comment('Descripción de la entidad o tabla virtual');
            $table->boolean('estado')->default(1)->comment('Estado de la entidad o tabla virtual (0 = inactivo, 1 = activo)');
            $table->boolean('tipo')->default(1)->comment('tipo de selección de la entidad  (1 = simple,2 = multiple, 3 = caja de texto)');
            $table->integer('orden')->comment('Orden de la tabla virtual');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entidades');
    }
}
