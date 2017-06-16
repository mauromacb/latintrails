<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mapas extends Model
{
    protected $primaryKey = 'id_mapa';
    protected $table = 'mapas';
    public $timestamps = false;
}
