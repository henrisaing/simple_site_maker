<!-- resources/views/pages/manage.blade.php -->
@extends('layouts.app')
@section('content')
<div class="contain bg-grey">
<div class="header bg-grey">pages
</div>
  <?php foreach ($pages as $page): ?>
    <div class="contain-left bg-grey" >
      <h4>{{$page->title}}</h4>
      <form action="/page/{{$page->id}}/delete" method="post">
        {{csrf_field()}}
        {{method_field('delete')}}
        <button type="submit" class="bg-red">delete</button>
      </form>
    </div>
  <?php endforeach ?>
</div>

@endsection