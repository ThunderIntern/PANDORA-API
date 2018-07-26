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
    'user_id','sku_barang','harga'      
    ];
    

}