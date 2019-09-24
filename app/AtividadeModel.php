<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AtividadeModel extends Model
{
    protected   $table          = 'atividade';
    public      $timestamps     = false;
    protected   $fillable       = array('CondicaoAtividade','nomeAtividade','tipo','DataInicio','DataTermino','HoraInicio','HoraTermino','local','idEvento','NumMaxParticipantes');
    protected   $primaryKey     = 'idAtividade';
    protected   $guarded        = ['idAtividade'];
}
