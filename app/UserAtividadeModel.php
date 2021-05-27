<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAtividadeModel extends Model
{
    protected   $table          = 'user_atividade';
    public      $timestamps     = false;
    protected   $fillable       = array('idUser','idAtividade');
    protected   $primaryKey     = 'idUserAtividade';
    protected   $guarded        = ['idUserAtividade'];
}
