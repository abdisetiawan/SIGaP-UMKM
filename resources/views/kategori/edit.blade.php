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
                        <h3 class="panel-title">Form Edit Kategori</h3>
                    </div>
                    <div class="panel-body">
                        <form action="/kategori/{{$kategori->id}}/update" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="nama_ktgr">nama kategori</label>
                                <input name="nama_ktgr" type="text" class="form-control" id="nama_ktgr"
                                    placeholder="Nama Depan" value="{{$kategori->nama_ktgr}}">
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