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
                        <h3 class="panel-title">Form Edit Kecamatan</h3>
                    </div>
                    <div class="panel-body">
                        <form action="/kecamatan/{{$kecamatan->id}}/update" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="nama_kcmtn">nama kecamatan</label>
                                <input name="nama_kcmtn" type="text" class="form-control" id="nama_kcmtn"
                                    placeholder="Nama Depan" value="{{$kecamatan->nama_kcmtn}}">
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