@extends('website.layouts.master')
@section('content')
<style>
.arrival-products .pro-content {
    width: 100% !important;
}
.deal-area .list-product{
    border: 0 !important;
}
.list-product .add-cart-btn a {
    background: #6c4646;
    color: #fff;
    padding: 14px;
    font-size: 15px;
}
</style>
<div class="offcanvas-overlay"></div>

<div class="container-fluid">
    <div class="archive-header mb-3">
        <div class="row align-items-center">
            <div class="col-xl-6">
                <h1 class="mb-4">All Deal of the Day Products</h1>
                <div class="breadcrumb">
                    <a href="{{ url(' ') }}" rel="nofollow"><i class="fa fa-home mx-1"></i>Home</a>
                    <span><i class="fa fa-angle-right mr-5"></i></span> 
                </div>
            </div>
        </div>
    </div>
</div>
<div class="shop-category-area mt-30px pt-60px pb-30px deal-area" style="background-color: #F2F2F2;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 order-lg-last col-md-12 order-md-first">
                <div class="shop-bottom-area mt-35 deal">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                @foreach($Deals as $r)
                                    @include('website.show.product')
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop