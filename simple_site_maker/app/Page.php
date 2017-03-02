<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    //
  protected $fillable = [
    'title',
    'info',
    'background_image',
  ];

  public function site(){
    return $this->belongsTo(Site::class);
  }
}
