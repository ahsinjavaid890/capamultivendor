@extends('website.layouts.master')
@section('content')
<!-- <div class="vendor-top-bar">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col left-col">
                    <div class="filter-btn">
                        <a href="#" class="bg-blue">Filter By</a>
                    </div>
                </div>
                <div class="col-lg-6 col right-col">
                    <div class="shop-top-bar d-flex">
                        <div class="select-shoing-wrap d-flex">
                            <div class="shot-product">
                                <p>Sort by:</p>
                            </div>
                            <div class="shop-select">
                                <select>
                                    <option value="">Most Popular</option>
                                    <option value="">Latest Products</option>
                                    <option value="">Oldest Products</option>
                                    <option value="">Lowest Price</option>
                                </select>
                            </div>
                        </div>
                        <div class="product-show-style">
                            <a href="#"><img src="{{asset('public/website/assets/images/icons/grid.png')}}" class="grid"></a>
                            <a href="#"><img src="{{asset('public/website/assets/images/icons/list.png')}}" class="list"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
 -->

<div class="container category-list">
    <div class="row">
        @foreach($categories as $getcat)
            <div class="col-md-2 p-0 pb-0">
                <a href="{{ url('category') }}/{{ $getcat->url }}" class="category-list">
                    <div class="card category-card rounded-0">
                        <div class="card-body text-center">
                            <div class="category-img">
                            @if($getcat->icon==null)
                                <img src="{{asset('public/website/assets/images/icons/speakers.svg')}}" alt="{{$getcat->category_name}}" />
                                @else
                                <img src="{{asset('products/'.$getcat->icon)}}" alt="{{$getcat->category_name}}" />
                            @endif
                            </div>
                            <div class="category-discript"><span>{{$getcat->category_name}}</span></div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>


@stop