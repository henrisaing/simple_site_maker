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
    $this->validate($request, [

    ]);
    
    Auth::user()->sites()->create([
      'name' => $request->name,
      'style' => $request->style,
      'notes' => $request->notes,
    ]);

    return redirect('/sites');
  }
}
