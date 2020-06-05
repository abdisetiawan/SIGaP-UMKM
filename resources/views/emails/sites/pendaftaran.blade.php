@component('mail::message')
# Pendaftaran Member SIGaP-UMKM

Selamat anda telah menjadi member dari SIGaP UMKM

Lakukan Login dengan menekan tombil di bawah ini dan masukan Email anda 
disertai dengan password yaitu "rahasia"
Janganlupa untuk mengganti password anda dengan cara
klick pada foto profile di pojok kanan atas lalu klick ganti password

@component('mail::button', ['url' => 'http://127.0.0.1:8000/login'])
Klik Disini
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
