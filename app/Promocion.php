<?php

namespace Robtor;

use Illuminate\Database\Eloquent\Model;

class Promocion extends Model
{
    protected $table = 'promocion';
    


    protected $fillable = [
    	'nombre', 'detalles', 'horaInicio', 'horaFinal'
    ];

    //
    public function restaurante(){
    	$this->belongsTo('Robtor\Restaurant');
    }
 
}
