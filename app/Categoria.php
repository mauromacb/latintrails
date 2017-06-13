<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';
    protected $fillable =   [
        'titulo_categoria'
    ];
    public $timestamps = false;
    protected $primaryKey = 'id_categoria';
    //protected $primarykey  = 'id_categoria';
}
