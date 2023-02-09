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
            
        </div>
        <!-- Slider End -->

        <!-- category Area Start -->
        <div class="popular-categories-area pt-md-5 pb-md-5" style="background-color: #f5eff7;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title text-center">
                            <h2 class="section-heading">Categories</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach($getcatlist as $getcat)
                    <div class="col-md-2">
                        <div class="card card-2">
                            <div class="card-body">
                                <div class="card-figure">
                                    <a href="{{ url('category') }}/{{ $getcat->url }}">
                                    @if($getcat->icon==null)
                                        <img src="{{asset('public/website/assets/images/icons/speakers.svg')}}" alt="{{$getcat->category_name}}" />
                                        @else
                                        <img src="{{asset('public/products/'.$getcat->icon)}}" alt="{{$getcat->category_name}}" />
                                    @endif
                                    </a>
                                </div>
                                <div class="card-heading">
                                    <a href="{{ url('category') }}/{{ $getcat->url }}"><span>{{$getcat->category_name}}</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                </div>           
            </div>
        </div>
        <!-- category Area End -->
        <div id="new-arrivals" class="deal-area pt-60px pb-30px">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title">
                            <h2 class="section-heading">Deals Of The Day</h2>
                            <p>Amazing weekly featured item collection</p>
                            <a href="{{route('website.productpage')}}" class="view-all-btn btn btn-primary">View All</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach($Deals as $r)
                        @include('website.show.product')
                    @endforeach
                </div>
             </div>
        </div>
        <div class="banner-area">
            <div class="container-fluid">
                <div class="row">
                    @foreach($banners->where('type' , 'homepagedeal') as $banner)
                    <div class="col-md-3 col-xs-12">
                        <div class="banner-wrapper">
                            <a href="{{ $banner->url }}"><img src="{{asset('public/uploads/'.$banner->banner)}}" alt="" /></a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div id="new-arrivals" class="deal-area pt-60px pb-30px">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title">
                            <h2 class="section-heading">Top Picks For You</h2>
                            <p>Amazing weekly featured item collection</p>
                            <a href="{{route('website.productpage')}}" class="view-all-btn btn btn-primary">View All</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach($topPics as $r)
                        @include('website.show.product')
                    @endforeach
                </div>
             </div>
        </div>
        <div class="banner-area">
            <div class="container-fluid">
                <div class="row">
                    @foreach($banners->where('type' , 'homepagetop') as $banner)
                    <div class="col-md-3 col-xs-12">
                        <div class="banner-wrapper">
                            <a href="{{ $banner->url }}"><img src="{{asset('public/uploads/'.$banner->banner)}}" alt="" /></a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Banner Area End -->
        
        <!-- New Arrivals Area Start -->
        <div id="new-arrivals" class="deal-area pt-60px pb-30px">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title">
                            <h2 class="section-heading">New Arrivals</h2>
                            <p>Amazing weekly featured item collection</p>
                            <a href="{{route('website.productpage')}}" class="view-all-btn btn btn-primary">View All</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach($arrivals as $r)
                        @include('website.show.product')
                    @endforeach
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
            <div class="container-fluid">
                <div class="row">
                    @foreach($banners->where('type' , 'homepagetop') as $banner)
                    <div class="col-md-6 col-xs-12">
                        <div class="banner-wrapper">
                            <a href="{{ $banner->url }}"><img src="{{asset('public/uploads/'.$banner->banner)}}" alt="" /></a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>  
<div class="blogs">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h2 class="section-heading">Our Blogs</h2>
                    <p>Amazing weekly featured item collection</p>
                    <a href="{{route('website.productpage')}}" class="view-all-btn btn btn-primary">View All</a>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach(DB::table('blogs')->get() as $r)
            <div class="col-md-3 mb-3">
                <div class="card blog-card">
                    <div class="card-body p-0">
                        <div class="blog-image">
                            <a href="#">
                                <img src="{{asset('public/images/'.$r->blog_img)}}" style="width: 100%;border-radius: 15px;">
                            </a>
                        </div>
                        <div class="blog-content">
                            <h6 class="mb-10 font-sm"><a class="entry-meta text-muted" href="#">Salad</a></h6>
                            <div class="blog-title">
                                <h4><a href="#">{{ $r->blog_name }}</a> </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
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


