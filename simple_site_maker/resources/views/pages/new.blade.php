<!-- resources/views/pages/new.blade.php -->

{!! Form::open(['url' => '/site/'.$site->id.'/pages/create']) !!}
title {!! Form::text('title', null, []) !!}
info {!! Form::textarea('info', null, [
  'rows' => 3
]) !!}
<br>
  {!! Form::button('add page',[
    'type' => 'submit',
  ]) !!}
{!! Form::close() !!}