@extends('layouts.frontend')

@section('content')
<!-- Start cta-one Area -->

<!-- End cta-one Area -->

<section class="cta-one-area relative section-gap">
    <div class="container">

    </div>
</section>

</br>
</br>

<div class="container">
    <div class="row">
        <img src="/images/maps.jpg" alt="">
    </div>
</div>

<!-- Start blog Area -->
<section class="blog-area section-gap" id="blog">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-70 col-lg-8">
                <div class="title text-center">
                    <h1 class="mb-10">Berita Terkini</h1>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($posts as $post)
            <div class="col-lg-3 col-md-6 single-blog">
                <div class="thumb">
                    <img class="img-fluid" src="{{$post->thumbnail()}}" alt="">
                </div>
                <p class="meta">{{$post->created_at->format('d M Y')}}  |  By <a>{{$post->user->name}}<a href="#"></a></p>
                <a>
                    <h5>{{$post->title}}</h5>
                </a>
                </a>
                {!!$post->content!!}
                <a href="{{route('site.single.post',$post->slug)}}"
                    class="details-btn d-flex justify-content-center align-items-center"><span
                        class="details">Details</span><span class="lnr lnr-arrow-right"></span></a>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- End blog Area -->


<!-- Start cta-two Area -->

<!-- End cta-two Area -->
@stop
