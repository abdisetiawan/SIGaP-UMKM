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
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Data Admin</h3>
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
                                    <th>Nama</th>
                                    <th>Telephone</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php $no = 0;?>
                                    @foreach($data_admin as $adm)
                                    <?php $no++ ;?>
                                <tr>
                                    <td>{{$no}}</td>
                                    <td>{{$adm->nama}}</td>
                                    <td>{{$adm->no_telp}}</td>
                                    <td>
                                        <a href="#" class="btn btn-danger btn-sm delete"
                                            admin-id="{{$adm->id}}">Delete</a>
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
                <h5 class="modal-title" id="exampleModalLabel">Form Data Admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/adm/create" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <input name="nama" type="text" class="form-control" id="nama" placeholder="Nama Lengkap"
                            autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="no_telp">No Telepon</label>
                        <input name="no_telp" type="text" class="form-control" id="no_telp" placeholder="No Telphone"
                            autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input name="email" type="text" class="form-control" id="email" placeholder="email"
                            autocomplete="off">
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
        var admin_id = $(this).attr('admin-id');
        swal({
                title: "Apakah anda yakin?",
                text: "Mau di hapus data admin dengan id " + admin_id + " ?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                console.log(willDelete);
                if (willDelete) {
                    window.location = "/adm/" + admin_id + "/delete";
                }
            });
    });
</script>
@stop
