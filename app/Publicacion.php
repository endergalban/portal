<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Publicacion extends Model
{
    use SoftDeletes;
    protected $table = 'publicaciones';
    protected $fillable = [
        'producto_id', 'user_id', 'descripcion', 'titulo', 'estado', 'monto', 'region_id', 'placa','cantidad'
    ];
    protected $dates = [
        'deleted_at', 'created_at', 'updated_at'
    ];
    public function producto()
    {
        return $this->belongsTo('App\Producto');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function comentarios()
    {
        return $this->hasMany('App\Comentario');
    }
    public function compras()
    {
        return $this->hasMany('App\Compra');
    }
    public function caracteristicas()
    {
        return $this->hasMany('App\Caracteristica');
    }
    public function imagenes()
    {
        return $this->hasMany('App\PublicacionImagen');
    }
    public function asistencias()
    {
        return $this->belongsToMany('App\Asistencia','aistencia_publicacion');
    }
    public function atributos()
    {
        return $this->belongsToMany('App\Atributo','caracteristicas');
    }

    public function scopeBuscar($query,$request)
    {
        if ($request->buscar) {
            $query->where('descripcion','like','%'.$request->buscar.'%')
            ->orWhereHas('atributos',function($query) use ($request) {
                $query->where('descripcion','like','%'.$request->buscar.'%');
            })->orWhereHas('producto',function($query) use ($request) {
                $query->where('descripcion','like','%'.$request->buscar.'%');
            });
        }
        if ($request->min) {
          $query->where('monto','>',$request->min);
        }
        if ($request->max) {
          $query->where('monto','<',$request->max);
        }
        if ($request->tipo || $request->combustible ||$request->marca ||$request->modelo ||$request->region_id || $request->anio || $request->kilmetraje  || $request->transmision ) {

          $arrayAtributo = [];
          if ($request->tipo) {
            $query->whereHas('atributos',function($query) use ($request) {
              $query->where('atributo_id',$request->tipo);
            });
          }
          if ($request->combustible) {
            $query->whereHas('atributos',function($query) use ($request) {
              $query->where('atributo_id',$request->combustible);
            });
          }
          if ($request->marca) {
            $query->whereHas('atributos',function($query) use ($request) {
              $query->where('atributo_id',$request->marca);
            });
          }
          if ($request->modelo) {
            $query->whereHas('atributos',function($query) use ($request) {
              $query->where('atributo_id',$request->modelo);
            });
          }
          if ($request->region_id) {
            $query->whereHas('atributos',function($query) use ($request) {
              $query->where('atributo_id',$request->region_id);
            });
          }
          if ($request->anio) {
            $query->whereHas('atributos',function($query) use ($request) {
              $query->where('atributo_id',$request->anio);
            });
          }
          if ($request->kilometraje) {
            $query->whereHas('atributos',function($query) use ($request) {
              $query->where('atributo_id',$request->kilometraje);
            });
          }
          if ($request->transmision) {
            $query->whereHas('atributos',function($query) use ($request) {
              $query->where('atributo_id',$request->transmision);
            });
          }
        }

        if ($request->estado != '') {
            $query->where('estado',$request->estado);
        }

        return $query;
    }


   // public function setCreatedAtAttribute( $value ) {
     // $this->attributes['created_at'] = (new Carbon($value))->format('Y-m-d  h:i:s A');
    //}
}
