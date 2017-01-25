<?php

namespace Robtor;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{

	protected $table = 'restaurante';
    
    protected $fillable = [
    'nombre', 'horarioInicio', 'horarioFinal', 'ubucacion', 'eslogan', 'descripcion', 'logo', 'password', 'codigoRestaurante'
    ];

    public function categorias(){
    	return $this->belongsToMany('Robtor\Categoria');
    }

    public function promociones(){
        return $this->hasMany('Robtor\Promocion');
    }

}
