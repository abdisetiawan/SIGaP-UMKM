<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{asset('/frontend')}}/img/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="colorlib">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>SIGaP UMKM</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <!--
			CSS
			============================================= -->
    <link rel="stylesheet" href="{{asset('/frontend')}}/css/linearicons.css">
    <link rel="stylesheet" href="{{asset('/frontend')}}/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('/frontend')}}/css/bootstrap.css">
    <link rel="stylesheet" href="{{asset('/frontend')}}/css/magnific-popup.css">
    <link rel="stylesheet" href="{{asset('/frontend')}}/css/nice-select.css">
    <link rel="stylesheet" href="{{asset('/frontend')}}/css/animate.min.css">
    <link rel="stylesheet" href="{{asset('/frontend')}}/css/owl.carousel.css">
    <link rel="stylesheet" href="{{asset('/frontend')}}/css/jquery-ui.css">
    <link rel="stylesheet" href="{{asset('/frontend')}}/css/main.css">
    <link rel="stylesheet" href="{{asset('/frontend')}}/css/app.css">
    <link rel="stylesheet" href="{{asset('daftar/assets/css/app.css')}}">
    <link rel="stylesheet" href="{{asset('daftar/assets/external-css/style.css')}}">
</head>

<body>
    <header id="header" id="home">
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-sm-6 col-8 header-top-left no-padding">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-4 header-top-right no-padding">
                        <a href="/"><span class=""></span> <span
                                class="text">Home</span></a>
                        <a href="{{ route('daftarumkm.index') }}"><span class=""></span> <span
                                class="text">Daftar UMKM</span></a>
                        <a href="/login"><span class=""></span> <span
                                class="text">Login</span></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            
        </div>
    </header><!-- #header -->

    <main class="py-4">
            @yield('content')
        </main>

    <!-- start footer Area -->
    
    <!-- End footer Area -->


    <script src="{{asset('/frontend')}}/js/vendor/jquery-2.2.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="{{asset('/frontend')}}/js/vendor/bootstrap.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
    <script src="{{asset('/frontend')}}/js/easing.min.js"></script>
    <script src="{{asset('/frontend')}}/js/hoverIntent.js"></script>
    <script src="{{asset('/frontend')}}/js/superfish.min.js"></script>
    <script src="{{asset('/frontend')}}/js/jquery.ajaxchimp.min.js"></script>
    <script src="{{asset('/frontend')}}/js/jquery.magnific-popup.min.js"></script>
    <script src="{{asset('/frontend')}}/js/jquery.tabs.min.js"></script>
    <script src="{{asset('/frontend')}}/js/jquery.nice-select.min.js"></script>
    <script src="{{asset('/frontend')}}/js/owl.carousel.min.js"></script>
    <script src="{{asset('/frontend')}}/js/mail-script.js"></script>
    <script src="{{asset('/frontend')}}/js/main.js"></script>
    <script src="{{asset('/frontend')}}/js/app.js"></script>
    <script src="{{asset('daftar/assets/js/app.js')}}"></script>
    <script src="{{asset('daftar/assets/js/action.js')}}"></script>
    <script src="{{asset('daftar/assets/js/jquery.js')}}"></script>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

@yield('script')
<script>
$(document).ready(function(){

        filter_data('');

        function filter_data(query='')
        {   
            var search=JSON.stringify(query);
            $.ajax({
                url:"{{ route('daftarumkm.index') }}",
                method:'GET',
                data:{
                    query:search,
                    },
                dataType:'json',
                success:function(data)
                {
                    $('#daftarumkm').html(data.table_data);
                }
            })
        }
});
</script>

</html>
