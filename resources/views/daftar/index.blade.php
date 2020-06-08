@extends('layouts.frontend')

@section('content')
<br>
<br>
<br>
<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <div class="left-sidebar">
                <h2>Pencarian Berdasarkan</h2>
                <div class="panel-group category-products" id="accordian">
                    <!--category-productsr-->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordian" href="#sportswear">
                                    <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                    Kecamatan
                                </a>
                            </h4>
                        </div>
                        <div id="sportswear" class="panel-collapse collapse">
                            <div class="panel-body">
                                @foreach ($kecamatan as $kcmtn)
                                <ul>
                                    <li><a>{{$kcmtn->nama_kcmtn}}</a></li>
                                </ul>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordian" href="#mens">
                                    <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                    Kelurahan
                                </a>
                            </h4>
                        </div>
                        <div id="mens" class="panel-collapse collapse">
                            <div class="panel-body">
                                @foreach ($kelurahan as $klrhn)
                                <ul>
                                    <li><a href="">{{$klrhn->nama_klrhn}}</a></li>
                                </ul>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordian" href="#womens">
                                    <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                    Kategori
                                </a>
                            </h4>
                        </div>
                        <div id="womens" class="panel-collapse collapse">
                            <div class="panel-body">
                                @foreach ($kategori as $ktgr)
                                <ul>
                                    <li><a href="/daftarumkm/{{$ktgr->id}}">{{$ktgr->nama_ktgr}}</a></li>
                                </ul>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-9 padding-right">
            <div class="features_items">
                <!--features_items-->
                <h2 class="title text-center">Daftar UMKM</h2>
                <div class="col-sm-4">
                    @foreach ($data_umkm as $umkm)
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="" alt="" />
                                <h2>{{$umkm->nama_umkm}}</h2>
                                <p>{{$umkm->kategori->nama_ktgr}}</p>
                                <a href="#" class="btn btn-default add-to-cart"><i
                                        class="fa fa-hand-o-right"></i>Detail</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <!--features_items-->
        </div>
    </div>
</div>


@stop
