@extends('layouts.header')

@section('content')
<div class="ttm-page-title-row text-center">
            <div class="title-box text-center">
                <div class="container">
                    <div class="page-title-heading">
                        <h1 class="title">{{str_replace('-',' ',$title)}}</h1>
                        <p class="ttm-textcolor-white">We Here You Want A Party?</p>
                    </div>
                    <div class="breadcrumb-wrapper">
                        <div class="container">
                            <span><a title="Homepage" href="#"><i class="fa fa-home"></i>&nbsp;&nbsp;Home</a></span>
                            <span class="ttm-bread-sep ttm-textcolor-white"> &nbsp; ⁄ &nbsp;</span>
                            <span class="ttm-textcolor-white">{{str_replace('-',' ',$title)}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--page-title end-->
        <!--site-main-->
        <div class="site-main">

            <section class="ttm-row row-text-section ttm-bgcolor-grey">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sep-box text-center">
                                <h2 class="title">We’ll Make Your Next Celebration Very Special!</h2>
                                <h6>Friendly customer service staff for your all questions!</h6>
                                <div class="sep_holder_box width-30 pt-10">
                                    <span class="sep_holder"><span class="sep_line"></span></span>
                                    <div class="ttm-icon ttm-icon_element-color-skincolor ttm-icon_element-size-md">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <span class="sep_holder"><span class="sep_line"></span></span>
                                </div>
                                <h4><strong>Call Us</strong>: <a href="tel: 072109-91313"> 072109-91313</a>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="ttm-row service-section3 clearfix">
                <div class="container">
                    <div class="row text-center">
                        <div class="col-lg-12">
                            <div class=" section-title clearfix">
                                <h4>GREAT PROVIDE #3BROS</h4>
                                <h2 class="title">{{str_replace('-',' ',$title)}}</h2>
                                <div class="title-img"><img src="{{URL::asset('public/images/ds-1.png')}}" alt="underline-img"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @if(!empty($venue))
                        @foreach($venue->toArray() as $vn)
                        <div class="col-md-6 col-lg-4">
                            <div class="featured-imagebox static-title mb-20">
                                <div class="featured-thumbnail">
                                    <img class="img-fluid"
                                        src="{{URL::asset('public/'.$vn['thumbnail'])}}"
                                        alt="" height="100%" width="100%">
                                </div>
                                <div class="featured-content">
                                    <div class="featured-title">
                                        <h5><a href="/venue-details/{{str_replace(' ','-',$vn['title'])}}"> {{$vn['title']}}</a></h5>
                                    </div>
                                    <div class="trib-events-vanue">
                                        <h5><span>PAX</span> : {{$vn['capacity']}}</h5>

                                    </div>

                                    <div class="trib-events-vanue">
                                        <h5><span>Venue Type</span> : {{str_replace(',',' + ',$vn['category'])}}</h5>
                                    </div>
                                    <div class="trib-events-vanue">
                                        <h5><span>Location</span> : {{$vn['address']}}</h5>
                                    </div>
                                    <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-round ttm-btn-style-fill ttm-btn-color-black read-more mt-15"
                                        href="/venue-details/{{str_replace(' ','-',$vn['title'])}}" title="">Read More</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <h2>{{'No '.str_replace('-',' ',$title)}}</h2>
                        @endif
                    </div>
                </div>
            </section>


            <!--Feedback-->



        </div><!-- site-main end -->

@endsection