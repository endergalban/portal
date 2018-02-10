<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Asistencia extends Model
{
   	use SoftDeletes;

    protected $table = 'asistencias';

    protected $fillable = [
		 'user_id', 'descripcion', 'estado', 
    ];

    protected $dates = [
        'deleted_at', 'created_at', 'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
   
    public function publicaciones()
    {
        return $this->belongsToMany('App\Publicacion','asistencia_publicacion');
    }
}
