<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publicacion;
use App\Comentario;
use App\Producto;
use Validator;
use Illuminate\Support\Facades\Auth;

class ComentarioController extends Controller
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
    public function comentar(Request $request) {
    	//dd($request->all());
    	Validator::make($request->all(), [
          'comentario' => 'required|max:255'
        ])->validate();

		if(Auth::id()) {
	    	$comentario = new Comentario;
	    	$comentario->descripcion = $request->comentario;
	    	$comentario->user_id = Auth::id();
	    	$comentario->publicacion_id = $request->id_publicacion;
	    	$comentario->save();
    		return redirect()->back()->
        	with('success','Comentario a sido publicado');
		} else {
			return redirect()->route('login');
		}
    }

    public function eliminar($id) {
    	
    	$comentario = Comentario::find($id);
    	if (Auth::user() && (Auth::user()->id == $comentario->user_id)) {
		    $comentario->delete();
		    return redirect()->back()->with('danger','Comentario a sido eliminado');
		}else
		return 'No tiene permiso para eliminas comentario';
    }
}
