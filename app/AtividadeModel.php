<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AtividadeModel extends Model
{
    protected   $table          = 'atividade';
    public      $timestamps     = false;
    protected   $fillable       = array('NonomeAtividade','tipo','DataInicio','DataTermino','HoraInicio','HoraTermino','local','idUser','idEvento');
    protected   $primaryKey     = 'idAtividade';
    protected   $guarded        = ['idAtividade'];
}
