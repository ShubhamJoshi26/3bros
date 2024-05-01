@extends('layouts.header')
@section('content')
        <div class="ttm-page-title-row text-center">
            <div class="section-overlay"></div>
            <div class="title-box text-center">
                <div class="container">
                    <div class="page-title-heading">
                        <h1 class="title">{{strtoupper($blog['title'])}}</h1>
                    </div>
                    <div class="breadcrumb-wrapper">
                        <div class="container">
                            <span><a title="Homepage" href="#"><i
                                        class="fa fa-home"></i>&nbsp;&nbsp;Home</a></span>
                            <span class="ttm-bread-sep ttm-textcolor-white"> &nbsp; ⁄ &nbsp;</span>
                            <span><a title="" href="#">&nbsp;&nbsp;Blog</a></span>
                            <span class="ttm-bread-sep ttm-textcolor-white"> &nbsp; ⁄ &nbsp;</span>
                            <span class="ttm-textcolor-white">{{$blog['title']}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!--site-main-->
        <div class="site-main">
            <div class="ttm-sidebar ttm-bgcolor-grey break-991-colum clearfix ttm-sidebar-section">
                <div class="container">
                    <!-- row -->
                    <div class="row ttm-sidebar-right">
                        <div class="col-lg-9 content-area">
                            <article class="post ttm-blog-classic">
                                <div class="post-image ttm_single_image_wrapper">
                                    <img class="img-fluid" src="{{URL::asset('public/',$blog['image_path'])}}" alt="">
                                </div>
                                <div class="ttm-blog-classic-content single-blog">
                                    <div class="post-meta">
                                        <ul class="list-inline">
                                            <li><i class="ti ti-user"></i><a href="#">admin</a></li>
                                            <!-- <li><i class="ti ti-comment"></i><a href="#">2,comments</a></li> -->
                                        </ul>
                                    </div>
                                    {!!$blog['description']!!}
                            
                                </div>
                            </article>
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
                                    @foreach($blogs as $num=>$bg)
                                    <li class="ttm-recent-post-list-li clearfix">
                                        <a href="/blog-detail/{{$bg['id']}}"><img src="{{URL::asset('public/'.$bg['image_path'])}}" alt="blog-img"></a>
                                        <a href="/blog-detail/{{$bg['id']}}">{{$blog['title']}}</a>
                                        <span class="post-date">{{date('M d, Y',strtotime($bg['created_at']))}}</span>
                                    </li>
                                    @endforeach
                                </ul>
                            </aside>
                            <aside class="widget widget-Categories">
                                <h3 class="widget-title">Categories</h3>
                                <ul class="widget-menu">
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

                        <!-- Blog Sidebar End -->
                        
                            
                         
                            
                    </div>
                </div>
            </div>
        </div><!-- site-main end -->
@endsection