<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SellingList extends Model
{
  public $table="sellingList";
  
  use SoftDeletes;
protected $dates = ['deleted_at'];
    protected $fillable = [
    'id_user','sku_barang','harga'      
    ];
    
    public function barang(){
      return $this->belongsTo('App\Barang','sku_barang','sku');
  }
  
  
}