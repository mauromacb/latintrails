<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComoNosEncontro extends Model
{
    protected $table = 'como_nos_encontro';
    protected $fillable = ['titulo'];
    //protected $fillable = ['name', 'titulo'];
    protected $guarded = ['id_como_nos_encontro'];
}
