<table class="table" style="border:1px solid #ddd">
    <thead>
        <tr>
            <th>Nama Umkm</th>
            <th>Nama Pemilik</th>
            <th>Kecamatan</th>
            <th>Kelurahan</th>
            <th>Kategori</th>
            <th>Alamat</th>
        </tr>
    </thead>
    <tbody>
        @foreach($umkm as $ukm)
        <tr>
            <td>{{$ukm->nama_umkm}}</td>
            <td>{{$ukm->member->nama}}</td>
            <td>{{$ukm->kecamatan->nama_kcmtn}}</td>
            <td>{{$ukm->kelurahan->nama_klrhn}}</td>
            <td>{{$ukm->kategori->nama_ktgr}}</td>
            <td>{{$ukm->alamat}}</td>
        </tr>
        @endforeach
    </tbody>
</table>