<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Caracteristica extends Model
{
    use SoftDeletes;

    protected $table = 'caracteristicas';

    protected $fillable = [
		'atributo_id', 'producto_id'
	];

    protected $dates = [
        'deleted_at', 'created_at', 'updated_at'
    ];

    
    public function publicacion()
    {
        return $this->belongsTo('App\Publicacion');
    }

    public function atributo()
    {
        return $this->belongsTo('App\Atributo','App\Atributo');
    }
}
