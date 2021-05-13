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
                                @foreach($menus as $menu)
                                    <li @if(request()->routeIs($menu->route)) active @endif>
                                        <a href="{{route($menu->route)}}">{{$menu->name}}</a>
                                    </li>
                                @endforeach

                            </ul>
                        </nav>
                    </div>
                    <!-- Header Right -->
                    <div class="header-right">
                        <ul>
                            @if(\Illuminate\Support\Facades\Session::has("user"))
                                <p>Welcome {{\Illuminate\Support\Facades\Session::get("user")[0]->name}}</p>
                                <li><a href="{{route("cart")}}"><span class="flaticon-shopping-cart"></span></a> </li>
                                <li><a href="{{route("logout")}}" id="logout"><span>Logout</span></a> </li>
                                @if(\Illuminate\Support\Facades\Session::get("user")[0]->role_id ==1)
                                    <li><a href="{{route("admin")}}" id="admin"><span>Admin</span></a> </li>
                                @endif
                            @else
                                <li> <a href="{{route("login")}}"><span class="flaticon-user"></span></a></li>
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
