<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class StokDetail extends Model
{
  public $table="stok_detail";
  public $timestamps = false;
    protected $fillable = [
      'satuan','kuantitas','id_barang','id_stok_header'
          ];
   
    public function barang()
    {
        return $this->belongsTo('App\Barang', 'id_barang');
    }
   
    public function stokHeader()
    {
        return $this->belongsTo('App\StokHeader', 'id_stok_header');
    }
   
}