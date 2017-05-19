<!-- resources/views/sites/manage.blade.php -->
@extends('layouts.app')
@section('content')
<div class="contain bg-grey">
<div class="header bg-grey">sites
</div>
  <?php foreach ($sites as $site): ?>
    <div class="contain-left bg-grey width-100" >
      <form action="/site/{{$site->id}}/delete" method="post">
        {{csrf_field()}}
        {{method_field('delete')}}
      <div class="width-75 float-left">{{$site->name}}</div>
      <div class="width-25 float-left"><button type="submit" class="bg-red">delete</button></div> 
        
      </form>
    </div>
  <?php endforeach ?>
</div>

@endsection