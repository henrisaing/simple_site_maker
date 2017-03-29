<!-- resources/views/sites/edit.blade.php -->

{!! Form::open(['url' => '/site/'.$site->id.'/update']) !!}
name {!! Form::text('name', $site->name, []) !!}
<br>
style
{!! Form::select('style', [
  'parallax' => 'parallax',
  'horizontal' => 'horizontal',
], $site->style) !!}
<br>
notes {!! Form::textarea('notes', $site->notes, [
  'rows' => 3
]) !!}
<br>
  {!! Form::button('update site',[
    'type' => 'submit',
    'class' => 'lb-close bg-green',
  ]) !!}
{!! Form::close() !!}