@extends('website.layouts.master')

@section('content') 

    <div class="offcanvas-overlay"></div>

        <div class="banner_image mb-5 mt-5">
            <div class="container-fluid">
                <div class="row">
                    @foreach($banners->where('type' , 'homepagemain') as $banner)
                    <div class="col-md-6">
                        <div class="banner_image">
                            <a href="{{route('website.productpage')}}">
                                <img src="{{asset('public/uploads/'.$banner->banner)}}">
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

          <div class="banner_image mb-5 mt-5">
            <div class="container-fluid">
                <div class="row">
                    @foreach($banners->where('type' , 'homepagetop') as $banner)
                    <div class="col-md-3">
                        <div class="banner_image">
                            <a  href="{{route('website.productpage')}}">
                                <img src="{{asset('public/uploads/'.$banner->banner)}}">
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div id="new-arrivals" class="deal-area pt-60px pb-30px"  style="background-color: #F2F2F2 !important;">
            <div class="container-fluid">
                <div class="card p-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="section-title">
                                    <h2 class="section-heading">Categories</h2>
                                    <a href="{{route('website.categoriesPage')}}" class="view-all-btn btn btn-primary">View All</a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @foreach($newcat as $r)
                            <div class="col-md-2 mt-3">
                                <div class="card ">
                                    <div class="card-body p-0">
                                       <a href="{{ url('category') }}/{{ $r->url }}">
                                        @if($r->icon==null)
                                                    <img src="{{asset('public/website/assets/images/icons/speakers.svg')}}" alt="{{$r->category_name}}" id="{{ $r->id }}" style="width: 100%;" />
                                                    @else
                                                    <img src="{{asset('public/products/'.$r->icon)}}" alt="{{$r->category_name}}" id="{{ $r->id }}" style="width: 100%;" />
                                                @endif
                                        </a> 
                                        <div class="cat-heading mt-2 mb-3">
                                            <a href="{{ url('category') }}/{{ $r->url }}"><p>{{$r->category_name}}</p></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- category Area End -->
        <div id="new-arrivals" class="deal-area pt-60px pb-30px"  style="background-color: #F2F2F2 !important;">
            <div class="container-fluid">
               <div class="card">
                   <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="section-title">
                                    <h2 class="section-heading">Deals Of The Day</h2>
                                    <p>Amazing weekly featured item collection</p>
                                    <a href="{{route('website.dealoftheday')}}" class="view-all-btn btn btn-primary">View All</a>
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
             </div>
        </div>
        <div class="banner-area">
            <div class="container-fluid">
                <div class="row">
                    @foreach($banners->where('type' , 'homepagedeal') as $banner)
                    <div class="col-md-3 col-xs-12">
                        <div class="banner-wrapper">
                            <a href="{{route('website.productpage')}}"><img src="{{asset('public/uploads/'.$banner->banner)}}" alt="" /></a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div id="new-arrivals" class="deal-area pt-60px pb-30px" style="background-color: #F2F2F2 !important; ">
            <div class="container-fluid">
                <div class="card p-3">
                    <div class="card-body" style="background-image: url('{{ url('public/website/assets/images/73655.webp') }}');background-size: cover; background-position: 2px -428px; padding-top: 125px; padding-bottom: 125px; background-repeat: no-repeat;">
                        <div class="col-md-12">
                            <div class="capa_logo">
                                <a href="https://capacollege.in/"><img src="{{ url('public/website/assets/images/capa.png') }}"></a>
                            </div>
                            <div class="capa_heading">
                                <a href="https://capacollege.in/"><h1 class="text-white">Learn advance bakery at CAPA ( A Unit of Cakeuncle)</h1></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="new-arrivals" class="deal-area pt-60px pb-30px" style="background-color: #F2F2F2 !important;">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="section-title">
                                    <h2 class="section-heading">Top Picks For You</h2>
                                    <p>Amazing weekly featured item collection</p>
                                    <a href="{{route('website.toppickup')}}" class="view-all-btn btn btn-primary">View All</a>
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
             </div>
        </div>
        <div class="banner-area pt-5" style="background-color: #F2F2F2;">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            @foreach($banners->where('type' , 'homepagetop') as $banner)
                            <div class="col-md-3 col-xs-12">
                                <div class="banner-wrapper">
                                    <a href="{{route('website.productpage')}}"><img src="{{asset('public/uploads/'.$banner->banner)}}" alt="" /></a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Banner Area End -->
        
        <!-- New Arrivals Area Start -->
        <div id="new-arrivals" class="deal-area pt-60px pb-30px" style="background-color: #F2F2F2;">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                         <div class="row">
                            <div class="col-md-12">
                                <div class="section-title">
                                    <h2 class="section-heading">New Arrivals</h2>
                                    <p>Amazing weekly featured item collection</p>
                                    <a href="{{route('website.newarrival')}}" class="view-all-btn btn btn-primary">View All</a>
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
             </div>
        </div>
        <!-- New Arrivals Area End -->
        <!-- Banner Area Start -->
        <div class="banner-area pt-5" style="background-color: #F2F2F2;">
            <div class="container-fluid">
                <div class="row">
                    @foreach($banners->where('type' , 'homepagetop') as $banner)
                    <div class="col-md-6 col-xs-12">
                        <div class="banner-wrapper">
                            <a href="{{route('website.productpage')}}"><img src="{{asset('public/uploads/'.$banner->banner)}}" alt="" /></a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>  
        <div  id="new-arrivals" class="deal-area pt-60px pb-30px"  style="background-color: #F2F2F2 !important;">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="section-title">
                                    <h2 class="section-heading">Our Blogs</h2>
                                    <p>Amazing weekly featured item collection</p>
                                    <a href="{{ route('website.blogs') }}" class="view-all-btn btn btn-primary">View All</a>
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
                                                <img src="{{asset('public/images/'.$r->blog_img)}}" style="width: 100%;border-radius: 8px 8px 0px 0px;">
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


