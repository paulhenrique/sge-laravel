<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventoModel extends Model
{
    protected   $table          = 'eventp';
    public      $timestamps     = false;
    protected   $fillable       = array('Nome','DtInicio','DtFim','DtLimiteInscricao','ConteudoProgramatico','Responsavel','CargaHoraria','HorarioInicio','HorarioFim','Local','Logo');
    protected   $guarded        = ['idEvento'];
}
