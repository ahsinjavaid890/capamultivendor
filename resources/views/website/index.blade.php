@extends('website.layouts.master')

@section('content')

    <div class="offcanvas-overlay"></div>

        <!-- Slider Start -->
        <div class="slider-area slider-height-1">
            <div class="hero-slider swiper-container">
                <div class="swiper-wrapper">
                    @foreach($banners->where('type' , 'homepagemain') as $banner)
                    <img class="swiper-slide bg-img d-flex" src="{{asset('public/uploads/'.$banner->banner)}}">
                    @endforeach
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination swiper-pagination-white"></div>
            </div>
        </div>
        <!-- Slider End -->

<div class="container-fluid">
    <div class="" style="padding:10px 7px 1px">
        <ul class="row" style="margin:0 auto 5px;">
            @foreach($getcatlist as $getcat)
            <li class="col-md-3">
                <div class="categorybox">
                    <a href="{{ url('category') }}/{{ $getcat->url }}">
                        <img class="img-thumbnail" style="width: 100%;height: 250px;" alt="{{$getcat->category_name}}" class="responsive-img" src="{{asset('public/products/'.$getcat->icon)}}">
                    </a>
                    <div class="categoryname">
                        <a href="{{ url('category') }}/{{ $getcat->url }}">{{$getcat->category_name}}</a>
                    </div>
                </div>
                
            </li>
            @endforeach
        </ul>
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
        <!-- Banner Area End -->
        

        <!-- Products Rent Area Start -->
       
        <!-- Products Rent Area End -->
        
        
        
<div class="sectionhomepage" style="background-image: url(&quot;https://www.jacketsjunction.com/wp-content/uploads/2022/02/Customize.jpg&quot;);">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-2"></div>
         <div class="col-md-8">
            <div class="row">
               <div class="col-md-12">
                  <div class="inner-content homepage-text">
                     <h5>Heading</h5>
                     <p>Imagine opening your wardrobe and watching a collection of shiny, sharp, and super-structured leather clothing. Isn’t enough to make your day and bundle up in style? Do you know how much leather is influenced nowadays in the fashion industry and casual routines? The leather story is as old as humans are; they started making leather clothing using animal skin to protect them from harsh weather. Have you ever realized how much leather you carry right now on your body? Today, when it comes to having your hands on the trend or going with it, leather clothing has topped the list, especially in this bone-chilling season. </p>
                     <p>Imagine opening your wardrobe and watching a collection of shiny, sharp, and super-structured leather clothing. Isn’t enough to make your day and bundle up in style? Do you know how much leather is influenced nowadays in the fashion industry and casual routines? The leather story is as old as humans are; they started making leather clothing using animal skin to protect them from harsh weather. Have you ever realized how much leather you carry right now on your body? Today, when it comes to having your hands on the trend or going with it, leather clothing has topped the list, especially in this bone-chilling season. </p>
                     <p>Imagine opening your wardrobe and watching a collection of shiny, sharp, and super-structured leather clothing. Isn’t enough to make your day and bundle up in style? Do you know how much leather is influenced nowadays in the fashion industry and casual routines? The leather story is as old as humans are; they started making leather clothing using animal skin to protect them from harsh weather. Have you ever realized how much leather you carry right now on your body? Today, when it comes to having your hands on the trend or going with it, leather clothing has topped the list, especially in this bone-chilling season. </p>
                     <p>Imagine opening your wardrobe and watching a collection of shiny, sharp, and super-structured leather clothing. Isn’t enough to make your day and bundle up in style? Do you know how much leather is influenced nowadays in the fashion industry and casual routines? The leather story is as old as humans are; they started making leather clothing using animal skin to protect them from harsh weather. Have you ever realized how much leather you carry right now on your body? Today, when it comes to having your hands on the trend or going with it, leather clothing has topped the list, especially in this bone-chilling season. </p>
                     <p>Imagine opening your wardrobe and watching a collection of shiny, sharp, and super-structured leather clothing. Isn’t enough to make your day and bundle up in style? Do you know how much leather is influenced nowadays in the fashion industry and casual routines? The leather story is as old as humans are; they started making leather clothing using animal skin to protect them from harsh weather. Have you ever realized how much leather you carry right now on your body? Today, when it comes to having your hands on the trend or going with it, leather clothing has topped the list, especially in this bone-chilling season. </p>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-2"></div>
      </div>
   </div>
</div>

<div class="sectionhomepage">
   <div class="container inner-content box_shadow1">
      <div class="row no-gutters">
         <div class="col-md-4">
            <div class="icon_box icon_box_style1">
               <div class="icon"><i class="flaticon-shipped"></i></div>
               <div class="icon_box_content">
                  <h5>Fastest Delivery</h5>
                  <p>Fastest Delivery on all over India</p>
               </div>
            </div>
         </div>
         <div class="col-md-4">
            <div class="icon_box icon_box_style1">
               <div class="icon"><i class="flaticon-money-back"></i></div>
               <div class="icon_box_content">
                  <h5>30 Day Returns Guarantee</h5>
                  <p>Simply return it within 30 days for an exchange</p>
               </div>
            </div>
         </div>
         <div class="col-md-4">
            <div class="icon_box icon_box_style1">
               <div class="icon"><i class="flaticon-support"></i></div>
               <div class="icon_box_content">
                  <h5>27/4 Online Support</h5>
                  <p>Contact us 24 hours a day, 7 days a week</p>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div style="background-color: #6C4646;padding: 35px;">
   <div class="container">
      <div class="row align-items-center">
         <div class="col-md-6">
            <div class="newsletter_text text_white">
               <h3>Join Our Newsletter Now</h3>
               <p>Register now to get updates on promotions.</p>
            </div>
         </div>
         <div class="col-md-6">
            <div class="newsletter_form2 rounded_input newsletter-form">
               <form method="post" action="https://leatherwearclothing.com/newsletter/subscribe"><input type="hidden" name="_token" value="WSvRNFBdU69hsQTuqJGoJI4aFdzxSByZFXGuputP"> <input name="email" type="email" placeholder="Enter Your Email" class="form-control" data-temp-mail-org="0"> <button type="submit" class="btn btn-dark btn-radius">Subscribe</button></form>
               <div class="newsletter-message newsletter-success-message" style="display: none;"></div>
               <div class="newsletter-message newsletter-error-message" style="display: none;"></div>
            </div>
         </div>
      </div>
   </div>
</div>
@stop