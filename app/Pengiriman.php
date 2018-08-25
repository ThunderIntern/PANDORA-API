<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Pengiriman extends Model
{
  public $table="pengiriman";
  
  use SoftDeletes;
protected $dates = ['deleted_at'];
    protected $fillable = [
          ];
          public function pesananHeader()
          {
              return $this->belongsTo('App\PesananHeader', 'id_pesanan_header');
          }
          public function statusPengiriman()
          {
              return $this->hasOne('App\StatusPengiriman', 'id_pengiriman');
          }
        
   
    //mutator
    public function setBiodataPenerimaAttribute($biodata_penerima)
    {
        $this->attributes['biodata_penerima'] =json_encode($biodata_penerima);
    }
    //accessor
    public function getBiodataPenerimaAttribute($biodata_penerima)
    {
        return json_decode($this->attributes['biodata_penerima'],true);
      
    }
 //mutator
    public function setBiodataPengirimAttribute($biodata_pengirim)
    {
        $this->attributes['biodata_pengirim'] =json_encode($biodata_pengirim);
    }
    //accessor
    public function getBiodataPengirimAttribute($biodata_pengirim)
    {
        return json_decode($this->attributes['biodata_pengirim'],true);
      
    }
}