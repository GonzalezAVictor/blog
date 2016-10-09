<?php

namespace Robtor;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{

	protected $table = 'categoria';

	protected $fillable = [
    'nombre'
    ];

    public function restaurantes(){
        return $this->belongsToMany('Robtor\Restaurant')->withTimestamps();
    }

}
