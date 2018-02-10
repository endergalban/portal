<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Publicacion extends Model
{
   	use SoftDeletes;

    protected $table = 'publicaciones';

    protected $fillable = [
		'producto_id', 'user_id', 'descripcion', 'estado', 'monto', 
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

    public function prublicacion_imagenes()
    {
        return $this->hasMany('App\PublicacionImagen');
    }

    public function asistencias()
    {
        return $this->belongsToMany('App\Asistencia','aistencia_publicacion');
    }
    public function setCreatedAtAttribute( $value ) {
      $this->attributes['created_at'] = (new Carbon($value))->format('Y-m-d  h:i:s A');
    }
}
