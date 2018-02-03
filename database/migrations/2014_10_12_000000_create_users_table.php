<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Eloquent\SoftDeletes;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id')->comment('Identificador del usuario');
            $table->string('rut')->unique()->comment('Rut del usuario');
            $table->string('name')->comment('Nombre del usuario');
            $table->string('tipo')->default(0)->comment('Tipo de usuario (0 = usuario, 1 = administrador)');
            $table->string('estatus')->default(1)->comment('Estado de usuario (0 = inactivo, 1 = activo)');
            $table->string('email')->unique()->comment('Email del usuario');
            $table->string('password')->comment('Password del usuario');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
