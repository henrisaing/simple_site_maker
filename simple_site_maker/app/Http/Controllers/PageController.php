<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use App\Site;
use App\Color;


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
    $colorsText = $site->colors()->where('type','text')->get()->pluck('name','id');
    $colorsBack = $site->colors()->where('type','background')->get()->pluck('name','id');
    return view('pages.new', [
      'site' => $site,
      'colorsText' => $colorsText,
      'colorsBack' => $colorsBack,
    ]);
  }

  public function edit(Page $page){
    $site = $page->site()->get();
    $colorsText = $site[0]->colors()->where('type','text')->get()->pluck('name','id');
    $colorsBack = $site[0]->colors()->where('type','background')->get()->pluck('name','id');
    return view('pages.edit', [
      'page' => $page,
      'colorsText' => $colorsText,
      'colorsBack' => $colorsBack,
    ]);
  }


  public function create(Site $site, Request $request){
    $site->pages()->create([
      'title' => $request->title,
      'info' => $request->info,
      'color_id_text' => $request->color_text,
      'color_id_background' => $request->color_background,
    ]);
    return redirect('/sites/'.$site->id.'/summary');
  }

  public function update(Request $request, Page $page){
    $site = $page->site()->get();
    $page->update([
      'title' => $request->title,
      'info' => $request->info,
      'color_id_text' => $request->color_text,
      'color_id_background' => $request->color_background,
    ]);
    return redirect('/sites/'.$site[0]->id.'/summary');
  }
}
