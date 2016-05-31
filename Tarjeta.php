<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarjeta extends Model
{

     protected $fillable = [
        'id_externo', 'id_interno','saldo','id_user','estado',
    ];
      public function usuario()
    {
        return $this->belongsTo('App\User','id_user');
    }

      public function recargas()
    {
        return $this->hasMany('App\Recarga','id_tarjeta');
    }

      public function pagos()
    {
        return $this->hasMany('App\Pago','id_tarjeta');
    }
}
