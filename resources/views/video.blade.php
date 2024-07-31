@extends('layouts.header')

@section('content')


<div class="ttm-page-title-row text-center">
            <div class="section-overlay"></div>
            <div class="title-box text-center">
                <div class="container">
                    <div class="page-title-heading">
                        <h1 class="title">VIDEO</h1>
                    </div>
                    <div class="breadcrumb-wrapper">
                        <div class="container">
                            <span><a title="Homepage" href="#"><i
                                        class="fa fa-home"></i>&nbsp;&nbsp;Home</a></span>
                            <span class="ttm-bread-sep ttm-textcolor-white"> &nbsp; ⁄ &nbsp;</span>
                            <span class="ttm-textcolor-white">Video</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--page-title end-->

        <!--site-main-->
        <div class="site-main">

            <section class="ttm-row gallery-page-section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ttm-tabs style2" data-effect="fadeIn">
                                <ul class="tabs clearfix">
                                    <li class="tab active"><a href="javascript:void(0)" class="shape-round" onclick="getVideo($(this).text())"> All </a></li>                                   
                                    <li class="tab"><a href="javascript:void(0)" onclick="getVideo($(this).text())" class="shape-round">Birthdays</a></li>
                                    <li class="tab"><a href="javascript:void(0)" onclick="getVideo($(this).text())" class="shape-round">Corporate</a></li>
                                    <li class="tab"><a href="javascript:void(0)" onclick="getVideo($(this).text())" class="shape-round">Engagement</a></li>
                                    <li class="tab"><a href="javascript:void(0)" onclick="getVideo($(this).text())" class="shape-round">Weddings</a></li>
                                    <li class="tab"><a href="javascript:void(0)" onclick="getVideo($(this).text())" class="shape-round">Video</a></li>
                                    
                                </ul><!-- flat-tab end -->
                                <div class="content-tab">
                                    <!-- content-inner -->
                                    <div class="content-inner active">
                                        <div class="row pt-10  multi-columns-row ttm-boxes-spacing-0px  " id="gal">
                                            @if(!empty($video))
                                                @foreach($video as $gal)
                                                <div class="ttm-box-col-wrapper col-lg-4 col-md-6">
            <!-- featured-imagebox -->
                <div class="featured-imagebox featured-imagebox-portfolio">
                    <!-- featured-thumbnail-->
                    <div class="featured-thumbnail">
                        <a href="#">
                        
                            <iframe width="320" height="240" src="{{$gal->youtube}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        </a>
                    </div><!-- featured-thumbnail END-->
                    <!-- ttm-box-view-overlay -->
                   <!-- <div class="ttm-box-view-overlay">
                        <div class="ttm-media-link">
                            <a class="ttm_prettyphoto ttm_image"
                                data-gal="prettyPhoto[gallery1]"
                                title="Birthday Celebration"
                                href="'.URL::asset('public/'.$gal->thumbnail).'"
                                data-rel="prettyPhoto">
                                <i class="ti ti-search"></i>
                            </a>
                        </div>
                        <div class="featured-content featured-content-portfolio">
                            <div class="featured-title">
                                <h5><a href="#">'.$gal->title.'</a></h5>
                            </div>
                            
                        </div>
                    </div> ttm-box-view-overlay end-->
                </div><!-- featured-item -->
            </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div><!-- content-inner end-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div><!-- site-main end -->
@endsection