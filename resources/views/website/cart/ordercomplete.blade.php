@extends('website.layouts.master')
@section('content')
    <div id="checkout">
        <div id="checkout-tabs">
            <div class="row">
                <div class="checkout-tab-block order-md-first">
                    <!-- Shop Top Area Start -->
                    <div class="checkout-tab-top-bar" style="background:#a277b7">
                        <!-- Left Side start -->
                        <div class="container-fluid">
                            <div class="checkout-tab nav">
                                <a  href="javascript:void(0)">
                                    <img src="{{asset('public/website/assets/images/icons/free-delivery.svg')}}">
                                    <span>Shipping Address</span>
                                </a>
                                <a href="javascript:void(0)">
                                    <img src="{{asset('public/website/assets/images/icons/credit-card.svg')}}">
                                    <span>Payment Information</span>
                                </a>
                                <a class="active" href="javascript:void(0)">
                                    <img src="{{asset('public/website/assets/images/icons/thumbs-up-hand-symbol.svg')}}">
                                    <span>Thank You</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="tab-bottom-area mt-35">
                        <!-- Checkout Tabs Content Start -->
                        <div class="tab-content jump">
                            <div id="thank-you" >
                                <div class="checkout-area mt-60px mb-40px">
                                    <div class="container-fluid order-successfully-placed">
                                        <div class="thank-you-title content-box text-center">
                                            <img src="{{asset('public/website/assets/images/icons/check.png')}}" class="check">
                                            <h1>Thank You</h1>
                                            <h3>For shopping At Capa!</h3>
                                        </div>
                                        @php
                                          if($order->customer_id){
                                            $customer = DB::table('customers')->where('id' , $order->customer_id)->first();
                                            $name = $customer->fname.' '.$customer->lname;
                                            $email = $customer->email;
                                            $phonenumber = $customer->mobile;

                                          }else{
                                            $name = $order->fname.' '.$order->lname;
                                            $email = $order->email;
                                            $phonenumber = $order->phonenumber;
                                          }
                                          if($order->addres_id){
                                            $address = DB::table('customer_addresses')->where('id' , $order->addres_id)->first();
                                            $emirates = $address->emirates;
                                            $area = $address->area;
                                            $apartment = $address->apartment;
                                            $home = $address->address;
                                          }else{
                                            $emirates = $order->emirates;
                                            $area = $order->area;
                                            $apartment = $order->address;
                                            $home = $order->address;
                                            $google_location = $order->google_location;
                                          }
                                        @endphp
                                        <div class="container-fluid">
                                            <div class="main row first">

                                                <div class="head-text" style="background:#f1f0f0"><h4>
                                                        <img src="{{asset('public/website/assets/images/icons/outline-email.png')}}">
                                                        An email confirmation has been sent to {{$email}}</h4>
                                                </div>
                                                <div class="inner-content-box d-flex">
                                                    <div class="col-lg-6 left-col">
                                                        <h4>Your order ID</h4>
                                                        <h4>Estimated Delivery</h4>
                                                        <h4>Delivery Address</h4>
                                                    </div>
                                                    <div class="col-lg-6 right-col">
                                                        <p>{{ $order->order_number }}</p>
                                                        <p>Your shipment will be with you Between <b> {{ date('M d', strtotime(date('Y-m-d'). ' + 3 days'))}} </b> and <b> {{ date('M d', strtotime(date('Y-m-d'). ' + 10 days'))}} </b>.</p>
                                                        <p>{{ $name }}. Phone Number: {{$phonenumber}}</p>
                                                        <p>{{$home}} , {{$apartment}}, {{$area}}, {{$emirates}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="container">
                                            <div class="main row second">
                                                <div class="inner-content-box d-flex">
                                                    <div class="col-lg-6 left-col">
                                                        <h4>Track order & submit returns</h4>
                                                        <p>You can view your order status & submit<br> return anytime by creating your account.</p>
                                                        <p>Just set a password for</p>
                                                        <p>abc@gmail.com</p>
                                                    </div>
                                                    <div class="col-lg-6 right-col">
                                                        <div class="row">
                                                            <div class="col-lg-12 col-md-12">
                                                                <div class="billing-info mb-20px">
                                                                    <label>Password</label>
                                                                    <input type="password" placeholder="Minimum 6 Characters"/>
                                                                    <button class="create-pswrd btn bg-blue" type="button">Create Password</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->
                                        <div class="container-fluid">
                                            <div class="main row third text-center" style="background:#f1f0f0">
                                                <h4>What Happens Next?</h4>
                                                <div class="inner-content-box d-flex">
                                                    <div class="col-lg-4 left-col">
                                                        <div class="next-step content-box">
                                                            <div class="img-box">
                                                                <img src="{{asset('public/website/assets/images/icons/shopping-bag.png')}}">

                                                            </div>
                                                            <h5>1- Order Placed</h5>
                                                            <!-- <p>When your order is ready to be sent, we will call to confirm the delivery details & provide an estimated time</p> -->
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 center-col">
                                                        <div class="not-complete line-bar next-step content-box">
                                                            <div class="img-box">
                                                                <img src="{{asset('public/website/assets/images/icons/shipping-truck.png')}}">
                                                            </div>
                                                            <h5>2 - Order Shipped</h5>
                                                            <!-- <p>You will recieve an SMS with an estimated time of arrival as your order leaves the warehouse.</p> -->
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 right-col">
                                                        <div class="not-complete line-bar next-step content-box">
                                                            <div class="img-box">
                                                                <img src="{{asset('public/website/assets/images/icons/home.png')}}">
                                                            </div>
                                                            <h5>3- Order Arrived</h5>
                                                            <p>Your shipment with you by 7th October.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="note"><h6>Please note that after three unsuccessful attempts to deliver your order, it will be cancelled & you will be notified accordingly.</h6>
                                            <div class="continue-btn shopping"><a class="text-center bg-blue" href="{{ url('') }}">Continue Shoping</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop