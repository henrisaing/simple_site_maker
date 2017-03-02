<!-- resources/views/pages/edit.blade.php -->

{!! Form::open(['url' => '/color/'.$color->id.'/update']) !!}
name {!! Form::text('name', $color->name, [
  'required' => 'required',
]) !!}
{!! Form::select('type', [
  'background' => 'background color',
  'text' => 'text color',
], $color->type) !!}
<br>
<input type="text" id="value-text" value="{{$color->value}}">
<input type="color" name="value" id="value" value="{{$color->value}}">
<br>
  {!! Form::button('update color',[
    'type' => 'submit',
  ]) !!}
{!! Form::close() !!}

<script type="text/javascript">
  $('input#value').change(function(){
    $('input#value-text').val($('input#value').val());
  });
  $('input#value-text').change(function(){
    $('input#value').val($('input#value-text').val());
  });
</script>