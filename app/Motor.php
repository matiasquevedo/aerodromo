<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Motor extends Model
{
    //
    protected $table = "motores";

    protected $fillable = ['modelo','numeracion','descripcion','avion_id','user_id'];

    public function avion(){
    	return $this->belongsTo('App\Avion');
    }
}
