<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormularioCommentCard extends Model
{
    protected $table = 'formulario_comment_card';
    protected $primaryKey = 'id_formulario_comment_card';
    public $timestamps = false;
}
