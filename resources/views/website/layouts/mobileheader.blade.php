      <!-- Mobile Header Section Start -->
      <div class="mobile-header d-xl-none sticky-nav bg-white ptb-10px">
        <div class="container">
            <div class="row align-items-center">

                <!-- Header Logo Start -->
                <div class="col">
                    <div class="header-logo">
                        <a href="index.html"><img class="img-responsive" src="{{asset('public/website/assets/images/logo.png')}}" alt="logo.jpg" /></a>
                    </div>
                </div>
                <!-- Header Logo End -->

                <!-- Header Tools Start -->
                <div class="col-auto">
                    <div class="header-tools justify-content-end">
                        <div class="cart-info d-flex align-self-center">
                            <a href="compare.html" class="shuffle d-xs-none"  data-number="3"><i class="icon-shuffle"></i></a>
                            <a href="#offcanvas-wishlist" class="heart offcanvas-toggle d-xs-none"  data-number="3"><i class="icon-heart"></i></a>
                            <a href="#offcanvas-cart" class="bag offcanvas-toggle"data-number="{{ count((array) session('cart')) }}"><i class="icon-bag"></i><span></span></a>
                        </div>
                        <div class="mobile-menu-toggle">
                            <a href="#offcanvas-mobile-menu" class="offcanvas-toggle">
                                <svg viewBox="0 0 800 600">
                                    <path d="M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200" id="top"></path>
                                    <path d="M300,320 L540,320" id="middle"></path>
                                    <path d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190" id="bottom" transform="translate(480, 320) scale(1, -1) translate(-480, -318) "></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Header Tools End -->

            </div>
        </div>
    </div>


    <div class="mobile-category-nav d-xl-none mb-15px">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="hero-side-category">
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

                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Header Section End -->