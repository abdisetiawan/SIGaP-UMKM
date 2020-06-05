@extends('layouts.master')
@section('content')
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Data UMKM</h3>
                        <div class="right">
                            <a href="/addumkm" class="btn btn-primary">Tambah UMKM</a>
                        </div>
                    </div>
                    <div class="panel-body"></div>
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
                                <td>{{$um->alamat}}</t d>
                                <td>{{$um->keterangan}}</td>
                                <td>
                                    <a href="#" class="btn btn-danger btn-sm delete" umkm-id="{{$um->id}}">Delete</a>
                                </td>
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
@stop

@section('footer')
<script>
    $('.delete').click(function () {
        var umkm_id = $(this).attr('umkm-id');
        swal({
                title: "Apakah anda yakin?",
                text: "Mau di hapus data siswa dengan id " + umkm_id + " ?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                console.log(willDelete);
                if (willDelete) {
                    window.location = "/umkm/" + umkm_id + "/delete";
                }
            });
    });

</script>
@stop
