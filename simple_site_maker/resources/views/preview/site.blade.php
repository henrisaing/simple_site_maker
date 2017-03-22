<!-- resources/views/preview/site.blade.php -->
<!DOCTYPE html>
<html>
<head>
  <title>{{$site->name}}</title>

  <!-- para or horz css -->
  <?php if ($site->style == 'parallax'): ?>
    <link href="{{ asset('css/parallax.css') }}" rel="stylesheet">
  <?php elseif($site->style == 'horizontal'): ?>
    <link href="{{ asset('css/horizontal.css') }}" rel="stylesheet">
  <?php endif; ?>

  <link rel="stylesheet" type="text/css" href="{{asset('css/site.css')}}">

  <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>

</head>
<body>
<div id="nav">
  <?php foreach ($pages as $page): ?>
    <a href="#{{$page->id}}" class="nav-link">
      <div>{{$page->title}}</div>
    </a>
  <?php endforeach ?>
</div>

<?php foreach ($pages as $page): ?>

  <!-- start parallax -->
  <?php if ($site->style == 'parallax'): ?>
    <?php if ($page->background_img_url != null): ?>
      <div class="parallax" style="background-image:url({{Storage::url($page->background_img_url)}})">
    <?php else: ?>
      <div class="parallax" style="background-color:#fff">
    <?php endif; ?>
      <div class="fade-white">
        <div class="mid-text" style="background-color:{{$colors->where('id', $page->color_id_background)->first()->value}};
      color:{{$colors->where('id', $page->color_id_text)->first()->value}}">
          {{$page->title}}
        </div>
      </div>
    </div>

    <div class="content" id="{{$page->id}}"
      style="
      background-color:{{$colors->where('id', $page->color_id_background)->first()->value}};
      color:{{$colors->where('id', $page->color_id_text)->first()->value}}">
      <p>
        {{$page->info}}
      </p>
      
    </div>
  <!-- end parallax -->

  <!-- start horizontal -->
  <?php elseif($site->style == 'horizontal'): ?>
    <?php if ($page->background_img_url != null): ?>
      <div class="horizontal" style="background-image:url({{Storage::url($page->background_img_url)}})">
    <?php else: ?>
      <div class="horizontal" style="background-color:#000">
    <?php endif; ?>
      <div class="dark-overlay">
        <div class="title" style="color:{{$colors->where('id', $page->color_id_text)->first()->value}}">
          {{$page->title}}
        </div>

        <div class="content" style="color:{{$colors->where('id', $page->color_id_text)->first()->value}};
        background-color:{{$colors->where('id', $page->color_id_background)->first()->value}};">
          <p>{{$page->info}}</p>
        </div>
      </div>
    </div>
  <?php endif; ?>
  <!-- end horizontal -->

<?php endforeach ?>
<!-- end pages loop -->
<script type="text/javascript" src="{{asset('js/site.js')}}"></script>
</body>
</html>