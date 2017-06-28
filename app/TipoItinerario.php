<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoItinerario extends Model
{
    protected $table = 'tipo_itinerario';
    protected $primaryKey = 'id_tipo_itinerario';
    public $timestamps = false;
}
