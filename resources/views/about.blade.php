@extends('layouts.app')
@section('content')

<!--================Home Banner Area =================-->
        <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
            	<div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
				<div class="container">
					<div class="banner_content text-center">
						<h2>درباره {{ $information->title }}</h2>
					</div>
				</div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->
        
        <!--================Welcome Area =================-->
        <section class="welcome_area pad_btm">
        	<div class="container">
        		<div class="welcome_inner row" style="margin-top: 50px;">
        			<div class="col-md-12" >
        				<div class="welcome_img">
        					<img class="img-fluid" src="img/about.jpg" alt="">
        				</div>
        			</div>
        		</div>
                <div class="row">
                   <div class="col-md-12" style="padding: 0px 120px;line-height: 2.5;margin-top: 50px;">
                        <div class="welcome_text">
                            <h3>{{ $information->title }}</h3>
                            <div>
                                {!! $information->about !!}
                            </div>
                        </div>
                    </div>         
                </div>
        	</div>
        </section>
        <!--================End Welcome Area =================-->

@endsection