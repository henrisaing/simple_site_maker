<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use App\Site;
class AuthCheck extends Model
{
    //

  public static function ownsSite(Site $site){
    $owns = false;

    if (Auth::check()):
      if (Auth::user()->id == $site->user_id):
        $owns = true;
      endif;
    endif;

    return $owns;
  } 
}
