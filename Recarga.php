<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recarga extends Model
{
      public function tarjeta()
    {
        return $this->belongsTo('App\Tarjeta','id_tarjeta');
    }
      public function vendedor()
    {
        return $this->belongsTo('App\User','id_vendedor');
    }
}
