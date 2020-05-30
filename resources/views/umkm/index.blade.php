@extends('layouts.master')
@section('content')
@if(session('sukses'))
<div class="alert alert-success" role="alert">
    {{session('sukses')}}
</div>
@endif
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
                            <a href="/addumkm" class="btn btn-primary">Tambah UMKM</a>
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
                                    <td>
                                        <a href="#" class="btn btn-danger btn-sm delete"
                                            umkm-id="{{$umkm->id}}">Delete</a>
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
<script>
    $(document).ready(function () {
        $('select[name="kecamatan_id"]').on('change', function () {
            var kecamatan_id = $(this).val();
            if (kecamatan_id) {
                $.ajax({
                    url: '/ambilkelurahan/' + kecamatan_id,
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        console.log(data);

                        $('select[name="kelurahan_id"]').empty();
                        $.each(data, function (key, value) {
                            $('select[name="kelurahan_id"]')
                                .append('<option value="' + value.id + '">' + value
                                    .nama_klrhn + '</option>');
                        });
                    }
                })
            } else {
                $('select[name="kelurahan_id"]').empty();
            }
        });
    });
</script>
@stop
