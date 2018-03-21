<?php

use Illuminate\Database\Seeder;
use App\Atributo;
use App\Entidad;
use App\Producto;
use Illuminate\Support\Facades\DB;
class CargaCsv extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $líneas = file(database_path().'/seeds/data2.csv');

      $producto = new Producto;
      $producto->descripcion = 'Vehiculo';
      $producto->estado = 1;
      $producto->save();

      $marca = new Entidad;
      $marca->descripcion = 'Marca';
      $marca->tipo = 1;
      $marca->estado = 1;
      $marca->orden = 2;
      $marca->save();

      $modelo = new Entidad;
      $modelo->descripcion = 'Modelo';
      $modelo->tipo = 1;
      $modelo->estado = 1;
      $modelo->orden = 3;
      $modelo->save();

      $modeloContador = 1;
      $marcaContador = 1;
      $auxMarca = '';
      $auxModelo = '';
      foreach ($líneas as $num_línea => $línea) {

          $arrayItems = explode(';',htmlspecialchars($línea));
          $auxMarca = trim($arrayItems[0]);
          $marcaAtributo = Atributo::where('descripcion',$auxMarca)->first();
          if (! $marcaAtributo) {
              $marcaAtributo = new Atributo;
              $marcaAtributo->descripcion = $auxMarca;
              $marcaAtributo->estado = 1;
              $marcaAtributo->entidad_id = $marca->id;
              $marcaAtributo->orden = $marcaContador++;
              $marcaAtributo->save();
          }


            $auxModelo = trim($arrayItems[1]);
            $modeloAtributo = Atributo::where('descripcion',$auxModelo)->first();
            if (! $modeloAtributo) {
                $modeloAtributo = new Atributo;
                $modeloAtributo->descripcion = $auxModelo;
                $modeloAtributo->estado = 1;
                $modeloAtributo->entidad_id = $modelo->id;
                $modeloAtributo->orden = $modeloContador++;
                $modeloAtributo->save();
            }
            if (! DB::table('atributo_productos')->where('atributo_id', $marcaAtributo->id)->select('id')->first()) {
                DB::table('atributo_productos')->insert(['atributo_id' => $marcaAtributo->id,'producto_id' =>$producto->id]);
            }

            if (! DB::table('atributo_productos')->where('atributo_id', $modeloAtributo->id)->select('id')->first()) {
                DB::table('atributo_productos')->insert(['atributo_id' => $modeloAtributo->id,'producto_id' =>$producto->id, 'padre'=>$marcaAtributo->id]);
            }
            $arrayAnios = explode('|',htmlspecialchars($arrayItems[5]));
            foreach ($arrayAnios as $key => $anio) {
                $anioAtributo = Atributo::where('descripcion',trim($anio))->first();
                if($anioAtributo){
                    DB::table('atributo_productos')->insert(['atributo_id' => $anioAtributo->id,'producto_id' =>$producto->id, 'padre'=>$modeloAtributo->id]);
                }
            }
      }
    }
}
