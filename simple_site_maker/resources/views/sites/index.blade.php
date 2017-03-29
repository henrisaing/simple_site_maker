<!-- resources/views/sites/index.blade.php -->
@extends('layouts.app')
@section('content')
<div class="contain bg-grey">
<div class="header bg-grey">sites
{!! Form::button('add new site',[
  'func' => '/sites/new',
  'class' => 'lightbox-open',
]) !!}
</div>
  <?php foreach ($sites as $site): ?>
    <a href="{{url('/sites/'.$site->id.'/summary')}}">
    <h4>{{$site->name}}</h4>
      {{$site->style}} | {{$site->notes}}
    </a>
    <a func="/site/{{$site->id}}/edit" class="lightbox-open"> [edit]</a>
    <a href="{{url('/site/'.$site->id.'/preview')}}"> [preview]</a>
    <hr>
  <?php endforeach ?>
</div>
@endsection