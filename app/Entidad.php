<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Entidad extends Model
{
    use SoftDeletes;

    protected $table = 'entidades';

    protected $fillable = [
		'descripcion', 'orden', 'estado', 'tipo'
    ];

    protected $dates = [
        'deleted_at', 'created_at', 'updated_at'
    ];

    public function atributos()
    {
        return $this->hasMany('App\Atributo')->orderby('orden');
    }

    public function scopeActivo($q)
    {
        return $q->where('estado',1);
    }
}
