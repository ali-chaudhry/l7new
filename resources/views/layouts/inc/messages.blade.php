<div class="col-sm-12">
  @if (session()->has('message'))
  <div class="alert alert-success">
    {{session('message')}}
  </div>
  @endif
</div>
</div>

<div class="container">
  <div class="col-md-12">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</div>
