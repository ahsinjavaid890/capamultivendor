
    <!-- OffCanvas Cart Start -->
    <div id="offcanvas-cart" class="offcanvas offcanvas-cart">
        <div  class="inner">
            <div class="head">
                <span class="title">Cart</span>
                <button class="offcanvas-close"><i class="fa fa-times"></i></button>
            </div>

            <div id="showcartproducts"></div>
        </div>
    </div>
    <!-- OffCanvas Cart End -->

    <!-- OffCanvas Search Start -->
    <div id="offcanvas-mobile-menu" class="offcanvas offcanvas-mobile-menu">
        <div class="inner customScroll">
            <div class="head">
                <span class="title">&nbsp;</span>
                <button class="offcanvas-close">×</button>
            </div>
            <div class="offcanvas-menu">
                <ul>
                    <li class=""><a href="{{route('website.index')}}">Home</a></li>
                    <li><a href="{{route('website.categoriesPage')}}">Our Categories</a></li>
                    <li><a href="#">Blogs</a></li>
                    <li><a href="{{route('website.vendors')}}">Vendor</a></li>
                    <li><a href="{{route('website.contact')}}">Contact Us</a></li>
                </ul>
            </div>
            <div class="offcanvas-buttons mt-30px">
                <div class="header-tools d-flex">
                    <div class="cart-info d-flex align-self-center">
                        @if(Auth::guard('cust')->check())
                        <a href="{{route('website.customerDashboard')}}" class="user"><i class="icon-user"></i></a>
                        <a href="{{route('website.wishlist')}}" data-number="3"><i class="icon-heart"></i></a>
                        @endif
                        <a href="{{route('website.register')}}" class="user"><i class="icon-user"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- OffCanvas Search End -->
    @if(Auth::guard('cust')->check())
<input type="hidden" id="cust_id" value="{{Auth::guard('cust')->user()->id}}"/>
@else
<input type="hidden" id="cust_id" value=""/>
@endif