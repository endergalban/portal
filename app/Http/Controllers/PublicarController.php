<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Entidad;
use App\Producto;
use App\AtributoProducto;
use App\Asistencia;
use Validator;
use Auth;

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
    public function index()
    {
        $entidades = Entidad::activo()
        ->whereHas('atributos', function ($q) {
            $q->activo();
        })->with(['atributos' => function ($q){
            $q->activo();
        }])->get();

        return view('admin.productos.index')->with(compact('entidades'));
    }

    public function asistencia()
    {
        $asistencias = Asistencia::where('user_id',Auth::user()->id)
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
    public function index_asistencia_admin()
    {
        $asistencias = Asistencia::where('user_id',Auth::user()->id)
        ->with('publicaciones.producto')
        ->orderBy('id','DESC')
        ->paginate();
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
