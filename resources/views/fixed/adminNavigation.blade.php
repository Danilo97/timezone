
<header>
    <!-- Header Start -->
    <div class="header-area">
        <div class="main-header header-sticky">
            <div class="container-fluid">
                <div class="menu-wrapper">
                    <!-- Logo -->
                    <div class="logo">
                        <a href="{{route("home")}}"><img src="{{asset("assets/img/logo/logo.png")}}" alt=""></a>
                    </div>
                    <!-- Main-menu -->
                    <div class="main-menu d-none d-lg-block">
                        <nav>
                            <ul id="navigation">
                                <li><a href="{{route("home")}}"><span>Go back to the website</span></a></li>

                            </ul>
                        </nav>
                    </div>
                    <!-- Header Right -->
                    <div class="header-right">
                        <ul>
                            @if(\Illuminate\Support\Facades\Session::has("user"))
                                <p>Welcome {{\Illuminate\Support\Facades\Session::get("user")[0]->name}}</p>
                                @if(\Illuminate\Support\Facades\Session::get("user")[0]->role_id ==1)
                                    <li><a href="{{route("admin")}}" id="admin"><span>Admin</span></a> </li>
                                @endif
                                <li><a href="{{route("logout")}}" id="logout"><span>Logout</span></a> </li>

                            @endif

                        </ul>
                    </div>
                </div>
                <!-- Mobile Menu -->
                <div class="col-12">
                    <div class="mobile_menu d-block d-lg-none"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>
