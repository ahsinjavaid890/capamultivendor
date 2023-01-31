@extends('website.layouts.master')
@section('content')
<div class="offcanvas-overlay"></div>

<div class="shop-category-area mt-30px">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 order-lg-last col-md-12 order-md-first">
                    <!-- Shop Top Area Start -->
                    <div class="shop-top-bar d-flex">
                        <!-- Left Side start -->
                        <div class="shop-tab d-flex">
                            <p>35647 Results Shown</p>
                        </div>
                        <!-- Left Side End -->
                        <!-- Center Side Start -->
                        <div class="select-shoing-wrap d-flex">
                            <div class="shot-product">
                                <p>Sort By:</p>
                            </div>
                            <div class="shop-select">
                                <select>
                                    <option value="">Recommended</option>
                                    <option value="">Sort by newness</option>
                                    <option value="">A to Z</option>
                                    <option value=""> Z to A</option>
                                    <option value="">In stock</option>
                                </select>
                            </div>
                        </div>
                        <!-- Center Side End -->
                         <!-- Right Side Start -->
                        <div class="select-shoing-wrap d-flex">
                            <div class="shot-product">
                                <p>Display:</p>
                            </div>
                            <div class="shop-select">
                                <select>
                                    <option value="">50 per Page</option>
                                    <option value="">100 per Page</option>
                                    <option value="">150 per Page</option>
                                    <option value="">200 per Page</option>
                                    <option value="">250 per Page</option>
                                </select>
                            </div>
                        </div>
                        <!-- Right Side End -->
                    </div>
                    <!-- Shop Top Area End -->

                    <!-- Shop Bottom Area Start -->
                    <div class="shop-bottom-area mt-35">
                      
                       <!-- <div class="shop-banner>">
                            <img src="{{asset('public/website/assets/images/banner-image/shop-banner.png')}}" alt=" " class="w-100 mb-4">
                        </div> -->
                        <!-- <div class="shop-categories">
                            <div class="row">
                                <div class="col-2">
                                    <a href="#" class="product-link">
                                        <div class="cat-image">
                                            <img src="{{asset('public/website/assets/images/product-image/chair.png')}}">
                                        </div>
                                        <div class="cat-title text-center">Chairs</div>
                                    </a>
                                </div>
                                <div class="col-2">
                                    <a href="#" class="product-link">
                                       <div class="cat-image">
                                            <img src="{{asset('public/website/assets/images/product-image/ce.png')}}">
                                        </div>
                                        <div class="cat-title text-center">Lights</div>
                                    </a>
                                </div>
                                <div class="col-2">
                                    <a href="#" class="product-link">
                                      <div class="cat-image">
                                            <img src="{{asset('public/website/assets/images/product-image/faa.png')}}">
                                        </div>
                                        <div class="cat-title text-center">Fans</div>
                                    </a>   
                                </div>
                                <div class="col-2">
                                    <a href="#" class="product-link">
                                       <div class="cat-image">
                                            <img src="{{asset('public/website/assets/images/product-image/lights2.png')}}">
                                        </div>
                                        <div class="cat-title text-center">Lights</div>
                                    </a>
                                </div>
                                <div class="col-2">
                                     <a href="#" class="product-link">
                                      <div class="cat-image">
                                            <img src="{{asset('public/website/assets/images/product-image/gg.png')}}">
                                        </div>
                                        <div class="cat-title text-center">Generators</div>
                                    </a>
                                    </div>
                                <div class="col-2">
                                    <a href="#" class="product-link">
                                        <div class="cat-image">
                                            <img src="{{asset('public/website/assets/images/product-image/tent.png')}}">
                                        </div>
                                        <div class="cat-title text-center">Tents</div>
                                    </a>
                                </div>
                            </div>
                        </div>     -->
                      
                          <!-- Seller Start -->
                        <!-- <div id="brands-logo" class="brands-logo pt-60px pb-30px">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="section-title">
                                            <h2 class="section-heading">Shop By Brands</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12">
                                    <ul>
                                        <li><img src="assets/images/brand-logo/logo-1.png"></li>
                                        <li><img src="assets/images/brand-logo/logo-2.png"></li>
                                        <li><img src="assets/images/brand-logo/logo-3.png"></li>
                                        <li><img src="assets/images/brand-logo/logo-4.png"></li>
                                        <li><img src="assets/images/brand-logo/logo-5.png"></li>
                                        <li><img src="assets/images/brand-logo/logo-6.png"></li>
                                        <li><img src="assets/images/brand-logo/logo-7.png"></li>
                                        <li><img src="assets/images/brand-logo/logo-8.png"></li>
                                        <li><img src="assets/images/brand-logo/logo-9.png"></li>
                                        <li><img src="assets/images/brand-logo/logo-10.png"></li>
                                        <li><img src="assets/images/brand-logo/logo-1.png"></li>
                                        <li><img src="assets/images/brand-logo/logo-12.png"></li>
                                        <li><img src="assets/images/brand-logo/logo-13.png"></li>
                                        <li><img src="assets/images/brand-logo/logo-14.png"></li>
                                        
                                    </ul>
                                </div>
                            </div>
                        </div> -->
                        <!-- New Arrivals Area Start -->
                        <div id="new-arrivals" class="deal-area pt-60px pb-30px">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="section-title">
                                            <h2 class="section-heading">Explore All Products</h2>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                <div class="col-xs-12 col-sm-12">
                                    @if(count($products)!=0)
                                    <div class="arrival-products d-flex">
                                        @foreach($products as $product)
                                            <!-- Single Item -->
                                            <div class="pro-content">
                                                <article class="list-product">
                                                    <div class="img-block">
                                                        <a href="{{route('website.productDetails',[encrypt($product->id)])}}" class="thumbnail">
                                                            <img class="first-img" src="{{asset('products/'.$product->featured_img)}}" alt="" />
                                                        </a>
                                                        <div class="quick-view">
                                                            <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                                <i class="icon-magnifier icons"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <ul class="product-flag"><li class="new">-5%</li></ul>
                                                    <span class="wishlist"><img src="{{asset('public/website/assets/images/icons/like.svg')}}"/></span>
                                                    <div class="product-decs text-center">
                                                        <a class="inner-link" href="{{route('website.productDetails',[encrypt($product->id)])}}"><span>{{$product->product_title}}</span></a>
                                                        <div class="pricing-meta">
                                                            <ul>
                                                                <li class="old-price cut"><del>{{$product->prod_price}} AED</del></li>
                                                                <li class="new-price not-cut">{{$product->sale_price}} AED</li>
                                                            </ul>
                                                        </div>
                                                        <div class="rating-product">
                                                            <i class="ion-android-star"></i>
                                                            <i class="ion-android-star"></i>
                                                            <i class="ion-android-star"></i>
                                                            <i class="ion-android-star"></i>
                                                            <i class="ion-android-star"></i>
                                                            <span class="rating-point">(4.5)</span>
                                                            <span class="pro-availbility">183 Products</span>
                                                        </div>
                                                        @if(Auth::guard('cust')->check())
                                                        <div class="add-cart-btn">
                                                        <a href="javascript:void(0)" class="add-to-cart btn" onclick="addTocart({{Auth::guard('cust')->user()->id}},{{$product->id}},1)">Add to cart</a>
                                                    </div>
                                                    @else
                                                    <div class="add-cart-btn">
                                                    <a href="{{route('website.login')}}" class="add-to-cart btn">Add to cart</a>
                                                </div>
                                                @endif
                                                    </div>

                                                </article>
                                            </div>
                                            @endforeach
                                          
                                           
                                           
                                    </div>
                                    <div class="view-more text-center">
                                        <a href="#" class="btn">View More</a>
                                    </div>
                                    @else

                                    <div class="col-md-12">
                                                        <p style="padding-top: 60px;border: 1px solid #009fbd; text-align: center; padding-bottom: 60px; background: #009fbd;color: #fff;">No products are found !!</p>
                                                    </div>
                                                    @endif
                                 </div>
                            </div>
                             </div>
                        </div>
                        <!-- New Arrivals Area End -->
                    </div>
                    <!-- Shop Bottom Area End -->
                </div>
                <!-- Sidebar Area Start -->
                <div class="col-lg-3 order-lg-first col-md-12 order-md-last mb-md-60px mb-lm-60px">
                    <div class="shop-sidebar-wrap">
                            <div class="sidebar-widget-group padding-30px mb-30px">
                                    
                                    <div class="accordion" id="accordionExample">
                                        <div class="card">
                                            <div class="card-header" id="headingOne">
                                                <a href="#" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" class="collapsed"><h4 class="pro-sidebar-title">Brand</h4></a>
                                            </div>

                                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample" style="">
                                                <div class="card-body">
                                                    <!-- Sidebar single item -->
                                                    <div class="sidebar-widget mt-30">
                                                        <div class="search"> <i class="fa fa-search"></i> <input type="text" class="form-control" placeholder=""> </div>
                                                        <div class="sidebar-widget-list">
                                                            <ul>
                                                                <li>
                                                                    <div class="sidebar-widget-list-left">
                                                                        <input type="checkbox"> <a href="#">Mango<span>(2345)</span> </a>
                                                                        <span class="checkmark"></span>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="sidebar-widget-list-left">
                                                                        <input type="checkbox" value=""> <a href="#">Casio<span>(2345)</span></a>
                                                                        <span class="checkmark"></span>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="sidebar-widget-list-left">
                                                                        <input type="checkbox"> <a href="#">Generic<span>(233)</span> </a>
                                                                        <span class="checkmark"></span>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="sidebar-widget-list-left">
                                                                        <input type="checkbox" value=""> <a href="#">Zoot<span>(124)</span></a>
                                                                        <span class="checkmark"></span>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="sidebar-widget-list-left">
                                                                        <input type="checkbox"> <a href="#">Convex<span>(445)</span> </a>
                                                                        <span class="checkmark"></span>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="sidebar-widget-list-left">
                                                                        <input type="checkbox" value=""> <a href="#">Zenta<span>(124)</span></a>
                                                                        <span class="checkmark"></span>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="sidebar-widget-list-left">
                                                                        <input type="checkbox"> <a href="#">Nexus<span>(524)</span> </a>
                                                                        <span class="checkmark"></span>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="sidebar-widget-list-left">
                                                                        <input type="checkbox" value=""> <a href="#">Cisco<span>(432)</span></a>
                                                                        <span class="checkmark"></span>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <a href="#">View All</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!-- card -->
                                        <div class="card">
                                            <div class="card-header" id="headingTwo">
                                                <a href="#" class="collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo"><h4 class="pro-sidebar-title">Price (AED)</h4></a>
                                            </div>
                                            <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionExample" style="">
                                                <div class="card-body">
                                                    <div class="price-filters">
                                                        <label><input type="text" value=""></label>
                                                            <span>To</span>
                                                        <label><input type="text" value=""></label>
                                                        <button>GO</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!-- card -->
                                        <div class="card">
                                            <div class="card-header" id="headingThree">
                                                <a href="#" class="collapsed" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree"><h4 class="pro-sidebar-title">Product Rating</h4></a>
                                               
                                            </div>
                                            <div id="collapseThree" class="collapse show" aria-labelledby="headingThree" data-parent="#accordionExample">
                                                <div class="card-body">
                                               
                                                    <div class="rating-filter mt-10">    
                                                        <a href="#">1.0 Stars or More<span>(5334)</span></a>
                                                        <input type="range" class="form-range" min="0" max="5" step="0.5" id="ratingRange3">
                                                        <div class="review-rating">
                                                            <span class="min-rating">1 Star</span>
                                                            <span class="max-rating">5 Stars</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!-- card -->
                                        <div class="card">
                                            <div class="card-header" id="headingFour">
                                                <a href="#" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="true" aria-controls="headingFour" class="collapsed"><h4 class="pro-sidebar-title">Seller</h4></a>
                                            </div>

                                            <div id="collapseFour" class="collapse show" aria-labelledby="headingFour" data-parent="#accordionExample" style="">
                                                <div class="card-body">
                                                    <!-- Sidebar single item -->
                                                    <div class="sidebar-widget mt-30">
                                                        <div class="search"> <i class="fa fa-search"></i> <input type="text" class="form-control" placeholder=""> </div>
                                                        <div class="sidebar-widget-list">
                                                            <ul>
                                                                <li>
                                                                    <div class="sidebar-widget-list-left">
                                                                        <input type="checkbox"> <a href="#">Mango<span>(2345)</span> </a>
                                                                        <span class="checkmark"></span>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="sidebar-widget-list-left">
                                                                        <input type="checkbox" value=""> <a href="#">Casio<span>(2345)</span></a>
                                                                        <span class="checkmark"></span>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="sidebar-widget-list-left">
                                                                        <input type="checkbox"> <a href="#">Generic<span>(233)</span> </a>
                                                                        <span class="checkmark"></span>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="sidebar-widget-list-left">
                                                                        <input type="checkbox" value=""> <a href="#">Zoot<span>(124)</span></a>
                                                                        <span class="checkmark"></span>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="sidebar-widget-list-left">
                                                                        <input type="checkbox"> <a href="#">Convex<span>(445)</span> </a>
                                                                        <span class="checkmark"></span>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="sidebar-widget-list-left">
                                                                        <input type="checkbox" value=""> <a href="#">Zenta<span>(124)</span></a>
                                                                        <span class="checkmark"></span>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="sidebar-widget-list-left">
                                                                        <input type="checkbox"> <a href="#">Nexus<span>(524)</span> </a>
                                                                        <span class="checkmark"></span>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="sidebar-widget-list-left">
                                                                        <input type="checkbox" value=""> <a href="#">Cisco<span>(432)</span></a>
                                                                        <span class="checkmark"></span>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <a href="#">View All</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!-- card -->
                                        <div class="card">
                                            <div class="card-header" id="headingFive">
                                                <a href="#" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="true" aria-controls="headingFive" class="collapsed"><h4 class="pro-sidebar-title">New Arrivals</h4></a>
                                            </div>

                                            <div id="collapseFive" class="collapse show" aria-labelledby="headingFive" data-parent="#accordionExample" style="">
                                                <div class="card-body">
                                                    <!-- Sidebar single item -->
                                                    <div class="sidebar-widget mt-30">
                                                       
                                                        <div class="sidebar-widget-list">
                                                            <ul>
                                                                <li>
                                                                    <div class="sidebar-widget-list-left">
                                                                        <input type="checkbox"> <a href="#">Last 24 Hours<span>(2345)</span> </a>
                                                                        <span class="checkmark"></span>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="sidebar-widget-list-left">
                                                                        <input type="checkbox" value=""> <a href="#">Last 3 Days<span>(2345)</span></a>
                                                                        <span class="checkmark"></span>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="sidebar-widget-list-left">
                                                                        <input type="checkbox"> <a href="#">Last 7 Days<span>(233)</span> </a>
                                                                        <span class="checkmark"></span>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="sidebar-widget-list-left">
                                                                        <input type="checkbox" value=""> <a href="#">Last 30 Days<span>(124)</span></a>
                                                                        <span class="checkmark"></span>
                                                                    </div>
                                                                </li>
                                                               
                                                            </ul>
                                                        </div>
                                                        <a href="#">View All</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!-- card -->
                                        
                                        <div class="card">
                                            <div class="card-header" id="headingSix">
                                                <a href="#" class="collapsed" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix"><h4 class="pro-sidebar-title">Color</h4></a>
                                            </div>
                                            <div id="collapseSix" class="collapse show" aria-labelledby="headingSix" data-parent="#accordionExample">
                                                <div class="card-body">
                                                   <div class="sidebar-widget mt-30">
                                                    <div class="sidebar-widget-list">
                                                        <ul>
                                                            <li>
                                                                <div class="sidebar-widget-list-left">
                                                                    <input type="checkbox"> <a href="#">Red<span>(2)</span> </a>
                                                                    <span class="checkmark red"></span>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="sidebar-widget-list-left">
                                                                    <input type="checkbox" value=""> <a href="#">Green<span>(4)</span></a>
                                                                    <span class="checkmark green"></span>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="sidebar-widget-list-left">
                                                                    <input type="checkbox" value=""> <a href="#">Black<span>(4)</span> </a>
                                                                    <span class="checkmark black"></span>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="sidebar-widget-list-left">
                                                                    <input type="checkbox" value=""> <a href="#">Blue<span>(4)</span> </a>
                                                                    <span class="checkmark blue"></span>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                        <a href="#">View All</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!-- card -->
                                        <div class="card">
                                            <div class="card-header" id="headingOne">
                                                <a href="#" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="true" aria-controls="collapseSeven" class="collapsed"><h4 class="pro-sidebar-title">Categories</h4></a>
                                            </div>

                                            <div id="collapseSeven" class="collapse show" aria-labelledby="headingSeven" data-parent="#accordionExample" style="">
                                                <div class="card-body">
                                                    <!-- Sidebar single item -->
                                                    <div class="sidebar-widget mt-30">
                                                        <div class="search"> <i class="fa fa-search"></i> <input type="text" class="form-control" placeholder=""> </div>
                                                        <div class="sidebar-widget-list">
                                                            <ul>
                                                                <li>
                                                                    <div class="sidebar-widget-list-left">
                                                                        <input type="checkbox"> <a href="#">Furniture<span>(2345)</span> </a>
                                                                        <span class="checkmark"></span>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="sidebar-widget-list-left">
                                                                        <input type="checkbox" value=""> <a href="#">Electronics<span>(2345)</span></a>
                                                                        <span class="checkmark"></span>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="sidebar-widget-list-left">
                                                                        <input type="checkbox"> <a href="#">Decorative Items<span>(233)</span> </a>
                                                                        <span class="checkmark"></span>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="sidebar-widget-list-left">
                                                                        <input type="checkbox" value=""> <a href="#">Floral Items<span>(124)</span></a>
                                                                        <span class="checkmark"></span>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="sidebar-widget-list-left">
                                                                        <input type="checkbox"> <a href="#">Lighting<span>(445)</span> </a>
                                                                        <span class="checkmark"></span>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="sidebar-widget-list-left">
                                                                        <input type="checkbox" value=""> <a href="#">Tents<span>(124)</span></a>
                                                                        <span class="checkmark"></span>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="sidebar-widget-list-left">
                                                                        <input type="checkbox"> <a href="#">Hotels & Marquees<span>(524)</span> </a>
                                                                        <span class="checkmark"></span>
                                                                    </div>
                                                                </li>
                                                               
                                                            </ul>
                                                        </div>
                                                        <a href="#">View All</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!-- card -->
                                    </div>
                                </div>
                         
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
@stop