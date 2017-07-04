<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GuiaItinerario extends Model
{
    protected $table = 'guia_itinerario';
    protected $primaryKey = 'id_guia';
    public $timestamps = false;
}
