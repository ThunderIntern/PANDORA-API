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
        'id_kategori','id_barang'
           ];
    
           public function kategori()
    {
        return $this->belongsTo('App\Kategori', 'id_kategori');
    }
}