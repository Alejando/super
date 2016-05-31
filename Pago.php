<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    public function tarjeta()
    {
        return $this->belongsTo('App\Tarjeta','id_tarjeta');
    }
      public function lector()
    {
        return $this->belongsTo('App\Lector','id_lector');
    }
}
