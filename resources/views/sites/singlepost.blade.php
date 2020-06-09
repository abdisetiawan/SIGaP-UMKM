@extends('layouts.frontend')

@section('content')

<!-- Start post-content Area -->
<section class="banner-area relative" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    Detail Berita
                </h1>
            </div>
        </div>
    </div>
</section>

<section class="post-content-area single-post-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 posts-list">
                <div class="single-post row">
                    <div class="col-lg-12">
                        <div class="feature-img">
                            <img class="img-fluid" src="img/blog/feature-img1.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-lg-3  col-md-3 meta-details">
                        <div class="user-details row">
                            <p class="user-name col-lg-12 col-md-12 col-6"><a href="#">{{$post->user->name}}</a> <span
                                    class="lnr lnr-user"></span></p>
                            <p class="date col-lg-12 col-md-12 col-6"><a href="#">{{$post->created_at->format('D,d M Y')}}</a> <span
                                    class="lnr lnr-calendar-full"></span></p>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <h3 class="mt-20 mb-20">{{$post->title}}</h3>
                        {!!$post->content!!}
                    </div>
                    
                </div>
                
            </div>
            <div class="col-lg-4 sidebar-widgets">
                <div class="widget-wrap">
                    
                    <div class="single-sidebar-widget user-info-widget">
                        <a href="#">
                            <h4>{{$post->user->name}}</h4>
                        </a>
                        <p>
                            {{$post->user->role}}
                        </p>
                        <ul class="social-links">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-github"></i></a></li>
                            <li><a href="#"><i class="fa fa-behance"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop
