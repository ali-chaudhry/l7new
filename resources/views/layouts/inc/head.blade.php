<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="MNN NEW PAKISTAN"/>
        <meta name="keywords" content="MNN NEWS PAKISTAN">
        <meta name="author" content="Ali Anwar" />
        <meta name="title" content="URDU NEWSPAPER" />


        <link rel="preload" as="font" href="{{asset('/urdu/NotoNastaliqUrdu-Regular.ttf')}}" >

        <link rel="icon" href="/img/favicon.ico" type="image/png" sizes="16x16">
        
        
        <title>{{ config('app.name', 'Urdu Newspaper') }}</title>
        @yield('head')




<style>

@font-face {
    font-family: 'Noto Nastaliq Urdu';
    src:
    url("{{asset('/urdu/NotoNastaliqUrdu-Regular.ttf')}}") format('truetype');
    font-weight: 300;
    font-display: swap;
    font-style: normal;

}

</style>


<link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">



 <script>
 setTimeout(function(){
	var load_screen = document.getElementById("load_screen");
	document.body.removeChild(load_screen);
	console.log('preloader')
},1000);
</script>


<!-- Google Analytics -->
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-155585252-1', 'auto');
ga('send', 'pageview');
</script>
<!-- End Google Analytics -->
<!--Google AdSense-->
<script data-ad-client="ca-pub-5289466995418355" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!--End Google AdSense-->
<!-- Facebook Analytics -->
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '2524750984439124',
      cookie     : true,
      xfbml      : true,
      version    : 'v5.0'
    });
      
    FB.AppEvents.logPageView();   
      
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

<!-- End Facebook Analytics -->

 </head>
