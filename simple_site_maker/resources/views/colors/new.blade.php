<!-- resources/views/pages/new.blade.php -->

{!! Form::open(['url' => '/site/'.$site->id.'/colors/create']) !!}
name {!! Form::text('name', null, [
  'required' => 'required',
]) !!}
{!! Form::select('type', [
  'background' => 'background color',
  'text' => 'text color',
], 'parallax') !!}
<br>
<input type="text" id="value-text">
<input type="color" name="value" id="value">
<br>
  {!! Form::button('add color',[
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