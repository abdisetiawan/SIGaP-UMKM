@extends('layouts.master')
@section('content')
@if(session('sukses'))
<div class="alert alert-success" role="alert">
    {{session('sukses')}}
</div>
@endif
@if(session('error'))
<div class="alert alert-danger" role="alert">
    {{session('error')}}
</div>
@endif
<div class="main-content">
    <div class="container-fluid">
        <form class="navbar-form navbar-left" method="GET" action="/member">
            <div class="input-group">
                <input name="cari" type="search" class="form-control" placeholder="Masukan Nama">
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-primary">Go</button>
                </span>
            </div>
        </form>
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Data Member UMKM</h3>
                        <div class="right">
                            <a href="/member/exportpdf" class="btn btn-primary">PDF</a>
                            <a href="/member/exportexcel" class="btn btn-primary">Excel</a>
                            <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal"><i
                                    class="lnr lnr-plus-circle"></i></button>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No Ktp</th>
                                    <th>Nama</th>
                                    <th>Telephone</th>
                                    <th>Alamat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php $no = 0;?>
                                    @foreach($data_member as $member)
                                    <?php $no++ ;?>
                                <tr>
                                    <td>{{$no}}</td>
                                    <td>{{$member->no_ktp}}</td>
                                    <td>{{$member->nama}}</td>
                                    <td>{{$member->no_telp}}</td>
                                    <td>{{$member->alamat}}</td>
                                    <td>
                                        <a href="#" class="btn btn-danger btn-sm delete"
                                            member-id="{{$member->id}}">Delete</a>
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
                <h5 class="modal-title" id="exampleModalLabel">Form Data Member</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/member/create" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group {{$errors->has('no_ktp') ? 'has-error' : ''}}">
                        <label for="no_ktp">No Ktp</label>
                        <input name="no_ktp" type="text" class="form-control" id="no_ktp" placeholder="No KTP"
                            autocomplete="off" value="{{old('no_ktp')}}">
                        @if($errors->has('no_ktp'))
                        <span class="help-block">{{$errors->first('no_ktp')}}</span>
                        @endif
                    </div>
                    <div class="form-group {{$errors->has('nama') ? 'has-error' : ''}}">
                        <label for="nama">Nama Lengkap</label>
                        <input name="nama" type="text" class="form-control" id="nama" placeholder="Nama Lengkap"
                            autocomplete="off" value="{{old('nama')}}">
                        @if($errors->has('nama'))
                        <span class="help-block">{{$errors->first('nama')}}</span>
                        @endif
                    </div>
                    <div class="form-group {{$errors->has('no_telp') ? 'has-error' : ''}}">
                        <label for="no_telp">No Telepon</label>
                        <input name="no_telp" type="text" class="form-control" id="no_telp" placeholder="No Telphone"
                            autocomplete="off" value="{{old('no_telp')}}">
                        @if($errors->has('no_telp'))
                        <span class="help-block">{{$errors->first('no_telp')}}</span>
                        @endif
                    </div>
                    <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
                        <label for="email">Email</label>
                        <input name="email" type="text" class="form-control" id="email" placeholder="Email"
                            autocomplete="off" value="{{old('email')}}">
                        @if($errors->has('email'))
                        <span class="help-block">{{$errors->first('email')}}</span>
                        @endif
                    </div>
                    <div class="form-group {{$errors->has('alamat') ? 'has-error' : ''}}">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" class="form-control" id="alamat" rows="3" autocomplete="off"
                            value="{{old('alamat')}}"></textarea>
                        @if($errors->has('alamat'))
                        <span class="help-block">{{$errors->first('alamat')}}</span>
                        @endif
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
        var member_id = $(this).attr('member-id');
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
                    window.location = "/member/" + member_id + "/delete";
                }
            });
    });

</script>
@stop
