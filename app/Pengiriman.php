<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Pengiriman extends Model
{
  public $table="pengiriman";
  
  use SoftDeletes;
protected $dates = ['deleted_at'];
    protected $fillable = [
          ];
          public function pesananHeader()
          {
              return $this->belongsTo('App\PesananHeader', 'id_pesanan_header');
          }
          public function statusPengiriman()
          {
              return $this->hasOne('App\StatusPengiriman', 'id_pengiriman');
          }
}