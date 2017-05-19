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

  public static function switchPages(Page $page1, Page $page2){
    $pageHolder = $page1;

    $page1->update([
      'title' => $page2->title,
      'info' => $page2->info,
      'background_img_url' => $page2->background_img_url,
      'img_type' => $page2->img_type,
      'color_id_text' => $page2->color_id_text,
      'color_id_background' => $page2->color_id_background,
    ]);

    $page2->update([
      'title' => $pageHolder->title,
      'info' => $pageHolder->info,
      'background_img_url' => $pageHolder->background_img_url,
      'img_type' => $pageHolder->img_type,
      'color_id_text' => $pageHolder->color_id_text,
      'color_id_background' => $pageHolder->color_id_background,
    ]);
  }
}
