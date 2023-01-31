@extends('sellerupdated.layouts.main-layout')
@section('title','View Design Request')
@section('content')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class=" container-fluid ">
            <!--begin::Card-->
            <div class="row">
            	 <div class="col-lg-12">
            	 	@include('website.layouts.flash')
            	 </div>
            </div>
            <div class="card card-custom mt-5">
                <div class="card-header flex-wrap py-5">
                    <div class="card-title">
                        <h3 class="card-label">
                            View Design Request
                            <div class="text-muted pt-2 font-size-sm">View Design Request</div>
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-5 col-lg-5 col-md-5">
                            <div class="product-details-img product-details-tab">
                                <img class="img-thumbnail" src="{{asset('uploads/'.$designRequests->product_img )}}">
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-7 col-md-7">
                        <div class="product-details-content ms-5">
                            <ul class="product-cat d-flex" style="list-style: none;">
                                <li><a class="btn low" href="javascript:void(0)">{{$designRequests->catname}}</a></li>
                            </ul>
                            <h2>{{$designRequests->product_name}}</h2>
                            <div class="pro-details-list">
                                <p>{{$designRequests->product_desc}}</p>
                            </div>
                            <div class="pro-options">
                                <div class="pro-variants mt-0px color-radio">
                                    <label>Cost range</label>
                                    <div class="">{{$designRequests->cost}} </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12 product-design">
                            <a class="btn btn-primary" href="{{route('seller.designRequest')}}">Back</a>
                        </div>     
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection