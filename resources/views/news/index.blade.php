@extends('layouts.admin')

@section('content')

<div class="container text-right">

<a class="btn btn-secondary" href="/news/create">Add New</a>

<h2 class="text-center">All Headlines</h2>
<br>
<table class="table table-striped">
@if(count($news) > 0)
<h4>Page {{$news->currentPage()}} of {{ceil($news->total()/$news->perPage())}}</h4>
  <thead>
    <tr>
    <td>Time</td>
    <td>Title</td>
    <td>Action</td>
    </tr>
  </thead>
@foreach($news as $new)
<tbody>
  <tr>

    <td>{{ $new->created_at->diffForHumans() }} </td>
    <td> <a href="/news/{{$new->id}}">
    {{$new->title}} </a> </td>
   
    <th>

      <a href="/news/{{$new->id}}/edit" class="btn btn-info">Edit</a>

       &nbsp;

           <a onclick="if(confirm('Are you sure you want to delete this?')){
             event.preventDefault();
             document.getElementById('delete-form-{{ $new->id}}').submit();
           }
           else{
             event.preventDefault();
           }"
          class="btn btn-danger">Delete</a>
       <form id="delete-form-{{$new->id}}" action="/admin/news/{{$new->id}}" method="post" style="display:none;">
         @csrf
         {{method_field('DELETE')}}
       </form>
    </th>
  </tr>
</tbody>
@endforeach

@else
<tbody>
  <tr>
    <td> <h3 class="text-center">No News found</h3> </td>
  </tr>
</tbody>
@endif

</table>

<br>
<br>
<h4>Page {{$news->currentPage()}} of {{ceil($news->total()/$news->perPage())}}</h4>
<div class="row justify-content-center">

{{$news->links()}}
</div>
<br>
<br>
<br>

</div><!--container-->


@endsection


@section('scripts')

<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'ur');
}
</script>

@endsection
