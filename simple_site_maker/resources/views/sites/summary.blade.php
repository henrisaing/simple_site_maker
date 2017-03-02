<!-- resources/views/sites/summary.blade.php -->
@extends('layouts.app')
@section('content')
<div class="contain contain-grey">
  <div class="header header-grey">{{$site->name}} summary</div>

  <div class="contain contain-left contain-grey">
    <div class="header header-grey">
    Pages
  {!! Form::button('+',[
    'func' => '/site/'.$site->id.'/pages/new',
    'class' => 'lightbox-open clear',
  ]) !!}
    </div> 
    <?php foreach ($pages as $page): ?>
       {{$page->title}} |
       {{$page->info}}
       <br>
    <?php endforeach ?> 
  </div>
  
  <div class="contain contain-right contain-grey">
    <div class="header header-grey">Colors   
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
@endsection