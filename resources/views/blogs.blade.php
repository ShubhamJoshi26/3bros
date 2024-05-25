@extends('layouts.header')
@section('content')
        <div class="ttm-page-title-row text-center">
            <div class="section-overlay"></div>
            <div class="title-box text-center">
                <div class="container">
                    <div class="page-title-heading">
                        <h1 class="title">BLOG</h1>
                    </div>
                    <div class="breadcrumb-wrapper">
                        <div class="container">
                            <span><a title="Homepage" href="#"><i class="fa fa-home"></i>&nbsp;&nbsp;Home</a></span>
                            <span class="ttm-bread-sep ttm-textcolor-white"> &nbsp; ⁄ &nbsp;</span>
                            <span class="ttm-textcolor-white">Blog</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--site-main-->
        <div class="site-main">

            <div
                class="ttm-sidebar ttm-bgcolor-dark-grey break-991-colum ttm-sidebar-section classic-blog-section clearfix">
                <div class="container">
                    <!-- row -->
                    <div class="row ttm-sidebar-right">
                        <div class="col-lg-9 content-area">
                            @foreach($blogs as $blog)
                            <article class="post ttm-blog-classic">
                                <div class="post-image ttm_single_image_wrapper">
                                    <img class="img-fluid" src="{{URL::asset('public/'.$blog['image_path'])}}" alt="">
                                </div>
                                <div class="ttm-blog-classic-content">
                                    <div class="post-date shape-round">
                                        <span class="date">{{date('d',strtotime($blog['created_at']))}}</span>
                                        <small class="month">{{date('M',strtotime($blog['created_at']))}}</small>
                                    </div>
                                    <div class="post-title ml-85 res-pt75-767">
                                        <h5><a href="/blog/{{$blog['customurl']}}">{{$blog['title']}}</a> </h5>
                                    </div>
                                    <div class="post-meta ml-85 shape-rounded">
                                        <ul class="list-inline">
                                            <li><i class="ti ti-user"></i><a href="#">admin</a></li>
                                            <!-- <li><i class="ti ti-comment"></i><a href="#">2 comments</a></li>
                                            <li><i class="fa fa-share-alt"></i><a href="#">Share</a></li> -->
                                        </ul>
                                    </div>
                                    <p class="pt-20">{!!substr($blog['description'],0,150).'...'!!}
                                    </p>
                                    <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-round ttm-btn-style-border ttm-btn-color-black mt-15 "
                                        href="/blog/{{$blog['customurl']}}">Read More</a>
                                </div>
                            </article>
                            @endforeach
                            <!-- <article class="post ttm-blog-classic">
                                <div class="post-image ttm_single_image_wrapper">
                                    <img class="img-fluid" src="images/blog/08.jpg" alt="">
                                </div>
                                <div class="ttm-blog-classic-content">
                                    <div class="post-date shape-round">
                                        <span class="date">30</span>
                                        <small class="month">SEP</small>
                                    </div>
                                    <div class="post-title ml-85 res-pt75-767">
                                        <h5><a href="#">5 Steps To Planning A Sweet Party</a> </h5>
                                    </div>
                                    <div class="post-meta ml-85 shape-rounded">
                                        <ul class="list-inline">
                                            <li><i class="ti ti-user"></i><a href="#">admin</a></li>
                                            <li><i class="ti ti-comment"></i><a href="#">2 comments</a></li>
                                            <li><i class="fa fa-share-alt"></i><a href="#">Share</a></li>
                                        </ul>
                                    </div>
                                    <p class="pt-20">Lorem Ipsum is simply dummy text of the printing and Lorem Ipsum is
                                        simply dummy text of the printing and typesetting industry.Lorem Ipsum has been
                                        1500s Ipsum has been. vindustry. Lorem Ipsum has been 1500s Ipsum has been.</p>
                                    <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-round ttm-btn-style-border ttm-btn-color-black mt-15 "
                                        href="#">Read More</a>
                                </div>
                            </article> -->
                           
                            
                            <div class="ttm-pagination text-center">
                            {!!$blogs->links('pagination::bootstrap-5')!!}
                            </div>
                        </div>
                        <!-- Blog Sidebar -->
                        <div class="col-lg-3 sidebar sidebar-right widget-area">
                            <aside class="widget widget-search">
                                <form role="search" method="get" class="search-form  box-shadow" action="#">
                                    <label>
                                        <span class="screen-reader-text">Search for:</span>
                                        <input type="search" class="input-text" placeholder="Search …" value=""
                                            name="s">
                                    </label>
                                    <input type="submit" class="search-submit" value="Search">
                                </form>
                            </aside>
                            <aside class="widget widget-recent-post">
                                <h3 class="widget-title">Recent posts</h3>
                                <ul class="ttm-recent-post-list">
                                    @foreach($blogs as $num=>$blog)
                                    <li class="ttm-recent-post-list-li clearfix">
                                        <a href="/blog/{{$blog['customurl']}}"><img src="{{URL::asset('public/'.$blog['image_path'])}}" alt="blog-img"></a>
                                        <a href="/blog/{{$blog['customurl']}}">{{$blog['title']}}</a>
                                        <span class="post-date">{{date('M d, Y',strtotime($blog['created_at']))}}</span>
                                    </li>
                                    @endforeach
                                </ul>
                            </aside>
                            <aside class="widget widget-Categories">
                                <h3 class="widget-title">Categories</h3>
                                <ul class="widget-menu">
                                @if(!empty($blogcategory))
                                        @foreach (json_decode($blogcategory,true) as $cat)
                                        <li><a href="/blogs?category={{$cat['title']}}">{{$cat['title']}}</a></li>                                                  
                                        @endforeach
                                    @endif
                                    <!-- <li><a href="#">Engagement</a></li>
                                    <li><a href="#">Event Tips</a></li>
                                    <li><a href="#">Events for Kids</a></li>
                                    <li><a href="#">Lighting/Decor</a></li>
                                    <li><a href="#">MICE Events</a></li>
                                    <li><a href="#">Uncategorized</a></li>
                                    <li><a href="#">Weddings</a></li> -->
                                </ul>
                            </aside>
                       

                        <!-- Blog Sidebar End -->

                        
                    </div>
                </div>
            </div>

        </div><!-- site-main end -->
@endsection