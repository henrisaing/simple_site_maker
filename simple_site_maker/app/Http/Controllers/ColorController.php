<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Site;
use App\Color;
class ColorController extends Controller
{
  public function index(Site $site){
    $colors = $site->colors()->get();
    return view('colors.index', [
      'site' => $site,
      'color' => $color,
    ]);
  }


  public function new(Site $site){
    return view('colors.new', [
      'site' => $site,
    ]);
  }


  public function edit(Color $color){
    return view('colors.edit', [
      'color' => $color,
    ]);
  }


  public function create(Request $request, Site $site){
    $site->colors()->create([
      'name' => $request->name,
      'type' => $request->type,
      'value' => $request->value,
    ]);
    return redirect('/site/'.$site->id.'/summary');
  }

  public function update(Request $request, Color $color){
    $site = $color->site()->get();
    $color->update([
      'name' => $request->name,
      'type' => $request->type,
      'value' => $request->value,
    ]);
    return redirect('/site/'.$site[0]->id.'/summary');
  }


}
