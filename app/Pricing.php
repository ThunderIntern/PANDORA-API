<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
class Pricing extends Model
{
  public $table="pricing";
  
  use SoftDeletes;
protected $dates = ['deleted_at'];
    protected $fillable = [
        'sku_barang','tanggal','harga','harga_promo'
           ];
       
           public function barang(){
            return $this->belongsTo('App\Barang','sku','sku_barang');
             
        }
    
        public function scopeHariIni($q, Carbon $now){
            return $q->where('tanggal', '<=', $now)->orderby('tanggal', 'desc');
        }
       
}