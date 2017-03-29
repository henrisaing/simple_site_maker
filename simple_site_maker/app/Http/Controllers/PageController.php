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
      $view = redirect('/error');
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
      $view = redirect('/error');
    endif;

    return $view;
  }


  public function create(Site $site, Request $request){
    if ($request->file('img') != null):
      $file = $request->file('img');
      $ext = $file->extension();
      $img_url = $file->store('public/'.$site->id);
    else:
      $img_url = null;
      $ext = null;
    endif;

    

    $site->pages()->create([
      'title' => $request->title,
      'info' => $request->info,
      'color_id_text' => $request->color_text,
      'color_id_background' => $request->color_background,
      'background_img_url' => $img_url,
      'img_type' => $ext,
    ]);
    return redirect('/sites/'.$site->id.'/summary');
  }

  public function update(Request $request, Page $page){
    $site = $page->site()->get();
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
      'title' => $request->title,
      'info' => $request->info,
      'color_id_text' => $request->color_text,
      'color_id_background' => $request->color_background,
    ]);
    return redirect('/sites/'.$site[0]->id.'/summary');
  }

// testing images
  // public function image(){
  //   return view('pages.image');
  // }

  // public function uploadImage(Request $request){
  //   $file = $request->file('image');
  //   $ext = $file->extension();
  //   $img_url = $file->store('test');

  //   return $img_url;
  // }
  // end image test

  // public function getImage($path, $file){
  //   if($file){
  //       $url = $path."/".$file;
  //   }else{
  //       $url = $path;
  //   }
  //   $path = storage_path("app/public/") . $url;

  //   if(!File::exists($path)) abort(404);

  //   $file = File::get($path);
  //   $type = File::mimeType($path);

  //   $response = Response::make($file, 200);
  //   $response->header("Content-Type", $type);

  //   return $response;
  // }
}
