<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class userEventoModel extends Model
{
    protected   $table          = 'user_evento';
    public      $timestamps     = false;
    protected   $fillable       = array('idUser','idEvento');
    protected   $primaryKey = 'idUserEvento';
    protected   $guarded        = ['idUserEvento'];
}
