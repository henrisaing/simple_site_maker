<!-- resources/views/sites/new.blade.php -->

{!! Form::open(['url' => '/sites/create']) !!}
name {!! Form::text('name', null, []) !!}
<br>
style
{!! Form::select('style', [
  'parallax' => 'parallax',
  'horizontal' => 'horizontal',
], 'parallax') !!}
<br>
notes {!! Form::textarea('notes', null, [
  'rows' => 3
]) !!}
<br>
  {!! Form::button('create site',[
    'type' => 'submit',
  ]) !!}
{!! Form::close() !!}