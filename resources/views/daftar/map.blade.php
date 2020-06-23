<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SIGaP-UMKM</title>
    <link rel="stylesheet" href="{{asset('/dafmap')}}/css/leaflet.css">
    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('/dafmap')}}/js/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>
    <style>
        #mapid {
            height: 560px;
        }
    </style>
</head>

<body>
    <div id="mapid"></div>
    <script>
        var map = L.map('mapid').setView([-7.7945753,110.3774189], 13);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
        $.getJSON("http://127.0.0.1:8000/ambil/umkm", function(data){
            $.each(data, function(i, field){

                var v_lat=parseFloat(data[i].latitude);
                var v_long=parseFloat(data[i].longitude);

            L.marker([v_lat,v_long]).addTo(map)
            .bindPopup(data[i].nama_umkm)
            .openPopup();
            });
        });
    </script>
</body>

</html>