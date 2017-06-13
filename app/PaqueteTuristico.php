<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaqueteTuristico extends Model
{
    protected $table = 'paquete_turistico';
    protected $primaryKey='id_paquete_tur';
    public $timestamps = false;
}
