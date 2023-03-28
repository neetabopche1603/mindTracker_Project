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

    <link rel="canonical" type="image/x-icon" href="<?php echo $data; ?>">
    <!-- favicon icon -->
    <link rel="shortcut icon" href="{{asset('frontend/images/favicon.png')}}" />
    <!-- bootstrap -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/bootstrap.min.css')}}" />
    <!-- animate -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/animate.css')}}" />
    <!-- flaticon -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/flaticon.css')}}" />
    <!-- fontawesome -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/font-awesome.css')}}" />
    <!-- themify -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/themify-icons.css')}}" />
    <!-- slick -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/slick.css')}}">
    <!-- prettyphoto -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/prettyPhoto.css')}}">
    <!-- shortcodes -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/shortcodes.css')}}" />
    <!-- main -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/main.css')}}" />
    <!-- main -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/megamenu.css')}}" />
    <!-- responsive -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/responsive.css')}}" />
    <!-- REVOLUTION LAYERS STYLES -->
    <link rel='stylesheet' id='rs-plugin-settings-css' href="{{asset('frontend/revolution/css/rs6.css')}}">
</head>

<body>
    <div class="page">

        <!--header start-->
        <header id="masthead" class="header ttm-header-style-01">
            <div class="ttm-header-box-inner">
                <!--top_bar-->
                <div class="top_bar clearfix">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="d-table w-100">
                                    <!-- <div class="top_bar_contact_item">
                                            <div class="slick_slider slick-arrows-style1" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "arrows":true, "autoplay":false, "infinite":true, "responsive": [{"breakpoint":1100,"settings":{"slidesToShow": 1}} , {"breakpoint":777,"settings":{"slidesToShow": 1}}, {"breakpoint":575,"settings":{"slidesToShow": 1}}]}'>
                                                <div>
                                                    <div class="top_bar_icon"><i class="fa fa-comment"></i></div>Business Developments Manager Toronto, Canada
                                                </div>
                                                <div>
                                                    <div class="top_bar_icon"><i class="fa fa-comment"></i></div>Business Developments Manager Toronto, Canada
                                                </div>
                                                <div>
                                                    <div class="top_bar_icon"><i class="fa fa-comment"></i></div>Business Developments Manager Toronto, Canada
                                                </div>
                                            </div>
                                        </div> -->
                                    <div class="top_bar_contact_item">
                                        <div class="top_bar_icon"><i class="fa fa-phone"></i></div>Call Us: +123-456-790
                                    </div>

                                    <div class="top_bar_contact_item">
                                        <div class="top_bar_icon"><i class="fa fa-envelope-o"></i></div>Mail:
                                        <a href="mailto:contact@zenista-themes.com">contact@zenista-themes.com</a>
                                    </div>
                                    <!-- <div class="top_bar_contact_item float-right">
                                        <a class="ttm-btn ttm-btn-size-xs ttm-btn-shape-rounded ttm-btn-style-fill ttm-btn-color-skincolor" href="#">Get A Quote</a>
                                    </div> -->
                                    <div class="top_bar_contact_item float-right">
                                        <ul class="social-icons sub-menu float-right" style="    margin-right: 22px">
                                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                        </ul>
                                    </div>
                                    <!-- <div class="top_bar_contact_item text-center">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                </div> -->

                                    <!-- <div class="top_bar_contact_item top_bar_social">
                                            <ul class="social-icons sub-menu">
                                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                            </ul>
                                        </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--top_bar end-->
                <div id="site-header-menu" class="site-header-menu ttm-bgcolor-darkgrey">
                    <div class="site-header-menu-inner ttm-stickable-header">
                        <div class="container-fluid">
                            <!--site-navigation -->
                            <div class="site-navigation d-flex flex-row align-items-center">
                                <!-- site-branding -->
                                <div class="site-branding">
                                    <a class="home-link" href="/" title="zenista" rel="home">
                                        <img id="logo-img" class="img-center" src="{{asset('frontend/images/logo-white.png')}}" alt="logo-img">
                                    </a>
                                </div><!-- site-branding end -->
                                <div class="btn-show-menu-mobile menubar menubar--squeeze">
                                    <span class="menubar-box">
                                        <span class="menubar-inner"></span>
                                    </span>
                                </div>
                                <!-- menu -->
                                <nav class="main-menu menu-mobile m-auto" id="menu">
                                    <ul class="menu">
                                        <li class="mega-menu-item active">
                                            <a href="/" class="mega-menu-link">Home</a>
                                        </li>

                                        <li class="mega-menu-item">
                                            <a href="{{route('service')}}" class="mega-menu-link">Services <i class="ti ti-arrow-up"></i></a>
                                            <ul class="mega-submenu">
                                                <li><a href="{{route('service.moodTracking')}}">Mood Tracking</a></li>
                                                <li><a href="{{route('service.meditation')}}">Meditation</a></li>
                                                <li><a href="{{route('service.journaling')}}">Journaling</a></li>
                                                <li><a href="{{route('service.licensedTherapistAccess')}}">Licensed Therapist Access</a></li>
                                                <li><a href="{{route('service.communitySupport')}}">Community Support</a></li>
                                                <li><a href="{{route('service.selfCareTools')}}">Self-Care Tools</a></li>
                                            </ul>
                                        </li>


                                        <li class="mega-menu-item">
                                            <a href="{{route('aboutUs')}}" class="mega-menu-link">About</a>
                                        </li>
                                        <li class="mega-menu-item">
                                            <a href="{{route('blog')}}" class="mega-menu-link">Blog</a>
                                        </li>
                                        <li class="mega-menu-item">
                                            <a href="{{route('contactUs')}}" class="mega-menu-link">Contact</a>
                                        </li>
                                        <li class="mega-menu-item">
                                            <a href="{{route('fAQ')}}" class="mega-menu-link">FAQ</a>
                                        </li>
                                    </ul>
                                </nav>
                                <div class="header_extra d-flex flex-row align-items-center justify-content-end">
                                    <!-- <div class="header_search">
                                        <a href="#" class="btn-default search_btn"><i class="ti ti-search"></i></a>
                                        <div class="header_search_content">
                                            <div class="header_search_content_inner">
                                                <a href="#" class="close_btn"><i class="ti ti-close"></i></a>
                                                <p class="ttm-form-title">What are you looking for?</p>
                                                <form id="searchbox" method="get" action="#">
                                                    <input class="search_query" type="text" id="search_query_top" name="s" placeholder="Type Word Then Enter.." value="">
                                                    <button type="submit" class="btn close-search"><i class="ti ti-search"></i></button>
                                                </form>
                                            </div>
                                        </div>
                                    </div> -->
                                    <div class="header_btn">
                                        <a class="ttm-btn ttm-btn-size-xs ttm-btn-shape-rounded ttm-btn-style-border ttm-btn-color-white" style="background-color: z;" href="#"><b>SIGN IN</b></a>
                                    </div>
                                </div>
                            </div><!-- site-navigation end-->
                        </div>
                    </div>
                </div>
                <!--START REVOLUTION SLIDER 6.0.1-->
                <div class="themetechmount-slider-wrapper">
                    <div class="themetechmount-slider-wide">
                        <rs-module-wrap id="rev_slider_2_1_wrapper" data-source="gallery">
                            <rs-module id="rev_slider_2_1" data-version="6.1.2" class="rev_slider_2_1_height">

                                <!-- <div class="row" style="margin-top: 50px;">
                                <div class="col-4">
                                    <h1 class="text-light">This Is For <br> Curious Minds</h1>
                                    <div>
                                    <p class="text-light">Consequat nisl vel pretium lectus quam. In nulla posuere sollicitudin aliquam. Risus nec feugiat in fermentum posuere urna nec tincidunt praesent. Amet est placerat in egestas erat imperdiet. Sem fringilla ut morbi tincidunt augue</p>
                                    </div>
                                    </div>

                                    <div class="col-8">
                                    
                                    </div>
                                </div> -->







                                 <rs-slides>

                                    <rs-slide data-key="rs-1" data-title="Slide" data-thumb="{{asset('frontend/images/slides/slider-mainbg-03.jpg')}}" data-anim="ei:d;eo:d;s:d;r:0;t:zoomout;sl:100;">

                                        <img src="{{asset('frontend/images/slides/slider-mainbg-03.jpg')}}" title="main-slider-img03" width="1920" height="700" class="rev-slidebg" data-no-retina>

                                        <rs-layer id="slider-2-slide-3-layer-1" data-type="text" data-rsp_ch="on" data-xy="xo:131px,131px,-78px,-48px;yo:231px,231px,144px,88px;" data-text="w:normal;s:16,16,9,5;l:20,20,12,7;fw:500;" data-dim="w:6px,6px,3px,1px;h:130px,130px,81px,49px;" data-vbility="t,t,f,f" data-frame_0="y:100%;" data-frame_1="e:power4.inOut;st:240;sR:240;" data-frame_999="o:0;st:w;sR:8460;" style="z-index:9;background-color:#705DB4;font-family:IBM Plex Sans;">
                                        </rs-layer>

                                        <rs-layer id="slider-2-slide-3-layer-2" data-type="text" data-color="#fff" data-rsp_ch="on" data-xy="x:l,l,c,c;xo:128px,128px,0,382px;yo:435px,435px,246px,104px;" data-text="w:normal;s:18,18,16,9;l:25,25,20,12;a:left,left,center,center;" data-dim="minh:0px,0px,none,none;" data-vbility="t,t,t,f" data-frame_0="y:100%;" data-frame_1="e:power4.inOut;st:650;sp:500;sR:650;" data-frame_999="o:0;st:w;sR:7850;" style="z-index:14;font-family:Nunito Sans;">Is Formally Defined the scientific study of behavior<br> and mental processes.
                                        </rs-layer>

                                        <rs-layer id="slider-2-slide-3-layer-3" data-type="text" data-rsp_ch="on" data-xy="x:l,l,c,c;xo:163px,163px,0,0;yo:215px,215px,76px,59px;" data-text="w:normal;s:65,65,60,50;l:80,80,50,60;fw:600;" data-dim="minh:0px,0px,none,none;" data-frame_0="y:100%;" data-frame_1="e:power4.inOut;st:260;sp:800;sR:260;" data-frame_999="o:0;st:w;sR:7940;" style="z-index:11;font-family:IBM Plex Sans;">Need
                                        </rs-layer>

                                        <rs-layer id="slider-2-slide-3-layer-4" data-type="text" data-rsp_ch="on" data-xy="x:l,l,c,c;xo:164px,164px,0,0;yo:289px,289px,139px,112px;" data-text="w:normal;s:65,65,60,50;l:80,80,50,60;fw:600;" data-dim="minh:0px,0px,none,none;" data-frame_0="y:100%;" data-frame_1="e:power4.inOut;st:370;sp:800;sR:370;" data-frame_999="o:0;st:w;sR:7830;" style="z-index:12;font-family:IBM Plex Sans;">A Doctor?
                                        </rs-layer>

                                        <a id="slider-2-slide-3-layer-8" class="rs-layer" href="#" target="_self" rel="nofollow" data-type="text" data-rsp_ch="on" data-xy="x:c;yo:548px,548px,320px,238px;" data-text="w:normal;s:14,14,13,13;l:25,25,14,14;fw:700;" data-padding="t:14,14,15,15;r:40,40,30,30;b:14,14,15,15;l:40,40,30,30;" data-border="bor:5px,5px,5px,5px;" data-frame_0="y:100%;" data-frame_1="e:power4.inOut;st:1050;sp:500;sR:1050;" data-frame_999="o:0;st:w;sR:7450;" data-frame_hover="bgc:#FFC940;bor:5px,5px,5px,5px;" style="z-index:18;background-color:#705DB4;font-family:Nunito Sans;text-transform:uppercase;">Appointment!
                                        </a>

                                        <rs-layer id="slider-2-slide-3-layer-17" data-type="image" data-rsp_ch="on" data-xy="x:c;xo:0,0,482px,297px;yo:100px,100px,52px,32px;" data-text="w:normal;s:20,20,12,7;l:0,0,15,9;" data-dim="w:172px,172px,135px,83px;h:54px,54px,42px,25px;" data-vbility="t,t,f,f" data-frame_0="rY:360deg;" data-frame_1="e:back.out;st:150;sp:500;sR:150;" data-frame_999="o:0;st:w;sR:8350;" style="z-index:8;"><img src="{{asset('frontend/images/slider-logo.png')}}" alt="slider-logo" width="172" height="54" data-no-retina>
                                        </rs-layer>

                                        <rs-layer id="slider-2-slide-3-layer-18" data-type="text" data-rsp_ch="on" data-xy="x:c;xo:0,0,430px,265px;y:m;" data-text="w:normal;s:16,16,9,5;l:20,20,12,7;fw:500;" data-dim="w:1px;h:270px,270px,168px,103px;" data-vbility="t,t,f,f" data-frame_0="x:-50,-50,-31,-19;" data-frame_1="st:400;sp:500;sR:400;" data-frame_999="o:0;st:w;sR:8100;" style="z-index:10;background-color:rgba(255,255,255,0.37);font-family:IBM Plex Sans;">
                                        </rs-layer>

                                        <rs-layer id="slider-2-slide-3-layer-19" data-type="text" data-rsp_ch="on" data-xy="x:l,l,c,c;xo:128px,128px,0,0;yo:379px,379px,208px,185px;" data-text="w:normal;s:20,20,15,14;l:30,30,18,17;fw:500;" data-dim="minh:0px,0px,none,none;" data-frame_0="y:100%;" data-frame_1="e:power4.inOut;st:530;sp:500;sR:530;" data-frame_999="o:0;st:w;sR:7970;" style="z-index:13;font-family:IBM Plex Sans;text-transform:uppercase;">Get an Appointment Today!
                                        </rs-layer>

                                        <rs-layer id="slider-2-slide-3-layer-20" data-type="image" data-rsp_ch="on" data-xy="x:c;xo:199px,199px,600px,370px;y:m;yo:0,0,11px,6px;" data-text="w:normal;s:20,20,12,7;l:0,0,15,9;" data-dim="w:228px,228px,142px,87px;h:228px,228px,142px,87px;" data-vbility="t,t,f,f" data-frame_0="sX:0.9;sY:0.9;" data-frame_1="e:power2.inOut;st:740;sp:600;sR:740;" data-frame_999="o:0;st:w;sR:7660;" style="z-index:15;"><img src="{{asset('frontend/images/zenista-slid-dr.png')}}" alt="Doctor" width="228" height="228" data-no-retina>
                                        </rs-layer>

                                        <rs-layer id="slider-2-slide-3-layer-21" data-type="text" data-color="#fff" data-rsp_ch="on" data-xy="x:r;xo:120px,120px,-274px,-169px;y:m;yo:16px,16px,67px,41px;" data-text="w:normal;s:14,14,8,4;l:30,30,18,11;" data-dim="minh:0px,0px,none,none;" data-vbility="t,t,f,f" data-frame_0="x:50,50,31,19;" data-frame_1="st:910;sp:400;sR:910;" data-frame_999="o:0;st:w;sR:7690;" style="z-index:17;font-family:Nunito Sans;">Senior Doctor at Zenista
                                        </rs-layer>

                                        <rs-layer id="slider-2-slide-3-layer-22" data-type="text" data-rsp_ch="on" data-xy="x:c;xo:449px,449px,599px,369px;y:m;yo:-12px,-12px,92px,56px;" data-text="w:normal;s:21,21,12,7;l:30,30,18,11;fw:500;" data-dim="minh:0px,0px,none,none;" data-vbility="t,t,f,f" data-frame_0="x:50,50,31,19;" data-frame_1="st:860;sp:600;sR:860;" data-frame_999="o:0;st:w;sR:7540;" style="z-index:16;font-family:IBM Plex Sans;"><span class="ttm-textcolor-skincolor">Dr. Victor Williamson</span>
                                        </rs-layer>

                                    </rs-slide>

                                    <rs-slide data-key="rs-3" data-title="Slide" data-thumb="{{asset('frontend/images/slides/slider-mainbg-04.jpg')}}" data-anim="ei:d;eo:d;s:d;r:0;t:slotzoom-horizontal;sl:d;">

                                        <img src="{{asset('frontend/images/slides/slider-mainbg-04.jpg')}}" title="main-slider-img04" width="1920" height="700" class="rev-slidebg" data-no-retina>

                                        <rs-layer id="slider-2-slide-5-layer-2" data-type="text" data-color="#fff" data-rsp_ch="on" data-xy="x:c;xo:0,0,0,490px;yo:395px,395px,254px,156px;" data-text="w:normal;s:18,18,16,9;l:25,25,18,11;" data-dim="minh:0px,0px,none,none;" data-vbility="t,t,t,f" data-frame_0="y:100%;" data-frame_1="e:power4.inOut;st:760;sp:500;sR:760;" data-frame_999="o:0;st:w;sR:7740;" style="z-index:11;font-family:Nunito Sans;">Is Formally Defined the scientific study of behavior and mental processes.
                                        </rs-layer>

                                        <rs-layer id="slider-2-slide-5-layer-3" data-type="text" data-rsp_ch="on" data-xy="x:c;yo:225px,225px,114px,111px;" data-text="w:normal;s:60,60,53,35;l:80,80,70,43;fw:600;" data-dim="minh:0px,0px,none,none;" data-frame_0="y:100%;" data-frame_1="e:power4.inOut;st:320;sp:800;sR:320;" data-frame_999="o:0;st:w;sR:7880;" style="z-index:9;font-family:IBM Plex Sans;">Find a <span class="ttm-textcolor-skincolor">Better</span> Place
                                        </rs-layer>

                                        <rs-layer id="slider-2-slide-5-layer-4" data-type="text" data-rsp_ch="on" data-xy="x:c;yo:299px,299px,172px,154px;" data-text="w:normal;s:60,60,53,35;l:80,80,70,43;fw:600;" data-dim="minh:0px,0px,none,none;" data-frame_0="y:100%;" data-frame_1="e:power4.inOut;st:470;sp:800;sR:470;" data-frame_999="o:0;st:w;sR:7730;" style="z-index:10;font-family:IBM Plex Sans;">Healthcare Development
                                        </rs-layer>

                                        <a id="slider-2-slide-5-layer-8" class="rs-layer" href="our-team.html" target="_self" rel="nofollow" data-type="text" data-rsp_ch="on" data-xy="x:c;yo:474px,474px,312px,220px;" data-text="w:normal;s:14,14,13,13;l:25,25,13,13;fw:700;" data-padding="t:14,14,15,15;r:40,40,30,30;b:14,14,15,15;l:40,40,30,30;" data-border="bor:5px,5px,5px,5px;" data-frame_0="y:100%;" data-frame_1="e:power4.inOut;st:880;sp:500;sR:880;" data-frame_999="o:0;st:w;sR:7620;" data-frame_hover="bgc:#FFC940;bor:5px,5px,5px,5px;" style="z-index:12;background-color:#705DB4;font-family:Nunito Sans;text-transform:uppercase;">Find a Therapist
                                        </a>

                                        <rs-layer id="slider-2-slide-5-layer-19" data-type="text" data-color="#fff" data-rsp_ch="on" data-xy="x:c;yo:177px,177px,85px,80px;" data-text="w:normal;s:19,19,16,15;l:30,30,18,18;fw:500;" data-dim="minh:0px,0px,none,none;" data-frame_0="y:100%;" data-frame_1="e:power4.inOut;st:140;sp:500;sR:140;" data-frame_999="o:0;st:w;sR:8360;" style="z-index:8;font-family:IBM Plex Sans;text-transform:uppercase;">Get an Appointment Today!
                                        </rs-layer>

                                    </rs-slide>

                                </rs-slides>
                            </rs-module>
                        </rs-module-wrap>
                    </div>
                </div>
                <!--END REVOLUTION SLIDER-->
            </div>
        </header>
        <!--header end-->


        @yield('home_content')


        <!--footer start-->
        <footer class="footer widget-footer ttm-textcolor-white clearfix">
            <div class="first-footer">
                <div class="container">
                    <div class="row footer-box">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 widget-area">
                            <div class="featured-icon-box icon-align-before-content style6">
                                <div class="featured-icon">
                                    <div class="ttm-icon ttm-icon_element-onlytxt ttm-icon_element-color-skincolor ttm-icon_element-size-md">
                                        <i class="flaticon-mail"></i>
                                    </div>
                                </div>
                                <div class="featured-content">
                                    <div class="featured-title">
                                        <h5>Get latest updates Subscribe to Our Newsletter</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 widget-area">
                            <form id="subscribe-form" class="newsletter-form" method="post" action="#" data-mailchimp="true">
                                <div class="mailchimp-inputbox clearfix" id="subscribe-content">
                                    <i class="fa fa-paper-plane-o"></i>
                                    <p><input type="email" name="email" placeholder="Your email address.." required=""></p>
                                    <p><button class="submit ttm-btn ttm-btn-size-md ttm-btn-shape-rounded ttm-btn-style-fill ttm-btn-color-skincolor" type="submit">Subscribe Now!</button></p>
                                </div>
                                <div id="subscribe-msg"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="second-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 widget-area">
                            <div class="widget widget_text  clearfix">
                                <h3 class="widget-title">About Us</h3>
                                <p>We are on the mission to promote the advancement, communication of psychological science &amp; knowledge to benefit society.
                                </p>
                                <ul class="widget_contact_wrapper mt-20">
                                    <li>Phone: +123 456 7890</li>
                                    <li>Mail Id: <a href="mailto:info@example.com">info@example.com</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 widget-area">
                            <div class="widget widget_nav_menu clearfix">
                                <h3 class="widget-title">Useful Links</h3>
                                <ul id="menu-footer-quick-links">
                                    <li><a href="about1.html">About Us</a></li>
                                    <li><a href="project-style1.html">Programs</a></li>
                                    <li><a href="service1.html">Our Solutions</a></li>
                                    <li><a href="about2.html">Testimonials</a></li>
                                    <li><a href="our-team.html">Employers</a></li>
                                    <li><a href="f-a-q.html">How It’s</a></li>
                                    <li><a href="individual-coaching.html">Work Job</a></li>
                                    <li><a href="service2.html">Seekers</a></li>
                                    <li><a href="about1.html">Industries</a></li>
                                    <li><a href="about2.html">Leadership</a></li>
                                    <li><a href="contact.html">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 widget-area">
                            <div class="widget widget_latest_tweets clearfix">
                                <h3 class="widget-title">Latest Tweets</h3>
                                <div class="slick_slider slick-arrows" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "arrows":false, "autoplay":true, "infinite":true, "responsive": [{"breakpoint":1100,"settings":{"slidesToShow": 1}} , {"breakpoint":777,"settings":{"slidesToShow": 1}}, {"breakpoint":575,"settings":{"slidesToShow": 1}}]}'>
                                    <div class="col-lg-12">
                                        <p class="tweet-text"><i class="fa fa-twitter"></i>Thank you<a href="#">@designnominees</a>to appreciate our,Frizty-Pet Shop WooCommerce Theme. <a href="#">#woocommerce</a><a href="#">#themetechmount</a> <a href="#">twitter.com/designnominees/sta…</a></p>
                                        <p class="tweet-details"><a href="#">December 4, 2020 5:11 am</a></p>
                                    </div>
                                    <div class="col-lg-12">
                                        <p class="tweet-text"><i class="fa fa-twitter"></i>We are upgraded into WooCommerce category&nbsp;<img alt="mojis" src="{{asset('frontend/')}}images/1f603.png" class="emoji-icon img-fluid">- <a href="#">mailchi.mp/8e48b9aad64a/we-are…</a> <a href="#">#woocommerce</a> <a href="#">5K</a> <a href="#">pic.twitter.com/8egitJpa33</a></p>
                                        <p class="tweet-details"><a href="#">December 3, 2020 9:57 am</a></p>
                                    </div>
                                    <div class="col-lg-12">
                                        <p class="tweet-text"><i class="fa fa-twitter"></i>From the bottom to stepping out <a href="#">#milestones</a>one by one<img alt="mojis" src="{{asset('frontend/')}}images/1f3af.png" class="emoji-icon img-fluid">Now reached<a href="#">#5k</a><img alt="mojis" src="{{asset('frontend/')}}images/270c.png" class="emoji-icon img-fluid">We are happy to serve such a huge number… <a href="#">twitter.com/i/web/status/13341…</a></p>
                                        <p class="tweet-details"><a href="#">December 2, 2020 12:01 pm</a></p>
                                    </div>
                                    <div class="col-lg-12">
                                        <p class="tweet-text"><i class="fa fa-twitter"></i>Now buy<a href="#">#Frizty</a>is available in the <a href="#">#WooCommerce</a>version! Fully customized<a href="#">#WP</a>Theme for the Pet Food Shop<img alt="mojis" src="{{asset('frontend/images/1f43e.png')}}" class="emoji-icon img-fluid"><img alt="mojis" src="{{asset('frontend/images/1f447.png')}}" class="emoji-icon img-fluid"><img alt="mojis" src="{{asset('frontend/images/1f447.png')}}" class="emoji-icon img-fluid"><img alt="mojis" src="{{asset('frontend/images/1f447.png')}}" class="emoji-icon img-fluid">-- <a href="#">twitter.com/i/web/status/13340…</a></p>
                                        <p class="tweet-details"><a href="#">December 2, 2020 6:38 am</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 widget-area">
                            <div class="widget widget_timing clearfix">
                                <h3 class="widget-title">Our Time Schedule</h3>
                                <ul class="ttm-pricelist-block">
                                    <li>Mon to Wed
                                        <span class="service-price">10:00 am to 2:30 pm</span>
                                    </li>
                                    <li>Thu to Fri
                                        <span class="service-price">11:00 am to 4:30 pm</span>
                                    </li>
                                    <li>Saturday
                                        <span class="service-price">10:00 am to 1:00 pm</span>
                                    </li>
                                    <li>Sunday<span class="service-price">Closed</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bottom-footer-text">
                <div class="container">
                    <div class="row copyright">
                        <div class="col-lg-5 col-md-4 col-sm-12">
                            <span>Copyright © 2020&nbsp; Zenista All rights reserved.</span>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-12">
                            <div class="footer-logo">
                                <img id="footer-logo-img" class="img-center" src="{{asset('frontend/images/footer-logo.png')}}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div id="menu-footer-menu" class="d-flex align-items-center justify-content-end">
                                <ul class="footer-nav-menu">
                                    <li><a href="about1.html">About Us</a></li>
                                    <li><a href="service1.html">Services</a></li>
                                    <li><a href="f-a-q.html">Privacy</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!--footer end-->


        <!--back-to-top start-->
        <a id="totop" href="#top">
            <i class="fa fa-angle-up"></i>
        </a>
        <!--back-to-top end-->

    </div>
    <!-- Page Div Close -->

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
    <script src="{{asset('frontend/js/booked-calendar.js')}}"></script>

    <!-- Revolution Slider -->

    <script src="{{asset('frontend/revolution/js/slider.js')}}"></script>

    <!-- SLIDER REVOLUTION 6.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->

    <script src="{{asset('frontend/revolution/js/revolution.tools.min.js')}}"></script>
    <script src="{{asset('frontend/revolution/js/rs6.min.js')}}"></script>

    <!-- Javascript end-->

</body>

</html>