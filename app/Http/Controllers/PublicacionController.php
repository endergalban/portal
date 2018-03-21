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

        $marcas = Atributo::where('entidad_id',14)->get();
        $modelos = Atributo::where('entidad_id',15)->get();
    	$regiones = Atributo::where('entidad_id',13)->get();
    	$tipos = Atributo::where('entidad_id',1)->get();
    	$combustible = Atributo::where('entidad_id',3)->get();
    	$trasmision = Atributo::where('entidad_id',2)->get();
        $anios = Atributo::where('entidad_id',11)->get();
        $kilometrajes = Atributo::where('entidad_id',12)->get();
        $now = Carbon::parse(Carbon::now()->format('Y-m-d  h:i:s A'));
    	$publicaciones =  Publicacion::where('estado','=',1)->where('cantidad','>',0)
            ->with(['user'])
            ->with(['producto'])
            ->with(['atributos.entidad'])
            ->with(['imagenes'])
            ->limit(6)
            ->get();
      return view('welcome')->with(compact('regiones','marcas','tipos','combustible','trasmision','anios','kilometrajes','publicaciones','now','modelos'));
    }
    public function index(Request $request)
    {
        $marcas = Atributo::where('entidad_id',14)->get();
        $modelos = Atributo::where('entidad_id',15)->get();
        $regiones = Atributo::where('entidad_id',13)->get();
        $tipos = Atributo::where('entidad_id',1)->get();
        $combustible = Atributo::where('entidad_id',3)->get();
        $trasmision = Atributo::where('entidad_id',2)->get();
        $anios = Atributo::where('entidad_id',11)->get();
        $kilometrajes = Atributo::where('entidad_id',12)->get();
        $now = Carbon::parse(Carbon::now()->format('Y-m-d  h:i:s A'));

        $publicaciones = Publicacion::where('estado','=',1)
        ->buscar($request)
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
