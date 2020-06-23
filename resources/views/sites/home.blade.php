@extends('layouts.frontend')

@section('content')

<section class="banner-area relative" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row fullscreen d-flex align-items-center justify-content-between">
            <div class="banner-content col-lg-9 col-md-12">
                <h1 class="text-uppercase">
                    Selamat Datang Di SIGaP UMKM
                </h1>
                <p class="pt-10 pb-10">
                    SIGaP UMKM adalah sebuah website yang terintegrasi dengan maps untuk menampilkan
                    seluruh UMKM yang ada di Yogyakarta
                </p>
                <a href="/daftarmap" target="_blank" class="primary-btn text-uppercase">Lihat Map UMKM</a>
            </div>
        </div>
    </div>
</section>

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
                    <img height=200px width=200px src="{{$post->thumbnail()}}">
                </div>
                <p class="meta">{{$post->created_at->format('d M Y')}} | By <a>{{$post->admin->nama}}</a></p>
                <a>
                    <h5>{{$post->title}}</h5>
                </a>
                <a href="{{route('site.single.post',$post->slug)}}" target="_blank" class="details-btn d-flex justify-content-center align-items-center"><span
                        class="details">Details</span><span class="lnr lnr-arrow-right"></span></a>
            </div>
        @endforeach
        </div>
    </div>
</section>

@stop