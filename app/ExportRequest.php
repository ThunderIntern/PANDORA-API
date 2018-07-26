<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class ExportRequest extends Model
{
  public $table="exportRequest";
  
  use SoftDeletes;
protected $dates = ['deleted_at'];
    protected $fillable = [
    'user_id','target'  
    ];
    

}