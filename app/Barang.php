<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
class Barang extends Model 
{
  public $table= "barang";
  use SoftDeletes;
protected $dates = ['deleted_at'];
    protected $fillable = [
        'nama','deskripsi','sku','dimensi','berat'
          ];
    public function pricing(){
        return $this->hasOne('App\Pricing','sku_barang','sku')
        ->orderby('tanggal','desc');
    }
    public function sellinglist(){
        return $this->hasOne('App\SellingList','sku_barang','sku');
 
    }
    public function current_price(){
        return $this->hasOne('App\Pricing','sku_barang','sku')->where('tanggal', '<=', Carbon::now())->orderby('tanggal','desc');
    }

    public function stokDetail(){
        return $this->hasMany('App\StokDetail', 'id_barang');
    }
    public function kategoribarang()
    {
        return $this->hasMany('App\KategoriBarang', 'id_barang');
    }
    public function image()
    {
        return $this->hasMany('App\Image', 'id_barang');
    }
   //mutator
   public function setDimensiAttribute($dimensi)
   {
       $this->attributes['dimensi'] =json_encode($dimensi);
   }
   //accessor
   public function getDimensiAttribute($dimensi)
   {
       return json_decode($this->attributes['dimensi'],true);
   }
}
