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
        'name', 'email', 'password', 'rut', 'estatus', 'tipo'
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
}
