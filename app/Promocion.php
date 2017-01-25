<?php

namespace Robtor;

use Illuminate\Database\Eloquent\Model;

class Promocion extends Model
{
    protected $table = 'promocion';
    


    protected $fillable = [
    	'nombre', 'detalles', 'horaInicio', 'horaFinal', 'restaurante_id'
    ];

    //
    public function restaurante(){
    	$this->belongsTo('Robtor\Restaurant');
    }

    public function usuarios(){
    	return $this->belongsToMany('Robtor\Usuario')->withTimestamps();
    }
 
}
