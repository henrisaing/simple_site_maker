<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    //
  protected $fillable = [
    'name',
    'style',
    'notes',
  ];

  public function pages(){
    return $this->hasMany(Page::class);
  }

  public function colors(){
    return $this->hasMany(Color::class);
  }

  public function user(){
    return $this->belongsTo(User::class);
  }
}
