<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
	use SoftDeletes;

    protected $table = 'productos';

    protected $fillable = [
		'estado', 'descripcion', 
    ];

    protected $dates = [
        'deleted_at', 'created_at', 'updated_at'
    ];

    public function publicaciones()
    {
        return $this->hasMany('App\Publicacion');
    }

    public function atributo_productos()
    {
        return $this->hasMany('App\AtributoProducto');
    }
}
