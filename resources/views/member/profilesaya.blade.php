@extends('layouts.master')
@section('header')
<link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css"
    rel="stylesheet" />
@stop
@section('content')
<div class="main-content">
    <div class="container-fluid">
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
        <div class="panel panel-profile">
            <div class="clearfix">
                <!-- LEFT COLUMN -->
                <div class="profile-left">

                    <!-- PROFILE HEADER -->
                    <div class="profile-header">
                        <div class="overlay"></div>
                        <div class="profile-main">
                            <img src="{{$member->getAvatar()}}" class="img-circle" alt="Avatar" width="85" height="85">
                            <h3 class="name">{{$member->nama}}</h3>
                        </div>
                        <div class="profile-stat">
                            
                        </div>
                    </div>
                    <!-- END PROFILE HEADER -->

                    <!-- PROFILE DETAIL -->
                    <div class="profile-detail">
                        <div class="profile-info">
                            <h4 class="heading">Detail Diri</h4>
                            <ul class="list-unstyled list-justify">
                                <li>Username <span>{{$member->user->name}}</span></li>
                                <li>No KTP <span>{{$member->no_ktp}}</span></li>
                                <li>No Telp <span>{{$member->no_telp}}</span></li>
                                <li>Alamat <span>{{$member->alamat}}</span></li>
                            </ul>
                        </div>

                        <div class="text-center"><a href="/member/{{$member->id}}/edit" class="btn btn-warning">Edit
                                Profile</a></div>
                    </div>
                    <!-- END PROFILE DETAIL -->
                </div>
                <!-- END LEFT COLUMN -->

                <!-- RIGHT COLUMN -->
                <div class="profile-right">
                    
                </div>
                <!-- END RIGHT COLUMN -->
            </div>
        </div>
    </div>
</div>
@stop

@section('footer')

</script>

</script>
@stop
