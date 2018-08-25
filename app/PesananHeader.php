<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class PesananHeader extends Model
{
  public $table="pesanan_header";
  
  use SoftDeletes;
protected $dates = ['deleted_at'];
    protected $fillable = [
           ];
    
           public function status()
           {
               return $this->hasOne('App\Status', 'id_pesanan_header');
           }
           public function pengiriman()
           {
               return $this->hasOne('App\Pengiriman', 'id_pesanan_header');
           }
           public function pesananDetail()
           {
               return $this->hasOne('App\PesananDetail', 'id_pesanan_header');
           }
           public function wallet(){
            return $this->hasOne('App\Wallet','id_user','id_user');
        }
}