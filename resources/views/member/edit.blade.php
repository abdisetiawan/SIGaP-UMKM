@extends('layouts.master')
@section('content')

<div class="main-content">
    <div class="container-fluid">
        @if(session('sukses'))
        <div class="alert alert-success" role="alert">
            {{session('sukses')}}
        </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Masukan Data Diri Anda</h3>
                    </div>
                    <div class="panel-body">
                        <form action="/member/{{$member->id}}/update" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="nama">Nama Lengkap</label>
                                <input name="nama" type="text" class="form-control" id="nama"
                                    placeholder="Nama Depan" value="{{$member->nama}}">
                            </div>
                            <div class="form-group">
                                <label for="no_telp">No Telephone</label>
                                <input name="no_telp" type="text" class="form-control" id="no_telp" placeholder="no_telp"
                                    value="{{$member->no_telp}}">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea name="alamat" class="form-control" id="alamat"
                                    rows="3">{{$member->alamat}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="avatar">Avatar</label>
                                <input type="file" name="avatar" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary btn-warning">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@stop