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
                        <h3 class="panel-title">Form Edit Kelurahan</h3>
                    </div>
                    <div class="panel-body">
                        <form action="/kelurahan/{{$kelurahan->id}}/update" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="kecamatan">Kecamatan</label>
                                <select class="form-control" id="kecamatan" name="kecamatan">
                                    @foreach($kecamatan as $kc)
                                    <option value="{{$kc->id}}" @if ($kc->id === $kelurahan->kecamatan_id) selected
                                        @endif
                                        >{{$kc->nama_kcmtn}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nama_klrhn">nama depan</label>
                                <input name="nama_klrhn" type="text" class="form-control" id="nama_klrhn"
                                    placeholder="Nama Kelurahan" value="{{$kelurahan->nama_klrhn}}">
                            </div>
                            <button type="submit" class="btn btn-primary btn-warning">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
