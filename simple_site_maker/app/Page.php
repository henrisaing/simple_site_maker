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
    'background_img_url',
    'img_type',
    'color_id_text',
    'color_id_background',
  ];

  public function site(){
    return $this->belongsTo(Site::class);
  }
}
