<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImagesEvento extends Model
{
    
    protected   $table          = 'imagesEvento';
    public      $timestamps     = false;
    protected   $fillable       = array('idEvento','Images');
    protected   $primaryKey = 'idImagesEvento';
    protected   $guarded        = ['idImagesEvento'];
    
}
