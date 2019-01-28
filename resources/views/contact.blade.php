@extends('layouts.app')
@section('content')

    <!--================Home Banner Area =================-->
        <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
                <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
                <div class="container">
                    <div class="banner_content text-center">
                        <h2>تماس با ما</h2>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->
        
        <!--================Contact Area =================-->
        <section class="contact_area p_120">
            <div class="container">
                <div id="mapBox" class="mapBox" 
                    data-lat="40.701083" 
                    data-lon="-74.1522848" 
                    data-zoom="13" 
                    data-info="PO Box CT16122 Collins Street West, Victoria 8007, Australia."
                    data-mlat="40.701083"
                    data-mlon="-74.1522848">
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="contact_info">
                            <div class="info_item">
                                <i class="lnr lnr-home"></i>
                                <h6>{{ $information->address }}</h6>
                                <p></p>
                            </div>
                            <div class="info_item">
                                <i class="lnr lnr-phone-handset"></i>
                                <h6><a href="">{{ $information->phone }}</a></h6>
                                <p></p>
                            </div>
                            <div class="info_item">
                                <i class="lnr lnr-envelope"></i>
                                <h6><a href="mailto:{{ $information->email }}">{{ $information->email }}</a></h6>
                                <p></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9" id="app">
                        <contact-component></contact-component>
                    </div>
                </div>
            </div>
        </section>
        <!--================Contact Area =================-->

@endsection