<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Compra extends Model
{
    use SoftDeletes;

    protected $table = 'compras';

    protected $fillable = [
		'publicacion_id', 'user_id', 'descripcion', 'monto', 
    ];

    protected $dates = [
        'deleted_at', 'created_at', 'updated_at'
    ];

    public function publicacion()
    {
        return $this->belongs('App\Producto');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
}
