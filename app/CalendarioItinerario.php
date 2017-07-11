<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CalendarioItinerario extends Model
{
    protected $table = 'calendario_itinerario';
    protected $primaryKey = 'id_calendario_itinerario';
    public $timestamps = false;
}
