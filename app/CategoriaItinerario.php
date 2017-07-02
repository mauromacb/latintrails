<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriaItinerario extends Model
{
    protected $table = 'categoria_itinerario';
    protected $primaryKey = 'id_categoria_itinerario';
    public $timestamps = false;
}
