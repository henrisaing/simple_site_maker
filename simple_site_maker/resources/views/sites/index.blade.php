<!-- resources/views/sites/index.blade.php -->
@extends('layouts.app')
@section('content')
<div class="contain bg-grey">
<div class="header bg-grey">sites
{!! Form::button('add new site',[
  'func' => '/sites/new',
  'class' => 'lightbox-open bg-green',
]) !!}
<a href="/manage">
  <button class="button bg-red">delete sites</button>
</a>
</div>
  <?php foreach ($sites as $site): ?>
    <div class="contain-left bg-grey" >
      <a href="{{url('/site/'.$site->id.'/summary')}}">
      <h4>{{$site->name}}</h4>
        {{$site->style}} | {{$site->notes}}
      </a>
      <a func="/site/{{$site->id}}/edit" class="lightbox-open" href="#"> [edit]</a>
      <a href="{{url('/site/'.$site->id.'/preview')}}"> [preview]</a>
    </div>
  <?php endforeach ?>
</div>
@endsection