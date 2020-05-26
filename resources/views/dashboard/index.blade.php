@extends('layouts.master')
@section('content')
<div class="main-content">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-3">
                <div class="metric">
                    <span class="icon"><i class="fa fa-user"></i></span>
                    <p>
                        <span class="number">{{totalMember()}}</span>
                        <span class="title">Total Member</span>
                    </p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="metric">
                    <span class="icon"><i class="fa fa-home"></i></span>
                    <p>
                        <span class="number">{{totalUmkm()}}</span>
                        <span class="title">Total Umkm</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            TEMPAT MAPS DASHBOARD
        </div>
    </div>
</div>
@stop
