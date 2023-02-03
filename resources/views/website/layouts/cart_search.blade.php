
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
            <div class="offcanvas-menu-search-form">
                <form action="#">
                    <input type="text" placeholder="Search...">
                    <button><i class="icon-magnifier"></i></button>
                </form>
            </div>
            <div class="offcanvas-menu">
                <ul>
                    <li class="active"><a href="javascript:void(0)">Home</a></li>
                    <li><a href="javascript:void(0)">Buy</a></li>
                    <li><a href="javascript:void(0)">Rent</a></li>
                    <li><a href="javascript:void(0)">Design Your Own Product</a></li>
                    <li><a href="javascript:void(0)">Vendor</a></li>
                    <li><a href="javascript:void(0)">Deals</a></li>
                    <li><a href="javascript:void(0)">Blogs</a></li>
                </ul>
            </div>
            <div class="offcanvas-buttons mt-30px">
                <div class="header-tools d-flex">
                    <div class="cart-info d-flex align-self-center">
                        <a href="my-account.html" class="user"><i class="icon-user"></i></a>
                        <a href="wishlist.html" data-number="3"><i class="icon-heart"></i></a>
                        <a href="cart.html" data-number="3"><i class="icon-bag"></i></a>
                    </div>
                </div>
            </div>
            <div class="offcanvas-social mt-30px">
                <ul>
                    <li>
                        <a href="#"><i class="icon-social-facebook"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="icon-social-twitter"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="icon-social-instagram"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="icon-social-google"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="icon-social-instagram"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- OffCanvas Search End -->
    @if(Auth::guard('cust')->check())
<input type="hidden" id="cust_id" value="{{Auth::guard('cust')->user()->id}}"/>
@else
<input type="hidden" id="cust_id" value=""/>
@endif