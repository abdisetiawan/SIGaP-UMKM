@extends('layouts.master')
@section('header')

@stop
@section('content')
<div class="main-content">
    <div class="container-fluid">
        @if(session('sukses'))
        <div class="alert alert-success" role="alert">
            {{session('sukses')}}
        </div>
        @endif
        <div class="panel">
            <div class="panel-body">
                <!-- LEFT COLUMN -->
                <div class="profile-left">
                    <!-- PROFILE HEADER -->
                    <div class="profile-header">
                        <div class="overlay"></div>
                        <div class="profile-main">
                            <img src="{{$member->getAvatar()}}" class="img-circle" alt="Avatar" width="85" height="85">
                            <h3 class="name">{{$member->nama}}</h3>
                        </div>
                        <div class="profile-stat">

                        </div>
                    </div>
                    <!-- END PROFILE HEADER -->

                    <!-- PROFILE DETAIL -->
                    <div class="profile-detail">
                        <div class="profile-info">
                            <h4 class="heading">Detail Diri</h4>
                            <ul class="list-unstyled list-justify">
                                <li>Username <span>{{$member->user->name}}</span></li>
                                <li>No KTP <span>{{$member->no_ktp}}</span></li>
                                <li>No Telp <span>{{$member->no_telp}}</span></li>
                                <li>Alamat <span>{{$member->alamat}}</span></li>
                            </ul>
                        </div>

                        <div class="text-center"><a href="/member/{{$member->id}}/edit" class="btn btn-warning">Edit
                                Profile</a></div>
                    </div>
                    <!-- END PROFILE DETAIL -->
                </div>
                <!-- END LEFT COLUMN -->

                <!-- RIGHT COLUMN -->
                <div class="profile-right">
                    <!-- TABBED CONTENT -->
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Nama Umkm</th>
                                <th>Kategori</th>
                                <th>Kecamatan</th>
                                <th>Kelurahan</th>
                                <th>Alamat</th>
                                <th>keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach($umkm as $um)
                            <tr>
                                <td>{{$um->nama_umkm}}</td>
                                <td>{{$um->kategori->nama_ktgr}}</td>
                                <td>{{$um->kecamatan->nama_kcmtn}}</td>
                                <td>{{$um->kelurahan->nama_klrhn}}</td>
                                <td>{{$um->alamat}}</td>
                                <td>{{$um->keterangan}}</td>
                                <td>
                                    <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                </td>
                            </tr>
                            @endforeach
                            </tr>
                        </tbody>
                    </table>
                    <!-- END TABBED CONTENT -->
                </div>
                <!-- END RIGHT COLUMN -->
            </div>
        </div>
    </div>
</div>
@stop

@section('footer')

</script>

</script>
@stop
