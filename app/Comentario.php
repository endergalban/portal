<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comentario extends Model
{
    use SoftDeletes;

    protected $table = 'comentarios';

    protected $fillable = [
		'publicacion_id', 'user_id', 'descripcion'
	];

    protected $dates = [
        'deleted_at', 'created_at', 'updated_at'
    ];

    
    public function publicaciones()
    {
        return $this->belongsTo('App\Publicacion');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
