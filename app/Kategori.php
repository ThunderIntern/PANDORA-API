<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Kategori extends Model
{
  public $table="kategori";
  
  use SoftDeletes;
protected $dates = ['deleted_at'];
    protected $fillable = [
        'nama','jenis'
           ];
    
           public function kategoribarang()
    {
        return $this->hasMany('App\KategoriBarang', 'id_kategori');
    }
   
}