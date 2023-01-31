@extends('website.layouts.master')
@section('content')
<section class="home-slider position-relative mb-30">
    <div class="container">
        <div class="home-slide-cover mt-30">
            <div class="hero-slider-1 style-4 dot-style-1 dot-style-1-position-1">
                @foreach($banners->where('type' , 'homepagemain') as $banner)
                    <div class="single-hero-slider single-animation-wrap" style="background-image: url('{{asset('public/uploads/'.$banner->banner)}}')">
                    </div>
                @endforeach
            </div>
            <div class="slider-arrow hero-slider-1-arrow"></div>
        </div>
    </div>
</section>
<section class="popular-categories section-padding">
    <div class="container wow animate__animated animate__fadeIn">
        <div class="section-title">
            <div class="title">
                <h3>Featured Categories</h3>
            </div>
            <div class="slider-arrow slider-arrow-2 flex-right carausel-10-columns-arrow" id="carausel-10-columns-arrows"></div>
        </div>
        <div class="carausel-10-columns-cover position-relative">
            <div class="carausel-10-columns" id="carausel-10-columns">
                @foreach($getcatlist as $getcat)
                <div class="card-2 bg-10 wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                    <figure class="img-hover-scale overflow-hidden">
                        <a href="{{ url('category') }}/{{ $getcat->url }}"><img src="{{asset('public/products/'.$getcat->icon)}}" alt="{{$getcat->category_name}}" /></a>
                    </figure>
                    <h6><a href="{{ url('category') }}/{{ $getcat->url }}">{{$getcat->category_name}}</a></h6>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<section class="banners mb-25">
    <div class="container">
        <div class="row">
            @foreach($banners->where('type' , 'homepagedeal') as $banner)
            <div class="col-lg-4 col-md-6">
                <div class="banner-img wow animate__animated animate__fadeInUp" data-wow-delay="0">
                    @if($seller->shop_logo)
                    <img src="{{asset('uploads/'.$banner->banner)}}" alt="" />
                    @else
                    <img src="{{asset('uploads/'.$banner->banner)}}" alt="" />
                    @endif
                    <div class="banner-text">
                        <h4>
                            {{$seller->shop_name}}
                        </h4>
                        <a href="{{ $banner->url }}" class="btn btn-xs">Shop Now <i class="fi-rs-arrow-small-right"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
 <section class="product-tabs section-padding position-relative">
    <div class="container">
        <div class="section-title style-2 wow animate__animated animate__fadeIn">
            <h3>Popular Products</h3>
            <a class="btn btn-block btn-primary" href="{{route('website.productpage')}}" style="border-color: unset;">View All</a>
        </div>
        <!--End nav-tabs-->
        <div class="row product-grid-4">
            @foreach($Deals as $r)
               @include('website.show.product')
            @endforeach
            <!--end product card-->
        </div>
    </div>
</section>  
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
 <section class="product-tabs section-padding position-relative">
    <div class="container">
        <div class="section-title style-2 wow animate__animated animate__fadeIn">
            <h3>Top Picks For You</h3>
            <a class="btn btn-block btn-primary" href="{{route('website.productpage')}}" style="border-color: unset;">View All</a>
        </div>
        <!--End nav-tabs-->
        <div class="row product-grid-4">
            @foreach($Deals as $r)
               @include('website.show.product')
            @endforeach
            <!--end product card-->
        </div>
    </div>
</section>
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
 <section class="product-tabs section-padding position-relative">
    <div class="container">
        <div class="section-title style-2 wow animate__animated animate__fadeIn">
            <h3>New Arrivals</h3>
            <a class="btn btn-block btn-primary" href="{{route('website.productpage')}}" style="border-color: unset;">View All</a>
        </div>
        <!--End nav-tabs-->
        <div class="row product-grid-4">
            @foreach($Deals as $r)
               @include('website.show.product')
            @endforeach
            <!--end product card-->
        </div>
    </div>
</section>
<div class="banner-area">
    <div class="container-fluid">
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
<section class="newsletter mb-15 wow animate__ animate__fadeIn animated" style="visibility: visible; animation-name: fadeIn;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="position-relative newsletter-inner">
                    <div class="newsletter-content">
                        <h2 class="mb-20">
                            Stay home &amp; get your daily <br> needs from our shop
                        </h2>
                        <p class="mb-45">Start You'r Daily Shopping with <span class="text-brand">Nest Mart</span></p>
                        <form class="form-subcriber d-flex">
                            <input type="email" placeholder="Your emaill address">
                            <button class="btn" type="submit">Subscribe</button>
                        </form>
                    </div>
                    <img src="{{ url('public/website/assets/imgs/banner/banner-9.png')}}" alt="newsletter">
                </div>
            </div>
        </div>
    </div>
</section>
<section class="featured section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-1-5 col-md-4 col-12 col-sm-6 mb-md-4 mb-xl-0">
                <div class="banner-left-icon d-flex align-items-center wow animate__ animate__fadeInUp animated" data-wow-delay="0" style="visibility: visible; animation-name: fadeInUp;">
                    <div class="banner-icon">
                        <img src="{{ url('public/website/assets/imgs/theme/icons/icon-1.svg')}}" alt="">
                    </div>
                    <div class="banner-text">
                        <h3 class="icon-box-title">Best prices &amp; offers</h3>
                        <p>Orders $50 or more</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                <div class="banner-left-icon d-flex align-items-center wow animate__ animate__fadeInUp animated" data-wow-delay=".1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                    <div class="banner-icon">
                        <img src="{{ url('public/website/assets/imgs/theme/icons/icon-2.svg')}}" alt="">
                    </div>
                    <div class="banner-text">
                        <h3 class="icon-box-title">Free delivery</h3>
                        <p>24/7 amazing services</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                <div class="banner-left-icon d-flex align-items-center wow animate__ animate__fadeInUp animated" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                    <div class="banner-icon">
                        <img src="{{ url('public/website/assets/imgs/theme/icons/icon-3.svg')}}" alt="">
                    </div>
                    <div class="banner-text">
                        <h3 class="icon-box-title">Great daily deal</h3>
                        <p>When you sign up</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                <div class="banner-left-icon d-flex align-items-center wow animate__ animate__fadeInUp animated" data-wow-delay=".3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                    <div class="banner-icon">
                        <img src="{{ url('public/website/assets/imgs/theme/icons/icon-4.svg')}}" alt="">
                    </div>
                    <div class="banner-text">
                        <h3 class="icon-box-title">Wide assortment</h3>
                        <p>Mega Discounts</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                <div class="banner-left-icon d-flex align-items-center wow animate__ animate__fadeInUp animated" data-wow-delay=".4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
                    <div class="banner-icon">
                        <img src="{{ url('public/website/assets/imgs/theme/icons/icon-5.svg')}}" alt="">
                    </div>
                    <div class="banner-text">
                        <h3 class="icon-box-title">Easy returns</h3>
                        <p>Within 30 days</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-1-5 col-md-4 col-12 col-sm-6 d-xl-none">
                <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
                    <div class="banner-icon">
                        <img src="{{ url('public/website/assets/imgs/theme/icons/icon-6.svg')}}" alt="">
                    </div>
                    <div class="banner-text">
                        <h3 class="icon-box-title">Safe delivery</h3>
                        <p>Within 30 days</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop