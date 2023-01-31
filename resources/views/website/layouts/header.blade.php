<header class="header-wrapper">
    <div class="header-nav">
        <div class="container">
            <div class="header-nav-wrapper d-md-flex d-sm-flex d-xl-flex d-lg-flex justify-content-between">
                <div class="header-static-nav">
                </div>
                <div class="header-menu-nav">
                    <ul class="menu-nav">
                        @if(Auth::guard('cust')->check())
                        <li><a href="{{route('website.wishlist')}}">Wishlist</a></li>
                        <li><a href="{{route('website.customerDashboard')}}">My Account</a></li>
                        @endif
                        <li><a href="{{route('seller.register')}}">Become A Vendor</a></li>
                        <li><a href="{{route('website.trackorder')}}">Track Your Order</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="header-top sticky-nav header-menu bg-white ptb-20px d-xl-block d-none">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2">
                    <div class="logo">
                        <a href="{{route('website.index')}}"><img class="img-responsive"
                                src="{{asset('public/website/assets/images/mainlogo.png')}}" alt="logo.jpg" /></a>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="search-element media-body">
                        <form class="d-flex" action="{{route('website.searchFRM')}}" method="GET">
                            <input type="text" placeholder="Enter your search key ... " id="searchItem"
                                name="searchq" data-url="{{ route('website.search') }}" />
                            <a href="javascript:void(0)" id="searchbtn"> <button><i
                                        class="icon-magnifier"></i></button></a>
                        </form>
                        <div id="search-dropdown" class="search-dropdown position-absolute w-100 bg-white mt-1 rounded-3 border d-none">
                            <div class="d-flex flex-wrap gap-2 p-1" id="categories-container">
                                {{-- <a href="#" class="badge bg-light text-dark text-decoration-none fw-light">Light</a> --}}
                            </div>
                            <div class="d-flex flex-column" id="search-container">
                                {{-- <div class="border d-flex align-items-center gap-2 p-2">
                                    <div>
                                        <a href="#">
                                            <img src="http://toysforjoy.local/website/img/logo-t4j.png" alt="img-thumbnail rounded" width="70">
                                        </a>
                                    </div>
                                    <div class="flex-fill">
                                        <p class="mb-0 lead">
                                            <a href="#" class="text-decoration-none text-reset">
                                                Hello Kitty Drift Nissan Skyline GTR
                                            </a>
                                        </p>
                                        <small class="fst-italic"><a href="#" class="text-decoration-none text-reset">Outdoor</a> > <a href="#" class="text-decoration-none text-reset">Pools and Simms</a></small>
                                        <p class="mb-0 fw-bold">QAR 529</p>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 align-self-center">
                    <div class="header-right-element d-flex">
                        <div class="header-horizontal-menu">
                            <ul class="menu-content">
                                <li class=""><a href="{{route('website.index')}}">Home</a></li>
                                <li><a href="{{route('website.categoriesPage')}}">Buy</a></li>
                                <li><a href="{{route('website.playevent')}}">Plan event</a></li>
                                <li><a href="{{route('website.vendors')}}">Vendor</a></li>
                            </ul>
                        </div>
                        <!-- header horizontal menu -->
                        @if(Auth::guard('cust')->check())
                        <div class="reg-sign-btn">
                            <div class="register"><img
                                    src="{{asset('public/website/assets/images/icons/select-arrow.svg')}}" /><span><a
                                        href="{{route('website.logout')}}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();"
                                        role="button">Logout</a></span>

                            </div>
                        </div>
                        <form id="logout-form" action="{{ route('website.logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        @else
                        <div class="reg-sign-btn">
                            <div class="register" id="hedrSgnup"><img
                                    src="{{asset('public/website/assets/images/icons/select-arrow.svg')}}" /><span><a
                                        href="{{route('website.register')}}">Register</a> | <a
                                        href="{{route('website.login')}}">Sign in</a></span>

                            </div>
                        </div>
                        @endif
                        <!--Cart info Start -->
                        <div class="header-tools d-flex">
                            <div class="cart-info d-flex align-self-center">
                                <a onclick="showcart()" href="#offcanvas-cart" class="bag offcanvas-toggle cartnumber"
                                    data-number="{{ count((array) session('cart')) }}" id="headercarticon"><img
                                        src="{{asset('public/website/assets/images/icons/cart.svg')}}" /></a>
                            </div>
                        </div>
                    </div>
                    <!--Cart info End -->
                </div>
            </div>
        </div>
    </div>
</header>
