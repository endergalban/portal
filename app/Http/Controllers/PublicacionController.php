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

      $marcas = Atributo::whereHas('entidad', function($q) {
          $q->where('descripcion','marca');
        })->get();
      $modelos = Atributo::whereHas('entidad', function($q) {
          $q->where('descripcion','modelo');
        })->get();
      $anios = Atributo::whereHas('entidad', function($q) {
          $q->where('descripcion','anio');
        })->get();
    	$regiones = Atributo::whereHas('entidad', function($q) {
          $q->where('descripcion','region');
        })->get();
    	$tipos = Atributo::whereHas('entidad', function($q) {
          $q->where('descripcion','carroceria');
        })->get();
    	$combustible = Atributo::whereHas('entidad', function($q) {
          $q->where('descripcion','combustible');
        })->get();
    	$trasmision = Atributo::whereHas('entidad', function($q) {
          $q->where('descripcion','transmision');
        })->get();
      $kilometrajes = Atributo::whereHas('entidad', function($q) {
          $q->where('descripcion','kilometraje');
        })->get();
      $now = Carbon::parse(Carbon::now()->format('Y-m-d  h:i:s A'));
    	$publicaciones =  Publicacion::where('estado','=',1)
            ->has('producto')
            ->has('imagenes')
            ->where('cantidad','>',0)
            ->with(['user'])
            ->with(['producto'])
            ->with(['atributos.entidad'])
            ->with(['imagenes'])
            ->limit(24)
            ->get();
      return view('welcome')->with(compact('regiones','marcas','tipos','combustible','trasmision','anios','kilometrajes','publicaciones','now','modelos'));
    }

    public function index(Request $request)
    {
      $marcas = Atributo::whereHas('entidad', function($q) {
          $q->where('descripcion','marca');
        })->get();
      $modelos = Atributo::whereHas('entidad', function($q) {
          $q->where('descripcion','modelo');
        })->get();
      $anios = Atributo::whereHas('entidad', function($q) {
          $q->where('descripcion','anio');
        })->get();
      $regiones = Atributo::whereHas('entidad', function($q) {
          $q->where('descripcion','region');
        })->get();
      $tipos = Atributo::whereHas('entidad', function($q) {
          $q->where('descripcion','carroceria');
        })->get();
      $combustible = Atributo::whereHas('entidad', function($q) {
          $q->where('descripcion','combustible');
        })->get();
      $trasmision = Atributo::whereHas('entidad', function($q) {
          $q->where('descripcion','transmision');
        })->get();
      $kilometrajes = Atributo::whereHas('entidad', function($q) {
          $q->where('descripcion','kilometraje');
        })->get();
        $now = Carbon::parse(Carbon::now()->format('Y-m-d  h:i:s A'));

        $publicaciones = Publicacion::where('estado','=',1)
        ->has('producto')
        ->buscar($request)
        ->orderBy('id','desc')
        ->with(['user'])
        ->with(['producto'])
        ->with(['atributos.entidad'])
        ->with(['imagenes'])
        ->paginate(12);
        $now = Carbon::parse(Carbon::now()->format('Y-m-d  h:i:s A'));
        return view('publicaciones.publicaciones', compact('regiones','marcas','tipos','combustible','trasmision','kilometrajes','anios','publicaciones','now','modelos'));
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
