@extends('layouts.frontend')

@section('content')
<section class="banner-area relative" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    Galeri
                </h1>
            </div>
        </div>
    </div>
</section>

<section class="gallery-area section-gap">
    <div class="container">
        <div class="row">
            @foreach ($galeri as $gal)
            <div class="single-popular-carusel col-lg-3 col-md-6">
                <div class="gallery">
                    <img src="/images/galeri/{{$gal->foto}}">
                    <div class="desc">{{$gal->ktrgn_foto}}</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@stop
