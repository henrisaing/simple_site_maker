<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Site;
use Auth;

class SiteController extends Controller
{
    //
  public function index(){
    $sites = Auth::user()->sites()->get();
    return view('sites.index', [
      'sites' => $sites  
    ]);
  }


  public function new(){
    return view('sites.new');
  }


  public function create(Request $request){
    $this->validate($request, []); //nothing yet
    
    Auth::user()->sites()->create([
      'name' => $request->name,
      'style' => $request->style,
      'notes' => $request->notes,
    ]);
    return redirect('/sites');
  }

  public function summary(Site $site){
    $pages = $site->pages()->get();
    $colors = $site->colors()->get();
    return view('sites.summary', [
      'site' => $site,
      'pages' => $pages,
      'colors' => $colors,
    ]);
  }
}
