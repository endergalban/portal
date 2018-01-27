<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Caracteristica extends Model
{
    use SoftDeletes;

    protected $table = 'atributo_productos';

    protected $fillable = [
		'atributo_id', 'producto_id'
	];

    protected $dates = [
        'deleted_at', 'created_at', 'updated_at'
    ];

    
    public function publicaciones()
    {
        return $this->belongsTo('App\Publicacion');
    }

    public function atributo_producto()
    {
        return $this->belongsTo('App\AtributoProducto');
    }

    public function atributo()
    {
        return $this->belongsToMany('App\Atributo','App\AtributoProducto');
    }
}
