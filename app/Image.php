<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Image extends Model
{
  public $table="image";
  
  use SoftDeletes;
protected $dates = ['deleted_at'];
    protected $fillable = [
        'id_barang','image_ori','thumbnail'
           ];
    
           public function barang()
    {
        return $this->belongsTo('App\Barang', 'id_barang');
    }
}