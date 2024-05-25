@extends('layouts.header');

@section('content')
<div class="ttm-page-title-row text-center">
    <div class="section-overlay"></div>
    <div class="title-box text-center">
        <div class="container">
            <div class="page-title-heading">
                <h1 class="title">BANQUETS DETAILS</h1>
            </div>
            <div class="breadcrumb-wrapper">
                <div class="container">
                    <span><a title="Homepage" href="#"><i class="fa fa-home"></i>&nbsp;&nbsp;Home</a></span>
                    <span class="ttm-bread-sep ttm-textcolor-white"> &nbsp; ⁄ &nbsp;</span>
                    <span class="ttm-textcolor-white">Baquets Details</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!--page-title end-->
<!--site-main-->
<div class="site-main">
    <section class="ttm-sidebar clearfix ttm-sidebar-section ttm-bgcolor-dark-grey">
        <div class="container">
            <!-- row -->
            <div class="row ttm-sidebar-left">
                <div class="col-lg-9 content-area">
                    <div class="card-wrapper">
                        <div class="card">
                            <!-- card left -->
                            <div class="product-imgs">
                                <div class="img-display">
                                    <div class="img-showcase" style="transform: translateX(-3512px);">
                                        @foreach($images as $img)
                                        <img src="{{URL::asset('public'.$img['path'])}}" style="width:100%; max-width:100%;" alt="Banquet Hall Images">
                                        @endforeach
                                    </div>
                                </div>
                                <div class="img-select">
                                    @foreach($images as $k=> $img)
                                    <div class="img-item">
                                        <a href="#" data-id="{{$k+1}}">
                                            <img src="{{URL::asset('public'.$img['path'])}}" style="width:100%; max-width:100%;" alt="Banquet Hall Images">
                                        </a>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- card right -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mt-10 ttm-service-description">
                                <h3>{{strtoupper($venue[0]['title'])}}</h3>
                                {!!substr($venue[0]['description'],0,200).'...'!!}
                            </div>
                        </div>
                    </div>
                    <div class="row res-1199-mlr-15">
                        <div class="col-md-12 col-lg-12">
                            <div class="padding-12 box-shadow">
                                <!-- section title -->
                                <div class="section-title clearfix mb-30">
                                    <h3 class="title">Let's kick off the celebration!</h3>
                                    <p>As the best event planners around here, we know every event and client is
                                        different. So, we customize our services for
                                        each one.
                                    </p>
                                </div>
                                @if (session('success'))
                                    <div class="alert alert-success m-3" role="alert">
                                    <div  role="alert">
                                            {{ session('success') }}
                                            </div>
                                    </div>                      
                                @endif
                                <!-- section title end -->
                                <form id="contactform" class="row contactform wrap-form clearfix" method="post" action="{{route('submitenquiry')}}">
                                @csrf
                                <input type="hidden" id="type" name="type" value="booking">
                                <input type="hidden" id="venue" name="venue" value="{{$venue[0]['title']}}">
                                <input type="hidden" id="message" name="message" value="for booking">
                                    <label class="col-md-6">
                                        <i class="ti ti-user"></i>
                                        <span class="ttm-form-control"><input class="text-input" name="name" type="text" value="" placeholder="Your Name:*" required></span>
                                    </label>
                                    <label class="col-md-6">
                                        <i class="ti ti-user"></i>
                                        <span class="ttm-form-control"><input class="text-input" name="email" type="email" value="" placeholder="Your Email:*" required></span>
                                    </label>
                                    <label class="col-md-6">
                                        <i class="ti ti-mobile"></i>
                                        <span class="ttm-form-control"><input class="text-input" name="mobile" type="text" value="" placeholder="Your Number:*" required maxlength="10" minlength="10"></span>
                                    </label>
                                    <label class="col-md-6">
                                        <i class="ti ti-location-pin"></i>
                                        <select name="billing_state" id="" class="state_select select2-hidden-accessible">
                                            <option>Select the Occasion</option>
                                            <option value="Birthday Party">Birthday Party</option>
                                            <option value="Anniversary">Anniversary</option>
                                            <option value="Weddings">Weddings</option>
                                        </select>
                                    </label>
                                    <label class="col-md-6">
                                        <i class="ti ti-comment"></i>
                                        <span class="ttm-form-control"><input class="text-input" name="nop" type="text" value="" placeholder="No. Of Guest:*" required></span>
                                    </label>
                                    </label>
                                    <label class="col-md-6">
                                        <i class="ti ti-comment"></i>
                                        <span class="ttm-form-control"><input class="text-input" name="date" type="datetime-local" value="" placeholder="*" required></span>
                                    </label>
                                    <!-- <label class="col-md-12">
                                       <i class="ti ti-comment"></i>
                                       <span class="ttm-form-control"><textarea class="text-area"
                                               name="message" placeholder="Your Message:*"
                                               required></textarea></span>
                                       </label> -->
                                    <input name="submit" type="submit" value="Submit Now" class="ttm-btn ttm-btn-size-md ttm-btn-shape-round ttm-btn-style-fill ttm-btn-color-skincolor mt-20" id="submit" title="Submit Now">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="mt-20 ttm-service-description">
                        <h4>Description</h4>
                        {!!substr($venue[0]['description'],201)!!}
                    </div>
                </div>
                <!-- Sidebar Start -->
                <div class="col-lg-3 sidebar sidebar-left widget-area">
                    <aside class="widget widget-nav-menu box-shadow">
                        <ul class="widget-menu">
                            @foreach($allvenue as $vn)
                            <li><a href="/venue/{{$vn['id']}}/{{$vn['customurl']}}">{{$vn['title']}}</a></li>
                            @endforeach
                        </ul>
                    </aside>

                    <aside class="widget contact-widget ttm-bgcolor-white box-shadow">
                        <h3 class="widget-title">Get in touch</h3>
                        <ul class="contact-widget-wrapper">

                            <li><i class="fa fa-envelope-o"></i><a href="mailto:sales@3bros.in" target="_blank">sales@3bros.in</a></li>
                            <li><i class="fa fa-phone"></i>072109 91313</li>
                        </ul>
                    </aside>
                    <aside class="widget contact-widget ttm-bgcolor-white box-shadow">
                        <h3 class="widget-title">Contact us for help?</h3>
                        <p>Contact with us through our representative or submit a business inquiry online.</p>
                        <a href="#" class="ttm-btn btn-inline">Contact Us <i class="fa fa-angle-double-right"></i></a>
                    </aside>
                </div>
                <!-- Sidebar End -->
            </div>
            <!-- row end -->
        </div>
    </section>
    <section class="related-projects mb-30">
        <div class="container">
            <div class="col-lg-12">
                <div class="pt-50 ttm-pf-single-related-wrapper">
                    <h5 class="ttm-pf-single-related-title">Related Projects</h5>
                    <div class="row">
                        @foreach($allvenue as $k => $van)
                        @if($k<=2) <div class="col-lg-4 col-md-6">
                            <!-- featured-imagebox -->
                            <div class="featured-imagebox ttm-box-view-top-image featured-imagebox-portfolio mb-30">
                                <div class="featured-portfolio-item">
                                    <div class="featured-thumbnail">
                                        <!-- featured-thumbnail -->
                                        <a href="#"> <img class="img-fluid" src="{{URL::asset('public/'.$van['thumbnail'])}}" alt="image" height="100%" width="100%"></a>
                                    </div>
                                    <!-- featured-thumbnail END -->
                                    <!-- ttm-box-view-overlay -->
                                    <div class="ttm-box-view-overlay ttm-portfolio-box-view-overlay">
                                        <div class="ttm-media-link">
                                            <a class="ttm_prettyphoto ttm_image" data-gal="prettyPhoto[gallery1]" title="{{$van['title']}}" href="{{URL::asset('public/'.$van['thumbnail'])}}" data-rel="prettyPhoto">
                                                <i class="ti ti-search"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <!-- ttm-box-view-overlay END-->
                                </div>
                                <!-- featured-bottom-content -->
                                <div class="featured-bottom-content text-center featured-bottom-portfolio-content">
                                    <div class="featured-title">
                                        <h5 class="title-post">
                                            <a href="/venue/{{$van['id']}}/{{$van['customurl']}}">{{$van['title']}}</a>
                                        </h5>
                                    </div>
                                </div>
                                <!-- featured-bottom-content END -->
                            </div>
                            <!-- featured-imagebox END -->
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
</div>
</section>
</div>
<script>
    const imgs = document.querySelectorAll('.img-select a');
    const imgBtns = [...imgs];
    let imgId = 1;

    imgBtns.forEach((imgItem) => {
        imgItem.addEventListener('click', (event) => {
            event.preventDefault();
            imgId = imgItem.dataset.id;
            slideImage();
        });
    });

    function slideImage() {
        const displayWidth = document.querySelector('.img-showcase img:first-child').clientWidth;

        document.querySelector('.img-showcase').style.transform = `translateX(${- (imgId - 1) * displayWidth}px)`;
    }

    window.addEventListener('resize', slideImage);
</script>

@endsection