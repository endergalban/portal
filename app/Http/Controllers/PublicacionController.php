<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publicacion;
use App\Comentario;
use App\Producto;
use App\Atributo;
use App\Compra;
use Validator;
use Carbon\Carbon;
use DB;
use Mail;
use Auth;
use App\Mail\Contacto;

class PublicacionController extends Controller
{

    public function dashboard(){

      $marcas = Atributo::whereHas('entidad', function($q) {
          $q->where('descripcion','marca');
        })->get();
      $modelos = Atributo::whereHas('entidad', function($q) {
          $q->where('descripcion','modelo');
        })->get();
      $anios = Atributo::whereHas('entidad', function($q) {
          $q->where('descripcion','anio');
        })->get();
    	$regiones = Atributo::whereHas('entidad', function($q) {
          $q->where('descripcion','region');
        })->get();
    	$tipos = Atributo::whereHas('entidad', function($q) {
          $q->where('descripcion','carroceria');
        })->get();
    	$combustible = Atributo::whereHas('entidad', function($q) {
          $q->where('descripcion','combustible');
        })->get();
    	$trasmision = Atributo::whereHas('entidad', function($q) {
          $q->where('descripcion','transmision');
        })->get();
      $kilometrajes = Atributo::whereHas('entidad', function($q) {
          $q->where('descripcion','kilometraje');
        })->get();
      $now = Carbon::parse(Carbon::now()->format('Y-m-d  h:i:s A'));
    	$publicaciones =  Publicacion::where('estado','=',1)
            ->has('producto')
            ->has('imagenes')
            ->whereHas('atributos.entidad', function($q){
              $q->where('descripcion','marca')->orWhere('descripcion','anio')->orWhere('descripcion','modelo');
            })
            ->where('cantidad','>',0)
            ->with(['atributos' => function($q){
              $q->whereHas('entidad', function($q) {
                $q->where('descripcion','marca')
                  ->orWhere('descripcion','modelo')->orWhere('descripcion','anio');
              });
            }])
            ->with('imagenes')
            ->orderBy('id','desc')
            ->limit(4)
            ->get();
            $str = file_get_contents('http://bmcare.cl/wp-json/wp/v2/posts');
            $json = json_decode($str, true);
            // dd($json);
            $publicacionesWp = [];
            foreach ($json as $key => $contenido) {
                $texto =$contenido['content']['rendered'];
                $posicionInicial= strpos($texto,'<img');
                $textoCortar = substr($texto, 0, $posicionInicial);
                $texto = str_replace($textoCortar, '', $texto);
                $posicionFinal= strpos($texto,'>');
                $image = substr($texto, 0, $posicionFinal + 1);
                $image = str_replace('<img', '<img style="width: 100%;"', $image).'<br><br>';
                if (strpos($image, '<img') === false) {
                    $image = '';
                }
                $publicacionesWp[] = [
                    'link' => str_replace('<a','<a target="_blank"',$contenido['link']),
                    'title' => $contenido['title']['rendered'],
                    'excerpt' => $contenido['excerpt']['rendered'],
                    'image' => $image
                ];
                if ($key == 4){
                    break;
                }
            }
            // dd($publicacionesWp);
      return view('welcome')->with(compact('regiones','marcas','tipos','combustible','trasmision','anios','kilometrajes','publicaciones','now','modelos','publicacionesWp'));
    }

    public function index(Request $request)
    {
      $marcas = Atributo::whereHas('entidad', function($q) {
          $q->where('descripcion','marca');
        })->get();
      $modelos = Atributo::whereHas('entidad', function($q) {
          $q->where('descripcion','modelo');
        })->get();
      $anios = Atributo::whereHas('entidad', function($q) {
          $q->where('descripcion','anio');
        })->get();
      $regiones = Atributo::whereHas('entidad', function($q) {
          $q->where('descripcion','region');
        })->get();
      $tipos = Atributo::whereHas('entidad', function($q) {
          $q->where('descripcion','carroceria');
        })->get();
      $combustible = Atributo::whereHas('entidad', function($q) {
          $q->where('descripcion','combustible');
        })->get();
      $trasmision = Atributo::whereHas('entidad', function($q) {
          $q->where('descripcion','transmision');
        })->get();
      $kilometrajes = Atributo::whereHas('entidad', function($q) {
          $q->where('descripcion','kilometraje');
        })->get();
        $now = Carbon::parse(Carbon::now()->format('Y-m-d  h:i:s A'));

        $publicaciones = Publicacion::where('estado','=',1)
        ->has('producto')
        ->buscar($request)
        ->orderBy('id','desc')
        ->with(['user'])
        ->with(['producto'])
        ->with(['atributos.entidad'])
        ->with(['imagenes'])
        ->paginate(12);
        $now = Carbon::parse(Carbon::now()->format('Y-m-d  h:i:s A'));
        return view('publicaciones.publicaciones', compact('regiones','marcas','tipos','combustible','trasmision','kilometrajes','anios','publicaciones','now','modelos'));
    }

    public function details($id)
    {
        $publicacion = Publicacion::
        with('producto')
        ->with('comentarios')
        ->find($id);
        $producto = Producto::find($publicacion->producto_id)->first();
        return view('publicaciones.producto', compact('publicacion','producto'));
    }
    public function delete($id)
    {
        $publicacion = Publicacion::where('user_id', Auth::user()->id)
            ->doesntHave('compras')
            ->where('id', $id)
            ->firstOrFail();
        $publicacion->delete();

        return back();
    }

    public function contacto()
    {
        return view('contacto');
    }

    public function contacto_enviar(Request $request)
    {

          Mail::to()->send(new Contacto($datos));
            return redirect()->back()
            ->with('success','Mensaje Enviado');
    }

    public function servicios()
    {
        return view('servicios');

    }

}
