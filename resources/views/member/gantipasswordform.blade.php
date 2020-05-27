@extends('layouts.master')
@section('content')
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="panel">
                    @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{session('error')}}
                    </div>
                    @endif
                    @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{session('message')}}
                    </div>
                    @endif
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{!! route('ganti.password')!!}" method="post">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <label for="passwordsekarang">Password Sekarang</label>
                                        <input type="password" class="form-control" id="passwordsekarang"
                                            name="passwordsekarang">
                                    </div>
                                    <div class="form-group">
                                        <label for="passwordbaru">Masukan Password Baru Anda</label>
                                        <input type="password" class="form-control" id="passwordbaru"
                                            name="passwordbaru">
                                    </div>
                                    <div class="form-group">
                                        <label for="konfirmasipassword">Konfirmasi Password Anda</label>
                                        <input type="password" class="form-control" id="konfirmasipassword"
                                            name="konfirmasipassword">
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-warning">Ganti Password</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
