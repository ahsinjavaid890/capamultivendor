@extends('website.layouts.master')
@section('content')
<div class="offcanvas-overlay"></div>

<div class="shop-category-area mt-30px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 order-lg-last col-md-12 order-md-first">
                    <!-- Shop Top Area Start -->
                    <div class="shop-top-bar d-flex">
                        <!-- Left Side start -->
                       
                        <!-- Left Side End -->
                        <!-- Center Side Start -->
                       
                        <!-- Center Side End -->
                         <!-- Right Side Start -->
                        
                        <!-- Right Side End -->
                    </div>
                    <!-- Shop Top Area End -->

                    <!-- Shop Bottom Area Start -->
                    <div class="shop-bottom-area mt-35">
                      
                       <div class="shop-banner>">
                            <img src="{{asset('website/assets/images/banner-image/shop-banner.png')}}" alt=" " class="w-100 mb-4">
                        </div>
                        <!-- <div class="shop-categories">
                            <div class="row">
                                <div class="col-2">
                                    <a href="#" class="product-link">
                                        <div class="cat-image">
                                            <img src="{{asset('website/assets/images/product-image/chair.png')}}">
                                        </div>
                                        <div class="cat-title text-center">Chairs</div>
                                    </a>
                                </div>
                                <div class="col-2">
                                    <a href="#" class="product-link">
                                       <div class="cat-image">
                                            <img src="{{asset('website/assets/images/product-image/ce.png')}}">
                                        </div>
                                        <div class="cat-title text-center">Lights</div>
                                    </a>
                                </div>
                                <div class="col-2">
                                    <a href="#" class="product-link">
                                      <div class="cat-image">
                                            <img src="{{asset('website/assets/images/product-image/faa.png')}}">
                                        </div>
                                        <div class="cat-title text-center">Fans</div>
                                    </a>   
                                </div>
                                <div class="col-2">
                                    <a href="#" class="product-link">
                                       <div class="cat-image">
                                            <img src="{{asset('website/assets/images/product-image/lights2.png')}}">
                                        </div>
                                        <div class="cat-title text-center">Lights</div>
                                    </a>
                                </div>
                                <div class="col-2">
                                     <a href="#" class="product-link">
                                      <div class="cat-image">
                                            <img src="{{asset('website/assets/images/product-image/gg.png')}}">
                                        </div>
                                        <div class="cat-title text-center">Generators</div>
                                    </a>
                                    </div>
                                <div class="col-2">
                                    <a href="#" class="product-link">
                                        <div class="cat-image">
                                            <img src="{{asset('website/assets/images/product-image/tent.png')}}">
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
                                            <h2 class="section-heading">Explore All Services</h2>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                <div class="col-xs-12 col-sm-12">
                                    @if(count($services)!=0)
                                    <div class="arrival-products d-flex">
                                        @foreach($services as $product)
                                            <!-- Single Item -->
                                            <div class="pro-content">
                                                <article class="list-product">
                                                    <div class="img-block">
                                                        <a href="javascript:void(0)" class="thumbnail">
                                                            <img class="first-img" src="{{asset('uploads/'.$product->image)}}" alt="" />
                                                        </a>
                                                        <!-- <div class="quick-view">
                                                            <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                                <i class="icon-magnifier icons"></i>
                                                            </a>
                                                        </div> -->
                                                    </div>
                                                   
                                             
                                                    <div class="product-decs text-center">
                                                        <a class="inner-link" href="javascript:void(0)"><span>{{$product->service_name}}</span></a>
                                                        <div class="pricing-meta">
                                                            <ul>
                                                                <li><strong>Contacts Details - </strong>{{$product->contact_details}}</li>
                                                                
                                                            </ul>
                                                        </div>
                                                      
                                                      
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
                                                        <p style="padding-top: 60px;border: 1px solid #009fbd; text-align: center; padding-bottom: 60px; background: #009fbd;color: #fff;">No Services are found !!</p>
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
               
            </div>
        </div>
@stop