<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Pricing extends Model
{
  public $table="pricing";
  
  use SoftDeletes;
protected $dates = ['deleted_at'];
    protected $fillable = [
        'sku_barang','tanggal','harga','harga_promo'
           ];
    

}