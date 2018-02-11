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
    /*public function __construct()
    {
        $this->middleware('auth');
    }
     public function __construct()
    {
        $this->middleware('guest');
    }*/
    /**
     * Display the template.
     *
     * @return \Illuminate\Http\Response

     */
    public function index()
    {
        $publicaciones = Publicacion::where('estado','=',1)->with(['producto'])->get();
        $now = Carbon::parse(Carbon::now()->format('Y-m-d  h:i:s A'));
        
           /* $entidades = DB::table('atributo_productos')
            ->join('atributos','atributos.id','=','atributo_productos.atributo_id')
            ->join('entidades','entidades.id','=','atributos.entidad_id')
            ->where('atributo_productos.producto_id','=',1)
            ->select('entidades.descripcion')
            ->get();
dd($entidades);*/
        foreach ($publicaciones as $publicacion) {

            $entidades = DB::table('atributo_productos')
            ->join('atributos','atributos.id','=','atributo_productos.atributo_id')
            ->join('entidades','entidades.id','=','atributos.entidad_id')
            ->where('atributo_productos.producto_id','=',$publicacion->producto_id)
            ->select('entidades.descripcion')
            ->get();

            $publicacion->entidades = $entidades;

            $compras = DB::table('compras')->groupBy('publicacion_id')
                ->select(DB::raw('SUM(cantidad) as cantidad'))
                ->where('publicacion_id','=',$publicacion->id)->first();
            if(!is_null($compras)) {

            $publicacion->cantidad = $publicacion->cantidad - $compras->cantidad;
            }
        }
           // dd($publicaciones);
            //dd($publicaciones);

        return view('publicaciones.publicaciones', compact('publicaciones','now'));
    }

    public function details($id)
    {
        $publicacion = Publicacion::find($id);
        $comentarios = Comentario::where('publicacion_id',$id)->get();
        $producto = Producto::find($publicacion->producto_id)->first();
        $entidades = DB::table('atributo_productos')
            ->join('atributos','atributos.id','=','atributo_productos.atributo_id')
            ->join('entidades','entidades.id','=','atributos.entidad_id')
            ->where('atributo_productos.producto_id','=',$producto->id)
            ->select('entidades.descripcion')
            ->get();  
     
      // dd($entidades);
        return view('publicaciones.producto', compact('publicacion','comentarios','producto','entidades'));
    }

}
