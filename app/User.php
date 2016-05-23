<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','password','phone',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

     public function tarjetas()
    {
        return $this->hasMany('App\Tarjeta','id_user');
    }
     public function recargas()
    {
        return $this->hasMany('App\Recarga','id_vendedor');
    }
     public function lectores()
    {
        return $this->hasMany('App\Lector','id_propietario');
    }
}
