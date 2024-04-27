@extends('layouts.header')

@section('content')
        <!--header end-->

        <!--site-main start-->
        <div class="site-main">

            <!--intro-section start-->
            <section class="ttm-row welcome-section clearfix ttm-bgcolor-white">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-lg-6">
                            <div class="ttm_single_image_wrapper mt_20 res-991-mt-0">
                                <img src="{{URL::asset('public//front/images/about-2.png')}}" alt="image" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6">
                            <div class="row">
                                <div class="col-md-12 col-lg-12">
                                    <div class="pt-40 res-991-pt-30">
                                        <div class="section-title">
                                            <h2 class="title">About Our 3BROS</h2>
                                            <p class="mb-25"><strong>With our passion, expertise, creativity, and
                                                    inspiration, we are committed to helping you realize your dream
                                                    wedding or
                                                    special event within your budget.</strong></p>
                                        </div>
                                        <div class="mt_19 mb-30 pr-35">
                                            <p>Our wedding planning and event coordination services cater to any budget
                                                size, making our offerings accessible to
                                                everyone. Let us help you create the perfect event!</p>
                                        </div>
                                        <div class="separator">
                                            <div class="sep-line mt_5 mb-20 res-991-mb-0"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-sm-4">
                                    <!-- ttm-fid -->
                                    <div class="ttm-fid inside ttm-fid-view-topicon">
                                        <div class="ttm-fid-contents">
                                            <h4><span data-appear-animation="animateDigits" data-from="0" data-to="50"
                                                    data-interval="10" data-before="" data-before-style="sup"
                                                    data-after="" data-after-style="sub">50
                                                </span><sub>k</sub>
                                            </h4>
                                            <h3 class="ttm-fid-title"><span>Customers</span></h3>
                                        </div><!-- ttm-fid-contents end -->
                                    </div><!-- ttm-fid end -->
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <!-- ttm-fid -->
                                    <div class="ttm-fid inside ttm-fid-view-topicon">
                                        <div class="ttm-fid-contents">
                                            <h4><span data-appear-animation="animateDigits" data-from="0" data-to="15"
                                                    data-interval="5" data-before="" data-before-style="sup"
                                                    data-after="" data-after-style="sub">15
                                                </span><sub>Years</sub>
                                            </h4>
                                            <h3 class="ttm-fid-title"><span>Experience</span></h3>
                                        </div><!-- ttm-fid-contents end -->
                                    </div><!-- ttm-fid end -->
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <!-- ttm-fid -->
                                    <div class="ttm-fid inside ttm-fid-view-topicon">
                                        <div class="ttm-fid-contents">
                                            <h4><span data-appear-animation="animateDigits" data-from="0" data-to="70"
                                                    data-interval="10" data-before="" data-before-style="sup"
                                                    data-after="" data-after-style="sub">70
                                                </span><sub>k</sub>
                                            </h4>
                                            <h3 class="ttm-fid-title"><span>Project Done</span></h3>
                                        </div><!-- ttm-fid-contents end-->
                                    </div><!-- ttm-fid end -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--intro-section end-->

            <!--service-section start-->
            <section class="ttm-row bg-img1 ttm-bgcolor-black service-section ttm-bg ttm-bgimage-yes clearfix">
                <div class="ttm-row-wrapper-bg-layer ttm-bg-layer"></div>
                <div class="container">
                    <div class="row text-center">
                        <div class="col-lg-12">
                            <div class=" section-title clearfix">
                                <h4>WHAT WE OFFER</h4>
                                <h2 class="title">#3BROS Banquets For Weddings</h2>
                                <div class="title-img">
                                    <img src="{{URL::asset('public//front/images/ds-2.png')}}" alt="underline-img">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach($venue as $vn)
                        <div class="col-md-6 col-lg-4">
                            <div class="featured-imagebox static-title mb-20">
                                <div class="featured-thumbnail">
                                    <img class="img-fluid"
                                        src="{{URL::asset($vn['thumbnail'])}}"
                                        alt="">
                                </div>
                                <div class="featured-content">
                                    <div class="featured-title">
                                        <h5><a href="#">{{$vn['title']}}</a></h5>
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
                                        href="#" title="">Read More</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <!-- <div class="col-md-6 col-lg-4">
                            <div class="featured-imagebox static-title mb-20">
                                <div class="featured-thumbnail">
                                    <img class="img-fluid"
                                        src="{{URL::asset('public//front/images/wedding-banquet/volga-palace-govindpuram-ghaziabad-banquet-halls.jpg')}}"
                                        alt="">
                                </div>
                                <div class="featured-content">
                                    <div class="featured-title">
                                        <h5><a href="#"> #3BROS Banquets & Lwan KB</a></h5>
                                    </div>
                                    <div class="trib-events-vanue">
                                        <h5><span>PAX</span> : 100-250</h5>

                                    </div>

                                    <div class="trib-events-vanue">
                                        <h5><span>Venue Type</span> : Indoor Banquet + Lawn</h5>
                                    </div>
                                    <div class="trib-events-vanue">
                                        <h5><span>Location</span> : Ghaziabad</h5>
                                    </div>
                                    <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-round ttm-btn-style-fill ttm-btn-color-black read-more mt-15"
                                        href="#" title="">Read More</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="featured-imagebox static-title mb-20">
                                <div class="featured-thumbnail">
                                    <img class="img-fluid" src="{{URL::asset('public//front/images/wedding-banquet/party-lawn.jpg')}}" alt="">
                                </div>
                                <div class="featured-content">
                                    <div class="featured-title">
                                        <h5><a href="#">#3BROS Indrapuram</a></h5>
                                    </div>
                                    <div class="trib-events-vanue">
                                        <h5><span>PAX</span> : 100-250</h5>

                                    </div>

                                    <div class="trib-events-vanue">
                                        <h5><span>Venue Type</span> : Party Lawn</h5>
                                    </div>
                                    <div class="trib-events-vanue">
                                        <h5><span>Location</span> : Ghaziabad</h5>
                                    </div>
                                    <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-round ttm-btn-style-fill ttm-btn-color-black read-more mt-15"
                                        href="#" title="">Read More</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="featured-imagebox static-title mb-20">
                                <div class="featured-thumbnail">
                                    <img class="img-fluid" src="{{URL::asset('public//front/images/wedding-banquet/indoor-banquet.jpg')}}" alt="">
                                </div>
                                <div class="featured-content">
                                    <div class="featured-title">
                                        <h5><a href="#">#3BROS Banquet RP</a></h5>
                                    </div>
                                    <div class="trib-events-vanue">
                                        <h5><span>PAX</span> : 100-250</h5>

                                    </div>

                                    <div class="trib-events-vanue">
                                        <h5><span>Venue Type</span> : Indoor Banquet</h5>
                                    </div>
                                    <div class="trib-events-vanue">
                                        <h5><span>Location</span> : Ghaziabad</h5>
                                    </div>
                                    <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-round ttm-btn-style-fill ttm-btn-color-black read-more mt-15"
                                        href="#" title="">Read More</a>
                                </div>

                            </div>
                        </div> -->
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-round ttm-btn-style-fill ttm-btn-color-skincolor view-all mt-50"
                                href="#">View All Banquets</a>
                        </div>
                    </div>
                </div>
            </section>
            <!--service-section end-->
            <!--service-section start-->
            <section class="ttm-row bg-img1 ttm-bgcolor-grey service-section ttm-bg ttm-bgimage-yes clearfix">
                <div class="ttm-row-wrapper-bg-layer ttm-bg-layer"></div>
                <div class="container">
                    <div class="row text-center">
                        <div class="col-lg-12">
                            <div class=" section-title clearfix">
                                <h4>WHAT WE OFFER</h4>
                                <h2 class="title">#3BROS Farm House For Destination Weddings</h2>
                                <div class="title-img">
                                    <img src="{{URL::asset('public//front/images/ds-2.png')}}" alt="underline-img">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach($venue as $vn)
                        <div class="col-md-6 col-lg-4">
                            <div class="featured-imagebox static-title mb-20">
                                <div class="featured-thumbnail">
                                    <img class="img-fluid"
                                        src="{{URL::asset($vn['thumbnail'])}}"
                                        alt="">
                                </div>
                                <div class="featured-content">
                                    <div class="featured-title">
                                        <h5><a href="#">{{$vn['title']}}</a></h5>
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
                                        href="#" title="">Read More</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-round ttm-btn-style-fill ttm-btn-color-skincolor view-all mt-50"
                                href="#">View All Banquets</a>
                        </div>
                    </div>
                </div>
            </section>
            <!--service-section end-->
            <section class="ttm-row bg-img1 ttm-bgcolor-black service-section ttm-bg ttm-bgimage-yes clearfix">
                <div class="ttm-row-wrapper-bg-layer ttm-bg-layer"></div>
                <div class="container">
                    <div class="row text-center">
                        <div class="col-lg-12">
                            <div class=" section-title clearfix">
                                <h4>WHAT WE OFFER</h4>
                                <h2 class="title">Do You Know</h2>
                                <div class="title-img">
                                    <img src="{{URL::asset('public//front/images/ds-2.png')}}" alt="underline-img">
                                </div>
                                <p>When you book a package with #3BROS, it's an all Inclusive Package which includes
                                    Free Decoration, Free Photography &
                                    cinematography, Free Band Baja Baraat, Free Live DJ & Music</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <!-- featured-imagebox -->
                            <div class="featured-imagebox ttm-box-view-top-image featured-imagebox-portfolio mb-30">
                                <div class="featured-portfolio-item">
                                    <div class="featured-thumbnail"><!-- featured-thumbnail -->
                                        <a href="#"> <img class="img-fluid"
                                                src="{{URL::asset('public//front/images/portfolio/indian-wedding-gate-decoration-green-eucalyptus-background.png')}}"
                                                alt="image" height="100%" width="100%"></a>
                                    </div><!-- featured-thumbnail END -->
                                    <!-- ttm-box-view-overlay -->
                                    <div class="ttm-box-view-overlay ttm-portfolio-box-view-overlay">
                                        <div class="ttm-media-link">
                                            <a class="ttm_prettyphoto ttm_image" data-gal="prettyPhoto[gallery1]"
                                                title="FREE DECORATION"
                                                href="images/portfolio/indian-wedding-gate-decoration-green-eucalyptus-background.png"
                                                data-rel="prettyPhoto">
                                                <i class="ti ti-search"></i>
                                            </a>
                                        </div>
                                    </div><!-- ttm-box-view-overlay END-->
                                </div>
                                <!-- featured-bottom-content -->
                                <div class="featured-bottom-content text-center featured-bottom-portfolio-content">
                                    <div class="featured-title">
                                        <h5 class="title-post">
                                            <a href="#">Free Decoration</a>
                                        </h5>
                                    </div>
                                    <p>At #3BROS Banquets & Farmhouse, we take immense pride in creating an enchanting
                                        and unforgettable setting for your
                                        Indian wedding, where every detail of the decor is carefully crafted to reflect
                                        the grandeur and beauty of this
                                        cherished occasion.</p>
                                </div><!-- featured-bottom-content END -->
                            </div><!-- featured-imagebox END -->
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <!-- featured-imagebox -->
                            <div class="featured-imagebox ttm-box-view-top-image featured-imagebox-portfolio mb-30">
                                <div class="featured-portfolio-item">
                                    <div class="featured-thumbnail"><!-- featured-thumbnail -->
                                        <a href="#"> <img class="img-fluid"
                                                src="{{URL::asset('public//front/images/portfolio/side-view-photographer-married-couple-1.jpg')}}"
                                                alt="image" height="100%" width="100%"></a>
                                    </div><!-- featured-thumbnail END -->
                                    <!-- ttm-box-view-overlay -->
                                    <div class="ttm-box-view-overlay ttm-portfolio-box-view-overlay">
                                        <div class="ttm-media-link">
                                            <a class="ttm_prettyphoto ttm_image" data-gal="prettyPhoto[gallery1]"
                                                title="side-view-photographer-married-couple-1.jpg"
                                                href="images/portfolio/side-view-photographer-married-couple-1.jpg"
                                                data-rel="prettyPhoto">
                                                <i class="ti ti-search"></i>
                                            </a>
                                        </div>
                                    </div><!-- ttm-box-view-overlay END-->
                                </div>
                                <!-- featured-bottom-content -->
                                <div class="featured-bottom-content text-center featured-bottom-portfolio-content">
                                    <div class="featured-title">
                                        <h5 class="title-post">
                                            <a href="#">Free Photography & Cinematography</a>
                                        </h5>
                                    </div>
                                    <p>Your wedding day is a time for celebration, love, and the start of a beautiful
                                        journey together. At #3BROS Banquets and
                                        Farmhouse, we believe in making your wedding experience truly unforgettable</p>
                                </div><!-- featured-bottom-content END -->
                            </div><!-- featured-imagebox END -->
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <!-- featured-imagebox -->
                            <div class="featured-imagebox ttm-box-view-top-image featured-imagebox-portfolio mb-30">
                                <div class="featured-portfolio-item">
                                    <div class="featured-thumbnail"><!-- featured-thumbnail -->
                                        <a href="#"> <img class="img-fluid" src="{{URL::asset('public//front/images/portfolio/band-baja.jpg')}}"
                                                alt="image" height="100%" width="100%"></a>
                                    </div><!-- featured-thumbnail END -->
                                    <!-- ttm-box-view-overlay -->
                                    <div class="ttm-box-view-overlay ttm-portfolio-box-view-overlay">
                                        <div class="ttm-media-link">
                                            <a class="ttm_prettyphoto ttm_image" data-gal="prettyPhoto[gallery1]"
                                                title="band-baja" href="images/portfolio/band-baja.jpg"
                                                data-rel="prettyPhoto">
                                                <i class="ti ti-search"></i>
                                            </a>
                                        </div>
                                    </div><!-- ttm-box-view-overlay END-->
                                </div>
                                <!-- featured-bottom-content -->
                                <div class="featured-bottom-content text-center featured-bottom-portfolio-content">
                                    <div class="featured-title">
                                        <h5 class="title-post">
                                            <a href="#">Free Band Ghodi Baraat</a>
                                        </h5>
                                    </div>
                                    <p>At #3BROS Banquets and Farmhouse, we're passionate about making your wedding day
                                        as grand and memorable as it deserves
                                        to be. To add an extra touch of joy, celebration, and traditional flair to your
                                        baraat procession</p>
                                </div><!-- featured-bottom-content END -->
                            </div><!-- featured-imagebox END -->
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <!-- featured-imagebox -->
                            <div class="featured-imagebox ttm-box-view-top-image featured-imagebox-portfolio mb-30">
                                <div class="featured-portfolio-item">
                                    <div class="featured-thumbnail"><!-- featured-thumbnail -->
                                        <a href="#"> <img class="img-fluid" src="{{URL::asset('public//front/images/portfolio/band-baja.jpg')}}"
                                                alt="image" height="100%" width="100%"></a>
                                    </div><!-- featured-thumbnail END -->
                                    <!-- ttm-box-view-overlay -->
                                    <div class="ttm-box-view-overlay ttm-portfolio-box-view-overlay">
                                        <div class="ttm-media-link">
                                            <a class="ttm_prettyphoto ttm_image" data-gal="prettyPhoto[gallery1]"
                                                title="band-baja" href="images/portfolio/band-baja.jpg"
                                                data-rel="prettyPhoto">
                                                <i class="ti ti-search"></i>
                                            </a>
                                        </div>
                                    </div><!-- ttm-box-view-overlay END-->
                                </div>
                                <!-- featured-bottom-content -->
                                <div class="featured-bottom-content text-center featured-bottom-portfolio-content">
                                    <div class="featured-title">
                                        <h5 class="title-post">
                                            <a href="#">Free Live DJ & Music</a>
                                        </h5>
                                    </div>
                                    <p>At #3BROS Banquets, we understand that music is the heartbeat of any celebration,
                                        and your shaadi is no exception.
                                        That's why we're thrilled to offer you the opportunity to infuse your wedding
                                        celebration with electrifying energy and
                                        unforgettable melodies by including Live DJ and Music.</p>
                                </div><!-- featured-bottom-content END -->
                            </div><!-- featured-imagebox END -->
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <!-- featured-imagebox -->
                            <div class="featured-imagebox ttm-box-view-top-image featured-imagebox-portfolio mb-30">
                                <div class="featured-portfolio-item">
                                    <div class="featured-thumbnail"><!-- featured-thumbnail -->
                                        <a href="#"> <img class="img-fluid"
                                                src="{{URL::asset('public//front/images/portfolio/cute-dj-woman-having-fun-playing-music-club-party.jpg')}}"
                                                alt="image" height="100%" width="100%"></a>
                                    </div><!-- featured-thumbnail END -->
                                    <!-- ttm-box-view-overlay -->
                                    <div class="ttm-box-view-overlay ttm-portfolio-box-view-overlay">
                                        <div class="ttm-media-link">
                                            <a class="ttm_prettyphoto ttm_image" data-gal="prettyPhoto[gallery1]"
                                                title="cute-dj-woman-having-fun-playing-music-club-party"
                                                href="images/portfolio/cute-dj-woman-having-fun-playing-music-club-party.jpg"
                                                data-rel="prettyPhoto">
                                                <i class="ti ti-search"></i>
                                            </a>
                                        </div>
                                    </div><!-- ttm-box-view-overlay END-->
                                </div>
                                <!-- featured-bottom-content -->
                                <div class="featured-bottom-content text-center featured-bottom-portfolio-content">
                                    <div class="featured-title">
                                        <h5 class="title-post">
                                            <a href="#">Bridal Entry with Smoke</a>
                                        </h5>
                                    </div>
                                    <p>Your wedding day is a once-in-a-lifetime event, and every moment should be
                                        nothing short of magical. Elevate your bridal
                                        entry with the captivating effects of smoke and pyro shots.</p>
                                </div><!-- featured-bottom-content END -->
                            </div><!-- featured-imagebox END -->
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <!-- featured-imagebox -->
                            <div class="featured-imagebox ttm-box-view-top-image featured-imagebox-portfolio mb-30">
                                <div class="featured-portfolio-item">
                                    <div class="featured-thumbnail"><!-- featured-thumbnail -->
                                        <a href="#"> <img class="img-fluid" src="{{URL::asset('public//front/images/portfolio/bridal-entry.jpg')}}"
                                                alt="image" height="100%" width="100%"></a>
                                    </div><!-- featured-thumbnail END -->
                                    <!-- ttm-box-view-overlay -->
                                    <div class="ttm-box-view-overlay ttm-portfolio-box-view-overlay">
                                        <div class="ttm-media-link">
                                            <a class="ttm_prettyphoto ttm_image" data-gal="prettyPhoto[gallery1]"
                                                title="invitation" href="images/portfolio/invitation.jpg"
                                                data-rel="prettyPhoto">
                                                <i class="ti ti-search"></i>
                                            </a>
                                        </div>
                                    </div><!-- ttm-box-view-overlay END-->
                                </div>
                                <!-- featured-bottom-content -->
                                <div class="featured-bottom-content text-center featured-bottom-portfolio-content">
                                    <div class="featured-title">
                                        <h5 class="title-post">
                                            <a href="#">Free Wedding invitation</a>
                                        </h5>
                                    </div>
                                    <p>When you choose #3BROS Banquets as your wedding venue, we believe in going the
                                        extra mile to make your big day
                                        exceptional. As a token of our appreciation, you'll receive beautifully designed
                                        wedding invitations absolutely free of
                                        charge.</p>
                                </div><!-- featured-bottom-content END -->
                            </div><!-- featured-imagebox END -->
                        </div>
                    </div>

                </div>
            </section>



            <!--service-section.style2 start-->
            <section class="ttm-row service-section style2 bg-layer clearfix bg-layer-equal-height break-991-colum">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-lg-5">
                            <!-- col-bg-img-three -->
                            <div class="col-bg-img-three ttm-col-bgimage-yes ttm-bg ttm-left-span res-991-mt-0 mt_60">
                                <div class="ttm-col-wrapper-bg-layer ttm-bg-layer"></div>
                                <div class="layer-content">
                                </div>
                            </div><!-- col-bg-img-three end-->
                            <img src="{{URL::asset('public//front/images/bg-image/col-bgimage-3.jpg')}}" class="ttm-equal-height-image" alt="bg-image">
                        </div>
                        <div class="col-lg-7 col-md-12">
                            <!-- about-content -->
                            <div
                                class="about-content ttm-bg ttm-col-bgcolor-yes ttm-right-span ttm-bgcolor-skincolor padding-15">
                                <div class="ttm-col-wrapper-bg-layer ttm-bg-layer"></div>
                                <div class="layer-content">
                                    <!-- section title -->
                                    <div class="section-title with-desc clearfix">
                                        <div class="title-header">
                                            <h4>How It Works</h4>
                                            <h2 class="title">Package Ek, Banquets Anek
                                            </h2>
                                        </div>

                                    </div><!-- section title end -->
                                    <div class="separator clearfix">
                                        <div class="sep-line mb-50"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="featured-box style2 left-icon icon-align-top">
                                                <div class="featured-icon">
                                                    <div
                                                        class="ttm-icon ttm-icon_element-size-sm ttm-icon_element-color-white">
                                                        <i class="flaticon flaticon-cake"></i>
                                                    </div>
                                                </div>
                                                <div class="featured-content">
                                                    <div class="featured-title">
                                                        <h5>Select the Package</h5>
                                                    </div>
                                                    <div class="featured-desc">
                                                        <p>Begin your journey by choosing from our array of tailored
                                                            packages. Each package is designed to cater to different
                                                            needs
                                                            and preferences, ensuring that every aspect of your event is
                                                            covered. From basic amenities to luxurious services, our
                                                            packages encompass a wide range of options to suit your
                                                            unique event.</p>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="featured-box style2 left-icon icon-align-top">
                                                <div class="featured-icon">
                                                    <div
                                                        class="ttm-icon ttm-icon_element-size-sm ttm-icon_element-color-white">
                                                        <i class="flaticon flaticon-wedding-location"></i>
                                                    </div>
                                                </div>
                                                <div class="featured-content">
                                                    <div class="featured-title">
                                                        <h5>Choose Banquet</h5>
                                                    </div>
                                                    <div class="featured-desc">
                                                        <p>Begin your journey by choosing from our array of tailored
                                                            packages. Each package is designed to cater to different
                                                            needs
                                                            and preferences, ensuring that every aspect of your event is
                                                            covered. From basic amenities to luxurious services, our
                                                            packages encompass a wide range of options to suit your
                                                            unique event.</p>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="featured-box style2 left-icon icon-align-top">
                                                <div class="featured-icon">
                                                    <div
                                                        class="ttm-icon ttm-icon_element-size-sm ttm-icon_element-color-white">
                                                        <i class="flaticon flaticon-wedding-location"></i>
                                                    </div>
                                                </div>
                                                <div class="featured-content">
                                                    <div class="featured-title">
                                                        <h5>Choose Banquet</h5>
                                                    </div>
                                                    <div class="featured-desc">
                                                        <p>Begin your journey by choosing from our array of tailored
                                                            packages. Each package is designed to cater to different
                                                            needs
                                                            and preferences, ensuring that every aspect of your event is
                                                            covered. From basic amenities to luxurious services, our
                                                            packages encompass a wide range of options to suit your
                                                            unique event.</p>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- about-content end-->
                        </div>
                    </div>
                </div>
            </section>
            <!--service-section.style2 end-->

            <!--timer-section start-->
            <div class="ttm-row timer-section ttm-bgcolor-grey mt_60 clearfix">
                <div class="container">
                    <div class="row align-item-center">
                        <div class="col-md-12 col-lg-5">
                            <div class="section-title with-desc clearfix m-0">
                                <div class="title-header">
                                    <h2 class="title mb-0 res-991-mb-30">Our Upcoming Events:</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-7 timer-wraper">
                            <div class="timer-box-content">
                                <div id="timer-box" class="timer-box">
                                    <div class="line-bgimg2 timer-box-position">
                                        <span class="days"></span>
                                        <div class="bottom-txt">Days</div>
                                    </div>
                                    <div class="line-bgimg2 timer-box-position">
                                        <span class="hours"></span>
                                        <div class="bottom-txt">Hours</div>
                                    </div>
                                    <div class="line-bgimg2 timer-box-position">
                                        <span class="minutes"></span>
                                        <div class="bottom-txt">Minutes</div>
                                    </div>
                                    <div class="line-bgimg2  timer-box-position">
                                        <span class="seconds"></span>
                                        <div class="bottom-txt">Seconds</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--timer-section end-->

            <!--event-section start-->
            <section class="ttm-row event-section clearfix">
                <div class="container">
                    <div class="row text-center">
                        <div class="col-lg-12">
                            <div class=" section-title clearfix">
                                <h4>LATEST</h4>
                                <h2 class="title">Our Events</h2>
                                <div class="title-img"><img src="{{URL::asset('public//front/images/ds-1.png')}}" alt="underline-img"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="event-slide owl-carousel" data-item="2" data-nav="true" data-dots="false"
                                data-auto="false" data-center="true">
                                <!-- featured-imagebox-->
                                @foreach($event as $ev)
                                <div class="featured-imagebox featured-imagebox-event ttm-box-view-top-image mb-120 position-relative res-767-mlr-15">
                                    <div class="featured-thumbnail">
                                        <img class="img-fluid" src="{{URL::asset($ev['thumbnail'])}}" alt="">
                                    </div>
                                    <div class="ttm-box-post-date">
                                        <span class="ttm-entry-date">
                                            <time class="entry-date" datetime="2019-01-16T07:07:55+00:00">{{date('d',strtotime($ev['date']))}}<span
                                                    class="entry-month entry-year">{{date('M',strtotime($ev['date']))}}</span></time>
                                        </span>
                                    </div>
                                    <div class="featured-content featured-content-event">
                                        <div class="featured-title">
                                            <h5><a href="#">{{$ev['title']}}</a></h5>
                                            <span class="ttm-textcolor-skincolor">Tickets from {{$ev['price']}}</span>

                                        </div>
                                        <div class="ttm-box-meta">

                                            <p>{!!$ev['description']!!}</p>
                                            <span class="ttm-event-meta-item ttm-event-date">
                                                <i class="fa fa-clock-o"></i>
                                                <span class="ttm-event-meta-dtstart">{{date('M d',strtotime($ev['date']))}}</span>
                                                <span class="sep">-</span>
                                                <span class="ttm-event-meta-dtend">{{$ev['time']}}</span>
                                            </span>
                                            <div class="tribe-events-vanue">
                                                <i class="fa fa-map-marker"></i>{{$ev['location']}}
                                            </div>
                                        </div>
                                        <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-round ttm-btn-style-fill ttm-btn-color-black mt-28"
                                            href="#" title=""> Details</a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div><!-- row end -->
                    </div>
                </div>
            </section>
            <!--event-section end-->


            <!--gallery-section start-->
            <section class="ttm-row bg-img7 ttm-bgcolor-black gallery-section ttm-bg ttm-bgimage-yes clearfix">
                <div class="ttm-row-wrapper-bg-layer ttm-bg-layer"></div>
                <div class="container">
                    <div class="row text-center">
                        <div class="col-lg-12 col-md-12">
                            <div class=" section-title clearfix">
                                <h4>SEE OUR BEST</h4>
                                <h2 class="title">Photo Gallery</h2>
                                <div class="title-img">
                                    <img src="{{URL::asset('public//front/images/ds-2.png')}}" alt="underline-img">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--gallery-section end-->

            <!--gallery-view-section start-->
            <section class="ttm-row gallery-view-section">
                <div class="container">
                    <!-- row -->
                    <div class="row multi-columns-row ttm-boxes-spacing-5px style2 mt_65">
                        <div class="ttm-box-col-wrapper col-lg-4 col-md-6">
                            <!-- featured-image-box -->
                            <div class="featured-imagebox featured-imagebox-portfolio">
                                <!-- featured-thumbnail-->
                                <div class="featured-thumbnail">
                                    <a href="#"> <img class="img-fluid" src="{{URL::asset('public//front/images/gallery/gallery-1.jpg')}}"
                                            alt="image"></a>
                                </div><!-- featured-thumbnail END-->
                                <!-- ttm-box-view-overlay -->
                                <div class="ttm-box-view-overlay">
                                    <div class="ttm-media-link">
                                        <a class="ttm_prettyphoto ttm_image" data-gal="prettyPhoto[gallery1]"
                                            title="birthday" href="images/gallery/gallery-1.jpg" data-rel="prettyPhoto">
                                            <i class="ti ti-search"></i>
                                        </a>
                                    </div>
                                    <div class="featured-content featured-content-portfolio">
                                        <div class="featured-title">
                                            <h5><a href="#">Birthday Celebration</a></h5>
                                        </div>
                                        <!-- <span class="category">
                                            <a href="#">Private Party</a>
                                        </span> -->
                                    </div>
                                </div><!-- ttm-box-view-overlay end-->
                            </div><!-- featured-item -->
                        </div>
                        <div class="ttm-box-col-wrapper col-lg-4 col-md-6">
                            <!-- featured-image-box -->
                            <div class="featured-imagebox featured-imagebox-portfolio">
                                <!-- featured-thumbnail-->
                                <div class="featured-thumbnail">
                                    <a href="#"> <img class="img-fluid" src="{{URL::asset('public//front/images/gallery/gallery-5.jpg')}}"
                                            alt="image"></a>
                                </div><!-- featured-thumbnail END-->
                                <!-- ttm-box-view-overlay -->
                                <div class="ttm-box-view-overlay">
                                    <div class="ttm-media-link">
                                        <a class="ttm_prettyphoto ttm_image" data-gal="prettyPhoto[gallery1]"
                                            title="Wow Birthday Theme" href="images/gallery/gallery-5.jpg"
                                            data-rel="prettyPhoto">
                                            <i class="ti ti-search"></i>
                                        </a>
                                    </div>
                                    <div class="featured-content featured-content-portfolio">
                                        <div class="featured-title">
                                            <h5><a href="#">Birthday Events</a></h5>
                                        </div>

                                    </div>
                                </div><!-- ttm-box-view-overlay end-->
                            </div><!-- featured-item -->
                        </div>
                        <div class="ttm-box-col-wrapper col-lg-4 col-md-6">
                            <!-- featured-image-box -->
                            <div class="featured-imagebox featured-imagebox-portfolio">
                                <!-- featured-thumbnail-->
                                <div class="featured-thumbnail">
                                    <a href="#"> <img class="img-fluid" src="{{URL::asset('public//front/images/gallery/gallery-2.jpg')}}"
                                            alt="image"></a>
                                </div><!-- featured-thumbnail END-->
                                <!-- ttm-box-view-overlay -->
                                <div class="ttm-box-view-overlay">
                                    <div class="ttm-media-link">
                                        <a class="ttm_prettyphoto ttm_image" data-gal="prettyPhoto[gallery1]"
                                            title="Foods" href="images/gallery/gallery-2.jpg" data-rel="prettyPhoto">
                                            <i class="ti ti-search"></i>
                                        </a>
                                    </div>
                                    <div class="featured-content featured-content-portfolio">
                                        <div class="featured-title">
                                            <h5><a href="#">Foods</a></h5>
                                        </div>

                                    </div>
                                </div><!-- ttm-box-view-overlay end-->
                            </div><!-- featured-item -->
                        </div>
                        <div class="ttm-box-col-wrapper col-lg-4 col-md-6">
                            <!-- featured-image-box -->
                            <div class="featured-imagebox featured-imagebox-portfolio">
                                <!-- featured-thumbnail-->
                                <div class="featured-thumbnail">
                                    <a href="#"> <img class="img-fluid" src="{{URL::asset('public//front/images/gallery/gallery-3.jpg')}}"
                                            alt="image"></a>
                                </div><!-- featured-thumbnail END-->
                                <!-- ttm-box-view-overlay -->
                                <div class="ttm-box-view-overlay">
                                    <div class="ttm-media-link">
                                        <a class="ttm_prettyphoto ttm_image" data-gal="prettyPhoto[gallery1]"
                                            title="Internal View" href="images/gallery/gallery-3.jpg"
                                            data-rel="prettyPhoto">
                                            <i class="ti ti-search"></i>
                                        </a>
                                    </div>
                                    <div class="featured-content featured-content-portfolio">
                                        <div class="featured-title">
                                            <h5><a href="#">Internal View</a></h5>
                                        </div>
                                        <!-- <span class="category">
                                            <a href="#">Birthday Party</a>
                                        </span> -->
                                    </div>
                                </div><!-- ttm-box-view-overlay end-->
                            </div><!-- featured-item -->
                        </div>
                        <div class="ttm-box-col-wrapper col-lg-4 col-md-6">
                            <!-- featured-image-box -->
                            <div class="featured-imagebox featured-imagebox-portfolio">
                                <!-- featured-thumbnail-->
                                <div class="featured-thumbnail">
                                    <a href="#"> <img class="img-fluid" src="{{URL::asset('public//front/images/gallery/gallery-6.jpg')}}"
                                            alt="image"></a>
                                </div><!-- featured-thumbnail END-->
                                <!-- ttm-box-view-overlay -->
                                <div class="ttm-box-view-overlay">
                                    <div class="ttm-media-link">
                                        <a class="ttm_prettyphoto ttm_image" data-gal="prettyPhoto[gallery1]"
                                            title="Wedding Events" src="{{URL::asset('public//front/images/gallery/gallery-6.jpg')}}"
                                            href="https://youtu.be/HyqYly6o0DQ?si=pomzwyQ2vspmW6NM"
                                            data-rel="prettyPhoto">
                                            <i class="ti ti-control-play"></i>
                                        </a>
                                    </div>
                                    <div class="featured-content featured-content-portfolio">
                                        <div class="featured-title">
                                            <h5><a href="#"> Wedding Events</a></h5>
                                        </div>

                                    </div>
                                </div><!-- ttm-box-view-overlay end-->
                            </div><!-- featured-item -->
                        </div>
                        <div class="ttm-box-col-wrapper col-lg-4 col-md-6">
                            <!-- featured-image-box -->
                            <div class="featured-imagebox featured-imagebox-portfolio">
                                <!-- featured-thumbnail-->
                                <div class="featured-thumbnail">
                                    <a href="#"> <img class="img-fluid" src="{{URL::asset('public//front/images/gallery/gallery-8.jpg')}}"
                                            alt="image"></a>
                                </div><!-- featured-thumbnail END-->
                                <!-- ttm-box-view-overlay -->
                                <div class="ttm-box-view-overlay">
                                    <div class="ttm-media-link">
                                        <a class="ttm_prettyphoto ttm_image" data-gal="prettyPhoto[gallery1]"
                                            title=" Birthday Party" href="images/gallery/gallery-8.jpg"
                                            data-rel="prettyPhoto">
                                            <i class="ti ti-search"></i>
                                        </a>
                                    </div>
                                    <div class="featured-content featured-content-portfolio">
                                        <div class="featured-title">
                                            <h5><a href="#"> Birthday Party</a></h5>
                                        </div>
                                        <span class="category">
                                            <a href="#">Birthday Party</a>
                                        </span>
                                    </div>
                                </div><!-- ttm-box-view-overlay end-->
                            </div><!-- featured-item -->
                        </div>
                    </div><!-- row end -->
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-round ttm-btn-style-fill ttm-btn-color-black mt-50"
                                href="#">View More Gallery</a>
                        </div>
                    </div>
                </div>
            </section>


            <!--testimonial-->
            <section class="testimonial-section ttm-row bg-layer break-991-colum">
                <div class="container">
                    <div class="row">
                        <!--Testimonials-->
                        <div class="col-md-12 col-lg-7">
                            <div
                                class="ttm-col-bgcolor-yes ttm-bg ttm-left-span ttm-bgcolor-skincolor padding-3 res-1199-pl-15">
                                <div class="ttm-col-wrapper-bg-layer ttm-bg-layer">
                                    <div class="ttm-bg-layer-inner"></div>
                                </div>
                                <div class="layer-content">
                                    <div class="carousel-outer pr-10">
                                        <div class="section-title clearfix mb-30">
                                            <h4>TESTIMONAL</h4>
                                            <h2 class="title ttm-textcolor-white">Clients feedback</h2>
                                        </div>
                                        <!-- wrap-testimonial -->
                                        <div class="testimonial-slide owl-carousel" data-item="1" data-nav="false"
                                            data-dots="false" data-auto="false">
                                            <!-- testimonials -->
                                            <div class="testimonials">
                                                <div class="testimonial-content mb-35">
                                                    <div class="testimonial-avatar">
                                                        <div class="testimonial-img">
                                                            <img class="img-center" src="{{URL::asset('public//front/images/femaluser.jpg')}}"
                                                                alt="testimonial-img">
                                                        </div>
                                                    </div>
                                                    <div class="testimonial-caption">
                                                        <h6>Niharika Pandey</h6>
                                                        <label></label>
                                                    </div>
                                                    <blockquote>Respect to great professionlism shown by 3Bros team!! We
                                                        had to cancel our daughter's birthday celebration due to health
                                                        reasons and 3Bros team refunded the booking amount without any
                                                        problem. We highly recommend this place.
                                                    </blockquote>
                                                </div>
                                            </div><!-- testimonials end -->
                                            <!-- testimonials -->
                                            <div class="testimonials">
                                                <div class="testimonial-content mb-35">
                                                    <div class="testimonial-avatar">
                                                        <div class="testimonial-img">
                                                            <img class="img-center" src="{{URL::asset('public//front/images/maleuser.jpg')}}"
                                                                alt="testimonial-img">
                                                        </div>
                                                    </div>
                                                    <div class="testimonial-caption">
                                                        <h6>Abhishek Saxena
                                                        </h6>
                                                        <label></label>
                                                    </div>
                                                    <blockquote>A very place to arrange family functions. Had to cancel
                                                        because the guest list got increased to almost double.
                                                        Thanks team 38ros for refunding the initial booking amount and
                                                        holding the slot for me.
                                                        Really appreciate.
                                                        But yes will definitely pay a visit sometime soon.
                                                    </blockquote>
                                                </div>
                                            </div><!-- testimonials end -->
                                            <!-- testimonials -->
                                            <div class="testimonials">
                                                <div class="testimonial-content mb-35">
                                                    <div class="testimonial-avatar">
                                                        <div class="testimonial-img">
                                                            <img class="img-center" src="{{URL::asset('public//front/images/femaluser.jpg')}}"
                                                                alt="testimonial-img">
                                                        </div>
                                                    </div>
                                                    <div class="testimonial-caption">
                                                        <h6>ANKITA GARG
                                                        </h6>
                                                        <label></label>
                                                    </div>
                                                    <blockquote>I have done advance booking since i was offered best
                                                        deal in 3 bro's but due to location constraint i had to cancel
                                                        my
                                                        booking.
                                                        After i cancel my booking, refund was initiated immediately.
                                                        This shows commitment, generiousity towards their deal.
                                                    </blockquote>
                                                </div>
                                            </div><!-- testimonials end -->
                                        </div><!-- wrap-testimonial end-->
                                    </div>
                                </div>
                            </div>
                        </div><!--left Column-end-->
                        <div class="col-md-12 col-lg-5">
                            <div
                                class="col-bg-img-four ttm-col-bgimage-yes ttm-bg ttm-right-span ml_165 mt-60 res-991-mt-0">
                                <div class="ttm-col-wrapper-bg-layer ttm-bg-layer"></div>
                                <div class="layer-content"></div>
                            </div>
                            <img src="{{URL::asset('public//front/images/bg-image/col-bgimage-4.jpg')}}" class="ttm-equal-height-image" alt="bg-image">
                        </div>
                        <!--Testimonials-end-->
                    </div>
                </div>
            </section>
            <!--End testimonial-->
            <section class="ttm-row bg-img bg-img9 ttm-bgimage-yes ttm-bgcolor-black ttm-bg only-text-section clearfix">
                <div class="ttm-row-wrapper-bg-layer ttm-bg-layer"></div>
                <div class="container">
                    <div class="row text-center">
                        <div class="col-lg-12 col-md-12">
                            <div class="title-box-only text-center ttm-textcolor-white">
                                <div class="featured-icon">
                                    <div class="ttm-icon ttm-icon_element-size-xl ttm-icon_element-color-white">
                                        <i class="flaticon flaticon-confetti"></i>
                                    </div>
                                </div>
                                <h4>We Take Care Of Preparation,</h4>
                                <h2>You Enjoy The <strong class="ttm-strongcolor-skincolor">Celebration!</strong> </h2>
                                <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-round ttm-btn-style-border ttm-btn-color-white  mt-30 mb-35"
                                    href="#">Get In Touch</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="ttm-row contact-form-section ttm-bgcolor-grey bg-layer break-991-colum clearfix">
                <div class="container">
                    <div class="row mt_100 res-991-mt-0 res-1199-mlr-15">
                        <div class="col-md-12 col-lg-5">
                            <!-- col-bg-img-three -->
                            <div class="col-bg-img-three ttm-col-bgimage-yes ttm-bg">
                                <div class="ttm-col-wrapper-bg-layer ttm-bg-layer"></div>
                                <div class="layer-content"></div>
                            </div><!-- col-bg-img-three end-->
                            <img src="{{URL::asset('public//front/images/bg-image/col-bgimage-3.jpg')}}" class="ttm-equal-height-image" alt="bg-image">
                        </div>
                        <div class="col-md-12 col-lg-7">
                            <div class="ttm-col-bgcolor-yes ttm-bg ttm-bgcolor-white padding-10">
                                <div class="ttm-col-wrapper-bg-layer ttm-bg-layer"></div>
                                <div class="layer-content">
                                    <div class="section-title clearfix">
                                        <h3>Get The Party Started</h3>
                                        <p>As the premier event planning company in the area. Each event and client is
                                            unique and we
                                            believe our services should be as well.</p>
                                    </div>
                                    <form id="contactform" class="row contactform wrap-form clearfix" method="post"
                                        action="#" novalidate="novalidate">
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
                                            <span class="ttm-form-control"><input class="text-input" name="phone"
                                                    type="text" value="" placeholder="Your Number:*"
                                                    required="required"></span>
                                        </label>
                                        <label class="col-md-12">
                                            <i class="ti ti-comment"></i>
                                            <span class="ttm-form-control"><textarea class="text-area" name="message"
                                                    placeholder="Your Message:*" required="required"></textarea></span>
                                        </label>
                                        <input name="submit" type="submit" value="Submit"
                                            class="ttm-btn ttm-btn-size-md ttm-btn-shape-round ttm-btn-style-fill ttm-btn-color-skincolor mt-15"
                                            id="submit" title="Submit now">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--last-section start-->
            <section class="ttm-row ttm-bgcolor-grey last-section clearfix">
                <div class="container">
                    <div class="row text-center">
                        <div class="col-lg-12">
                            <div class="section-title clearfix">
                                <h4>WORKING WITH EXCELLENT</h4>
                                <h2 class="title">Our Latest News/ Blog</h2>
                                <div class="title-img"><img src="{{URL::asset('public//front/images/ds-1.png')}}" alt="underline-img"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8 col-md-6 col-sm-12 col-xs-12">
                            @foreach($blog as $k=>$b)
                             @if($k<2)
                            <div class="featured-imagebox featured-imagebox-post ttm-box-view-left-image box-shadow1 ttm-bgcolor-white mb-30">
                                <div class="row row-equal-height">
                                    <div class="col-md-12 col-lg-6 ttm-featured-img-left">
                                        <div class="featured-thumbnail">
                                            <a href="#"><img class="img-fluid" src="{{URL::asset($b['image_path'])}}"
                                                    alt="image"></a>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-6 ttm-featured-content-right">
                                        <div class="featured-content featured-content-post">
                                            <div class="ttm-box-post-date">
                                                <span class="ttm-entry-date">
                                                    <time class="entry-date"
                                                        datetime="2019-01-16T07:07:55+00:00">{{date('d',strtotime($b['created_at']))}}<span
                                                            class="entry-month entry-year">{{date('M',strtotime($b['created_at']))}}</span></time>
                                                </span>
                                            </div>
                                            <div class="featured-title ml-70">
                                                <h5><a href="#">{{$b['title']}}</a></h5>
                                            </div>
                                            <div class="featured-desc">
                                                <p class="res-991-mb-0">{!!$b['description']!!}</p>
                                            </div>
                                            <a class="ttm-btn ttm-btn-size-sm ttm-btn-shape-round ttm-btn-style-fill ttm-btn-color-black mt-20 mb-15"
                                                href="#" title="">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @else
                                @php
                                    $next = $b;
                                @endphp
                            @endif
                            @endforeach
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div
                                class="featured-imagebox featured-imagebox-post ttm-box-view-top-image box-shadow1 ttm-bgcolor-white mb-30 res-1199-m-0">
                                <div class="featured-thumbnail">
                                    <a href="blog-details.html"><img class="img-fluid" src="{{URL::asset($next['image_path'])}}"
                                            alt="image"></a>
                                </div>
                                <div class="featured-content featured-content-post">
                                    <div class="ttm-box-post-date">
                                        <span class="ttm-entry-date">
                                            <time class="entry-date" datetime="2019-01-16T07:07:55+00:00">{{date('d',strtotime($next['created_at']))}}<span
                                                    class="entry-month entry-year">{{date('M',strtotime($next['created_at']))}}</span></time>
                                        </span>
                                    </div>
                                    <div class="featured-title ml-70">
                                        <h5><a href="blog-details.html">{{$next['title']}}</a></h5>
                                    </div>
                                    <div class="featured-desc">
                                        <p class="res-991-mb-0">{!!$next['description']!!}</p>
                                    </div>
                                    <a class="ttm-btn ttm-btn-size-sm ttm-btn-shape-round ttm-btn-style-fill ttm-btn-color-black mt-10 mb-15"
                                        href="#" title="">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--last-section end-->

        </div><!-- site-main end -->

        <div class="custome-marquee">
            <div>
                <span>Celebration कोई भी हो हम हैं ना #3BROS</span>


            </div>
        </div>
@endsection
       