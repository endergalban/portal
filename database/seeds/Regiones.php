<?php

use Illuminate\Database\Seeder;
use App\Atributo;
use App\Entidad;

class Regiones extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $entidad = new Entidad;
        $entidad->descripcion = 'Región';
        $entidad->tipo = 1;
        $entidad->estado= 1;
        $entidad->orden= 1;
        $entidad->save();

        $i=0;
        $atributo = new Atributo;
        $atributo->descripcion = 'Tarapacá';
        $atributo->estado = 1;
        $atributo->entidad_id  = $entidad->id;
        $atributo->orden = $i++;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->descripcion = 'Antofagasta';
        $atributo->estado = 1;
        $atributo->entidad_id  = $entidad->id;
        $atributo->orden = $i++;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->descripcion = 'Atacama';
        $atributo->estado = 1;
        $atributo->entidad_id  = $entidad->id;
        $atributo->orden = $i++;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->descripcion = 'Coquimbo';
        $atributo->estado = 1;
        $atributo->entidad_id  = $entidad->id;
        $atributo->orden = $i++;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->descripcion = 'Valparaíso';
        $atributo->estado = 1;
        $atributo->entidad_id  = $entidad->id;
        $atributo->orden = $i++;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->descripcion = 'O’Higgins';
        $atributo->estado = 1;
        $atributo->entidad_id  = $entidad->id;
        $atributo->orden = $i++;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->descripcion = 'El Maule';
        $atributo->estado = 1;
        $atributo->entidad_id  = $entidad->id;
        $atributo->orden = $i++;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->descripcion = 'El Bío Bío';
        $atributo->estado = 1;
        $atributo->entidad_id  = $entidad->id;
        $atributo->orden = $i++;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->descripcion = 'La Araucanía';
        $atributo->estado = 1;
        $atributo->entidad_id  = $entidad->id;
        $atributo->orden = $i++;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->descripcion = 'Los Lagos';
        $atributo->estado = 1;
        $atributo->entidad_id  = $entidad->id;
        $atributo->orden = $i++;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->descripcion = 'Aysén';
        $atributo->estado = 1;
        $atributo->entidad_id  = $entidad->id;
        $atributo->orden = $i++;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->descripcion = 'Magallanes y Antártica';
        $atributo->estado = 1;
        $atributo->entidad_id  = $entidad->id;
        $atributo->orden = $i++;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->descripcion = 'Chilena';
        $atributo->estado = 1;
        $atributo->entidad_id  = $entidad->id;
        $atributo->orden = $i++;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->descripcion = 'Región Metropolitana de Santiago';
        $atributo->estado = 1;
        $atributo->entidad_id  = $entidad->id;
        $atributo->orden = $i++;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->descripcion = 'Los Ríos';
        $atributo->estado = 1;
        $atributo->entidad_id  = $entidad->id;
        $atributo->orden = $i++;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->descripcion = 'Arica y Parinacota';
        $atributo->estado = 1;
        $atributo->entidad_id  = $entidad->id;
        $atributo->orden = $i++;
        $atributo->save();
    }
}
