<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Wallet extends Model
{
  public $table="wallet";
  
  use SoftDeletes;
protected $dates = ['deleted_at'];
    protected $fillable = [
     'user_id','nomer_rekening'
          ];
    

    public function saldo()
    {
        return $this->hasMany('App\Saldo', 'id_wallet');
    }
    public function pesananHeader(){
        return $this->hasOne('App\PesananHeader','id_user','id_user');
    }
}