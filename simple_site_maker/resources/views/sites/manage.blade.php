<!-- resources/views/sites/manage.blade.php -->
@extends('layouts.app')
@section('content')
<div class="contain bg-grey">
<div class="header bg-grey">sites
</div>
  <?php foreach ($sites as $site): ?>
    <div class="contain-left bg-grey" >
      <h4>{{$site->name}}</h4>
      <form action="/site/{{$site->id}}/delete" method="post">
        {{csrf_field()}}
        {{method_field('delete')}}
        <button type="submit" class="bg-red">delete</button>
      </form>
    </div>
  <?php endforeach ?>
</div>

@endsection