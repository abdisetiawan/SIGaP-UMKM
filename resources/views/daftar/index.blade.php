@extends('layouts.frontend')

@section('content')
<div class="container p-0">
    <div class="row">

        <div class="col-lg-3 col-md-3 col-sm-4 col-5 pl-4 filter">
            <div class="fixedfilter">

                <h3><i class="fa fa-filter"></i> Filter </h3>
                <input class="mt-3" type="text" id="search" placeholder="Enter product name" style="width:100%;">

                <div class="filterprice card">
                    <div class="card-body">
                        <h5 class="card-title">Price</h5>
                        <input type="range" min="" max="" value=""
                            class="slider selector" id="pricerange">
                        <p class="p-0 m-0">Max: RM <span id="currentrange"></span></p>
                    </div>
                </div>

                <div class="filtergender card">
                    <div class="card-body">
                        <h5 class="card-title">Gender</h5>
                        
                        <input type="checkbox" id="" class="gender selector" name="gender"
                            value="">
                        <label for=""></label><br>
                        
                    </div>
                </div>

                <div class="filterbrand card">
                    <div class="card-body">
                        <h5 class="card-title">Brand</h5>
                        
                        <input type="checkbox" id="" class="brand selector" name="brand"
                            value="">
                        <label for=""></label><br>
                        
                    </div>
                </div>

            </div>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-7 pr-4">
            <h3>Daftar UMKM</h3>

            <div class="row d-flex justify-content-start" id="daftarumkm">
                
            </div>

        </div>

    </div>
</div>



@endsection