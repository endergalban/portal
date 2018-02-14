<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Entidad;
use App\Producto;
use App\Publicacion;
use App\AtributoProducto;
use App\Asistencia;
use App\Atributo;
use Validator;
use Auth;
use Carbon\Carbon;
use DB;

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
      
        $productos = Producto::activo()
        ->has('atributos.entidad')
        ->with(['atributos' => function ($q){
            $q->activo()->where('entidad','<>',1);
        }])
        ->with(['atributos.entidad' => function ($q){
            $q->activo();
        }])
        ->get();

        $regiones = Atributo::activo()->where('entidad_id',1)->get();

        $asistencias = Asistencia::where('estado',1)
        ->with('user')
        ->orderBy('id','DESC')
        ->get();

        
        $publicaciones = Publicacion::where('user_id',Auth::user()->id)
        ->with('producto')
        ->with('caracteristicas.atributo.entidad')
        ->paginate();
        return view('publicaciones.publicar')->with(compact('publicaciones','productos','regiones','asistencias'));
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
    public function store(Request $request)
    {
      //dd($request->all());
        Validator::make($request->all(), [
          'producto_id' => 'required|integer|exists:productos,id',
          'estado' => 'required|boolean',
          'descripcion' => 'required|string|max:5000',
          'monto' => 'required|numeric',
          'cantidad' => 'required|integer',
          'region_id' => 'required|integer|exists:atributos,id',
          'asistencia_id' => 'nullable|integer|exists:asistencias,id',
        ])->validate();
        if ($request->publicacion_id == 0) {
            $publicacion = new Publicacion;
            $msj="Felicidades tu publicación se encuentra disponible!";    
        } else {
            $msj="Felicidades tu publicación ha sido actualizada!";    
        }
        $publicacion->fill(array_add($request->all(),'user_id', Auth::user()->id));
        $publicacion->save();
        if($request->asistencia_id) {
            DB::table('asistencia_publicacion')->insert([
                'asistencia_id' => $request->asistencia_id,
                'publicacion_id' => $publicacion->id
                ]);
        }
        if($request->atributos) {
            $atributos = array_filter($request->atributos);
            $publicacion->atributos()->sync($atributos);
        }
            
        return redirect()->back()->with('success', $msj);
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
    public function index_asistencia_admin()
    {
        $asistencias = Asistencia::where('user_id',Auth::user()->id)
        ->with('publicaciones.producto')
        ->with('user')
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
