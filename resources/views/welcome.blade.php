@extends('layouts.app')
@section('content')
<!--================Home Banner Area =================-->
<section class="home_banner_area">
    <div class="banner_inner">
        <div class="container" style="background-color: rgba(0,0,0,.7);margin-bottom: 200px;padding: 50px;border-radius: 20px;">
            <div class="banner_content">
                <h2>{{ $information->title }}</h2>
                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.
                </p>
            </div>
        </div>
    </div>
</section>
<!--================End Home Banner Area =================-->

<!--================Event Time Area =================-->
<div id="app">
    @php
        use Carbon\Carbon;
    @endphp
    @if($closeEvent)
        <count-down deadline="{{ $closeEvent->date->toFormattedDateString() }}" desc="{{ $closeEvent->title }}"></count-down>
    @else
        <count-down deadline="{{ now() }}" desc="در حال حاضر رویدادی در پیش رو نمی باشد"></count-down>
    @endif
</div>
<!--================End Event Time Area =================-->

<!--================Welcome Area =================-->
<section class="welcome_area pad_btm">
    <div class="container">
        <div class="welcome_inner row">
            <div class="col-lg-5">
                <div class="welcome_img">
                    <img class="img-fluid" src="img/welcome-1.jpg" alt="">
                </div>
            </div>
            <div class="col-lg-6 offset-lg-1">
                <div class="welcome_text">
                    <h3>{{ $information->title }}</h3>
                    <p>{!! $information->about !!}
                    </p>
                    <a class="genric-btn success circle" href="{{ route('about') }}">اطلاعات بیشتر</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Welcome Area =================-->

<!--================Team Area =================-->
<section class="team_area p_120">
    <div class="container">
        <div class="main_title">
            <h2>رویدادهای پیش رو</h2>
        </div>
        <div class="row team_inner">
            @foreach($events as $event)
            <div class="col-lg-4 col-md-6 col-sm-6" style="margin-bottom: 30px";>
                <div class="container future_event">
                    <div class="row" style="padding-top: 10px;    background-image: linear-gradient(0deg, #09a9cd 0%, #3BBDD7 100%);border-radius: 10px 10px 0px 0px">
                        <p style="color: white;padding-right: 10px;">رویداد شماره  1</p>
                    </div>
                    <div class="row event_meta">
                        <div class="col-lg-12">
                            <i class="fa fa-map"></i>
                            <span>{{ $event->location }}</span>
                        </div>
                    </div>
                    <div class="row event_meta">
                        <div class="col-lg-12">
                            <i class="fa fa-calendar"></i>
                            <span>{{ DateHelper::setToJalaliDate($event->date) }}</span>
                        </div>
                    </div>
                    <div class="row" style="margin: 20px">
                        <div class="col-lg-12">
                            <h3>{{ $event->title }}</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12" style="position: absolute;bottom: 0;padding: 0;padding-left: 30px;">
                            <a href="{{ route('showEvent', $event->id) }}" class="col-lg-12 genric-btn info" style="border-radius: 0px 0px 10px 10px;">ثبت نام</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!--================End Team Area =================-->
<!-- =============== News Area ==================== -->
<div class="container">
    <div class="section-top-border">
        <h3 class="mb-30 title_color" style="text-align: right">آخرین اخبار</h3>
        <div class="row">
            @if($posts)
                @foreach($posts as $post)
                    <article class="row blog_item" style="margin-right:5px">
                        <div class="col-md-10">
                            <div class="blog_post">
                                <img src="{{ asset($post->thumbnail) }}" alt="" style="max-width: 555px;max-height: 280px">
                                <div class="blog_info text-right">
                                    <ul class="blog_meta list">
                                        <li>{{ DateHelper::setToJalaliDate($post->created_at) }} <i class="lnr lnr-calendar-full"></i></li>
                                    </ul>
                                </div>
                                <div class="blog_details">
                                    <a href="{{ route('showBlog', $post->id) }}"><h2>{{ $post->title }}</h2></a>
                                    <p>{!! substr($post->content, 0, 100) !!}
                                    </p>
                                    <a href="{{ route('showBlog', $post->id) }}" class="genric-btn success radius">ادامه خبر</a>
                                </div>
                            </div>
                        </div>
                    </article>
                @endforeach
            @endif
        </div>
    </div>
</div>
<!-- ===============End News Area ==================== -->
<!-- =============== Support Area ==================== -->
<!--================ End Support Area =================-->
<!--================Price Area =================-->
<section class="price_area p_120">
    <div class="container">
        <div class="main_title">
            <h2>پل های ارتباطی</h2>
        </div>
        <div class="price_inner row m0">
            <div class="col-lg-4 col-sm-4" style="text-align: center;margin:20px 0px">
                <i class="fa fa-phone contact_icon" style="padding: 25px"></i>
                <p class="contact_detail">{{ $information->phone }}</p>
            </div>
            <div class="col-lg-4 col-sm-4" style="text-align: center;margin:20px 0px">
                <i class="fa fa-envelope contact_icon" style="padding: 20px"></i>
                <p class="contact_detail">{{ $information->email }}</p>
            </div>
            <div class="col-lg-4 col-sm-4" style="text-align: center;margin:20px 0px">
                <i class="fa fa-map-marker contact_icon"></i>
                <p class="contact_detail">{{ $information->address }}</p>
            </div>
        </div>
    </div>
</section>
<!--================End Price Area =================-->
@endsection