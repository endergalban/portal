<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publicacion;
use App\Comentario;
use App\Producto;
use App\Atributo;
use App\Compra;
use Validator;
use Carbon\Carbon;
use DB;

class PublicacionController extends Controller
{

    public function dashboard(){

      $marcas = Atributo::where('entidad_id',2)->get();
    	$regiones = Atributo::where('entidad_id',1)->get();
    	$tipos = Atributo::where('entidad_id',3)->get();
    	$combustible = Atributo::where('entidad_id',5)->get();
    	$trasmision = Atributo::where('entidad_id',4)->get();
      $anios = Atributo::where('entidad_id',13)->get();
      $kilometrajes = Atributo::where('entidad_id',14)->get();
      $now = Carbon::parse(Carbon::now()->format('Y-m-d  h:i:s A'));
    	$publicaciones =  Publicacion::where('estado','=',1)->where('cantidad','>',0)
            ->with(['user'])
            ->with(['producto'])
            ->with(['atributos.entidad'])
            ->with(['imagenes'])
            ->limit(4)
            ->get();
      return view('welcome')->with(compact('regiones','marcas','tipos','combustible','trasmision','kilometrajes','anios','publicaciones','now'));
    }
    public function index(Request $request)
    {
        $publicaciones = Publicacion::where('estado','=',1)
        ->buscar($request)
        ->with(['user'])
        ->with(['producto'])
        ->with(['atributos.entidad'])
        ->with(['imagenes'])
        ->get();
        $now = Carbon::parse(Carbon::now()->format('Y-m-d  h:i:s A'));
        return view('publicaciones.publicaciones', compact('publicaciones','now'));
    }

    public function details($id)
    {
        $publicacion = Publicacion::
        with('producto')
        ->with('comentarios')
        ->find($id);
        $producto = Producto::find($publicacion->producto_id)->first();
        return view('publicaciones.producto', compact('publicacion','producto'));
    }

}
