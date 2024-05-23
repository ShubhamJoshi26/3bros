@extends('layouts.header')

@section('content')
<div class="ttm-page-title-row text-center">
            <div class="section-overlay"></div>
            <div class="title-box text-center">
                <div class="container">
                    <div class="page-title-heading">
                        <h1 class="title">CONTACT US</h1>
                    </div>
                    <div class="breadcrumb-wrapper">
                        <div class="container">
                            <span><a title="Homepage" href="#"><i class="fa fa-home"></i>&nbsp;&nbsp;Home</a></span>
                            <span class="ttm-bread-sep ttm-textcolor-white"> &nbsp; ⁄ &nbsp;</span>
                            <span class="ttm-textcolor-white"> Contact Us</span>
                        </div>
                    </div> 
                </div> 
            </div>
        </div>
        <!--page-title-end-->

        <!--syte-main start-->
        <div class="site-main">
            <!--contact-intro-section-start-->
            <section class="ttm-row contact-details-section clearfix">
                <div class="container">
                    <!-- row -->
                    <div class="row text-left">
                        <div class="col-lg-9 col-md-9">
                            <div class=" section-title clearfix">
                                <h4>GET IN TOUCH</h4>
                                <h2 class="title">Contact Us</h2>
                                <div class="heading-seperator"><span></span></div>
                               
                              
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-round ttm-btn-style-border ttm-btn-color-black mt-55 pull-right mb-25" href="#" title="">View Events</a>
                        </div>
                    </div><!--row-end-->
                    <div class="row mt-25">
                        <div class="col-md-4">
                            <div class="featured-box style2 left-icon icon-align-top">
                                <div class="featured-icon">
                                    <div class="ttm-icon ttm-icon_element-size-sm ttm-icon_element-color-skincolor ttm-icon_element-style-round">
                                        <i class="ti ti-headphone-alt"></i>
                                    </div>
                                </div>
                                <div class="featured-content">
                                    <div class="featured-title">
                                        <h5>Phone</h5>
                                    </div>
                                    <div class="featured-desc">

                                        <p>Phone:<a href="tel:+91-07210991313">+91-07210991313</a>,<br>Phone:<a href="tel:+91-9058112967">+91-9058112967</a></p>
                                    </div>
                                </div>
                            </div><!-- featured-box end-->
                        </div>
                        <div class="col-md-4">
                            <div class="featured-box style2 left-icon icon-align-top">
                                <div class="featured-icon">
                                    <div class="ttm-icon ttm-icon_element-size-sm ttm-icon_element-color-skincolor ttm-icon_element-style-round">
                                        <i class="ti ti-location-pin"></i>
                                    </div>
                                </div>
                                <div class="featured-content">
                                    <div class="featured-title">
                                        <h5>Address</h5>
                                    </div>
                                    <div class="featured-desc">
                                        <p>Plot H1A/19, Near, Electronic City Metro <br>Sta Rd, above Dominos, H Block, Sector 63, Noida, Uttar Pradesh 201301</p>
                                    </div>
                                </div>
                            </div><!-- featured-box end-->
                        </div>
                        <div class="col-md-4">
                            <div class="featured-box style2 left-icon icon-align-top">
                                <div class="featured-icon">
                                    <div class="ttm-icon ttm-icon_element-size-sm ttm-icon_element-color-skincolor ttm-icon_element-style-round">
                                        <i class="ti ti-email"></i>
                                    </div>
                                </div>
                                <div class="featured-content">
                                    <div class="featured-title">
                                        <h5>E-Mail</h5>
                                    </div>
                                    <div class="featured-desc">
                                        <p><a href="mailto:sales@3bros.in">sales@3bros.in,</a>
</p>
                                    </div>
                                </div>
                            </div><!-- featured-box end-->
                        </div>
                    </div>
                </div>
            </section>
            <!--contact-intro-section-end-->
            <section class="ttm-row contact-form-section2 bg-layer break-991-colum clearfix">
                <div class="container">
                   <div class="row res-1199-mlr-15">
                        <div class="col-md-4 col-lg-4">
                            <!-- col-bg-img-three -->
                            <div class="col-bg-img-three ttm-col-bgimage-yes ttm-bg">
                                <div class="ttm-col-wrapper-bg-layer ttm-bg-layer"></div>
                                <div class="layer-content"></div>
                            </div><!-- col-bg-img-three end-->
                            <img src="{{URL::asset('public/front/images/bg-image/col-bgimage-3.jpg')}}" class="ttm-equal-height-image" alt="bg-image">
                        </div>
                        <div class="col-md-8 col-lg-8">
                            <div class="padding-12 box-shadow">
                                <!-- section title -->
                                <div class="section-title clearfix mb-30">
                                    <h3 class="title">Get The Party Started</h3>
                                    <p>As the premier event planning company in the area. Each event and client is unique and we believe our services should be as well.</p>
                                </div><!-- section title end -->
                                @if (session('error'))
                                        <div class="alert alert-error m-3" role="alert">
                                        <div  role="alert">
                                                {{ session('error') }}
                                                </div>
                                        </div>                      
                                    @endif
                                    <form id="contactform" class="row contactform wrap-form clearfix" method="post"
                                        action="{{route('submitenquiry')}}">
                                        @csrf
                                        <input type="hidden" name="type" id="type" value="enquiry">
                                        <label class="col-md-6">
                                            <i class="ti ti-user"></i>
                                            <span class="ttm-form-control"><input class="text-input" name="name"
                                                    type="text" value="" placeholder="Your Name:*"
                                                    required="required"></span>
                                        </label>
                                        <label class="col-md-6">
                                            <i class="ti ti-email"></i>
                                            <span class="ttm-form-control"><input class="text-input" name="email"
                                                    type="text" value="" placeholder="Your email-id:*"
                                                    required="required"></span>
                                        </label>
                                        <label class="col-md-6">
                                            <i class="ti ti-location-pin"></i>
                                            <span class="ttm-form-control"><input class="text-input" name="venue"
                                                    type="text" value="" placeholder="Venue" required="required"></span>
                                        </label>
                                        <label class="col-md-6">
                                            <i class="ti ti-mobile"></i>
                                            <span class="ttm-form-control"><input class="text-input" name="mobile"
                                                    type="text" value="" placeholder="Your Number:*"
                                                    required="required"></span>
                                        </label>
                                        <label class="col-md-12">
                                            <i class="ti ti-comment"></i>
                                            <span class="ttm-form-control"><textarea class="text-area" name="message"
                                                    placeholder="Your Message:*" required="required"></textarea></span>
                                        </label>
                                        <div class="g-recaptcha" data-sitekey="6LdCr9gpAAAAAEropxW5cwPSTiR6jDX9XvD29Flf"></div>
                                        <input name="submit" type="submit" value="Submit"
                                            class="ttm-btn ttm-btn-size-md ttm-btn-shape-round ttm-btn-style-fill ttm-btn-color-skincolor mt-15"
                                            id="submit" title="Submit now">
                                    </form>
                            </div>
                        </div>
                    </div> 
                </div>
            </section>
            <!--map-start-->
            <div class="map-wrapper">
            <iframe width="400" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" id="gmap_canvas" src="https://maps.google.com/maps?width=520&amp;height=400&amp;hl=en&amp;q=Plot%20H1A/19,%20Near,%20Electronic%20City%20Metro%20Sta%20Rd,%20above%20Dominos,%20H%20Block,%20Sector%2063%20Noida+()&amp;t=&amp;z=12&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe> 
           
                </div>
            <!--map-end-->
            <!--CTA-section-start-->
            <section class="ttm-row cta-section style2 ttm-bgcolor-skincolor clearfix">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="featured-box iconalign-before-heading">
                                <div class="featured-content">
                                    <div class="featured-icon">
                                        <div class="ttm-icon ttm-icon_element-color-white ttm-icon_element-size-sm"> 
                                            <i class="ti ti-headphone"></i>
                                        </div>
                                    </div>
                                    <div class="featured-title">
                                        <h6 class="ttm-textcolor-white">If you Have Any Questions Schedule an Booking</h6>
                                        <h5 class="ttm-textcolor-white" >With our Team or call Us On <a href="tel:+91-90581 12967" style="color:#fff;">+91-90581 12967</a></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-round ttm-btn-style-border ttm-btn-color-white pull-right res-mt20-767" href="tel:+91-90581 12967">Booking Now!</a>
                        </div>
                    </div>
                </div>
            </section>
            <!--CTA-section-END-->
           
        </div><!-- site-main end --> 


@endsection