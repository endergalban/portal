<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Entidad;
use App\Producto;
use App\AtributoProducto;
use Validator;
use DB;

class ProductoController extends Controller
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
        $entidades = Entidad::activo()->whereHas('atributos', function ($q) {
            $q->activo();
        })->with(['atributos' => function ($q){
            $q->activo();
        }])->get();
        return view('admin.productos.index')->with(compact('entidades'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get(Request $request)
    {
        //
        $productos = Producto::with('atributos')->paginate();
        return $productos->toJson();
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
            $producto = new Producto;
        } else {
            $producto = Producto::findOrFail($request->id);
        }
        $producto->fill($request->all());
        $producto->save();
        if($request->atributos) {
            $producto->atributos()->sync(explode(',',$request->atributos));
        } else {
            DB::table('atributo_productos')->where('producto_id',$producto->id)->delete();

        }
        $productos = Producto::with('atributos')->paginate();
        return $productos->toJson();

    }

  
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $producto = Producto::findOrFail($request->id);
        $producto->delete();
        $productos = Producto::with('atributos')->paginate();
        return $productos->toJson();
    }
}
