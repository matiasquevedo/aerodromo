<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Avion extends Model
{
    //
    protected $table = "aviones";

    protected $fillable = ['modelo'];

    public function reserva(){
    	return $this->hasMany('App\Reserva');
    }

}
