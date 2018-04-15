<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Compra;
use App\Publicacion;
use App\Producto;
use App\Atributo;
use App\User;
use Auth;
use DB;
use Validator;
use Mail;
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
    public function miscompras(Request $request)
    {
        $compras = Compra::buscar($request)->where('user_id',Auth::user()->id)
        ->with('publicacion.producto')
        ->paginate();

        return view('compras.miscompras.index')->with(compact('compras'));
    }

    /**
     * Display the template.
     *
     * @return \Illuminate\Http\Response
     */
    public function misventas(Request $request)
    {
        $ventas = Compra::buscar($request)->whereHas('publicacion',function ($q){
            $q->where('user_id',Auth::user()->id);
        })
        ->with('publicacion.producto')
        ->with('user')
        ->paginate();
        return view('compras.misventas.index')->with(compact('ventas'));
    }


    public function comprar($id) {

        $publicacion = Publicacion::with('producto')
        ->with('atributos')
        ->find($id);
        $entidades = [];
        $entidadFija = [];
        $aux = 0;
        foreach ($publicacion->atributos as $key => $value) {

            if ($value->entidad->tipo == 3) {
                $entidadFija[$value->entidad->descripcion] = (Publicacion::where('id',$id)->pluck($value->descripcion)->toArray()[0]); 
            }else {

                $entidades[$value->entidad->descripcion][] = $value->descripcion;  
            }
        }
        $compras = DB::table('compras')->groupBy('publicacion_id')
            ->select(DB::raw('SUM(cantidad) as cantidad'))
            ->where('publicacion_id','=',$id)->first();

        if(!is_null($compras)) {
            $publicacion->cantidad = $publicacion->cantidad - $compras->cantidad;
        }      



        return view('compras.comprar')->with(compact('publicacion','entidades','entidadFija'));

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

        $vendedor = User::find($publicacion->user_id);

     /*   $compras_anteriores = DB::table('compras')->groupBy('publicacion_id')
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
        }*/

        $inventario = $publicacion->cantidad - $request->cant;
        $publicacion->cantidad = $inventario;
        if($inventario == 0) {
            $publicacion->estado = 0;
        }
        $publicacion->save();

        if($comprar) {
            Mail::to(Auth::user()->email)->send(new OrderCompra($comprar,$vendedor));
            return view('compras.confirmacion');
        } else {
            return redirect()->back()
            ->with('danger','Hubo un error, intenta nuevamente realizar la compra');
        }
    }

}

