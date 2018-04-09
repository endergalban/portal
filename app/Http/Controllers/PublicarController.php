<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Entidad;
use App\Producto;
use App\Publicacion;
use App\AtributoProducto;
use App\PublicacionImagen;
use App\Asistencia;
use App\Atributo;
use Validator;
use Auth;
use Carbon\Carbon;
use DB;
use Storage;

class PublicarController extends Controller
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
    public function index(Request $request)
    {

        $productos = Producto::activo()
        ->has('atributos.entidad')->get();
        return view('publicaciones.publicar')->with(compact('productos'));
    }

    public function obtener($id){
      $entidades = Entidad::activo()
      ->whereHas('atributos.productos',function($q) use ($id) {
        $q->where('productos.id',$id);
      })->with(['atributos' => function ($q) use ($id){
        $q->activo()->whereHas('productos', function($q) use ($id){
          $q->where('productos.id',$id);
        });
      }])->get();

      return $entidades;
    }

    public function asistencia(Request $request)
    {
        $asistencias = Asistencia::buscar($request)->where('user_id',Auth::user()->id)
        ->with('publicaciones.producto')
        ->orderBy('id','DESC')
        ->paginate();

        return view('asistencias.index')->with(compact('asistencias'));
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function storepieza(Request $request)
    {

      $data = json_decode($request->data);
      $producto = Producto::where('descripcion','=','pieza')->firstOrFail();
      foreach ($data as $key => $value) {
        # code...
        $publicacion = new Publicacion;
        $publicacion->titulo = $value->descripcion;
        $publicacion->descripcion = $value->observacion;
        $publicacion->monto = $value->monto;
        $publicacion->estado =1;
        $publicacion->cantidad =1;
        $publicacion->producto_id = $producto->id;
        $publicacion->user_id = Auth::user()->id;
        $publicacion->save();

        $arrayData = $value->lado;
        $arrayData[] = $value->estado;
        $arrayData[] = $value->modelo_id;
        $arrayData[] = $value->marca_id;
        $arrayData[] = $value->anio_id;
        $arrayData[] = $value->region_id;
        $arrayData[] = $value->carroceria_id;
        $publicacion->atributos()->sync($arrayData);

      }
      return 0;
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
          'producto_id' => 'required|integer|exists:productos,id',
          'descripcion' => 'required|string|max:5000',
          'titulo' => 'required|string|max:5000',
          'monto' => 'required|numeric',
          'placa' => 'required|string|max:8',
          ]);
        if ($validator->fails()) {
          return response()->json(['errors'=>$validator->errors()->all()]);
        }
        if ($request->publicacion_id == 0) {
            $publicacion = new Publicacion;
            $msj="0";
        } else {
            $msj="1";
        }
        $publicacion->fill(array_add($request->all(),'user_id', Auth::user()->id));
        $publicacion->save();
        if($request->asistencia_id) {
            DB::table('asistencia_publicacion')->insert([
                'asistencia_id' => $request->asistencia_id,
                'publicacion_id' => $publicacion->id
                ]);
        }
        if($request->imagenes) {
          foreach ($request->imagenes as $key => $image) {
            $imagen = Storage::disk('public')->put($publicacion->id, $image);
            $publicacionImagen = new PublicacionImagen;
            $publicacionImagen->ruta = $imagen;
            $publicacionImagen->publicacion_id = $publicacion->id;
            $publicacionImagen->estado = 1;
            $publicacionImagen->save();
          }
        }
        if($request->atributos) {

            $atributosData = explode(',',$request->atributos);
            $publicacion->atributos()->sync($atributosData);
        }

        return json_encode($msj);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $publicacion = Publicacion::findOrFail($request->id);
        $publicacion->delete();
        return 'ok';

    }


    public function update(Request $request)
    {
        $publicacion = Publicacion::findOrFail($request->id);
        $publicacion->fill($request->all());
        $publicacion->save();
        return 'ok';

    }


    /**ión
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_asistencia(Request $request)
    {
        Validator::make($request->all(), [
          'descripcion' => 'required|string|max:5000',
        ])->validate();
        $asistencia = new Asistencia;
        $asistencia->user_id = Auth::user()->id;
        $asistencia->descripcion = $request->descripcion;
        $asistencia->estado = 1;
        $asistencia->save();
        return redirect()->back();
    }

    /**
     * Display the template.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_asistencia_admin(Request $request)
    {
        $asistencias = Asistencia::buscar($request)->where('user_id',Auth::user()->id)
        ->with('publicaciones.producto')
        ->with('user')
        ->orderBy('id','DESC')
        ->paginate(2);
        return view('admin.asistencias.index')->with(compact('asistencias'));
    }

    public function update_asistencia_admin(Request $request)
    {
        $asistencia = Asistencia::findOrFail($request->id);
        $asistencia->fill($request->all());
        $asistencia->save();
        return redirect()->back();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function asistencia_destroy($id)
    {
        $asistencia = Asistencia::findOrFail($id);
        $asistencia->delete();

        return redirect()->back();
    }
}
