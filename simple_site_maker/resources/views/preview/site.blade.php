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

  <!-- start parallax -->
<?php if ($site->style == 'parallax'): ?>
  <?php foreach ($pages as $page): ?>

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

  <?php endforeach ?>
<!-- end pages loop  fot para-->

<script type="text/javascript" src="{{asset('js/site-para.js')}}"></script>
<!-- end para -->

<!-- start horizontal -->
<?php elseif($site->style == 'horizontal'): ?>
  <!-- these look hella ugly -->
  <a class="prev"><div id="previous"> < </div> </a>
  <a class="next"><div id="next"> > </div> </a>
  <!-- redo these later -->

  <?php foreach ($pages as $page): ?>
     <div id="{{$page->id}}" class="horizontal"
    <?php if ($page->background_img_url != null): ?>
      style="background-image:url({{Storage::url($page->background_img_url)}})">
    <?php else: ?>
      style="background-color:#000">
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
  <?php endforeach; ?>
<!-- end pages loop for horz -->

<script type="text/javascript" src="{{asset('js/site-horizontal.js')}}"></script>
<?php endif; ?>
  <!-- end horizontal -->


</body>
</html>