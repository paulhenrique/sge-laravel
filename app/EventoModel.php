<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventoModel extends Model
{
    
    protected   $table          = 'evento';
    public      $timestamps     = false;
    protected   $fillable       = array('CondicaoEvento','Nome','Apelido','DataInicio','DataFim','DataLimiteInscricao','ConteudoProgramatico','Responsavel','CargaHoraria','HorarioInicio','HorarioFim','Local','Logo','Site');
    protected   $primaryKey = 'idEvento';
    protected   $guarded        = ['idEvento'];
    
}
