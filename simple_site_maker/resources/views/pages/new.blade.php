<!-- resources/views/pages/new.blade.php -->

{!! Form::open(['url' => '/site/'.$site->id.'/pages/create']) !!}
title {!! Form::text('title', null, []) !!}
info {!! Form::textarea('info', null, [
  'rows' => 3
]) !!}
  <br>
text color {!! Form::select('color_text', $colorsText) !!}
  <br>
background color {!! Form::select('color_background', $colorsBack) !!}
<br>
  {!! Form::button('add page',[
    'type' => 'submit',
    'class' => 'lb-close bg-green',
  ]) !!}
{!! Form::close() !!}