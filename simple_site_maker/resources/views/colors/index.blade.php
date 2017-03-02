<!-- resources/views/colors/index.blade.php -->
@extends('layouts.app')
@section('content')
<div class="contain contain-grey">
  <div class="header header-grey">{{$site->name}}  colors</div>
  {!! Form::button('',[
    '' => '',
  ]) !!}
  <?php foreach ($colors as $color): ?>
    
  <?php endforeach ?>
</div>
<!-- end contain  -->
@endsection