<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Gudang extends Model
{
  public $table="gudang";
  
  use SoftDeletes;
protected $dates = ['deleted_at'];
    protected $fillable = [
      'nama','alamat'
          ];
    

    public function stokHeader()
    {
        return $this->hasMany('App\StokHeader', 'id_gudang');
    }
}