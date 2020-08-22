@extends('layouts.admin')

@section('content')

<div class="container">


<div class="col-md-8 col-lg-6">
  <img class="w-100" id="image" src="
  @if(isset($news->image)){{asset('/storage/img/headlines/'.$news->image)}}@endif">
</div>


<div class="card-body">

<h3 class="text-right my-3">{{$news->title}}</h3>

<h5 class="text-right my-2">{{$news->long_title}}</h5>

<p class="text-right">{!!$news->body!!}</p>
</div>

<div class="text-right">
<a href="/news/{{$news->id}}/edit" class="btn btn-info">Edit</a>

&nbsp;

    <a onclick="if(confirm('Are you sure you want to delete this?')){
      event.preventDefault();
      document.getElementById('delete-form-{{ $news->id}}').submit();
    }
    else{
      event.preventDefault();
    }"
   class="btn btn-danger">Delete</a>
   <form id="delete-form-{{$news->id}}" action="/news/{{$news->id}}" method="post" style="display:none;">
         @csrf
         {{method_field('DELETE')}}
       </form>
</div>

<br>
<br>
</div>

@endsection
