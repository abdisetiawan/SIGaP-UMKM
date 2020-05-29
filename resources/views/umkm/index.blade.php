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
                            <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal"><i
                                    class="lnr lnr-plus-circle"></i></button>
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

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Data UMKM</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/umkm/create" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="nama_umkm">Nama UMKM</label>
                        <input name="nama_umkm" type="text" class="form-control" id="nama_umkm" placeholder="Nama UMKM"
                            autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="member_id">Nama Pemilik</label>
                        <select class="form-control" id="member_id" name="member_id">
                            @foreach($member as $m)
                            <option value="{{$m->id}}">{{$m->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kecamatan_id">Kecamatan</label>
                        <select class="form-control" id="kecamatan_id" name="kecamatan_id">
                            @foreach($kecamatan as $kcmtn)
                            <option value="{{$kcmtn->id}}">{{$kcmtn->nama_kcmtn}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kelurahan_id">Kelurahan</label>
                        <select class="form-control" id="kelurahan_id" name="kelurahan_id">
                            @foreach($kelurahan as $klrhn)
                            <option value="{{$klrhn->id}}">{{$klrhn->nama_klrhn}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kategori_id">Kategori</label>
                        <select class="form-control" id="kategori_id" name="kategori_id">
                            @foreach($kategori as $ktgr)
                            <option value="{{$ktgr->id}}">{{$ktgr->nama_ktgr}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" class="form-control" id="alamat" rows="3" autocomplete="off"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea name="keterangan" class="form-control" id="keterangan" rows="3"
                            autocomplete="off"></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
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
