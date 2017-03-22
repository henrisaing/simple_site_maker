{!! Form::open(['url' => '/image/upload',
  'enctype' => 'multipart/form-data'
]) !!}

  <input type="file" name="image" />

  <button type="submit"> Save Image</button>

{!! Form::close() !!}