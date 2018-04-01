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
        $entidad->descripcion = 'tranmision';
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
        $entidad->descripcion = 'combustible';
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
        $entidad->descripcion = 'traccion';
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
        $entidad->descripcion = 'carroceria';
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
        $entidad->descripcion = 'direccion';
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
        $entidad->descripcion = 'electrico';
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
        $entidad->descripcion = 'freno';
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
        $entidad->descripcion = 'motor';
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
        $entidad->descripcion = 'suspencion';
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

    $entidad = new Entidad;
    $entidad->descripcion = 'anio';
    $entidad->tipo = 1;
    $entidad->estado= 1;
    $entidad->orden= 13;
    $entidad->save();

    for ($i = 1920; $i < (date('Y')+1); $i++) {
      $atributo = new Atributo;
      $atributo->descripcion = $i;
      $atributo->orden = $i;
      $atributo->estado = 1;
      $atributo->entidad_id = $entidad->id;
      $atributo->save();
    }
    $entidad = new Entidad;
    $entidad->descripcion = 'kilometraje';
    $entidad->tipo = 1;
    $entidad->estado= 1;
    $entidad->orden= 14;
    $entidad->save();

    for ($i = 0; $i < 400001; $i=$i+10000) {
      $atributo = new Atributo;
      $atributo->descripcion = $i;
      $atributo->orden = $i;
      $atributo->estado = 1;
      $atributo->entidad_id = $entidad->id;
      $atributo->save();
    }


    }
}
