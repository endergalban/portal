<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AtributoProducto extends Model
{
	use SoftDeletes;

    protected $table = 'atributo_productos';

    protected $fillable = [
		'atributo_id', 'producto_id'
	];

    protected $dates = [
        'deleted_at', 'created_at', 'updated_at'
    ];

    public function atributo()
    {
        return $this->belongsTo('App\Atributo');
    }

    public function producto()
    {
        return $this->belongsTo('App\Producto');
    }

    public function caracteristicas()
    {
        return $this->hasMany('App\Caracteristica');
    }
}
