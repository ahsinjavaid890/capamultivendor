@extends('website.layouts.master')
@section('content')
    <div class="vendor-top-bar ptb-60px" style="background-color: #ecebeb;">
        <div class="container-fluid">
          <div class="archive-header mb-3">
             <div class="row align-items-center">
                <div class="col-xl-6">
                   <h1 class="mb-4">All Vendor</h1>
                   <div class="breadcrumb">
                      <a href="{{ url(' ') }}" rel="nofollow"><i class="fa fa-home mx-1"></i>Home</a>
                      <span><i class="fa fa-angle-right mr-5"></i> Vendor</span> 
                   </div>
                </div>
             </div>
          </div>
        </div>
    </div> 
    <div class="vender-card mt-4">
        <div class="container-fluid">
            <div class="row">
                @foreach($vendors as $seller)
                @if($seller->shop_url)
                <div class="col-lg-4 col-md-4 col-12 col-sm-6">
                    <div class="vendor-wrap style-2 mb-40 d-flex">
                        <div class="product-badges product-badges-position product-badges-mrg">
                            <span class="hot">Mall</span>
                        </div>
                        <div class="vendor-img-action-wrap">
                            <div class="vendor-img">
                                <a href="vendor-details-1.html">
                                    <img class="default-img" src="{{asset('public/images/'.$seller->shop_logo)}}" alt="">
                                </a>
                            </div>
                            <div class="mt-10">
                                <span class="font-small total-product">380 products</span>
                            </div>
                        </div>
                        <div class="vendor-content-wrap">
                            <div class="mb-30">
                                <h4 class="mb-5 mx-3"><a href="{{url('vendor')}}/{{ $seller->shop_url }}">{{$seller->shop_name}}</a></h4>
                                <div class="vendor-info d-flex justify-content-between align-items-end mt-30">
                                    <ul class="contact-infor text-muted">
                                        <li class=""><img class="" src="{{ asset('public/website/assets/images/icons/map-pin.png') }}" alt=""><strong>Address: </strong> <span>{{$seller->shop_address}}</span></li><br>
                                        <li class="mt-3"><img class="" src="{{ asset('public/website/assets/images/icons/phone.png') }}" alt=""><strong>Call Us:</strong><span>{{$seller->shop_phone}}</span></li>
                                    </ul>
                                    <a href="{{url('vendor')}}/{{ $seller->shop_url }}" class="btn btn-primary">Visit Store <i class="fi-rs-arrow-small-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>
@stop