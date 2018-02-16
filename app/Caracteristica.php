<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Caracteristica extends Model
{

    protected $table = 'caracteristicas';

    protected $fillable = [
		'atributo_id', 'producto_id'
	];

    protected $dates = [
         'created_at', 'updated_at'
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
