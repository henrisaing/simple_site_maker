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
    'color_id_text',
    'color_id_background',
  ];

  public function site(){
    return $this->belongsTo(Site::class);
  }
}
