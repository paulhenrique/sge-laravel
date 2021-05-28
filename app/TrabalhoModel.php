<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrabalhoModel extends Model
{

    protected   $table          = 'trabalho';
    public      $timestamps     = false;
    protected   $fillable       = array('idEvento', 'idUser', 'autor', 'coautores', 'nome', 'linkVid', 'trabalhoPdf', 'diarioPdf');
    protected   $primaryKey     = 'idTrabalho';
    protected   $guarded        = ['idTrabalho'];

}
