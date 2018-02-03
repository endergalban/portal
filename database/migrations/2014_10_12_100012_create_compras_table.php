<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Eloquent\SoftDeletes;

class CreateComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('publicacion_id')->unsigned()->comment('Identificador de la publicación');
            $table->integer('user_id')->unsigned()->comment('Identificador del usuario que realiza la compra');
            $table->string('descripcion')->comment('Comentario de la compra');
             $table->float('monto', 12, 2)->comment('Monto de la publicación');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('publicacion_id')->references('id')->on('publicaciones')->onDelete('cascade');
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
        Schema::dropIfExists('compras');
    }
}
