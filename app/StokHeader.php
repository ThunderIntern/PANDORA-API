<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class StokHeader extends Model
{
  public $table="stok_header";
  
  use SoftDeletes;
protected $dates = ['deleted_at'];
    protected $fillable = [
      
          ];
   
    public function stokDetail()
    {
        return $this->hasMany('App\StokDetail', 'id_stok_header');
    }
   
    public function gudang()
    {
        return $this->belongsTo('App\Gudang', 'id_gudang');
    }
   
}