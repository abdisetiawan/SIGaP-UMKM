<table class="table" style="border:1px solid #ddd">
    <thead>
        <tr>
            <th>No KTP</th>
            <th>Nama Lengkap</th>
            <th>Telephone</th>
            <th>Alamat</th>
        </tr>
    </thead>
    <tbody>
        @foreach($member as $m)
        <tr>
            <td>{{$m->no_ktp}}</td>
            <td>{{$m->nama}}</td>
            <td>{{$m->no_telp}}</td>
            <td>{{$m->alamat}}</td>
        </tr>
        @endforeach
    </tbody>
</table>