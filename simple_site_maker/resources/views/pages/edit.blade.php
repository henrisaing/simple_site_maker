<!-- resources/views/pages/edit.blade.php -->

{!! Form::open(['url' => '/page/'.$page->id.'/update']) !!}
title {!! Form::text('title', $page->title, []) !!}
info {!! Form::textarea('info', $page->info, [
  'rows' => 3
]) !!}
  <br>
text color {!! Form::select('color_text', $colorsText, $page->color_id_text) !!}
  <br>
background color {!! Form::select('color_background', $colorsBack, $page->color_id_background) !!}
<br>
  {!! Form::button('update page',[
    'type' => 'submit',
  ]) !!}
{!! Form::close() !!}
