@extends('layouts.master')
@section('content')
<div class="main-content">
    <div class="container-fluid">
        <form class="navbar-form navbar-left" method="GET" action="/umkm">
            <div class="input-group">
                <input name="cari" type="search" class="form-control" placeholder="Masukan Nama UMKM">
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-primary">Go</button>
                </span>
            </div>
        </form>
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Data UMKM</h3>
                        <div class="right">
                            <a href="/umkm/exportpdf" class="btn btn-primary">PDF</a>
                            <a href="/umkm/exportexcel" class="btn btn-primary">Excel</a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama UMKM</th>
                                    <th>nama Pemilik</th>
                                    <th>Kecamatan</th>
                                    <th>Kelurahan</th>
                                    <th>Kategori</th>
                                    <th>Alamat</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php $no = 0;?>
                                    @foreach($data_umkm as $umkm)
                                    <?php $no++ ;?>
                                <tr>
                                    <td>{{$no}}</td>
                                    <td>{{$umkm->nama_umkm}}</td>
                                    <td>{{$umkm->member->nama}}</td>
                                    <td>{{$umkm->kecamatan->nama_kcmtn}}</td>
                                    <td>{{$umkm->kelurahan->nama_klrhn}}</td>
                                    <td>{{$umkm->kategori->nama_ktgr}}</td>
                                    <td>{{$umkm->alamat}}</td>
                                    <td>{{$umkm->keterangan}}</td>
                                </tr>
                                @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop