@extends('website.layouts.master')
@section('content')
<style type="text/css">
    .hide{
        display: none;
    }
</style>

<div id="checkout">
<div class="checkout-top-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="back-to-cart"><a href="{{route('website.cartpage')}}"><img src="{{asset('public/website/assets/images/icons/left-arrow.svg')}}"/>Back</a></div>
            </div>
            <div class="col-md-6">
                <div class="helpful-links">
                    <span><a href="javascript:void(0)" class="btn btn-primary">Need help?</a></span>
                    <span><a href="javascript:void(0)" class="btn btn-primary"><i class="fa fa-phone-square mx-2"></i>Call Us</a></span>
                    <span><a href="javascript:void(0)"  class="btn btn-primary"><i class="fa fa-phone mx-2"></i> Whatsapp Us</a></span>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="checkout-tabs" style="background-color: #F2F2F2 !important;">
    <div class="row">
      <div class="checkout-tab-block order-md-first">
        <!-- Shop Top Area Start -->
        <div class="checkout-tab-top-bar" style="background:#a277b7">
            <!-- Left Side start -->
            <div class="container">
                <div class="checkout-tab nav">
                    <a href="javascript:void(0)">
                        <img src="{{asset('public/website/assets/images/icons/free-delivery.svg')}}">
                        <span>Shipping Address</span>
                    </a>
                    <a class="active" href="javascript:void(0)">
                        <img src="{{asset('public/website/assets/images/icons/credit-card.svg')}}">
                        <span>Payment Information</span>
                    </a>
                    <a href="javascript:void(0)">
                        <img src="{{asset('public/website/assets/images/icons/thumbs-up-hand-symbol.svg')}}">
                        <span>Thank You</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="tab-bottom-area mt-35">
            <!-- Checkout Tabs Content Start -->
            <div class="tab-content jump">
                <!-- Tab One Start -->
            <div id="shipping-address" class="tab-pane active">
                <div class="checkout-area mt-60px mb-40px">
                    <div class="container">
                        <div class="row savedaddreess">
                            <div class="col-lg-7">
                                <div class="card">
                                    <div class="card-body">
                                        <form role="form"
                                                action="{{ route('website.stripe.post') }}"
                                                method="post"
                                                class="require-validation"
                                                data-cc-on-file="false"
                                                data-stripe-publishable-key="{{Cmf::get_site_settings_by_colum_name('published_stripe')}}"
                                                id="payment-form">
                                                @csrf
                                                <div class='form-group'>
                                                      <label class='control-label'>Name on Card</label> 
                                                      <input class='form-control' size='4' type='text'>
                                                </div><br>
                                                <input type="hidden" value="{{ $order->id }}" name="orderid">
                                                <div class='form-group'>
                                                      <label class='control-label'>Card Number</label> 
                                                      <input autocomplete='off' id="cc" class='form-control card-number' size='20' type='text'>
                                                </div><br>
                                                <div class='form-row row'>
                                                   <div class='col-xs-12 col-md-4 form-group cvc required'>
                                                      <label class='control-label'>CVC</label> <input id="cvv" autocomplete='off'
                                                         class='form-control card-cvc' placeholder='ex. 311' maxlength="4"
                                                         type='text'>
                                                   </div>
                                                   <div class='col-xs-12 col-md-4 form-group expiration required'>
                                                      <label class='control-label'>Expiration Month</label> <input
                                                         class='form-control card-expiry-month' maxlength="2" id="month" placeholder='MM' size='2'
                                                         type='text'>
                                                   </div>
                                                   <div class='col-xs-12 col-md-4 form-group expiration required'>
                                                      <label class='control-label'>Expiration Year</label> <input
                                                         class='form-control card-expiry-year' maxlength="4" id="year" placeholder='YYYY' size='4'
                                                         type='text'>
                                                   </div>
                                                </div><br>
                                                <div class='form-row row'>
                                                   <div class='col-md-12 error form-group hide'>
                                                      <div class='alert-danger alert'>Please correct the errors and try
                                                         again.
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="row">
                                                   <div class="form-group place-order pt-6">
                                                        <button type="submit" class="btn btn-dark btn-block btn-rounded">Order Complete</button>
                                                    </div>
                                                </div>
                                             </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 mt-md-30px mt-lm-30px ">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="your-order-area">
                                            <div class="your-order-wrap gray-bg-4">
                                                <div class="your-order-product-info">
                                                    <div class="your-order-top">
                                                        <ul>
                                                            <li>Order Summary</li>
                                                            <li class="edit-order"><a href="{{ url('cart') }}">Edit</a></li>
                                                        </ul>
                                                    </div>
                                                    <?php $total_price = 0; ?>
                                                    <div class="your-order-middle">
                                                        <ul>
                                                            @foreach($cart as $r)
                                                            <?php $total_price += $r['quantity']*$r['price']; ?>
                                                            <li>
                                                                <img src="{{asset('public/products/'.$r['image'])}}" >
                                                                <span class="order-middle-left">{{$r['name']}}</span><span class="order-price">INR {{$r['quantity']*$r['price']}}</span>
                                                            </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                    <div class="your-order-total">
                                                        <ul>
                                                            <li class="order-total">
                                                                @if($order->delivery == 'free')
                                                                <div class="small deleiveryname">Free Delivery</div>
                                                                @else
                                                                <div class="small deleiveryname">Express Delivery</div>
                                                                @endif
                                                                <div class="small">Subtotal</div>
                                                                
                                                                Total
                                                            </li>
                                                            <li>
                                                                <input type="hidden" value="{{$total_price}}" id="subtotal">
                                                                @if($order->delivery == 'free')
                                                                <div class="small deliveryprice">INR 0</div>
                                                                @else
                                                                <div class="small deliveryprice">INR 30</div>
                                                                @endif
                                                                <div class="small">INR {{$total_price}}</div>
                                                                INR <span id="totalprice">@if($order->delivery == 'free') {{$total_price}} @else  {{$total_price+30}} @endif</span></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="payment-method mt-25">
                                                <img src="{{asset('public/website/assets/images/icons/LO.svg')}}"/>
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
        </div>
            </div>
        </div>
    </div>
</div>

@stop

@push('otherscript')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.all.min.js"></script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript" src="{{ asset('public/website/assets/js/checkout.js') }}"></script>

@endpush