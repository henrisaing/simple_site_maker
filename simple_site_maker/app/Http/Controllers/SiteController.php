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
    if(Auth::check()):
      $sites = Auth::user()->sites()->get();
      $view = view('sites.index', [
        'sites' => $sites  
      ]);
    else:
      $view = view('errors.generic', [
        'error' => 'Error',
        'msg' => 'Please sign in.'
      ]);
    endif;

    return $view;
  }

  public function manage(){
    if(Auth::check()):
      $sites = Auth::user()->sites()->get();
      $view = view('sites.manage', [
        'sites' => $sites  
      ]);
    else:
      $view = view('errors.generic', [
        'error' => 'Error',
        'msg' => 'Please sign in.'
      ]);
    endif;

    return $view;
  }

  public function edit(Site $site){
    if (AuthCheck::ownsSite($site)):
      $view = view('sites.edit', ['site' => $site]);
    else:
      $view = view('errors.perm');
    endif;

    return $view;
  }

  public function new(){
    return view('sites.new');
  }

  public function create(Request $request){
    $this->validate($request, []); //nothing yet
    
    $site = Auth::user()->sites()->create([
      'name' => $request->name,
      'style' => $request->style,
      'notes' => $request->notes,
    ]);

    $site->colors()->create([
      'name' => 'black',
      'type' => 'text',
      'value' => '#000000',
    ]);
    $site->colors()->create([
      'name' => 'white',
      'type' => 'background',
      'value' => '#eeeeee',
    ]);

    return redirect('/sites');
  }

  public function update(Request $request, Site $site){
    if (AuthCheck::ownsSite($site)):
      $this->validate($request, []); //nothing yet
    
      $site->update([
        'name' => $request->name,
        'style' => $request->style,
        'notes' => $request->notes,
      ]);
      $view = redirect('/sites');
    else:
      $view = view('errors.perm');
    endif;

    return $view;
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
      $view = view('errors.perm');
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

    $error = 'Custom error';
    $msg = 'Custom msgs too, yay!';

    return view('errors.generic', [
      'error' => $error,
      'msg' => $msg,
    ]);
  }

  public function error(){
    return view('errors.perm');
  }

  public function delete(Site $site){
    if (AuthCheck::ownsSite($site)):
      $site->delete();
      $view = redirect('/home');
    else:
      $view = view('errors.perm');
    endif;

    return $view;
  }

}
