<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Helice extends Model
{
    //
    protected $table = "helices";

    protected $fillable = ['modelo','numeracion','descripcion','avion_id','user_id'];

    public function avion(){
    	return $this->belongsTo('App\Avion');
    }
}
