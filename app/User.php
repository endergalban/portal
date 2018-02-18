<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'rut', 'estatus', 'tipo', 'telefono', 'direccion','region_id','placa'
    ];


    protected $dates = [
        'deleted_at', 'created_at', 'updated_at'
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function comentarios()
    {
        return $this->hasMany('App\Comentario');
    }

    public function publicaciones()
    {
        return $this->hasMany('App\Publicacion');
    }

    public function compras()
    {
        return $this->hasMany('App\Compra');
    }
    public function region()
    {
        return $this->belongsTo('App\Atributo','region_id','id');
    }

    public function scopeBuscar($query,$request)
    {
        if ($request->buscar) {
            $query->where('name','like','%'.$request->buscar.'%')->orWhere('email','like','%'.$request->buscar.'%');
        }

        if ($request->estatus != '') {
            $query->where('estatus',$request->estatus);
        }

        if ($request->tipo != '') {
            $query->where('tipo',$request->tipo);
        }

        return $query;
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Bcrypt($value);
    }
}
