<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Saldo extends Model
{
  public $table="saldo";
  
  use SoftDeletes;
protected $dates = ['deleted_at'];
    protected $fillable = [
    'tanggal','jumlah','keterangan','id_wallet'
          ];
    

    public function wallet()
    {
        return $this->belongsTo('App\Wallet', 'id_wallet');
    }
}