<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" href="{{ asset('img/favicon.png') }}" type="image/png">
        <title>گروه آموزشی دیدنو</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/linericon/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/owl-carousel/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/lightbox/simpleLightbox.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/nice-select/css/nice-select.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/animate-css/animate.cs') }}">
        <link rel="stylesheet" href="{{ asset('css/iziToast.min.css') }}">

        <!-- main css -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    </head>
    <body>
        
        <!--================Header Menu Area =================-->
        <header class="header_area">
            <div class="main_menu">
                <nav class="navbar navbar-expand-lg navbar-light" style="box-shadow: 5px 5px 20px rgba(0,0,0,.2);">
                    <div class="container box_1620">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <a class="navbar-brand logo_h" href="{{ route('index') }}"><img src="{{ asset('img/logo.png') }}" alt=""></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        </button>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                            <ul class="nav navbar-nav menu_nav ml-auto">
                                <li class="nav-item"><a class="nav-link" href="{{ route('index') }}">صفحه اصلی</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('events') }}">رویدادها</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">درباره ما</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('blog') }}">بلاگ</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('contactUs') }}">تماس با ما</a></li>
                            </ul>
                            @guest
                            <ul style="display: inline-block;list-style-type: none">
                                <li style="display: inline-block;margin:10px"><a href="{{ route('login') }}" class="" style="color: white">ورود</a></li>
                                <span style="color: white">/</span>
                                <li style="display: inline-block;margin:10px"><a href="{{ route('register') }}" class="" style="color: white">عضویت</a></li>
                            </ul>
                            @else
                            <div class="dropdown ">
                              <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" style="margin: 10px 0px;">
                                حساب کاربری
                                <img src="{{ asset('storage/'.Auth::user()->avatar) }}" alt="" class="avatar">
                              </button>
                              <div class="dropdown-menu dropdown-menu-right">
                                @if(Auth::user()->isAdmin())
                                <a class="dropdown-item" href="{{ route('admin.dashboard') }}"><i class="fa fa-user" style="padding-left: 10px;"></i>پنل کاربری</a>
                                @elseif(Auth::user()->isUser())
                                <a class="dropdown-item" href="{{ route('user.dashboard') }}"><i class="fa fa-user" style="padding-left: 10px;"></i>پنل کاربری</a>
                                @endif
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"><i class="fa fa-sign-out" style="padding-left: 10px;"></i>خروج  </a>
                                <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                              </div>
                            </div>
                            @endguest
                        </div>

                    </div>
                </nav>
            </div>
        </header>
        <!--================End Header Menu Area =================-->
         
        @yield('content')
        <!--================ start footer Area  =================-->
        <footer class="footer-area p_120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2  col-md-6 col-sm-6">
                        <div class="single-footer-widget tp_widgets">
                            <h6 class="footer_title">دسترسی</h6>
                            <ul class="list">
                                <li><a class="list-item" href="{{ route('index') }}">صفحه اصلی</a></li>
                                <li><a class="list-item" href="{{ route('events') }}">رویدادها</a></li>
                                <li><a class="list-item" href="{{ route('about') }}">درباره ما</a></li>
                                <li><a class="list-item" href="{{ route('blog') }}">بلاگ</a></li>
                                <li><a class="list-item" href="{{ route('contactUs') }}">تماس با ما</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6 col-sm-6">
                        <div class="single-footer-widget news_widgets">
                            <h6 class="footer_title">خبرنامه</h6>
                            <p>برای اطلاع از آخرین رویدادهای گروه آموزشی دیدنو در خبرنامه عضو شوید</p>
                            <div id="mc_embed_signup">
                                <form target="_blank" action="" method="post" class="subscribe_form relative">
                                    <div class="input-group d-flex flex-row">
                                        <input name="email" placeholder="پست الکترونیکی را وارد نمایید" required type="email">
                                        <button class="btn sub-btn" style="top: 50px;right: 0;">عضویت</button>
                                    </div>
                                    <div class="mt-10 info"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6 col-sm-12">
                        <div class="single-footer-widget instafeed">
                            <h6 class="footer_title">درباره ما</h6>
                            <div style="color:white">{!! $information->about !!}</div>
                        </div>
                    </div>
                </div>
                <div class="row footer-bottom d-flex justify-content-between align-items-center" style="border-top: 1px solid rgba(0,0,0,.2);margin-top: 50px;padding-top: 20px;">
                    <p class="col-lg-5 col-md-4 footer-text m-0">تمامی حقوق برای گروه آموزشی دیدنو محفوظ می باشد</p>
                    <div class="col-lg-4 col-md-4 footer-social">
                        <a href="{{ $information->instagram }}"><i class="fa fa-instagram"></i></a>
                        <a href="{{ $information->twitter }}"><i class="fa fa-twitter"></i></a>
                        <a href="{{ $information->telegram }}"><i class="fa fa-send"></i></a>
                        <a href="{{ $information->facebook }}"><i class="fa fa-facebook"></i></a>
                    </div>
                    <span class="col-lg-2 col-md-4" style="color: white">طراحی توسط : <a href="http://saeedqasemi.ir" style="color: white;" onmouseenter="color:blue">سعید قاسمی</a></span>
                </div>
            </div>
        </footer>
        <!--================ End footer Area  =================-->
        
        
        
        
        
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
        <script src="{{ asset('js/popper.js') }}"></script>
        <script src="{{ asset('js/app.js') }}"></script>

        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/stellar.js') }}"></script>
        <script src="{{ asset('vendors/lightbox/simpleLightbox.min.js') }}"></script>
        <script src="{{ asset('vendors/nice-select/js/jquery.nice-select.min.js') }}"></script>
        <script src="{{ asset('vendors/isotope/imagesloaded.pkgd.min.js') }}"></script>
        <script src="{{ asset('vendors/isotope/isotope-min.js') }}"></script>
        <script src="{{ asset('vendors/owl-carousel/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('js/jquery.ajaxchimp.min.js') }}"></script>
        <script src="{{ asset('vendors/flipclock/timer.js') }}"></script>
        <script src="{{ asset('vendors/counter-up/jquery.waypoints.min.js') }}"></script>
        <script src="{{ asset('vendors/counter-up/jquery.counterup.js') }}"></script>
        <script src="{{ asset('js/mail-script.js') }}"></script>
        <script src="{{ asset('js/iziToast.min.js') }}"></script>
        <!--gmaps Js-->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
        <script src="{{ asset('js/gmaps.min.js') }}"></script>
        <script src="{{ asset('js/theme.js') }}"></script>
        <script>
            var stickySidebar = $('.events_meta').offset().top;
            $(window).scroll(function() {  
                if (($(window).scrollTop() > stickySidebar)) {
                    $('.events_meta').addClass('affix');
                } 
                else{
                    $('.events_meta').removeClass('affix');
                } 
            });
        </script>       
    </body>
</html>