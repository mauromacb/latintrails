<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiaItinerario extends Model
{
    protected $table = 'dia_itinerario';
    protected $primaryKey = 'id_dia';
    public $timestamps = false;
}
