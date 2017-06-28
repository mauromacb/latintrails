<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hoteles extends Model
{
    protected $table = 'hoteles';
    protected $primaryKey = 'id_hotel';
    public $timestamps = false;
}
