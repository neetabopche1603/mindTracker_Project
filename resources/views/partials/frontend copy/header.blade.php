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
                                <div class="top_bar_contact_item float-right">
                                    <a class="ttm-btn ttm-btn-size-xs ttm-btn-shape-rounded ttm-btn-style-fill ttm-btn-color-skincolor" href="#">Get A Quote</a>
                                </div>
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
                                        <!-- <ul class="mega-submenu">
                                            <li><a href="/">Home Page One</a></li>
                                            <li class="active"><a href="homepage-2.html">Home Page Two</a></li>
                                            <li><a href="homepage-3.html">Home Page Three</a></li>
                                            <li><a href="demo2//" target="_blank">Demo Two<span>New</span></a></li>
                                            <li><a href="demo3//" target="_blank">Demo Three<span>New</span></a></li>
                                            <li class="mega-menu-item">
                                                <a href="#" class="mega-menu-link">Header Style</a>
                                                <ul class="mega-submenu">
                                                    <li><a href="classic-header.html">Header Classic</a></li>
                                                    <li><a href="infostack-header.html">Header Infostack</a></li>
                                                    <li><a href="/">Header Classic Highlight</a></li>
                                                </ul>
                                            </li>
                                        </ul> -->
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
                                <div class="header_search">
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
                                </div>
                                <div class="header_btn">
                                    <a class="ttm-btn ttm-btn-size-xs ttm-btn-shape-rounded ttm-btn-style-border ttm-btn-color-white" href="book-appointment.html">APPOINTMENT!</a>
                                </div>
                            </div>
                        </div><!-- site-navigation end-->
                    </div>
                </div>
            </div>

            
        </div>
    </header>
    <!--header end-->