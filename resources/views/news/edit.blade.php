@extends('layouts.admin')

@section('content')

<div class="container p-5">

<div class="card">
<h2 class="card-header text-center">Update Headlines</h2>
<div>
  <img class="w-100" id="image" src="
  @if(isset($news->image)){{asset('/storage/img/headlines/'.$news->image)}}@endif">
</div>
<div class="form-group">
<input class="form-control" type="file" name="uploadImage" id="uploadImage">
</div>

<div class="card-body">
  <form id="myForm">

   <input type="hidden" id="newsId" name="id" value="{{$news->id}}">
      <div class="form-group">
      <input id="title" class="form-control" type="text" name="title" value="{{$news->title}}" placeholder="Title">
      </div>

      <div class="form-group">
      <input id="long_title" class="form-control" type="text" name="long_title" value="{{$news->long_title}}"  placeholder="طویل عنوان کے لئے">
      </div>

      <div class="form-group">
      <textarea class="form-control" type="text" name="intro">{{$news->intro}}</textarea>
      </div>


    <textarea id="body" name="body" class="form-control" value="{{old('body')}}">{!!$news->body!!}</textarea>
     
      <br>
    <button class="btn btn-primary btn-lg" type="submit" >محفوظ کریں</button>

  </form>

</div>
<br>
<br>

</div>

@endsection


@section('scripts')
<script>
$('#uploadImage').on('change', function() {
var file = $(this).get(0).files;
var reader = new FileReader();
reader.readAsDataURL(file[0]);
reader.addEventListener("load", function(e) {
var image = e.target.result;
$("#image").attr('src', image);
});

});



let cropper;

const image = document.getElementById('image');

image.addEventListener('load', function ()
{

  cropper = new Cropper(image, {
  aspectRatio: 16 / 9,
  crop(event) {
    console.log(event.detail.width);
    console.log(event.detail.height);
  },
});

})



let form = document.getElementById('myForm');
let id = document.getElementById('newsId').value;
var url = '/news/'+id;


form.addEventListener('submit', function (e)
{  e.preventDefault();
 
  let formData = new FormData(form)
  formData.append('_method', 'PUT')
  
  // for (var pair of formData.entries()) {
  // console.log(pair[0]+ ', ' + pair[1]); }


  if(cropper){
  cropper.getCroppedCanvas({
    maxWidth:960,
    maxHeight:540,
  }).toBlob((blob) => {
    
    formData.append('imageFile', blob)
     $.ajax(url, {
                    method: "POST",
                    type: 'POST',
                    data:formData,
                    processData: false,
                    contentType: false,
                    success(data) {
                      console.log('Upload success', data);
                      window.location.href = "/news";  
                    },
                    error(err) {
                      alert('Failed to update');
                      console.log('Upload error', err);
                    },
                  })

            },'image/jpeg')

  }else {
    

    $.ajax(url, {
                    method: "POST",
                    type: 'POST',
                    data:formData,
                    processData: false,
                    contentType: false,
                    success(data) {
                      window.location.href = "/news";  
                      alert('Successfull:'+ data);
                      console.log('Upload error', data);
                    },
                    error(err) {
                      alert('Failed: Headlines failed to save');
                      console.log('Upload error', err);
                    },
                  })

  }
  
  });

</script>


<script>
   var route_prefix = "/filemanager";
  </script>
  <!-- TinyMCE init -->
  <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>
    var editor_config = {
      path_absolute : "",
      selector: "textarea[id=body]",
      plugins: [
        "link image"
      ],
      relative_urls: false,
      height: 129,
      file_browser_callback : function(field_name, url, type, win) {
        var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
        var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

        var cmsURL = editor_config.path_absolute + route_prefix + '?field_name=' + field_name;
        if (type == 'image') {
          cmsURL = cmsURL + "&type=Images";
        } else {
          cmsURL = cmsURL + "&type=Files";
        }

        tinyMCE.activeEditor.windowManager.open({
          file : cmsURL,
          title : 'Filemanager',
          width : x * 0.8,
          height : y * 0.8,
          resizable : "yes",
          close_previous : "no"
        });
      }
    };

    tinymce.init(editor_config);
  </script>
@endsection