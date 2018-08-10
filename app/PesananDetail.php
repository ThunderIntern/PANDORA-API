<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class PesananDetail extends Model
{
  public $table="pesanan_detail";
  
  use SoftDeletes;
protected $dates = ['deleted_at'];
    protected $fillable = [
           ];
    
           public function pesananHeader()
           {
               return $this->belongsTo('App\PesananHeader', 'id_pesanan_header');
           }
           public function barang(){
            return $this->hasOne('App\Barang','sku','sku');
        }
}