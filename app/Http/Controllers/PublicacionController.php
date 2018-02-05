<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publicacion;
use App\Comentario;
use App\Producto;
use Validator;
use Carbon\Carbon;

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
        $publicaciones = Publicacion::all();
        $now = Carbon::parse(Carbon::now()->format('Y-m-d  h:i:s A'));
        return view('publicaciones.publicaciones', compact('publicaciones','now'));
    }

    public function details($id)
    {
        $publicacion = Publicacion::find($id);
        $comentarios = Comentario::where('publicacion_id',$id)->get();
        $producto = Producto::find($publicacion->producto_id)->first();
       //dd($producto);
        return view('publicaciones.producto', compact('publicacion','comentarios','producto'));
    }

}
