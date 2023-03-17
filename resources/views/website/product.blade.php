@extends('website.layouts.master')
@section('content')
<style>
.arrival-products .pro-content {
    width: 100% !important;
}
.deal-area .list-product{
    border: 0 !important;
}
.pro-content{
    border: 1px solid #64317c;
    padding: 0 !important;
}
</style>
<div class="offcanvas-overlay"></div>

<div class="shop-category-area mt-30px">
    <div class="container-fluid">
        <div class="archive-header mb-3">
            <div class="row align-items-center">
                <div class="col-xl-6">
                    <h1 class="mb-4">Expolor All products</h1>
                    <div class="breadcrumb">
                        <a href="{{ url(' ') }}" rel="nofollow"><i class="fa fa-home mx-1"></i>Home</a>
                        <span><i class="fa fa-angle-right mr-5"></i></span> 
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 order-lg-last col-md-12 order-md-first">
                <div class="shop-bottom-area mt-35">
                    <div id="new-arrivals" class="deal-area">
                            @if(count($products)!=0)
                            <div class="row" id="oldData">
                                 @foreach($products as $r)
                                    @include('website.show.product')
                                @endforeach  
                            </div>
                            <div class="view-more text-center">
                               
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
    </div>
</div>
@stop