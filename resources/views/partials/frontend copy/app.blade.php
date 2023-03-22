<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="keywords" content="HTML5 Template" />
<meta name="description" content="Zenista - Psychology & Counseling Html Template" />
<meta name="author" content="https://www.themetechmount.com/" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<title>MindTracker | @yield('front_title')</title>

<!-- favicon icon -->
<link rel="shortcut icon" href="{{asset('frontend/images/favicon.png')}}" />

<!-- bootstrap -->
<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/bootstrap.min.css')}}"/>

<!-- animate -->
<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/animate.css')}}"/>

<!-- flaticon -->
<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/flaticon.css')}}"/>

<!-- fontawesome -->
<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/font-awesome.css')}}"/>

<!-- themify -->
<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/themify-icons.css')}}"/>

<!-- slick -->
<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/slick.css')}}">

<!-- prettyphoto -->
<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/prettyPhoto.css')}}">

<!-- shortcodes -->
<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/shortcodes.css')}}"/>

<!-- main -->
<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/main.css')}}"/>

<!-- main -->
<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/megamenu.css')}}"/>

<!-- responsive -->
<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/responsive.css')}}"/>

<!-- REVOLUTION LAYERS STYLES -->
<link rel='stylesheet' id='rs-plugin-settings-css' href="{{asset('frontend/revolution/css/rs6.css')}}"> 

</head>
<body>
    <!--page start-->
    <div class="page">
        @include('partials.frontend.header')
        @yield('content')
        @include('partials.frontend.footer')

    </div>  <!--page end-->

    <!-- Javascript -->

    <script src="{{asset('frontend/js/jquery.min.js')}}"></script>
    <script src="{{asset('frontend/js/tether.min.js')}}"></script>
    <script src="{{asset('frontend/js/bootstrap.min.js')}}"></script> 
    <script src="{{asset('frontend/js/jquery.easing.js')}}"></script>    
    <script src="{{asset('frontend/js/jquery-waypoints.js')}}"></script>    
    <script src="{{asset('frontend/js/jquery-validate.js')}}"></script> 
    <script src="{{asset('frontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('frontend/js/slick.min.js')}}"></script>
    <script src="{{asset('frontend/js/numinate.min.js')}}"></script>
    <script src="{{asset('frontend/js/imagesloaded.min.js')}}"></script>
    <script src="{{asset('frontend/js/jquery-isotope.js')}}"></script>
    <script src="{{asset('frontend/js/price_range_script.js')}}"></script>
    <script src="{{asset('frontend/js/main.js')}}"></script>


    <!-- Revolution Slider -->
    
    <script src="{{asset('frontend/revolution/js/slider.js')}}"></script>

    <!-- SLIDER REVOLUTION 6.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->    

    <script  src="{{asset('frontend/revolution/js/revolution.tools.min.js')}}"></script>
    <script  src="{{asset('frontend/revolution/js/rs6.min.js')}}"></script>

    <!-- Javascript end-->

</body>
</html>