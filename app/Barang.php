<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Barang extends Model
{
  public $table="barang";
  use SoftDeletes;
protected $dates = ['deleted_at'];
    protected $fillable = [
        'nama','deskripsi','sku'
          ];
    
 
    public function stokDetail()
    {
        return $this->hasMany('App\StokDetail', 'id_barang');
    }
  

}