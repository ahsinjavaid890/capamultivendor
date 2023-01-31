@extends('website.layouts.master')

@section('content')

    <div class="offcanvas-overlay"></div>

        <!-- Slider Start -->
        <div class="slider-area slider-height-1">
            <div class="hero-slider swiper-container">
                <div class="swiper-wrapper">
                    <!-- Single Slider  -->
                    @foreach($banners->where('type' , 'homepagemain') as $banner)
                    <img class="swiper-slide bg-img d-flex" src="{{asset('public/uploads/'.$banner->banner)}}">
                    @endforeach
                    <!-- <img class="swiper-slide bg-img d-flex" src="{{asset('public/website/assets/images/slider-image/sample-2.jpg')}}">
                    <img class="swiper-slide bg-img d-flex" src="{{asset('public/website/assets/images/slider-image/sample-2.jpg')}}"> -->
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination swiper-pagination-white"></div>
            </div>
            <div id="banner-tabs">
                     <div class="container">
                        <div class="row">
                    
                          <div class="banner-tab-block order-md-first">
                            <!-- Shop Top Area Start -->
                            <div class="banner-tab-top-bar">
                                <!-- Left Side start -->
                                <div class="banner-tab nav">
                                    <a href="#tab-1" data-bs-toggle="tab" class="active">
                                        <img src="{{asset('public/website/assets/images/icons/b-tab-icon-1.png')}}">
                                        <p class="text-center">Buy</p>
                                    </a>
                                    <a class="" href="#tab-2" data-bs-toggle="tab">
                                        <img src="{{asset('public/website/assets/images/icons/b-tab-icon-2.png')}}">
                                        <p class="text-center">Sell</p>
                                    </a>
                                    <a class="" href="#tab-3" data-bs-toggle="tab">
                                        <img src="{{asset('public/website/assets/images/icons/b-tab-icon-3.png')}}">
                                        <p class="text-center">Rent</p>
                                    </a>
                                    <a class="" href="#tab-4" data-bs-toggle="tab">
                                        <img src="{{asset('public/website/assets/images/icons/b-tab-icon-4.png')}}">
                                        <p class="text-center">Design Own Products</p>
                                    </a>
                                </div>
                            </div>
                            <!-- Banner Tabs Top Area End -->

                            <!-- Banner Tabs Bottom Area Start -->
                            <div class="tab-bottom-area mt-35">
                                <!-- Banner Tabs Content Start -->
                                <div class="tab-content jump">
                                    <!-- Tab One Start -->
                                    <div id="tab-1" class="tab-pane active">
                                        <div class="row responsive-md-class responsive-xl-class responsive-lg-class">
                                            <h2>Make your Events More Elegant with our Products!</h2>
                                            <hr>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                                            <a class="btn buy-now" href="#">Buy Now</a>
                                        </div>
                                    </div>
                                    <!-- Tab One End -->
                                    
                                    <!-- Tab Two Start -->
                                    <div id="tab-2" class="tab-pane">
                                        <div class="shop-list-wrap shop-list-page mb-30px scroll-zoom">
                                            <h2>Sell Products</h2>
                                            <hr>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                                            <a class="btn buy-now" href="#">Sell Now</a>
                                        </div>
                                    </div>
                                    <!-- Tab Two End -->
                                    
                                    <!-- Tab Three Start -->
                                    <div id="tab-3" class="tab-pane">
                                        <div class="shop-list-wrap shop-list-page mb-30px scroll-zoom">
                                            <h2>Rent Products</h2>
                                            <hr>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                                            <a class="btn buy-now" href="#">Rent Now</a>
                                        </div>
                                    </div>
                                    <!-- Tab Three End -->
                                    
                                    <!-- Tab Four Start -->
                                    <div id="tab-4" class="tab-pane">
                                        <div class="shop-list-wrap shop-list-page mb-30px scroll-zoom">
                                            <h2>Design own Products</h2>
                                            <hr>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                                            <a class="btn buy-now" href="#">Buy Now</a>
                                        </div>
                                    </div>
                                    <!-- Tab Four End -->
                                </div>
                                <!-- Banner Tabs Content End -->
                            </div>
                            <!-- Banner Tabs Bottom Area End -->
                        </div>
                        
                        
                        </div>
                    </div>
                    </div>
        </div>
        <!-- Slider End -->

        <!-- category Area Start -->
        <div class="popular-categories-area pt-md-5 pb-md-5" style="background-color: #f1f5ff;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title text-center">
                            <h2 class="section-heading">Categories</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach($getcatlist as $getcat)
                        <div class="col-md-2 mb-3">
                            <a href="{{ url('category') }}/{{ $getcat->url }}" class="category-list text-center">
                                <div class="card category-card">
                                    <div class="card-body text-center">
                                        <div class="category-img">
                                        @if($getcat->icon==null)
                                            <img src="{{asset('public/website/assets/images/icons/speakers.svg')}}" alt="{{$getcat->category_name}}" />
                                            @else
                                            <img src="{{asset('public/products/'.$getcat->icon)}}" alt="{{$getcat->category_name}}" />
                                        @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="category-discript"><span>{{$getcat->category_name}}</span></div>
                            </a>
                        </div>
                    @endforeach
                </div>           
            </div>
        </div>
        <!-- category Area End -->
        
        <!-- Top Vendor Area start -->
        <div class="top-vendors mt-60px mb-30px">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title">
                            <h2 class="section-heading">Top Vendors </h2>
                            <p>Amazing weekly featured item collection</p>
                            <a href="{{route('website.vendors')}}" class="view-all-btn">View All</a>
                        </div>
                    </div>
                </div>
                <div class="row products vendor-categories">
                        @foreach($vendors as $seller)
                        @if($seller->shop_url)
                        <div class="col-lg-4">
                            <div class="single-category">
                                <img src="https://img.freepik.com/free-photo/old-black-background-grunge-texture-dark-wallpaper-blackboard-chalkboard-room-wall_1258-28312.jpg" class="main">
                                <div class="img-content">
                                    <h1>{{$seller->shop_name}}</h1>

                                    <h4><img src="{{ asset('public/website/assets/images/icons/map-pin.png') }}" class="map-pin">{{$seller->shop_address}}</h4>
                                    <h4><img src="{{ asset('public/website/assets/images/icons/phone.png') }}" class="phone">{{$seller->shop_phone}}</h4>
                                </div>
                                <div class="cate-footer-area">
                                    <div class="visit-store"><a href="{{url('vendor')}}/{{ $seller->shop_url }}">Visit Store<i class="ion-ios-arrow-thin-right"></i></a></div>
                                    <div class="client-profile">
                                        @if($seller->shop_logo)
                                        <img src="{{asset('public/images/'.$seller->shop_logo)}}">
                                        @else
                                        <img src="https://www.adaptivewfs.com/wp-content/uploads/2020/07/logo-placeholder-image.png">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                </div>
            </div>
        </div>
        <!-- Top Vendor Area End -->
        <div id="new-arrivals" class="deal-area pt-60px pb-30px">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title">
                            <h2 class="section-heading">Deals Of The Day</h2>
                            <p>Amazing weekly featured item collection</p>
                            <a href="{{route('website.productpage')}}" class="view-all-btn">View All</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12">
                        <div class="arrival-products d-flex">
                            @foreach($Deals as $r)
                               @include('website.show.product')
                            @endforeach
                               
                        </div>
                     </div>
                </div>
             </div>
        </div>
        <div class="banner-area">
            <div class="container">
                <div class="row">
                    @foreach($banners->where('type' , 'homepagedeal') as $banner)
                    <div class="col-md-4 col-xs-12">
                        <div class="banner-wrapper">
                            <a href="{{ $banner->url }}"><img src="{{asset('uploads/'.$banner->banner)}}" alt="" /></a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div id="new-arrivals" class="deal-area pt-60px pb-30px">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title">
                            <h2 class="section-heading">Top Picks For You</h2>
                            <p>Amazing weekly featured item collection</p>
                            <a href="{{route('website.productpage')}}" class="view-all-btn">View All</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12">
                        <div class="arrival-products d-flex">
                            @foreach($topPics as $r)
                               @include('website.show.product')
                            @endforeach
                               
                        </div>
                     </div>
                </div>
             </div>
        </div>
        <div class="banner-area">
            <div class="container">
                <div class="row">
                    @foreach($banners->where('type' , 'homepagetop') as $banner)
                    <div class="col-md-4 col-xs-12">
                        <div class="banner-wrapper">
                            <a href="{{ $banner->url }}"><img src="{{asset('uploads/'.$banner->banner)}}" alt="" /></a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Banner Area End -->
        
        <!-- New Arrivals Area Start -->
        <div id="new-arrivals" class="deal-area pt-60px pb-30px">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title">
                            <h2 class="section-heading">New Arrivals</h2>
                            <p>Amazing weekly featured item collection</p>
                            <a href="{{route('website.productpage')}}" class="view-all-btn">View All</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12">
                        <div class="arrival-products d-flex">
                            @foreach($arrivals as $r)
                               @include('website.show.product')
                            @endforeach
                               
                        </div>
                     </div>
                </div>
             </div>
        </div>
        <!-- New Arrivals Area End -->
      
        <!-- Banner Area Start -->
        <!-- <div class="banner-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-xs-12">
                        <div class="banner-wrapper">
                            <a href="shop-4-column.html"><img src="{{asset('public/website/assets/images/banner-image/1.jpg')}}" alt="" /></a>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="banner-wrapper">
                            <a href="shop-4-column.html"><img src="{{asset('public/website/assets/images/banner-image/2.jpg')}}" alt="" /></a>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="banner-wrapper">
                            <a href="shop-4-column.html"><img src="{{asset('public/website/assets/images/banner-image/3.jpg')}}" alt="" /></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        -->
        
        <!-- Banner Area Start -->
        <div class="banner-area">
            <div class="container">
                <div class="row">
                    @foreach($banners->where('type' , 'homepagetop') as $banner)
                    <div class="col-md-6 col-xs-12">
                        <div class="banner-wrapper">
                            <a href="{{ $banner->url }}"><img src="{{asset('uploads/'.$banner->banner)}}" alt="" /></a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Banner Area End -->
        

        <!-- Products Rent Area Start -->
       
        <!-- Products Rent Area End -->
        
        
        
        
        
        
        
        
        
        
<!-- Static Area Start -->
        <div class="static-area mtb-60px">
            <div class="container">
                <div class="static-area-wrap">
                    <div class="row">
                        <!-- Static Single Item Start -->
                        <div class="col-lg-3 col-xs-12 col-md-6 col-sm-6 mb-md-30px mb-lm-30px">
                            <div class="single-static">
                                <img src="{{asset('public/website/assets/images/icons/static-icons-1.png')}}" alt="" class="img-responsive" />
                                <div class="single-static-meta">
                                    <h4>Free Shipping</h4>
                                </div>
                            </div>
                        </div>
                        <!-- Static Single Item End -->
                        <!-- Static Single Item Start -->
                        <div class="col-lg-3 col-xs-12 col-md-6 col-sm-6 mb-md-30px mb-lm-30px">
                            <div class="single-static">
                                <img src="{{asset('public/website/assets/images/icons/static-icons-2.png')}}" alt="" class="img-responsive" />
                                <div class="single-static-meta">
                                    <h4>Online Support</h4>
                                </div>
                            </div>
                        </div>
                        <!-- Static Single Item End -->
                        <!-- Static Single Item Start -->
                        <div class="col-lg-3 col-xs-12 col-md-6 col-sm-6 mb-sm-30px">
                            <div class="single-static">
                                <img src="{{asset('public/website/assets/images/icons/static-icons-4.png')}}" alt="" class="img-responsive" />
                                <div class="single-static-meta">
                                    <h4>Money-back Gurantee</h4>
                                </div>
                            </div>
                        </div>
                        <!-- Static Single Item End -->
                        <!-- Static Single Item Start -->
                        <div class="col-lg-3 col-xs-12 col-md-6 col-sm-6">
                            <div class="single-static">
                                <img src="{{asset('public/website/assets/images/icons/static-icons-3.png')}}" alt="" class="img-responsive" />
                                <div class="single-static-meta">
                                    <h4>Members Discount</h4>
                                </div>
                            </div>
                        </div>
                        <!-- Static Single Item End -->
                    </div>
                </div>
            </div>
        </div>
<!-- Static Area End -->    

<div class="container">
    <div class="row">
        <div class="section-title">
            <h2 class="section-heading">Users Voice</h2>
            <p>What our users says about us</p>
        </div>
        <div class="col-md-6">
            <section class="testimonial">
                <div class="row">
                    <div class="col-md-4">
                      <img class="img-responsive w-100" src="{{asset('public/website/assets/images/testimonial-image/photo2.png')}}" alt="description of image" alt="description of image">
                    </div>
                    <div class="col-md-8"><p class="pt-3 pe-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p><div class="author">Lesslie John</div></div>
                </div>
            </section>
        </div>
        <div class="col-md-6">
            <section class="testimonial">
                <div class="row">
                    <div class="col-md-4">
                      <img class="img-responsive w-100" src="{{asset('public/website/assets/images/testimonial-image/photo1.png')}}" alt="description of image" alt="description of image">
                    </div>
                    <div class="col-md-8"><p class="pt-3 pe-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p><div class="author">Lesslie John</div></div>
                </div>
            </section>
        </div>
        <div class="col-md-6">
            <section class="testimonial">
                <div class="row">
                    <div class="col-md-4">
                      <img class="img-responsive w-100" src="{{asset('public/website/assets/images/testimonial-image/photo22.png')}}" alt="description of image" alt="description of image">
                    </div>
                    <div class="col-md-8"><p class="pt-3 pe-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p><div class="author">Lesslie John</div></div>
                </div>
            </section>
        </div>
        <div class="col-md-6">
            <section class="testimonial">
                <div class="row">
                    <div class="col-md-4">
                      <img class="img-responsive w-100" src="{{asset('public/website/assets/images/testimonial-image/photo11.png')}}" alt="description of image" alt="description of image">
                    </div>
                    <div class="col-md-8"><p class="pt-3 pe-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p><div class="author">Lesslie John</div></div>
                </div>
            </section>
        </div>
        
    </div>
</div>
<!-- Brand area start -->
<div class="brand-area mb-60px">
    <div class="container">
        <div class="brand-slider slider-nav-style-1 slider-nav-style-2 ">
            <div class="brand-slider-wrapper swiper-wrapper">
                <div class="brand-slider-item swiper-slide">
                    <a href="#"><img src="{{asset('public/website/assets/images/brand-logo/1.jpg')}}" alt="" /></a>
                </div>
                <div class="brand-slider-item swiper-slide">
                    <a href="#"><img src="{{asset('public/website/assets/images/brand-logo/2.jpg')}}" alt="" /></a>
                </div>
                <div class="brand-slider-item swiper-slide">
                    <a href="#"><img src="{{asset('public/website/assets/images/brand-logo/3.jpg')}}" alt="" /></a>
                </div>
                <div class="brand-slider-item swiper-slide">
                    <a href="#"><img src="{{asset('public/website/assets/images/brand-logo/4.jpg')}}" alt="" /></a>
                </div>
                <div class="brand-slider-item swiper-slide">
                    <a href="#"><img src="{{asset('public/website/assets/images/brand-logo/5.jpg')}}" alt="" /></a>
                </div>
                <div class="brand-slider-item swiper-slide">
                    <a href="#"><img src="{{asset('public/website/assets/images/brand-logo/1.jpg')}}" alt="" /></a>
                </div>
                <div class="brand-slider-item swiper-slide">
                    <a href="#"><img src="{{asset('public/website/assets/images/brand-logo/2.jpg')}}" alt="" /></a>
                </div>
            </div>
            <!-- Add Arrows -->
            <div class="swiper-buttons">
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </div>
</div>
<!-- Brand area end -->









<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-5 col-sm-12 col-xs-12 mb-lm-100px mb-sm-30px">
                     <!-- Swiper -->
                      <div class="swiper-container gallery-top">
                            <div class="swiper-wrapper">
                              <div class="swiper-slide"> 
                                    <img class="img-responsive m-auto" src="{{asset('public/website/assets/images/product-image/11.jpg')}}" alt="">
                              </div>
                              <div class="swiper-slide"> 
                                    <img class="img-responsive m-auto" src="{{asset('public/website/assets/images/product-image/12.jpg')}}" alt="">
                              </div>
                              <div class="swiper-slide"> 
                                    <img class="img-responsive m-auto" src="{{asset('public/website/assets/images/product-image/13.jpg')}}" alt="">
                              </div>
                              <div class="swiper-slide"> 
                                    <img class="img-responsive m-auto" src="{{asset('public/website/assets/images/product-image/14.jpg')}}" alt="">
                              </div>
                            </div>
                      </div>
                      <div class="swiper-container gallery-thumbs">
                        <div class="swiper-wrapper">
                              <div class="swiper-slide"> 
                                    <img class="img-responsive m-auto" src="{{asset('public/website/assets/images/product-image/11.jpg')}}" alt="">
                              </div>
                              <div class="swiper-slide"> 
                                    <img class="img-responsive m-auto" src="{{asset('public/website/assets/images/product-image/12.jpg')}}" alt="">
                              </div>
                              <div class="swiper-slide"> 
                                    <img class="img-responsive m-auto" src="{{asset('public/website/assets/images/product-image/13.jpg')}}" alt="">
                              </div>
                              <div class="swiper-slide"> 
                                    <img class="img-responsive m-auto" src="{{asset('public/website/assets/images/product-image/14.jpg')}}" alt="">
                              </div>
                            </div>
                      </div>
                </div>
                <div class="col-md-7 col-sm-12 col-xs-12">
                    <div class="product-details-content quickview-content">
                        <h2>Originals Kaval Windbr</h2>
                        <p class="reference">Reference:<span> demo_17</span></p>
                        <div class="pro-details-rating-wrap">
                            <div class="rating-product">
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                            </div>
                            <span class="read-review"><a class="reviews" href="#">Read reviews (1)</a></span>
                        </div>
                        <div class="pricing-meta">
                            <ul>
                                <li class="old-price not-cut">€18.90</li>
                            </ul>
                        </div>
                        <p class="quickview-para">Lorem ipsum dolor sit amet, consectetur adipisic elit eiusm tempor incidid ut labore et dolore magna aliqua. Ut enim ad minim venialo quis nostrud exercitation ullamco</p>
                        <div class="pro-details-size-color">
                            <div class="pro-details-color-wrap">
                                <span>Color</span>
                                <div class="pro-details-color-content">
                                    <ul>
                                        <li class="blue"></li>
                                        <li class="maroon active"></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="pro-details-quality">
                            <div class="cart-plus-minus">
                                <input class="cart-plus-minus-box" type="text" name="qtybutton" value="1" />
                            </div>
                            <div class="pro-details-cart btn-hover">
                                <a href="#"> + Add To Cart</a>
                            </div>
                        </div>
                        <div class="pro-details-wish-com">
                            <div class="pro-details-wishlist">
                                <a href="wishlist.html"><i class="ion-android-favorite-outline"></i>Add to wishlist</a>
                            </div>
                            <div class="pro-details-compare">
                                <a href="compare.html"><i class="ion-ios-shuffle-strong"></i>Add to compare</a>
                            </div>
                        </div>
                        <div class="pro-details-social-info">
                            <span>Share</span>
                            <div class="social-info">
                                <ul>
                                    <li>
                                        <a href="#"><i class="ion-social-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="ion-social-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="ion-social-google"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="ion-social-instagram"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Modal end -->

@stop


