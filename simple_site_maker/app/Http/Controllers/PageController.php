<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use App\Site;

class PageController extends Controller
{
  public function index(Site $site){
    return 'page controller index view for '.$site->name;
  }
}
