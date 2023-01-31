<header class="header-wrapper">
    <div class="header-nav">
        <div class="container">
            <div class="header-nav-wrapper d-md-flex d-sm-flex d-xl-flex d-lg-flex justify-content-between">
                <div class="header-static-nav">
                </div>
                <div class="header-menu-nav">
                    <ul class="menu-nav">
                        <li>
                            <div class="dropdown">
                                <button type="button" id="dropdownMenuButton" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false"><img
                                        src="{{asset('website/assets/images/flag/dubai.svg')}}" alt="" />Currency :
                                    AED<i class="ion-ios-arrow-down"></i></button>

                                <ul class="dropdown-menu animation slideDownIn" aria-labelledby="dropdownMenuButton-2">
                                    <li><a href="#">EUR</a></li>
                                    <li><a href="#">USD</a></li>
                                </ul>
                            </div>
                        </li>
                        @if(Auth::guard('cust')->check())
                        <li><a href="{{route('website.wishlist')}}"><img
                                    src="{{ asset('website/assets/images/icons/heart.svg')}}" alt=""> Wishlist</a></li>
                        <li>
                            <div class="dropdown">
                                <button type="button" id="dropdownMenuButton-2" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false"><img
                                        src="{{asset('website/assets/images/icons/user.svg')}}" alt="" />My Account<i
                                        class="ion-ios-arrow-down"></i></button>

                                <ul class="dropdown-menu animation slideDownIn" aria-labelledby="dropdownMenuButton">
                                    <li><a href="{{route('website.customerDashboard')}}">Dashboard</a></li>
                                    <li><a href="{{route('website.cust_designReq')}}">my request</a></li>
                                </ul>
                            </div>
                        </li>
                        @endif
                        <li><a href="{{route('seller.register')}}"><img
                                    src="{{asset('website/assets/images/icons/shop.svg')}}" alt="" /> Become A
                                Vendor</a></li>
                        <li><a href="{{route('website.trackorder')}}"><img
                                    src="{{asset('website/assets/images/icons/order.svg')}}" alt="" /> Track Your
                                Order</a></li>

                        <!--                            <li class="pr-0 language">
                            <div class="dropdown">
                                <button type="button" id="dropdownMenuButton-3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="assets/images/flag/1.jpg" alt="" /> English <i class="ion-ios-arrow-down"></i>
                                </button>

                                <ul class="dropdown-menu animation slideDownIn" aria-labelledby="dropdownMenuButton-3">
                                    <li>
                                        <a href="#"><img src="assets/images/flag/1.jpg" alt="" /> English</a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="assets/images/flag/2.jpg" alt="" /> Français</a>
                                    </li>
                                </ul>
                            </div>
                        </li>-->
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Header Nav End -->
    <div class="header-top sticky-nav header-menu bg-white ptb-20px d-xl-block d-none">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <div class="logo">
                        <a href="{{route('website.index')}}"><img class="img-responsive"
                                src="{{asset('website/assets/images/logo1.svg')}}" alt="logo.jpg" /></a>
                    </div>
                </div>
                <div class="col-md-10 align-self-center">
                    <div class="header-right-element d-flex">
                        <div class="header-horizontal-menu">
                            <ul class="menu-content">
                                <li class=""><a href="{{route('website.index')}}">Home</a></li>
                                <li><a href="{{route('website.categoriesPage')}}">Buy</a></li>
                                <li><a href="{{route('website.playevent')}}">Plan event</a></li>
                                <li><a href="{{route('website.designProducts')}}">Request your product/service</a>

                                </li>
                                <li><a href="{{route('website.vendors')}}">Vendor</a></li>
                                <!-- <li><a href="{{route('website.servicePage')}}">Services</a></li>                                    -->
                                <!-- <li><a href="javascript:void(0)">Login as Vendor</a></li> -->
                            </ul>
                        </div>
                        <!-- header horizontal menu -->
                        @if(Auth::guard('cust')->check())
                        <div class="reg-sign-btn">
                            <div class="register"><img
                                    src="{{asset('website/assets/images/icons/select-arrow.svg')}}" /><span><a
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
                                    src="{{asset('website/assets/images/icons/select-arrow.svg')}}" /><span><a
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
                                        src="{{asset('website/assets/images/icons/cart.svg')}}" /></a>
                            </div>
                        </div>
                    </div>
                    <!--Cart info End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Header Nav End -->
    <div class="d-xl-block d-none padding-0px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 custom-col-2">

                    <div class="search-element media-body">
                        <form class="d-flex" action="{{route('website.searchFRM')}}" method="GET">
                            <div class="search-category">
                                @foreach(DB::table('categories')->where('status' , 2)->get() as $getcat)
                                <select class="form-select allcategories">
                                    <option value="0">All categories</option>
                                    <!-- <option value="">{{$getcat->category_name}}</option> -->

                                </select>
                                @endforeach
                            </div>
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
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </div>
    <!-- header menu -->
</header>
<!-- Header Section End Here -->