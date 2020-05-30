<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li><a href="/dashboard" class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
						@if(auth()->user()->role == 'member')
						<li><a href="/galeriku" class=""><i class="lnr lnr-picture"></i> <span>Galeri</span></a></li>
						@endif
						@if(auth()->user()->role == 'admin')
						<li><a href="/adm" class=""><i class="lnr lnr-user"></i> <span>admin</span></a></li>
						<li><a href="/member" class=""><i class="lnr lnr-users"></i> <span>member</span></a></li>
						<!-- <li><a href="/berita" class=""><i class="lnr lnr-bubble"></i> <span>berita</span></a></li> -->
						<li><a href="/kategori" class=""><i class="lnr lnr-tag"></i> <span>kategori</span></a></li>
						<li><a href="/kecamatan" class=""><i class="lnr lnr-map"></i> <span>kecamatan</span></a></li>
						<li><a href="/kelurahan" class=""><i class="lnr lnr-location"></i> <span>kelurahan</span></a></li>
						<li><a href="/umkm" class=""><i class="lnr lnr-store"></i> <span>Umkm</span></a></li>
						@endif
					</ul>
				</nav>
			</div>
		</div>