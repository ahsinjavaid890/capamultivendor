@extends('website.layouts.master')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('website/assets/css/customerdashboard.css') }}">
<main class="main bg-grey min-height-600">
    <div class="page-content pt-2">
        <div class="container">
            <div class="tab tab-vertical row gutter-lg us-nav-cover-cls">
                @include('website.customer.sidebar')
                <div class="tab-content mb-6 bg-white p-4 us-md-cls">
                    <div class="tab-body-head">
                    <div class="">
                        <h2 class="">
                            Return Requests
                        </h2>
                    </div>
                </div>
                    <div class="tab-pane active in" id="account-dashboard">                                
                       <form action="{{route('website.returnRequestProcess')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="order_id" value="{{$order->id}}" />
                        <div class="row">
                                <div class="col-md-12 col-left">
                                    <div class="shadow-block" id="pills-tabContent">
                                        <div class="form-detail us-form">
                                            <div class="row"> 
                                                <div class="col-md-12">
                                                    <div class="info-input mb-20px">
                                                        <label>Product Details <span class="link-danger">*</span></label>
                                                        <select required class="form-control" name="prod_id">
                                                            <option value="">Select Product</option>
                                                            @foreach(DB::table('orderdetails')->where('order_id' , $order->id)->get() as $r)

                                                            <option value="{{ $r->product_id }}">{{ DB::table('products')->where('id' , $r->product_id)->first()->product_title }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>                                
                                                <div class="col-md-12">
                                                    <div class="info-input mb-20px">
                                                        <label>Reason to Return <span class="link-danger">*</span></label>
                                                        <select class="form-select coupons" name="reason">
                                                            <option value="selected">Incorrect Product or Size Ordered</option>
                                                            <option>Product No Longer Needed</option>
                                                            <option>Product Does Not Match Description</option>
                                                            <option>Product Did Not Meet Customer's Expectations</option>
                                                            <option>Customer Unfamiliar with Retail Interface</option>
                                                            <option>Purchased During Holiday Season</option>
                                                            <option>Wardrobing</option>
                                                            <option>Deliberate Fraud</option>                                                   
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="info-input mb-20px">
                                                        <label>Message<span class="link-danger">*</span></label>
                                                        <textarea type="text" class="coupons" placeholder="Message" id="reason" name="message" ></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12" style="margin-top:20px;">
                                                <div class="info-input mb-20px">
                                                    <button type="submit" class="btn btn-success submit">Submit</button>
                                                    
                                            
                                                </div>
                                            </div>
                                        </div>
                                  
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</main>
@stop