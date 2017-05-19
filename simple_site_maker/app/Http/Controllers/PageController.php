<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Page;
use App\Site;
use App\Color;
use App\AuthCheck;


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
    if (AuthCheck::ownsSite($site)):
      $colorsText = $site->colors()->where('type','text')->get()->pluck('name','id');
      $colorsBack = $site->colors()->where('type','background')->get()->pluck('name','id');
      $view = view('pages.new', [
        'site' => $site,
        'colorsText' => $colorsText,
        'colorsBack' => $colorsBack,
      ]);
    else:
      $view = view('errors.perm');
    endif;

    return $view;
  }

  public function edit(Page $page){
    $site = $page->site()->get();
    if (AuthCheck::ownsSite($site[0])):
      $colorsText = $site[0]->colors()->where('type','text')->get()->pluck('name','id');
      $colorsBack = $site[0]->colors()->where('type','background')->get()->pluck('name','id');
      $view = view('pages.edit', [
        'page' => $page,
        'colorsText' => $colorsText,
        'colorsBack' => $colorsBack,
      ]);
    else:
      $view = view('errors.perm');
    endif;

    return $view;
  }


  public function create(Site $site, Request $request){
    if (AuthCheck::ownsSite($site)):
      if ($request->file('img') != null):
        $file = $request->file('img');
        $ext = $file->extension();
        $img_url = $file->store('public/'.$site->id);
      else:
        $img_url = null;
        $ext = null;
      endif;

      

      $site->pages()->create([
        'title' =>clean($request->title),
        'info' => clean($request->info),
        'color_id_text' => $request->color_text,
        'color_id_background' => $request->color_background,
        'background_img_url' => $img_url,
        'img_type' => $ext,
      ]);
      $view = redirect('/site/'.$site->id.'/summary');
    else:
      $view = view('errors.perm');
    endif;

    return $view;
  }

  public function update(Request $request, Page $page){
    $site = $page->site()->get();

    if (AuthCheck::ownsSite($site[0])):
      if ($request->file('img') != null):
        $file = $request->file('img');
        $ext = $file->extension();
        $img_url = $file->store('public/'.$site[0]->id);
        $page->update([
          'background_img_url' => $img_url,
          'img_type' => $ext,
        ]);
      endif;

      $page->update([
        'title' =>clean($request->title),
        'info' => clean($request->info),
        'color_id_text' => $request->color_text,
        'color_id_background' => $request->color_background,
      ]);
      $view = redirect('/site/'.$site[0]->id.'/summary');
    else:
      $view = view('errors.perm');
    endif;

    return $view;
  }

  public function delete(Page $page){
    $site = $page->site()->get();

    if (AuthCheck::ownsSite($site[0])):
      $page->delete();
    endif;

    $view = redirect('/site/'.$site[0]->id.'/summary');

    return $view;
  }
}
