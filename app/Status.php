<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Status extends Model
{
  public $table="status";
  
  use SoftDeletes;
protected $dates = ['deleted_at'];
    protected $fillable = [
        'id','status','tanggal','id_pesanan_header'
           ];
    
           public function pesananHeader()
           {
               return $this->belongsTo('App\PesananHeader', 'id_pesanan_header');
           }
}