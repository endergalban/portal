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
use Storage;
use App\Mail\OrderCompra;
use App\Mail\Venta;
use App\Entidad;
use App\PublicacionImagen;

class CompraController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function miscompras(Request $request)
    {
        $compras = Compra::buscar($request)->where('user_id',Auth::user()->id)
        ->with('publicacion.producto')
        ->paginate();

        return view('compras.miscompras.index')->with(compact('compras'));
    }

    public function misventas(Request $request)
    {
        $ventas = Compra::buscar($request)
            ->whereHas('publicacion',function ($q){
                $q->where('user_id',Auth::user()->id);
            })
            ->with('publicacion.producto')
            ->with('user')
            ->paginate();

        return view('compras.misventas.index')->with(compact('ventas'));
    }

    public function mispublicaciones(Request $request)
    {
        $publicaciones = Publicacion::with('producto')
            ->with('atributos')->where('user_id',Auth::user()->id)
            ->withCount('compras')
            ->orderBy('id','DESC')
            ->paginate();

        return view('compras.mispublicaciones.index')->with(compact('publicaciones'));
    }

    public function comprar($id)
    {
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
    }

    public function comprar_proceso(Request $request)
    {
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

    public function edit($id)
    {
        $publicacion = Publicacion::where('id', $id)
            ->where('user_id', Auth::user()->id)
            ->whereHas('producto', function($q){
                $q->where('descripcion', 'pieza');
            })
            ->with('producto.atributos')
            ->with('imagenes')
            ->first();
        if ($publicacion) {
            $marcas = Atributo::whereHas('entidad', function($q) {
                $q->where('descripcion','marca');
            })->get();
            $modelos = Atributo::whereHas('entidad', function($q) {
                $q->where('descripcion','modelo');
            })->whereHas('publicaciones', function($q)  use ($publicacion){
                $q->where('publicaciones.id',$publicacion->id);
            })->get();

            $anios = Atributo::whereHas('entidad', function($q) {
                $q->where('descripcion','anio');
            })->get();
            $regiones = Atributo::whereHas('entidad', function($q) {
                $q->where('descripcion','region');
            })->get();
            $carrocerias = Atributo::whereHas('entidad', function($q) {
                $q->where('descripcion','carroceria');
            })->get();
            $lados = Atributo::whereHas('entidad', function($q) {
                $q->where('descripcion','lado');
            })->get();
            $estados = Atributo::whereHas('entidad', function($q) {
                $q->where('descripcion','estado');
            })->get();
            $imagenes = [];
            foreach ($publicacion->imagenes as $key => $imagen) {
                $path = storage_path('app/public/').$imagen->ruta;
                $type = pathinfo($path, PATHINFO_EXTENSION);
                $data = file_get_contents($path);
                $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                $imagenes[] = $base64;
            }
            return view('compras.mispublicaciones.editar.pieza')->with(compact(
                'marcas',
                'modelos',
                'anios',
                'regiones',
                'carrocerias',
                'lados',
                'estados',
                'publicacion',
                'imagenes'
            ));
        } else {
            $publicacion = Publicacion::where('id', $id)
            ->where('user_id', Auth::user()->id)
            ->with('atributos')
            ->with('imagenes')
            ->firstOrFail();

            $entidades = Entidad::activo()
            ->where('descripcion','<>','marca')
            ->where('descripcion','<>','modelo')
            ->whereHas('atributos.productos',function($q) use ($publicacion) {
              $q->where('productos.id',$publicacion->producto_id);
            })->with(['atributos' => function ($q) use ($publicacion){
              $q->activo()->whereHas('productos', function($q) use ($publicacion){
                $q->where('productos.id',$publicacion->producto_id);
              });
            }])->get();

            $marcas = Atributo::whereHas('entidad', function($q) {
                $q->where('descripcion','marca');
            })->whereHas('productos', function($q)  use ($publicacion){
                $q->where('productos.id',$publicacion->producto_id);
            })
            ->get();

            $modelos = Atributo::whereHas('entidad', function($q) {
                $q->where('descripcion','modelo');
            })->whereHas('publicaciones', function($q)  use ($publicacion){
                $q->where('publicaciones.id',$publicacion->id);
            })
            ->get();
            $imagenes = [];
            foreach ($publicacion->imagenes as $key => $imagen) {
                $path = storage_path('app/public/').$imagen->ruta;
                $type = pathinfo($path, PATHINFO_EXTENSION);
                $data = file_get_contents($path);
                $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                $imagenes[] = $base64;
            }
            return view('compras.mispublicaciones.editar.auto')->with(compact(
                'entidades',
                'publicacion',
                'marcas',
                'modelos',
                'imagenes'
            ));
        }
    }

    public function update(Request $request, $id)
    {
        $publicacion = Publicacion::
            where('user_id', Auth::user()->id)
            ->firstOrFail($id);
        Validator::make($request->all(), [
            'descripcion' => 'required|string|max:191',
            'marca_id' => 'required|integer|exists:atributos,id',
            'modelo_id' => 'required|integer|exists:atributos,id',
            'anio_id' => 'required|integer|exists:atributos,id',
            'region_id' => 'required|integer|exists:atributos,id',
            'carroceria_id' => 'required|integer|exists:atributos,id',
            'estado_id' => 'required|integer|exists:atributos,id',
            'lado_id' => 'required|integer|exists:atributos,id',
            'precio' => 'required|numeric',
        ])->validate();
        $publicacion->monto = $request->precio;
        $publicacion->descripcion = $request->descripcion;
        $publicacion->save();
        DB::table('caracteristicas')->where('publicacion_id',$publicacion->id)->delete();
        $arrayAtributo[] = $request->marca_id;
        $arrayAtributo[] = $request->modelo_id;
        $arrayAtributo[] = $request->anio_id;
        $arrayAtributo[] = $request->region_id;
        $arrayAtributo[] = $request->carroceria_id;
        $arrayAtributo[] = $request->estado_id;
        $arrayAtributo[] = $request->lado_id;
        $publicacion->atributos()->sync($arrayAtributo);
        DB::table('publicacion_imagenes')->where('publicacion_id',$publicacion->id)->delete();
        if($request->imagenes) {
            foreach ($request->imagenes as $key => $image) {
                if ($image) {
                    $image = str_replace('data:image/png;base64,', '', $image);
                    $image = str_replace(' ', '+', $image);
                    $imageName = str_random(10).'.'.'png';
                    Storage::disk('public')->makeDirectory($publicacion->id);
                    \File::put(storage_path('app/public'). '/' .$publicacion->id. '/' . $imageName, base64_decode($image));
                    $publicacionImagen = new PublicacionImagen;
                    $publicacionImagen->ruta = $publicacion->id.'/'.$imageName;
                    $publicacionImagen->publicacion_id = $publicacion->id;
                    $publicacionImagen->estado = 1;
                    $publicacionImagen->save();
                }
            }
        }

        return redirect()->route('mispublicaciones')
            ->with('success','Operación realizada con exito.');
    }

    public function updateAuto(Request $request, $id)
    {
        $publicacion = Publicacion::findOrFail($id);
        Validator::make($request->all(), [
            'descripcion' => 'required|string|max:191',
            'titulo' => 'required|string|max:191',
            'precio' => 'required|numeric',
            'placa' => 'required|string',
        ])->validate();
        $publicacion->monto = $request->precio;
        $publicacion->descripcion = $request->descripcion;
        $publicacion->titulo = $request->titulo;
        $publicacion->placa = $request->placa;
        $publicacion->save();
        DB::table('publicacion_imagenes')->where('publicacion_id',$publicacion->id)->delete();
        if ($request->imagenes) {
            foreach ($request->imagenes as $key => $image) {
                if ($image) {
                    $image = str_replace('data:image/png;base64,', '', $image);
                    $image = str_replace(' ', '+', $image);
                    $imageName = str_random(10).'.'.'png';
                    // $imagen = Storage::disk('public')->put($publicacion->id, base64_decode($image));
                    \File::put(storage_path('app/public'). '/' .$publicacion->id. '/' . $imageName, base64_decode($image));
                    $publicacionImagen = new PublicacionImagen;
                    $publicacionImagen->ruta = $publicacion->id.'/'.$imageName;
                    $publicacionImagen->publicacion_id = $publicacion->id;
                    $publicacionImagen->estado = 1;
                    $publicacionImagen->save();
                }
            }
        }
        DB::table('caracteristicas')->where('publicacion_id',$publicacion->id)->delete();
        $arrayAtributo = [];
        foreach ($request->atributos as $key => $value) {
            if ($value) {
                $arrayAtributo[] = $value;
            }
        }
        $publicacion->atributos()->sync($arrayAtributo);

        return redirect()->route('mispublicaciones')
        ->with('success','Operación realizada con exito.');
    }

}
