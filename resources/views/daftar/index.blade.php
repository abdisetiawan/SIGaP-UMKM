@extends('layouts.frontend')

@section('content')
<section class="banner-area relative" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    Daftar UMKM
                </h1>
            </div>
        </div>
    </div>
</section>

<section class="popular-courses-area section-gap courses-page">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-70 col-lg-8">
                <div class="title text-center">
                    <form method="GET" action="/daftarumkm">
                        <div class="input-group">
                            <input name="cari" type="search" class="form-control" placeholder="Masukan Nama UMKM">
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-primary">Go</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($umkm as $ukm)
            <div class="single-popular-carusel col-lg-3 col-md-6">
                <div class="thumb-wrap relative">
                    <img height=200px width=200px src="{{$ukm->getThumbnail()}}">
                </div>
                <div class="details">
                    <ul class="list-unstyled list-justify">
                        <li>
                            <h3><a href="/daftarumkm/{{$ukm->id}}/detail">{{$ukm->nama_umkm}}</a></span></h3>
                        </li>
                        <li><span>{{$ukm->kategori->nama_ktgr}}</span></li>
                        <li><span>{{$ukm->kecamatan->nama_kcmtn}}</span></li>
                        <li><span>{{$ukm->kelurahan->nama_klrhn}}</span></li>
                    </ul>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@stop
