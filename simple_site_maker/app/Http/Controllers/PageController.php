<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use App\Site;

class PageController extends Controller
{
  public function index(Site $site){
    $pages = $site->pages()->get();
    return view('pages.index',[
      'pages' => $pages,
      'site' => $site,
    ]);
  }


  public function new(Site $site){
    return view('pages.new', [
      'site' => $site,
    ]);
  }


  public function create(Site $site, Request $request){
    $site->pages()->create([
      'title' => $request->title,
      'info' => $request->info,
    ]);
    return redirect('/sites/'.$site->id.'/summary');
  }
}
