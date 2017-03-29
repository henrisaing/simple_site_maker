<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Site;
use Auth;
use App\Color;
use App\AuthCheck;

class SiteController extends Controller
{
    //
  public function index(){
    $sites = Auth::user()->sites()->get();
    return view('sites.index', [
      'sites' => $sites  
    ]);
  }

  public function edit(Site $site){
    if (AuthCheck::ownsSite($site)):
      $view = view('sites.edit', ['site' => $site]);
    else:
      $view = redirect('/error');
    endif;
    return $view;
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

  public function update(Request $request, Site $site){
    $this->validate($request, []); //nothing yet
    
    $site->update([
      'name' => $request->name,
      'style' => $request->style,
      'notes' => $request->notes,
    ]);
    return redirect('/sites');
  }

  public function summary(Site $site){

    if (AuthCheck::ownsSite($site)):
      $pages = $site->pages()->get();
      $colors = $site->colors()->get();
      $view = view('sites.summary', [
        'site' => $site,
        'pages' => $pages,
        'colors' => $colors,
      ]);
    else:
      $view = redirect('/error');
    endif;

    return $view;
  }

  public function preview(Site $site){
    $pages = $site->pages()->get();
    $colors = $site->colors()->get();
    return view('preview.site', [
      'site' => $site,
      'pages' => $pages,
      'colors' => $colors,
    ]);
  }

  public function test(){
    $sites = Auth::user()->sites()->get();
    $view = view('sites.index', [
      'sites' => $sites  
    ]);

    $redirect = redirect('/');
    return $redirect;
  }

  public function error(){
    return view('errors.perm');
  }
}
