@extends('website.layouts.master')
@section('content')
<div class="vendor-top-bar">
        <div class="container">
            
        </div>
    </div> 
    <div class="vendor-categories">
        <div class="container">
            <div class="row">
                @foreach($vendors as $seller)
                @if($seller->shop_url)
                <div class="col-lg-4 col">
                    <div class="single-category">
                        <img src="https://img.freepik.com/free-photo/old-black-background-grunge-texture-dark-wallpaper-blackboard-chalkboard-room-wall_1258-28312.jpg" class="main">
                        <div class="img-content">
                            <h1>{{$seller->shop_name}}</h1>

                            <h4><img src="{{ asset('public/website/assets/images/icons/map-pin.png') }}" class="map-pin">{{$seller->shop_address}}</h4>
                            <h4><img src="{{ asset('public/website/assets/images/icons/phone.png') }}" class="phone">{{$seller->shop_phone}}</h4>
                        </div>
                        <div class="cate-footer-area">
                            <div class="visit-store"><a href="{{url('vendor')}}/{{ $seller->shop_url }}">Visit Store<i class="ion-ios-arrow-thin-right"></i></a></div>
                            <div class="client-profile"><img src="{{asset('images/'.$seller->shop_logo)}}"></div>
                        </div> 
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>  
@stop