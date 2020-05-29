<nav class="navbar navbar-default navbar-fixed-top">
    <div class="brand">
        <a href="/dashboard"><img src="{{asset('admin/assets/img/Dashboard.png')}}" alt="Klorofil Logo"
                class="img-responsive logo')}}" width="85" height="85"></a>
    </div>
    <div class="container-fluid">
        <div class="navbar-btn">
            <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
        </div>
        <div id="navbar-menu">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="
							@if(auth()->user()->role == 'member')
							{{auth()->user()->member->getAvatar()}} 
							@else
							/images/user.jpg
							@endif" 
							class="img-circle" alt="Avatar"><span>{{auth()->user()->name}}</span><i
                            class="icon-submenu lnr lnr-chevron-down"></i></a>
                    <ul class="dropdown-menu">
                        @if(auth()->user()->role == 'member')
                        <li><a href="/profilesaya"><i class="lnr lnr-user"></i> <span>Profile Saya</span></a></li>
                        @endif
                        <li><a href="/gantipassword"><i class="lnr lnr-lock"></i> <span>Ganti Password</span></a></li>
                        <li><a href="/logout"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
                    </ul>
                </li>
                <!-- <li>
							<a class="update-pro" href="https://www.themeineed.com/downloads/klorofil-pro-bootstrap-admin-dashboard-template/?utm_source=klorofil&utm_medium=template&utm_campaign=KlorofilPro" title="Upgrade to Pro" target="_blank"><i class="fa fa-rocket"></i> <span>UPGRADE TO PRO</span></a>
						</li> -->
            </ul>
        </div>
    </div>
</nav>
