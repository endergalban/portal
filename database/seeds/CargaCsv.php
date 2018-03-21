<?php

use Illuminate\Database\Seeder;
use App\Atributo;
use App\Entidad;

class CargaCsv extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $líneas = file(database_path().'/seeds/data.csv');
      // Recorrer nuestro array, mostrar el código fuente HTML como tal y mostrar tambíen los números de línea./usr/share/nginx/html/portal/database/seeds/data.csv
      $marca = new Entidad;
      $marca->descripcion = 'Marca';
      $marca->tipo = 1;
      $marca->estado = 1;
      $marca->orden = 2;
      $marca->save();
      $modeloContador = 1;
      $marcaContador = 1;
      $auxMarca = '';
      $auxModelo = '';
      foreach ($líneas as $num_línea => $línea) {

          $arrayItems = explode(';',htmlspecialchars($línea));
          if ($auxModelo != $arrayItems[0]) {
            $auxModelo = $arrayItems[0];
            $atributo = new Atributo;
            $atributo->descripcion = $auxModelo;
            $atributo->estado = 1;
            $atributo->entidad_id = $marca->id;
            $atributo->orden = $modeloContador++;
            $atributo->save();
          }

          if ($auxMarca != $arrayItems[1]) {
            $auxMarca = $arrayItems[1];
            $atributo = new Atributo;
            $atributo->descripcion = $auxMarca;
            $atributo->estado = 1;
            $atributo->entidad_id = $marca->id;
            $atributo->orden = $marcaContador++;
            $atributo->save();
          }

      }
    }
}
