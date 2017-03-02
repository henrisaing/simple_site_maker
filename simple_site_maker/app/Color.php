<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    //
  public $fillable = [
    'type',
    'value',
    'name',
  ];

  public function site(){
    return $this->belongsTo(Site::class);
  }
}
