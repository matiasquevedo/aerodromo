<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    //
    protected $table = "reservas";

    protected $fillable = ['modelo','fecha','hora_desde','hora_hasta','avion_id','user_id'];

    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function avion(){
    	return $this->belongsTo('App\Avion');
    }

}