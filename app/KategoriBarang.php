<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class KategoriBarang extends Model
{
  public $table="kategoribarang";
  
//   use SoftDeletes;
// protected $dates = ['deleted_at'];
    protected $fillable = [
        'id_barang', 'id_kategori'
           ];
    
           public function kategori()
    {
        return $this->  belongsTo('App\Kategori', 'id_kategori');
    }
    public function barang()
    {
        return $this->belongsTo('App\Barang', 'id_barang');
    }
}