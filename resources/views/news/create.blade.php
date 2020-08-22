@extends('layouts.admin')

@section('content')

<div class="container p-5">

<div>
  <img class="w-100" id="image" src="">
</div>
<div class="form-group">
<input class="form-control" type="file" name="uploadImage" id="uploadImage">
    </div>

<div class="card">
<h2 class="card-header text-center">Create Headline</h2>
<div class="card-body">


  <form id="myForm">
      <div class="form-group">
      <input id="title" class="form-control" type="text" name="title" value="{{old('title')}}" placeholder="عنوان لکھیں" required>
      </div>
     
      <input type="hidden" name="myFile" value="">
      <div class="form-group">
      <input id="long_title" class="form-control" type="text" name="long_title" value="{{old('long_title')}}"  placeholder="طویل عنوان کے لئے" required>
      </div>

      <div class="form-group">
      <textarea class="form-control" type="text" name="intro" value="{{old('intro')}}"  placeholder="تعارف لکھیں" required></textarea>
      </div>

      <p>تصویر اپ لوڈ  کیلئے (282 * 501) سائز استعمال کریں</p>
      <div class="form-group">
      <textarea id="body" name="body" value="{{old('body')}}" placeholder=" عبارت لکھیں ">{{old('body')}}</textarea>
      </div>
      
      <br>
    <button class="btn btn-primary btn-lg"  type="submit">محفوظ کریں</button>

  </form>

</div>
<br>
<br>

</div>

@endsection


@section('scripts')
<script>

let cropper = null;

var uploadiImage = document.getElementById('uploadImage');
var image = document.getElementById('image');

uploadImage.addEventListener('change', function() {

      const file = $(this).get(0).files;
      const reader = new FileReader();
      reader.readAsDataURL(file[0]);

      reader.addEventListener("load", function(e) {
            const src = e.target.result;  
            image.src = src; 
            
                    if(cropper !== null){
                      cropper.destroy();
                    }  
                    
                    cropper = new Cropper(image, {
                    aspectRatio: 16 / 9,
                    crop(event) {
                      console.log(event.detail.width);
                      console.log(event.detail.height);
                      },
                    });
                
          });

});








let form = document.getElementById('myForm')
form.addEventListener('submit', function (e)
{  e.preventDefault();
 
  let formData = new FormData(form)
 
  if(cropper){
  cropper.getCroppedCanvas({
    maxWidth:960,
    maxHeight:540,
    width:501,
    height:282,
    minWidth:339,
    minHeight:191,
    
  }).toBlob((blob) => {
    
    formData.append('imageFile', blob)
    //  for (var pair of formData.entries()) {
    //  console.log(pair[0]+ ', ' + pair[1]); }
    $.ajax('/news', {
                    method: "POST",
                    type: 'POST',
                    data:formData,
                    processData: false,
                    contentType: false,
                    success(data) {
                          console.log(data);
                          alert('Post Upload success');
                    },
                    error(err) {
                      alert('Failed to save: Please fill all fields');
                      console.log('Upload error', err.responseJson);
                    },
                  })

            },'image/jpeg')

  }else {

    $.ajax('/news', {
                    method: "POST",
                    type: 'POST',
                    data:formData,
                    processData: false,
                    contentType: false,
                    success(data) {
                      console.log(data);                
                      console.log('Upload error', data);
                    },
                    error(err) {
                      alert('Failed: Headlines failed to save');
                      console.log('Upload error', err.responseJson);
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