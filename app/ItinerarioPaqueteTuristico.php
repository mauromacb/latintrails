<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItinerarioPaqueteTuristico extends Model
{
    protected $table = 'itinerario_con_paquete_turitico';
    protected $primaryKey = 'id_itinerario';
    public $timestamps = false;
}
