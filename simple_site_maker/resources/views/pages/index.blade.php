<!-- resources/views/pages/index.blade.php -->
@extends('layouts.app')
@section('content')
<div class="contain contain-grey">
  <div class="header header-grey">{{$site->name}}'s pages
  </div>
  {!! Form::button('add new site',[
  'func' => '/site/'.$site->id.'/pages/new',
  'class' => 'lightbox-open clear',
]) !!}


<?php foreach ($pages as $page): ?>
  {{$page->title}} | {{$page->info}}
  <hr>
<?php endforeach ?>
</div>
@endsection