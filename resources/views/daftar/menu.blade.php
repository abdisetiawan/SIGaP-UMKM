<div class="container main-menu">
    <div class="row align-items-center justify-content-between d-flex">
        <div id="logo">
            <a href="index.html"><img src="img/logo.png" alt="" title="" /></a>
        </div>
        <nav id="nav-menu-container">
            <ul class="nav-menu">
                <li><a href="/">Home</a></li>
                <li class="menu-has-children"><a href="/daftarumkm">Daftar UMKM</a>
                    <ul>
                        <li class="menu-has-children"><a>Kategori</a>
                            <ul>
                            @foreach($kategori as $kt)
                                <li><a href="/daftarumkm/{{$kt->id}}/listkt">{{$kt->nama_ktgr}}</a></li>
                            @endforeach
                            </ul>
                        </li>
                        <li class="menu-has-children"><a>Kecamatan</a>
                            <ul>
                            @foreach($kecamatan as $kc)
                                <li><a href="/daftarumkm/{{$kc->id}}/listkc">{{$kc->nama_kcmtn}}</a></li>
                            @endforeach
                            </ul>
                        </li>
                        <li class="menu-has-children"><a>kelurahan</a>
                            <ul>
                            @foreach($kelurahan as $kl)
                                <li><a href="/daftarumkm/{{$kl->id}}/listkl">{{$kl->nama_klrhn}}</a></li>
                            @endforeach
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a href="/login" target="_blank">Login</a></li>
            </ul>
        </nav><!-- #nav-menu-container -->
    </div>
</div>
