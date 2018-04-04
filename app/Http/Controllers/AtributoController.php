<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Atributo;
use App\Entidad;

class AtributoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display the template.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entidadesPadre = Entidad::orderBy('orden')->get();
        return view('admin.atributos.index')->with(compact('entidadesPadre'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get(Request $request)
    {
        //
        $entidades = Entidad::orderBy('orden')->with('atributos')->paginate(5);
        return $entidades->toJson();
    }

    public function atributos($id)
    {
      $atributos = Atributo::orderBy('orden')->where('entidad_id',$id)->get();
      return $atributos->toJson();
    }

    public function obtenerAtributos($id)
    {

      $atributos = Atributo::orderBy('orden')->where('entidad_id',$id)->with('atributo_padre')->with('atributo_padre.entidad')->paginate(5);
      return $atributos->toJson();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->id == 0) {
            $entidad = new Entidad;
        } else {
            $entidad = Entidad::findOrFail($request->id);
        }
        $entidad->fill($request->all());
        $entidad->save();
        $entidades = Entidad::orderBy('orden')->with('atributos')->paginate(5);
        return $entidades->toJson();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_atributo(Request $request)
    {
        if ($request->id == 0) {
            $atributo = new Atributo;
        } else {
            $atributo = Atributo::findOrFail($request->id);
        }
        $atributo->fill($request->all());
        $atributo->save();
        $atributos = Atributo::orderBy('orden')->where('entidad_id',$atributo->entidad_id)->with('atributo_padre')->with('atributo_padre.entidad')->paginate(5);
        return $atributos->toJson();

    }

/**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $entidad = Entidad::findOrFail($request->id);
        $entidad->delete();
        $entidades = Entidad::orderBy('orden')->with('atributos')->paginate(5);
        return $entidades->toJson();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy_atributo(Request $request)
    {
        $atributo = Atributo::findOrFail($request->id);
        $entidad_id = $atributo->entidad_id;
        $atributo->delete();
        $atributos = Atributo::orderBy('orden')->where('entidad_id',$entidad_id)->with('atributo_padre')->with('atributo_padre.entidad')->paginate(5);
        return $atributos->toJson();
    }
}
