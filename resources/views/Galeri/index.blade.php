@extends('layouts.master')
@section('content')
@if(session('sukses'))
<div class="alert alert-success" role="alert">
    {{session('sukses')}}
</div>
@endif
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Galeri UMKM Ku</h3>
                            <div class="right">
                                <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal"><i
                                        class="lnr lnr-plus-circle"></i></button>
                            </div>
                        </div>
                        <div class="panel-body text-wrap">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>keterangan</th>
                                        <th>Foto</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php $no = 0;?>
                                        @foreach($galeri as $glr)
                                        <?php $no++ ;?>
                                    <tr>
                                        <td>{{$no}}</td>
                                        <td>{{$glr->ktrgn_foto}}</td>
                                        <td><img src="images/galeri/{{ $glr->foto }}" class="rounded" alt="foto" width="200" height="100"></td>
                                        <td>
                                            <a href="/galeri/{{$glr->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                                            <a href="#" class="btn btn-danger btn-sm delete" galeri-id="{{$glr->id}}">Delete</a>
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
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Galeri</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="galeri/create" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="ktrgn_foto">Keterangan</label>
                        <input name="ktrgn_foto" type="text" class="form-control" id="ktrgn_foto"
                            placeholder="Keterangan" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="umkm_id">Nama Umkm</label>
                        <select class="form-control" id="umkm_id" name="umkm_id">
                            @foreach($umkm as $usaha)
                            <option value="{{$usaha->id}}">{{$usaha->nama_umkm}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="file" name="foto" class="form-control">
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
        var galeri_id = $(this).attr('galeri-id');
        swal({
                title: "Apakah anda yakin?",
                text: "",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                console.log(willDelete);
                if (willDelete) {
                    window.location = "/galeri/" + galeri_id + "/delete";
                }
            });
    });
</script>
@stop

