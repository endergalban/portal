<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PublicacionImagen extends Model
{
	use SoftDeletes;

    protected $table = 'publicacion_imagenes';

    protected $fillable = [
		'publicacion_id', 'estado', 'ruta', 
    ];

    protected $dates = [
        'deleted_at', 'created_at', 'updated_at'
    ];

    public function publicacion()
    {
        return $this->belongsTo('App\Publicacion');
    }

}
