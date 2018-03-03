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
        return view('admin.atributos.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get(Request $request)
    {
        //
        $entidades = Entidad::orderBy('orden')->with('atributos')->paginate();
        return $entidades->toJson();
    }

    public function obtenerAtributos($id)
    {
      $atributos = Atributo::orderBy('orden')->where('entidad_id',$id)->paginate();
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
        $entidades = Entidad::orderBy('orden')->with('atributos')->paginate();
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
        $atributos = Atributo::orderBy('orden')->where('entidad_id',$atributo->entidad_id)->paginate();
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
        $entidades = Entidad::orderBy('orden')->with('atributos')->paginate();
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
        $atributos = Atributo::orderBy('orden')->where('entidad_id',$entidad_id)->paginate();
        return $atributos->toJson();
    }
}
