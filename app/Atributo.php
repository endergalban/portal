<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Atributo extends Model
{
    use SoftDeletes;

    protected $table = 'atributos';

    protected $fillable = [
		'entidad_id', 'descripcion', 'orden', 'estado', 'padre',
    ];

    protected $dates = [
        'deleted_at', 'created_at', 'updated_at'
    ];

    public function entidad()
    {
        return $this->belongsTo('App\Entidad');
    }

    public function productos()
    {
        return $this->belongsToMany('App\Producto','atributo_productos');
    }

    public function atributo_padre()
    {
        return $this->belongsTo('App\Atributo','padre','id');
    }

    public function publicaciones()
    {
        return $this->belongsToMany('App\Publicacion','caracteristicas');
    }


    public function scopeActivo($q)
    {
        return $q->where('estado',1);
    }
}
