<?php

use Illuminate\Database\Seeder;
use App\Entidad;
use App\Atributo;

class EntidadesAtributos extends Seeder
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


        $entidad = new Entidad;
        $entidad->descripcion = 'Marca';
        $entidad->tipo = 1;
        $entidad->estado= 1;
        $entidad->orden= 2;
        $entidad->save();

	    $i=0;
		$atributo = new Atributo;
		$atributo->descripcion = "BMW";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Chevrolet";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Ford";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Hyundai";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Honda";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Mazda";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Mercedes Benz";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "MINI";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Seat";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Subaru";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Toyota";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Volkswagen";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Audi";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Abat";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Acura";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Adventure";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Aerovan";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Africa";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Agrale";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Agria";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Agromaq";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Agusta";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Alfa Romeo";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Allmand";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Almahue";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Altec";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Amazone";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "American Motors";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Ammann";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Anderson Trailers";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Aprilia";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "APT";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Aqualine";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Arctic Cat";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Aro";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Artigiana";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "ASIA";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "ASTON MARTIN";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Atlas";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Atlas Copco";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "ATV";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "AUDI";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Aupa";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Austin";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Automoto";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Autorrad";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Aventura";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "BAIC";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Baja";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Bajaj";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Baldan";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Barco 20";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Barko";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Bartell";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Bashan";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Bavaria";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Bayliner";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Beiben";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Benelli";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Benford";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Benneteau";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Bentley";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Benyi";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Beta";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Bianchi";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Bimota";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "BMW";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Bobcat";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Bomag";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Bombard";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Bombardier";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Bonluck";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Brilliance";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "BRP CAN-AM";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Buggy";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Buick";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Busscar";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "BYD";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Caburga";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Cadillac";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Cagiva";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Caio";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Caky";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Can-Am";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Canoa";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Carmix";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Case";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Catalina";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Caterpillar";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "CF Moto";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Challenger";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Champion";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Changan";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "CHANGFENG";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Changlin";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Chaparral";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Cherokee";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Chery";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "CHEVORLET";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Chevrolet";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Choice";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Chris Craft";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Chrysler";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Citroen";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Claas";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Coachmen";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Cobalt";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Coleman";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Comil";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Compair";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Craftsman";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "CRG";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Cross";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Crucero";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Cukurova";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Cummins";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Curiram";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Daewoo";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Daf";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Daihatsu";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Datsun";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Dayun";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Dehler";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Demag";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Deutz-Fahr";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "DFM";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "DFSK";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Dieci";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Dimex";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Dingo";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "DKW";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Dodge";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Dongfeng";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Doosan";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Doyayama";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "DS";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Ducati";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Dufour";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Elan";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "E-One";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Euromot";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Europard";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Evinrude";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "FACCHINI";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Farmtrac";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Fassi";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Faw";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Fayser";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Feri";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Fernández";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Ferrari";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "FIAT";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Fiatallis";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Fibermold";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Fiori";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Fleewood";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Ford";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Forest River";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Foton";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Four Winns";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Freightliner";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Fruehauf";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Fullcar";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Fuso";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "GAC GONOW";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "GAC Motor";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Gama";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Gas Gas";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Gaspardo";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Geely";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Genie";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Giant";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Gilera";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Glastron";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "GMC";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Golden Dragon";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Goldini";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Goren";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Great Dane";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Great Wall";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Greenmaster";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Grove";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "GT Bicycles";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Guzzi";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Hafei";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "HAIMA";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Hamm";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Hardi";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Harley-Davidson";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Haulotte";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Haval";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Hechizo";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Heli";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Hidromek";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Higer";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Hino";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Hisun";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Hitachi";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Hodar";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Honda";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Hood";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Huanghai - SG";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Hudson";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Hummer";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Hunter";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Husaberg";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Husqvarna";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Hyosung";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Hyster";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Hyundai";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Indian";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Indusa";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Infiniti";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Ingersoll Rand";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Inrecar";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "International";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Invermoto";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Irizar";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Islander";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Isuzu";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Iveco";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Ivesa";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "JAC";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Jacto";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Jaguar";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Jayco";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "JBC";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "JCB";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Jeanneau";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Jeep";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "JF";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Jinbei";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Jinlun";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Jinma";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "JLG";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "JMC";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "John Deere";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Jorcka";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Jota Boats";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Jurmar";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Kamaz";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Kaufman";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Kawasaki";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Keeway";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Kenworth";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Kia";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "KIA MOTORS";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "King Long";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Kinlon";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Kobelco";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Komatsu";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Krone";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "KTM";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Kubota";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Kuhn";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Kvernerland";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Kymco";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Lada";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Lamborghini";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Lambretta";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Lancia";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Land Rover";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Landini";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Landwind";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Laynef";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Lely";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Lemken";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Lerpain";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Lexus";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Librelato";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Liebherr";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Lifan";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Lifeng Group";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Lihhai";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Lincoln";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Linde";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Link-Belt";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Liugong";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "LML";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Loncin";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Lonking";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Lorenzana";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Lotus";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "MacGregor";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Machile";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Mack";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Madal";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Magnum";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Mahindra";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Malbec";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Malibu";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Man";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Manitou";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Mapar";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Mapel";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Marchesan";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Marcopolo";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Mariah";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Mariner";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Mascarello";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Maschio";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Maserati";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Masmetal";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Massey ferguson";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Master Tow";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Mathews Mathews";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Company";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Maxibus";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Maxum";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Maxus";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Mazda";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "McLaren";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Mercedes-Benz";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Mercruiser";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Mercury";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Meridian";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Metalpar";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Metaltec";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "MG";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "MINI";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Mits";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Mitsubishi";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Monon";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Montenegro";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Monterrey";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Montesa";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Moto ABC";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Motoguzzi";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Motomel";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Motorhome";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Motorrad";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "MSK";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "MTD";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Multitruck";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Mussre";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Mustang";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "MV Agusta";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Nach";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "National Crane";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Nautic";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Nauticat";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "New Holland";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Nissan";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Nitro";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "NSU";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Nux";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Oday";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Oldsmobile";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Omega";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Opel";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Packard";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Palfinger";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Pandora";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Peerless";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Pegaso";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Peugeot";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "PGO";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Piaggio";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Pilot";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "PKM";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Plymouth";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "PM";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Polaris";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Pontiac";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Porsche";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Pottinger";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Pramac";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "PRENTICE";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "PROTON";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Pumar";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Putzmeister";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "PYH";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "PZ";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Quality Services Ltd";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Rabalme";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Ram";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Randon";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Range Rover";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Rauch";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Regal";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Regal Raptor";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Remolques Tapia";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Renault";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Robot";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Rochel";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Rockwood";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "ROLLS ROYCE";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Rondini";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Rotax";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Rover";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Royal Enfield";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Saab";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Sachs";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Same";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Samsung";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Sandokan";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Sandvik";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Sanlg";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Sargent Agricola";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Scania";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "SDLG";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Sea-Doo";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Sea-Ray";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "SEAT";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Semirigido";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Shacman";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Shelby";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Sherco";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Simca";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Sinotruck";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Ski-Doo";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Skoda";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Skygo";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Skyjack";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "SMA";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Smart";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "South Marine";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Spitz";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Ssangyong";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Stallion";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Stara";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Starcraft RV";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Stingray";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Strike";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "STUDEBAKER";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Subaru";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "SULKY";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Sullivan";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Sumo";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Sunlong";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Super Products";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Surco";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Suzuki";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Swan";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "SYM";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Tahoe";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Takasaki";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Tartan";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Tata";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Tatu";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "TCM";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Tecnomad";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Terex";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Tesla";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Thompson";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Thwaites";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Tiger";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "TM";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Tohatsu";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Toyota";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Trailer";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Travin";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Trayers";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Trek";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Tremac";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Triumph";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "TWG Trailer";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "United Motors";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Universal";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "URAL";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Utility";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Valfamaq";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Valmet";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Valtra";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Vento";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Vermeer";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Vespa";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Vicon";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Volare";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Volkswagen";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Volvo";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Wabash";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Wagner";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Walker Bay";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Wangye";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Westerly";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Willys";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Winnebago";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Wolken";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Wuhlmaus";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Wuzhoulong";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "XCMG";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "XINGYUE";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Xmotor";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Yale";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Yamaha";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Yanmar";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Yingang";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Yinxiang";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Yougman";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Youyi";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "YTO";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Yuejin";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Yutong";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Zastava";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Zero";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Zetor";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Zhongtong";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "ZNA";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Zodiac";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Zongshen";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Zotye";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "Zueger";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = "ZXAUTO";
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->orden = $i++;
		$atributo->save();		




        $entidad = new Entidad;
        $entidad->descripcion = 'Tipo de Carrocería';
        $entidad->tipo = 1;
        $entidad->estado= 1;
        $entidad->orden= 3;
        $entidad->save();

        $i=0;
        $atributo = new Atributo;
        $atributo->orden = $i++;
        $atributo->descripcion = "Cabina Simple";
        $atributo->entidad_id = $entidad->id;
        $atributo->estado = 1;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->orden = $i++;
        $atributo->descripcion = "Coupé";
        $atributo->entidad_id = $entidad->id;
        $atributo->estado = 1;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->orden = $i++;
        $atributo->descripcion = "Doble Cabina";
        $atributo->entidad_id = $entidad->id;
        $atributo->estado = 1;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->orden = $i++;
        $atributo->descripcion = "furgón";
        $atributo->entidad_id = $entidad->id;
        $atributo->estado = 1;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->orden = $i++;
        $atributo->descripcion = "Hatchback";
        $atributo->entidad_id = $entidad->id;
        $atributo->estado = 1;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->orden = $i++;
        $atributo->descripcion = "sedán";
        $atributo->entidad_id = $entidad->id;
        $atributo->estado = 1;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->orden = $i++;
        $atributo->descripcion = "Station Wagon";
        $atributo->entidad_id = $entidad->id;
        $atributo->estado = 1;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->orden = $i++;
        $atributo->descripcion = "SUV";
        $atributo->entidad_id = $entidad->id;
        $atributo->estado = 1;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->orden = $i++;
        $atributo->descripcion = "4x4 Comercial";
        $atributo->entidad_id = $entidad->id;
        $atributo->estado = 1;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->orden = $i++;
        $atributo->descripcion = "A motor";
        $atributo->entidad_id = $entidad->id;
        $atributo->estado = 1;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->orden = $i++;
        $atributo->descripcion = "Auto comercial";
        $atributo->entidad_id = $entidad->id;
        $atributo->estado = 1;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->orden = $i++;
        $atributo->descripcion = "BMX";
        $atributo->entidad_id = $entidad->id;
        $atributo->estado = 1;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->orden = $i++;
        $atributo->descripcion = "cabina sencilla con caja";
        $atributo->entidad_id = $entidad->id;
        $atributo->estado = 1;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->orden = $i++;
        $atributo->descripcion = "abierta";
        $atributo->entidad_id = $entidad->id;
        $atributo->estado = 1;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->orden = $i++;
        $atributo->descripcion = "Cabina Simple";
        $atributo->entidad_id = $entidad->id;
        $atributo->estado = 1;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->orden = $i++;
        $atributo->descripcion = "Cabina y media";
        $atributo->entidad_id = $entidad->id;
        $atributo->estado = 1;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->orden = $i++;
        $atributo->descripcion = "cabriolet";
        $atributo->entidad_id = $entidad->id;
        $atributo->estado = 1;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->orden = $i++;
        $atributo->descripcion = "caja abierta (pick up)";
        $atributo->entidad_id = $entidad->id;
        $atributo->estado = 1;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->orden = $i++;
        $atributo->descripcion = "Camión Plano";
        $atributo->entidad_id = $entidad->id;
        $atributo->estado = 1;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->orden = $i++;
        $atributo->descripcion = "Camión Tolva";
        $atributo->entidad_id = $entidad->id;
        $atributo->estado = 1;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->orden = $i++;
        $atributo->descripcion = "chasis cabina";
        $atributo->entidad_id = $entidad->id;
        $atributo->estado = 1;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->orden = $i++;
        $atributo->descripcion = "Chopper";
        $atributo->entidad_id = $entidad->id;
        $atributo->estado = 1;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->orden = $i++;
        $atributo->descripcion = "Citycar";
        $atributo->entidad_id = $entidad->id;
        $atributo->estado = 1;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->orden = $i++;
        $atributo->descripcion = "combi";
        $atributo->entidad_id = $entidad->id;
        $atributo->estado = 1;
        $atributo->save();

		$atributo = new Atributo;
		$atributo->orden = $i++;
        $atributo->descripcion = "comercial";
        $atributo->entidad_id = $entidad->id;
        $atributo->estado = 1;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->orden = $i++;
        $atributo->descripcion = "comercial todoterreno";
        $atributo->entidad_id = $entidad->id;
        $atributo->estado = 1;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->orden = $i++;
        $atributo->descripcion = "Convertible";
        $atributo->entidad_id = $entidad->id;
        $atributo->estado = 1;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->orden = $i++;
        $atributo->descripcion = "Coupé";
        $atributo->entidad_id = $entidad->id;
        $atributo->estado = 1;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->orden = $i++;
        $atributo->descripcion = "Custom";
        $atributo->entidad_id = $entidad->id;
        $atributo->estado = 1;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->orden = $i++;
        $atributo->descripcion = "Deportivas";
        $atributo->entidad_id = $entidad->id;
        $atributo->estado = 1;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->orden = $i++;
        $atributo->descripcion = "derivado de turismo c/caja";
        $atributo->entidad_id = $entidad->id;
        $atributo->estado = 1;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->orden = $i++;
        $atributo->descripcion = "abierta(p up)";
        $atributo->entidad_id = $entidad->id;
        $atributo->estado = 1;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->orden = $i++;
        $atributo->descripcion = "Doble Cabina";
        $atributo->entidad_id = $entidad->id;
        $atributo->estado = 1;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->orden = $i++;
        $atributo->descripcion = "doble cabina caja abierta";
        $atributo->entidad_id = $entidad->id;
        $atributo->estado = 1;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->orden = $i++;
        $atributo->descripcion = "Familiar";
        $atributo->entidad_id = $entidad->id;
        $atributo->estado = 1;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->orden = $i++;
        $atributo->descripcion = "furgón";
        $atributo->entidad_id = $entidad->id;
        $atributo->estado = 1;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->orden = $i++;
        $atributo->descripcion = "furgón con ventanas";
        $atributo->entidad_id = $entidad->id;
        $atributo->estado = 1;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->orden = $i++;
        $atributo->descripcion = "Furgón de pasajeros";
        $atributo->entidad_id = $entidad->id;
        $atributo->estado = 1;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->orden = $i++;
        $atributo->descripcion = "furgón derivado de turismo";
        $atributo->entidad_id = $entidad->id;
        $atributo->estado = 1;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->orden = $i++;
        $atributo->descripcion = "furgon gran capacidad";
        $atributo->entidad_id = $entidad->id;
        $atributo->estado = 1;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->orden = $i++;
        $atributo->descripcion = "(capitone)";
        $atributo->entidad_id = $entidad->id;
        $atributo->estado = 1;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->orden = $i++;
        $atributo->descripcion = "Furgonado";
        $atributo->entidad_id = $entidad->id;
        $atributo->estado = 1;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->orden = $i++;
        $atributo->descripcion = "Hatchback";
        $atributo->entidad_id = $entidad->id;
        $atributo->estado = 1;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->orden = $i++;
        $atributo->descripcion = "Media Barandas";
        $atributo->entidad_id = $entidad->id;
        $atributo->estado = 1;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->orden = $i++;
        $atributo->descripcion = "Mini MPV";
        $atributo->entidad_id = $entidad->id;
        $atributo->estado = 1;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->orden = $i++;
        $atributo->descripcion = "miniauto";
        $atributo->entidad_id = $entidad->id;
        $atributo->estado = 1;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->orden = $i++;
        $atributo->descripcion = "minibus";
        $atributo->entidad_id = $entidad->id;
        $atributo->estado = 1;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->orden = $i++;
        $atributo->descripcion = "Minivan";
        $atributo->entidad_id = $entidad->id;
        $atributo->estado = 1;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->orden = $i++;
        $atributo->descripcion = "Monovolumen";
        $atributo->entidad_id = $entidad->id;
        $atributo->estado = 1;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->orden = $i++;
        $atributo->descripcion = "monovolumen pequeno";
        $atributo->entidad_id = $entidad->id;
        $atributo->estado = 1;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->orden = $i++;
        $atributo->descripcion = "Pick up";
        $atributo->entidad_id = $entidad->id;
        $atributo->estado = 1;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->orden = $i++;
        $atributo->descripcion = "Plegables";
        $atributo->entidad_id = $entidad->id;
        $atributo->estado = 1;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->orden = $i++;
        $atributo->descripcion = "Racing";
        $atributo->entidad_id = $entidad->id;
        $atributo->estado = 1;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->orden = $i++;
        $atributo->descripcion = "Retro";
        $atributo->entidad_id = $entidad->id;
        $atributo->estado = 1;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->orden = $i++;
        $atributo->descripcion = "roadster";
        $atributo->entidad_id = $entidad->id;
        $atributo->estado = 1;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->orden = $i++;
        $atributo->descripcion = "sedán";
        $atributo->entidad_id = $entidad->id;
        $atributo->estado = 1;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->orden = $i++;
        $atributo->descripcion = "sedan techo duro";
        $atributo->entidad_id = $entidad->id;
        $atributo->estado = 1;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->orden = $i++;
        $atributo->descripcion = "Sin carroceria";
        $atributo->entidad_id = $entidad->id;
        $atributo->estado = 1;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->orden = $i++;
        $atributo->descripcion = "Sport calle urbanas";
        $atributo->entidad_id = $entidad->id;
        $atributo->estado = 1;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->orden = $i++;
        $atributo->descripcion = "Station Wagon";
        $atributo->entidad_id = $entidad->id;
        $atributo->estado = 1;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->orden = $i++;
        $atributo->descripcion = "SUV";
        $atributo->entidad_id = $entidad->id;
        $atributo->estado = 1;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->orden = $i++;
        $atributo->descripcion = "targa";
        $atributo->entidad_id = $entidad->id;
        $atributo->estado = 1;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->orden = $i++;
        $atributo->descripcion = "Todo terrenos";
        $atributo->entidad_id = $entidad->id;
        $atributo->estado = 1;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->orden = $i++;
        $atributo->descripcion = "Trabajo calle";
        $atributo->entidad_id = $entidad->id;
        $atributo->estado = 1;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->orden = $i++;
        $atributo->descripcion = "Tracto Camión";
        $atributo->entidad_id = $entidad->id;
        $atributo->estado = 1;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->orden = $i++;
        $atributo->descripcion = "Turismo crucero";
        $atributo->entidad_id = $entidad->id;
        $atributo->estado = 1;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->orden = $i++;
        $atributo->descripcion = "Urbana";
        $atributo->entidad_id = $entidad->id;
        $atributo->estado = 1;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->orden = $i++;
        $atributo->descripcion = "Van";
        $atributo->entidad_id = $entidad->id;
        $atributo->estado = 1;
        $atributo->save();


        $entidad = new Entidad;
        $entidad->descripcion = 'Transmisión';
        $entidad->tipo = 1;
        $entidad->estado= 1;
        $entidad->orden= 4;
        $entidad->save();

        $i=0;
        $atributo = new Atributo;
        $atributo->orden = $i++;
        $atributo->descripcion = "Automatico";
        $atributo->entidad_id = $entidad->id;
        $atributo->estado = 1;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->orden = $i++;
        $atributo->descripcion = "Manual";
        $atributo->entidad_id = $entidad->id;
        $atributo->estado = 1;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->orden = $i++;
        $atributo->descripcion = "N";
        $atributo->entidad_id = $entidad->id;
        $atributo->estado = 1;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->orden = $i++;
        $atributo->descripcion = "S";
        $atributo->entidad_id = $entidad->id;
        $atributo->estado = 1;
        $atributo->save();

        $entidad = new Entidad;
        $entidad->descripcion = 'Combustible';
        $entidad->tipo = 1;
        $entidad->estado= 1;
        $entidad->orden= 5;
        $entidad->save();

        $i=0;
        $atributo = new Atributo;
        $atributo->orden = $i++;
        $atributo->descripcion = "Bencina";
        $atributo->entidad_id = $entidad->id;
        $atributo->estado = 1;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->orden = $i++;
        $atributo->descripcion = "Diesel (petróleo)";
        $atributo->entidad_id = $entidad->id;
        $atributo->estado = 1;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->orden = $i++;
        $atributo->descripcion = "Elétrico";
        $atributo->entidad_id = $entidad->id;
        $atributo->estado = 1;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->orden = $i++;
        $atributo->descripcion = "Gas";
        $atributo->entidad_id = $entidad->id;
        $atributo->estado = 1;
        $atributo->save();


        $atributo = new Atributo;
        $atributo->orden = $i++;
        $atributo->descripcion = "Hibrido";
        $atributo->entidad_id = $entidad->id;
        $atributo->estado = 1;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->orden = $i++;
        $atributo->descripcion = "Otro";
        $atributo->entidad_id = $entidad->id;
        $atributo->estado = 1;
        $atributo->save();


        $entidad = new Entidad;
        $entidad->descripcion = 'Tracción';
        $entidad->tipo = 1;
        $entidad->estado= 1;
        $entidad->orden= 6;
        $entidad->save();

        $i=0;
        $atributo = new Atributo;
        $atributo->orden = $i++;
        $atributo->descripcion = "Integral";
        $atributo->entidad_id = $entidad->id;
        $atributo->estado = 1;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->orden = $i++;
        $atributo->descripcion = "4x4";
        $atributo->entidad_id = $entidad->id;
        $atributo->estado = 1;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->orden = $i++;
        $atributo->descripcion = "Trasera";
        $atributo->entidad_id = $entidad->id;
        $atributo->estado = 1;
        $atributo->save();

        $atributo = new Atributo;
        $atributo->orden = $i++;
        $atributo->descripcion = "Delantera";
        $atributo->entidad_id = $entidad->id;
        $atributo->estado = 1;
        $atributo->save();


        $atributo = new Atributo;
        $atributo->orden = $i++;
        $atributo->descripcion = "Otra";
        $atributo->entidad_id = $entidad->id;
        $atributo->estado = 1;
        $atributo->save();

        $entidad = new Entidad;
        $entidad->descripcion = 'Carrocería';
        $entidad->tipo = 1;
        $entidad->estado= 1;
        $entidad->orden= 7;
        $entidad->save();

        $i=0;
        $atributo = new Atributo;
		$atributo->descripcion = 'Amortiguador Capot';
		$atributo->orden = $i++;
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = 'Amortiguador Maleta';
		$atributo->orden = $i++;
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = 'Bisagras Tapa Bencina';
		$atributo->orden = $i++;
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = 'Bisel Foco Mayor';
		$atributo->orden = $i++;
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = 'Bombas Lavafaros';
		$atributo->orden = $i++;
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = 'Bombas Lavaparabrisas';
		$atributo->orden = $i++;
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = 'Broches Plásticos';
		$atributo->orden = $i++;
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = 'Capot';
		$atributo->orden = $i++;
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = 'Corner Parachoques';
		$atributo->orden = $i++;
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = 'Cremalleras de Puertas';
		$atributo->orden = $i++;
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = 'Cromados Parachoques';
		$atributo->orden = $i++;
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = 'Frontales';
		$atributo->orden = $i++;
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = 'Mascaras';
		$atributo->orden = $i++;
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = 'Molduras';
		$atributo->orden = $i++;
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = 'Parabrisas';
		$atributo->orden = $i++;
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = 'Parachoques';
		$atributo->orden = $i++;
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = 'Plumillas';
		$atributo->orden = $i++;
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = 'Porta patente';
		$atributo->orden = $i++;
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = 'Soportes Escape';
		$atributo->orden = $i++;
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = 'Soportes Parachoque';
		$atributo->orden = $i++;
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = 'Tapabarros';
		$atributo->orden = $i++;
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = 'Tapas Neblineros';
		$atributo->orden = $i++;
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = 'Tapas Remolque';
		$atributo->orden = $i++;
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = 'Vidrios de Puertas';
		$atributo->orden = $i++;
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->save();

        $entidad = new Entidad;
        $entidad->descripcion = 'Dirección';
        $entidad->tipo = 1;
        $entidad->estado= 1;
        $entidad->orden= 8;
        $entidad->save();

        $i = 0;
        $atributo = new Atributo;
		$atributo->descripcion = 'Barras de Dirección';
		$atributo->orden = $i++;
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = 'Bieletas de Dirección';
		$atributo->orden = $i++;
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = 'Fuelles Homocineticas';
		$atributo->orden = $i++;
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = 'Terminales de Dirección';
		$atributo->orden = $i++;
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->save();

        $entidad = new Entidad;
        $entidad->descripcion = 'Eléctricos';
        $entidad->tipo = 1;
        $entidad->estado= 1;
        $entidad->orden= 9;
        $entidad->save();

        $i = 0;
        $atributo = new Atributo;
		$atributo->descripcion = 'Ampolletas';
		$atributo->orden = $i++;
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = 'Baterías';
		$atributo->orden = $i++;
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = 'Bulbo de Temperatura';
		$atributo->orden = $i++;
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = 'Bulbo Presión Aceite';
		$atributo->orden = $i++;
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = 'Fusibles';
		$atributo->orden = $i++;
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = 'Interruptor Alza Vidrios';
		$atributo->orden = $i++;
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = 'Interruptor Nivel agua';
		$atributo->orden = $i++;
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = 'Potenciometros';
		$atributo->orden = $i++;
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = 'Relay';
		$atributo->orden = $i++;
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = 'Resistencia Ventilador';
		$atributo->orden = $i++;
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = 'Sonda Lambda';
		$atributo->orden = $i++;
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->save();

        $entidad = new Entidad;
        $entidad->descripcion = 'Frenos';
        $entidad->tipo = 1;
        $entidad->estado= 1;
        $entidad->orden= 10;
        $entidad->save();

        $i = 0;
        $atributo = new Atributo;
		$atributo->descripcion = 'Disco de Frenos';
		$atributo->orden = $i++;
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = 'Pastillas de Freno';
		$atributo->orden = $i++;
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = 'Sensores de Freno';
		$atributo->orden = $i++;
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = 'Switch de Frenos';
		$atributo->orden = $i++;
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->save();

        $entidad = new Entidad;
        $entidad->descripcion = 'Motor';
        $entidad->tipo = 1;
        $entidad->estado= 1;
        $entidad->orden= 11;
        $entidad->save();

        $i = 0;
        $atributo = new Atributo;
		$atributo->descripcion = 'Acople de Ventilador';
		$atributo->orden = $i++;
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = 'Aspa Ventilador';
		$atributo->orden = $i++;
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = 'Bombas de Agua';
		$atributo->orden = $i++;
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = 'Bombas de Bencina';
		$atributo->orden = $i++;
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = 'Bujias';
		$atributo->orden = $i++;
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = 'Cables Encendido';
		$atributo->orden = $i++;
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = 'Cadena Distribución';
		$atributo->orden = $i++;
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = 'Cajas Termostato';
		$atributo->orden = $i++;
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = 'Correas Alternador';
		$atributo->orden = $i++;
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = 'Correas Bomba de Agua';
		$atributo->orden = $i++;
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = 'Correas Compresor';
		$atributo->orden = $i++;
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = 'Correas Distribución';
		$atributo->orden = $i++;
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = 'Distribución Motor';
		$atributo->orden = $i++;
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = 'Empaquetaduras';
		$atributo->orden = $i++;
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = 'Encendido';
		$atributo->orden = $i++;
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = 'Filtros Aire Acondicionado';
		$atributo->orden = $i++;
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = 'Filtros de Aceite';
		$atributo->orden = $i++;
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = 'Filtros de Aire';
		$atributo->orden = $i++;
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = 'Filtros de Combustible';
		$atributo->orden = $i++;
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = 'Mangueras de';
		$atributo->orden = $i++;
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = 'Mangueras de Motor';
		$atributo->orden = $i++;
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = 'Mangueras de Radiador';
		$atributo->orden = $i++;
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = 'Mangueras de Termostato';
		$atributo->orden = $i++;
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = 'Microfiltros';
		$atributo->orden = $i++;
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = 'Radiadores';
		$atributo->orden = $i++;
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = 'Refrigeración';
		$atributo->orden = $i++;
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = 'Sensor Aceite';
		$atributo->orden = $i++;
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = 'Sensor Cigüeñal';
		$atributo->orden = $i++;
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = 'Sensor Eje Levas';
		$atributo->orden = $i++;
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = 'Sensor Nivel Radiador';
		$atributo->orden = $i++;
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = 'Sensor Temperatura';
		$atributo->orden = $i++;
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = 'Soportes Radiador';
		$atributo->orden = $i++;
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = 'Tapa Termostato';
		$atributo->orden = $i++;
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = 'Tapas de Aceite';
		$atributo->orden = $i++;
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = 'Tapas de Radiador';
		$atributo->orden = $i++;
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = 'Tapon Carter';
		$atributo->orden = $i++;
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = 'Termostatos';
		$atributo->orden = $i++;
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = 'Ventilador Aire Acondicionado';
		$atributo->orden = $i++;
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = 'Ventilador Motor';
		$atributo->orden = $i++;
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->save();

        $entidad = new Entidad;
        $entidad->descripcion = 'Suspención';
        $entidad->tipo = 1;
        $entidad->estado= 1;
        $entidad->orden= 12;
        $entidad->save();

		$i = 0;
		$atributo = new Atributo;
		$atributo->descripcion = 'Amortiguadores';
		$atributo->orden = $i++;
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = 'Bieletas de Suspensión';
		$atributo->orden = $i++;
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = 'Brazos de Suspensión';
		$atributo->orden = $i++;
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = 'Bujes Bandejas';
		$atributo->orden = $i++;
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = 'Bujes Hidrolager';
		$atributo->orden = $i++;
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = 'Cazoletas de Suspensión';
		$atributo->orden = $i++;
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->save();

		$atributo = new Atributo;
		$atributo->descripcion = 'Rodamientos';
		$atributo->orden = $i++;
		$atributo->estado = 1;
		$atributo->entidad_id = $entidad->id;
		$atributo->save();

    }
}
