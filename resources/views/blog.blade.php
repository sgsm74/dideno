@extends('layouts.app')
@section('content')
        <!--================Home Banner Area =================-->
        <section class="home_banner_area blog_banner">
            <div class="banner_inner d-flex align-items-center">
                <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
                <div class="container">
                    <div class="blog_b_text text-center">
                        <h2>وبلاگ خبری</h2>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->
        <!--================Blog Categorie Area =================-->
        <section class="blog_categorie_area">
            <div class="container">
                <div class="row">
                    
                </div>
            </div>
        </section>
        <!--================Blog Categorie Area =================-->
        <!--================Blog Area =================-->
        <section class="blog_area">
            <div class="container">
                <div class="row">
                    @if($posts)
                        @foreach($posts as $post)
                            <article class="row blog_item" style="margin-right:5px">
                                <div class="col-md-10">
                                    <div class="blog_post">
                                        <img src="{{ asset('storage/'.$post->thumbnail) }}" alt="" style="max-width: 555px;max-height: 280px">
                                        <div class="blog_info text-right">
                                            <ul class="blog_meta list">
                                                <li>{{ DateHelper::setToJalaliDate($post->created_at) }} <i class="lnr lnr-calendar-full"></i></li>
                                            </ul>
                                        </div>
                                        <div class="blog_details">
                                            <a href="{{ route('showBlog', $post->id) }}"><h2>{{ $post->title }}</h2></a>
                                            <p>{!! substr($post->content, 0, 100) !!}</p>
                                            <a href="{{ route('showBlog', $post->id) }}" class="genric-btn success radius">ادامه خبر</a>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    @endif
                </div>
            </div>
        </section>
        <!--================Blog Area =================-->
@endsection