<!-- resources/views/sites/summary.blade.php -->
@extends('layouts.app')
@section('content')

<!-- NEEDS AUTH -->

<div class="contain bg-grey">
  <div class="header bg-light-grey">{{$site->name}} summary <a href="{{url('/site/'.$site->id.'/preview')}}"> [preview]</a></div>

  <div class="contain contain-left bg-grey">
    <div class="header bg-light-grey">
    Pages
      {!! Form::button('+',[
        'func' => '/site/'.$site->id.'/pages/new',
        'class' => 'lightbox-open clear',
      ]) !!}
    </div> 
    <?php foreach ($pages as $page): ?>
      <a class="lightbox-open" func="/page/{{$page->id}}/edit">
      <div class="clear" style="background-color:{{$colors->where('id', $page->color_id_background)->first()->value}};color:{{$colors->where('id', $page->color_id_text)->first()->value}}">
       {{$page->title}} |
       {{$page->info}}
     </div>
     </a>
    <?php endforeach ?> 
  </div>
  
  <div class="contain contain-right bg-grey">
    <div class="header bg-light-grey">Colors   
      {!! Form::button('+',[
      'func' => '/site/'.$site->id.'/colors/new',
      'class' => 'lightbox-open clear',
      ]) !!}
    </div>
    <?php foreach ($colors as $color): ?>
      <a class="lightbox-open" func="/color/{{$color->id}}/edit">
      <div class="clear">
        <div class="width-40 float-left">
          {{$color->name}}
        </div> 
        <div class="width-25 float-left">
          {{$color->type}}
        </div> 
        <div class="width-20 float-left" style="background-color:{{$color->value}}">
          &nbsp;
        </div>
      </div>
      </a>
    <?php endforeach ?>
  </div>
</div>
<!-- end contain  -->

@if(App::environment('local'))
<h3>Debug</h3>
    <?php foreach ($pages as $page): ?>
    back:
      {{$colors->where('id', $page->color_id_background)->first()}}; 
      <br>
    color:
      {{$colors->where('id', $page->color_id_text)->first()}}"
       {{$page->title}} |
       {{$page->info}}
    <?php endforeach ?> 
<hr>
<?php print_r($site->colors()->where('type', 'text')->get()->pluck('name','id')); ?>
<hr>
<?php print_r($site->colors()->where('type', 'background')->get()->pluck('name','id')); ?>


@endif

@endsection