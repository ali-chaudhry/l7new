<!DOCTYPE html>
<html dir="rtl" lang="ur">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/img/favicon.png">

    <title>{{ config('app.name', 'Laravel') }} | Admin </title>
    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/admin.css')}}" rel="stylesheet">


    <style>
@font-face {
    font-family: 'Noto Nastaliq Urdu';
    font-weight: normal;
    font-display: swap;
    font-style: normal;
    src:
    url("{{asset('/urdu/NotoNastaliqUrdu-Regular.ttf')}}") format('truetype'),
    url("{{asset('/urdu/NotoNastaliqUrdu-Regular.woff')}}") format('woff');

}

@font-face {
    font-family: 'Noto Nastaliq Urdu';
    font-weight: bold;
    font-display: block;
    src:
    url("{{asset('/urdu/NotoNastaliqUrdu-Regular.ttf')}}") format('truetype'),
    url("{{asset('/urdu/NotoNastaliqUrdu-Regular.woff')}}") format('woff');

}

@font-face {
    font-family: 'Noto Nastaliq Urdu';
    font-weight: normal;
    font-display: block;
    font-style: normal;
    src:
    url("{{asset('/urdu/NotoNastaliqUrdu-Regular.ttf')}}") format('truetype'),
    url("{{asset('/urdu/NotoNastaliqUrdu-Regular.woff')}}") format('woff');

}



body {
  font-family: 'Noto Nastaliq Urdu';
  margin-top: 0 !important;
  margin-bottom: 0 !important;
  background: #fff;
  color: #222;
  line-height: 2.5rem;
}

.eng-font{
  font-family: 'Roboto', sans-serif !important;
  font-weight: 560;
}

p {
  font-family: 'Noto Nastaliq Urdu';
  font-size: 1em;
  font-weight: 300;
  color: #222;
  text-align:right;
}
h1, h2, h3, h4, h5, h6{
  line-height: 3rem;
}

@media only screen and (max-width: 760px) {
 
  h2{
    font-size: 16px;
  }
  h3{
    font-size: 14px
  }
  h4{
    font-size: 13px;
  }
  h5{
    font-size: 	12px;
  }
  p{
    font-size: 	12px
  }

}


.bg-grey{
  background-color:#B9B4B4;
}
a,
a:hover,
a:focus {
  text-decoration: none;
  transition: all 0.3s;
}
.navbar a {
  color: #fff;
}
.navbar {
  padding: 15px 10px;
  background: blue !important;
  border: none;
  border-radius: 0;
  margin-bottom: 40px;
  box-shadow: 1px 1px 3px rgb(223, 223, 223);
}

.navbar-btn {
  box-shadow: none;
  outline: none !important;
  border: none;
}

.line {
  width: 100%;
  height: 1px;
  border-bottom: 1px dashed #ddd;
  margin: 40px 0;
}


/* ---------------------------------------------------
    SIDEBAR STYLE
----------------------------------------------------- */

.wrapper {
  display: flex;
  align-items: stretch;
}


#sidebar {
  min-width: 250px;
  max-width: 250px;
  background: blue;
  color: #B9B4B4;
  transition: all 0.3s;
  z-index: 4999 !important;
  box-shadow: 1px 2px 2px 3px rgb(223, 223, 223);
}

#sidebar{
  color: #222;
  background: blue;
  box-shadow: 0px 0px 6px 0px rgb(223, 223, 223);
}

#sidebar.active {
  margin-right: -250px;
}

#sidebar .sidebar-header {
  padding: 10px;
  background: blue;
}

#sidebar ul.components {
  padding: 0;

}

#sidebar ul p {
  color: #222;;
  padding: 10px;
}

#sidebar ul li a {
  padding: 10px;
  font-size: 1.1em;
  display: block;
  color: #fff;
  background: #191970;
  box-shadow: 0px 0px 6px 0px #000;
}

.list-unstyled{
  padding-right: 0 !important;
}

#sidebar ul li {
  text-align: right;
}


#sidebar ul li a:hover {
  color: #fff;
  background: #555;
}

#sidebar ul li.active > a,
a[aria-expanded="true"] {
  color: #fff;
  background: #191970;
  box-shadow: 0px 0px 6px 0px #000;

}

a[data-toggle="collapse"] {
  position: relative;
}

a[aria-expanded="false"]::before,
a[aria-expanded="true"]::before {

  display: block;
  position: absolute;
  left: 20px;
  font-family: 'Glyphicons Halflings';
  font-size: 0.6em;
}

a[aria-expanded="true"]::before {

}

#sidebar ul li ul{
  margin-right: 0 !important;
  text-align: right;

}

#sidebar ul li ul li{
  margin-right: 0 !important;
  text-align: right;

}
ul ul a {
  font-size: 0.9em !important;
  padding-right: 30px !important;
  background: #fff;
  color: #222;
  text-align: right;

}



ul.CTAs {
  padding: 20px;
}

ul.CTAs a {
  text-align: center;
  font-size: 0.9em !important;
  display: block;
  border-radius: 5px;
  margin-bottom: 5px;
}

a.download {
  background: #fff;
  color: #7386D5;
}

a.article,
a.article:hover {
  background: #C1BDBD !important;
  color: #fff !important;
}

.table,.row, .container, .content{
  z-index: 1 !important;
}

/* ---------------------------------------------------
    CONTENT STYLE
----------------------------------------------------- */

#content {
  padding: 20px;
  min-height: 100vh;
  transition: all 0.3s;
}

#content p a {
  color: #222;
}



/* ---------------------------------------------------
    MEDIAQUERIES
----------------------------------------------------- */

@media (max-width: 768px) {
  #sidebar {
    margin-right: -250px;
    z-index: 4999 !important;
  }
  #sidebar.active {
    margin-right: 0;
    z-index: 4999 !important;
  }
  #sidebarCollapse span {
    display: none;
  }
}
</style>
  </head>
  <body>


<div class="wrapper ">
    <!-- Sidebar Holder -->
    @include('layouts.inc.sidebar')

<div class="row" >
  <div class="w-100 mx-auto p-3" >
      @include('layouts.inc.messages')
  <div style="min-height:100vh;">
    @yield('content')
  </div>

  </div>

</div>

</div>

<script src="{{asset('js/app.js')}}" type="text/javascript"></script>
<script src="{{asset('js/cropper.js')}}" type="text/javascript"></script>


@yield('scripts')


  <script type="text/javascript">
  $(document).ready(function() {
$("#sidebarCollapse").on("click", function() {
  $("#sidebar").toggleClass("active");
  $(this).toggleClass("active");
});
});
  </script>
  </body>
</html>
