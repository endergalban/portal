<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
	use SoftDeletes;

    protected $table = 'productos';

    protected $fillable = [
		'estado', 'descripcion'
    ];

    protected $dates = [
        'deleted_at', 'created_at', 'updated_at'
    ];

    public function publicaciones()
    {
        return $this->hasMany('App\Publicacion');
    }

    public function scopeActivo($q)
    {
        return $q->where('estado',1);
    }

    public function atributos()
    {
        return $this->belongsToMany('App\Atributo','atributo_productos','producto_id','atributo_id')->where('atributo_productos.padre',0);
    }
}
