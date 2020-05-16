<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TemplateModel extends Model
{
    protected   $table          = 'template_evento';
    public      $timestamps     = false;
    protected   $fillable       = array('Nome','Image_preview','Local_do_Arquivo');
    protected   $primaryKey = 'idTemplate';
    protected   $guarded        = ['idTemplate'];
}
