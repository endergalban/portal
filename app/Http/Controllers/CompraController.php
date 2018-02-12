<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Compra;
use App\Publicacion;
use App\Producto;
use App\Atributo;
use Auth;
use DB;
use Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderCompra;
use App\Mail\Venta;

class CompraController extends Controller
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
    public function miscompras()
    {
        $compras = Compra::where('user_id',Auth::user()->id)
        ->with('publicacion.producto')
        ->paginate();

        return view('compras.miscompras.index')->with(compact('compras'));
    }

    /**
     * Display the template.
     *
     * @return \Illuminate\Http\Response
     */
    public function misventas()
    {
        $ventas = Compra::whereHas('publicacion',function ($q){
            $q->where('user_id',Auth::user()->id);
        })
        ->with('publicacion.producto')
        ->with('user')
        ->paginate();
        return view('compras.misventas.index')->with(compact('ventas'));
    }


    public function comprar($id) {

        $publicacion = Publicacion::find($id);
        $producto = Producto::find($publicacion->producto_id)->first();
        $entidades = DB::table('atributo_productos')
            ->join('atributos','atributos.id','=','atributo_productos.atributo_id')
            ->join('entidades','entidades.id','=','atributos.entidad_id')
            ->where('atributo_productos.producto_id','=',$producto->id)
            ->select('entidades.descripcion','atributos.descripcion as atributo')
            ->get();  

        $compras = DB::table('compras')->groupBy('publicacion_id')
            ->select(DB::raw('SUM(cantidad) as cantidad'))
            ->where('publicacion_id','=',$id)->first();

        if(!is_null($compras)) {
            $publicacion->cantidad = $publicacion->cantidad - $compras->cantidad;
        }      



        return view('compras.comprar')->with(compact('publicacion','entidades'));

      //  dd($id);
    }
 
    public function comprar_proceso(Request $request) {
        //dd($request->all());
       
        Validator::make($request->all(), [
          'publicacion' => 'required',
          'cant' => 'required',
        ])->validate();

        $publicacion = Publicacion::find($request->publicacion);
       
        $comprar =  new Compra;
        $comprar->publicacion_id = $publicacion->id;
        $comprar->user_id = Auth::id();
        $comprar->descripcion = $publicacion->descripcion;
        $comprar->monto = $publicacion->monto * $request->cant;
        $comprar->cantidad = $request->cant;
        $comprar->save();

        $compras_anteriores = DB::table('compras')->groupBy('publicacion_id')
                ->select(DB::raw('SUM(cantidad) as cantidad'))
                ->where('publicacion_id','=',$publicacion->id)->first();

        $cant_compras_anterioes = 0;

        if(!is_null($compras_anteriores)) {
            $cant_compras_anterioes = $compras_anteriores->cantidad;
        }

        $inventario = $publicacion->cantidad - $cant_compras_anterioes;
       // dd($inventario);

        if($inventario == 0) {
            $publicacion->estado = 0;
            $publicacion->save();
        }

        if($comprar) {
            //Mail::to(Auth::user()->email)->send(new Venta($comprar));
            //Mail::to(Auth::user()->email)->send(new OrderCompra($comprar));
            return view('compras.confirmacion');
        } else {
            return redirect()->back()
            ->with('danger','Hubo un error, intenta nuevamente realizar la compra');
        }
    }

}
