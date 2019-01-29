@extends('layouts.app')
@section('content')
        <!--================Home Banner Area =================-->
        <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
            	<div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
				<div class="container">
					<div class="banner_content text-center">
						<h2>{{ $post->title }}</h2>
					</div>
				</div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->
        
        <!--================Blog Area =================-->
        <section class="blog_area single-post-area p_120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 posts-list">
                        <div class="single-post row">
                            <div class="col-lg-12">
                                <div class="feature-img" style="display: flex;justify-content: flex-end;">
                                    <img class="img-fluid" src="{{ asset($post->thumbnail) }}" alt="" style="width: 700px">
                                </div>									
                            </div>
                            <div class="col-lg-3 col-md-3">
                                <div class="blog_info text-right">
                                    <ul class="blog_meta list">
                                        <li>{{ DateHelper::setToJalaliDate($post->created_at) }} <i class="lnr lnr-calendar-full"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-9 blog_details">
                                <h2>{{ $post->title }}</h2>
                                <p class="excert text-justify">
                                    {!! $post->content !!}
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================Blog Area =================-->
@endsection

        