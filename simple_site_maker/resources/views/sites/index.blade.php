<!-- resources/views/sites/index.blade.php -->
@extends('layouts.app')
@section('content')
<div class="contain contain-grey">
<div class="header header-grey">sites
{!! Form::button('add new site',[
  'func' => '/sites/new',
  'class' => 'lightbox-open',
]) !!}
</div>
  <?php foreach ($sites as $site): ?>
    <a href="{{url('/sites/'.$site->id.'/summary')}}">
      {{$site->name}} | {{$site->style}} | {{$site->notes}}
    </a>
    <a href="{{url('/site/'.$site->id.'/preview')}}"> [preview]</a>
    <hr>
  <?php endforeach ?>
</div>
@endsection