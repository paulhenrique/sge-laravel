<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventoModel extends Model
{
    protected   $table          = 'evento';
    public      $timestamps     = false;
    protected   $fillable       = array('Nome','DataInicio','DataFim','DataLimiteInscricao','ConteudoProgramatico','Responsavel','CargaHoraria','HorarioInicio','HorarioFim','Local','Logo');
    protected   $guarded        = ['idEvento'];
}
