<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lector extends Model
{

	 protected $fillable = [
        'nombre_conductor', 'numero_autobus','cuota','estado',
    ];

      public function propietario()
    {
        return $this->belongsTo('App\User','id_propietario');
    }
      public function pagos()
    {
        return $this->hasMany('App\Pago','id_lector');
    }
    
}
