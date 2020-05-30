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
                        <h3 class="panel-title">Form Edit Galeri</h3>
                    </div>
                    <div class="panel-body">
                        <form action="/galeri/{{$galeri->id}}/update" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="ktrgn_foto">Keterangan</label>
                                <input name="ktrgn_foto" type="text" class="form-control" id="ktrgn_foto"
                                    placeholder="Keterangan" value="{{$galeri->ktrgn_foto}}">
                            </div>
                            <div class="form-group">
                                <label for="foto">Foto</label>
                                <input type="file" name="foto" class="form-control">
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