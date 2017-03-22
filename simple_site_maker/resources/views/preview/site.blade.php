<!-- resources/views/preview/site.blade.php -->
<!DOCTYPE html>
<html>
<head>
  <title>{{$site->name}}</title>
  <?php if ($site->style == 'parallax'): ?>
    <link href="{{ asset('css/parallax.css') }}" rel="stylesheet">
  <?php endif; ?>
</head>
<body>
<?php foreach ($pages as $page): ?>
  <?php if ($site->style == 'parallax'): ?>
    <!-- style/backrgound black is placeholder -->
    <!-- <img src="{{Storage::url($page->background_img_url)}}"> -->
    <div class="parallax" style="background-image:url({{Storage::url($page->background_img_url)}})">
      <div class="fade-white">
        <div class="mid-text" style="background-color:{{$colors->where('id', $page->color_id_background)->first()->value}};
      color:{{$colors->where('id', $page->color_id_text)->first()->value}}">
          {{$page->title}}
        </div>
      </div>
    </div>

    <div class="content" 
      style="
      background-color:{{$colors->where('id', $page->color_id_background)->first()->value}};
      color:{{$colors->where('id', $page->color_id_text)->first()->value}}">
      <p>
        {{$page->info}}
      </p>
      
    </div>
  <?php endif; ?>
  </div>
<?php endforeach ?>
</body>
</html>