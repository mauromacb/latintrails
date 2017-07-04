<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentCard extends Model
{
    protected $table = 'comment_card';
    protected $primaryKey = 'id_comment_card';
    public $timestamps = false;
}
