@extends('layouts.app')
@section('content')

<!--================Home Banner Area =================-->
        <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
            	<div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
				<div class="container">
					<div class="banner_content text-center">
						<h2>رویدادها</h2>
					</div>
				</div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->
        
        <!--================Welcome Area =================-->
        <section class="welcome_area pad_btm">
        	<div class="container" style="margin-top:50px">
                <div class="row">
            @foreach($events as $event)
                <div class="col-lg-4 col-md-6 col-sm-6" style="margin-bottom: 30px";>
                    <div class="container future_event">
                        <div class="row" style="padding-top: 10px;    background-image: linear-gradient(0deg, #09a9cd 0%, #3BBDD7 100%);border-radius: 10px 10px 0px 0px">
                            <p style="color: white;padding-right: 10px;">{{ $information->title }}</p>
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
                                @if($event->date > now())
                                <a href="{{ route('showEvent', $event->id) }}" class="col-lg-12 genric-btn info" style="border-radius: 0px 0px 10px 10px;">ثبت نام</a>
                                @else
                                <a href="#" class="col-lg-12 genric-btn danger" style="border-radius: 0px 0px 10px 10px;">برگزار شده</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
                </div>
        	</div>
        </section>
        <!--================End Welcome Area =================-->

@endsection