<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class StatusPengiriman extends Model
{
  public $table="status_pengiriman";
  
  use SoftDeletes;
protected $dates = ['deleted_at'];
    protected $fillable = [
           ];
           public function pengiriman()
           {
               return $this->belongsTo('App\Pengiriman', 'id_pengiriman');
           }
          
}