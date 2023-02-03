@extends('website.layouts.master')
@section('content')
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
   <div id="checkout-tabs">
      <div class="row">
         <div class="checkout-tab-block order-md-first">
            <!-- Shop Top Area Start -->
            <div class="checkout-tab-top-bar" style="background:#a277b7">
               <!-- Left Side start -->
               <div class="container-fluid">
                  <div class="checkout-tab nav">
                     <a class="active">
                     <img src="{{asset('public/website/assets/images/icons/free-delivery.svg')}}">
                     <span>Shipping Address</span>
                     </a>
                     <a href="javascript:void(0)">
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
                  <div class="checkout-area mt-60px mb-40px">
                     <div class="container-fluid">
                        <div class="row">
                           <div class="col-lg-7">
                              <form method="POST" action="{{ url('continuetopayement') }}">
                                 @csrf
                                 <div class="billing-info-wrap">
                                    @if(!Auth::guard('cust')->check())
                                    <div id="loginerroralert" style="display:none;" class="alert alert-danger">Please Enter Correct Credentials</div>
                                    <div class="checkout-account mb-30px">
                                       <input class="checkout-toggle2 form-control" type="checkbox" id="an-account"/>
                                       <label for="an-account">Have an account? <span>Log In</span></label>
                                       <div class="dont-account"><strong>Don't have an account? </strong>Don't worry.Create an account & <a href="{{ url('customer-register') }}">Sign Up</a></div>
                                    </div>
                                    <div class="checkout-account-toggle open-toggle2 mb-30">
                                       <input id="loginemail" class="form-control" placeholder="Email address" type="email" />
                                       <input id="passwordlogin" class="form-control" placeholder="Password" type="password" />
                                       <span onclick="loginajax()" class="btn-hover checkout-btn" type="submit">Login Here</span>
                                    </div>
                                    @endif
                                    @if(Auth::guard('cust')->check())
                                    @if(count($address)>0)
                                    <div class="schedule-delivery checkout-radio">
                                       <h4 class="mb-25">Where You Want Us To Deliver?</h4>
                                       @foreach($address as $cust_Address)
                                       <div class="radio-button">
                                          <div class="input-label">
                                             <input required class="form-control" type="radio" name="cus_address" value="{{$cust_Address->id}}" id="{{ $cust_Address->id }}"/>
                                             <label for="{{ $cust_Address->id }}">{{$cust_Address->emirates}},{{$cust_Address->area}},{{$cust_Address->address}}</label>
                                          </div>
                                          <div class="text-right"><span>Edit</span></div>
                                       </div>
                                       @endforeach
                                    </div>
                                    @include('website.cart.customerform')
                                    @else
                                    <div class="row">
                                       <div class="col-md-12">
                                          <label class="text-danger">Before Checkout You need to Add Address</label>
                                          <a href="{{ route('website.saveaddress') }}" class="btn btn-primary form-control"><i class="fa fa-plus"></i> Add Address</a>
                                       </div>
                                    </div>
                                    @endif
                                    @else
                                    @include('website.cart.guestcheckoutform')
                                    @endif
                                 </div>
                              </form>
                           </div>
                           <div class="col-lg-5 mt-md-30px mt-lm-30px ">
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
                                                <img class="img-thumbnail" src="{{asset('public/products/'.$r['image'])}}" >
                                                <span class="order-middle-left">{{$r['name']}}</span><span class="order-price">INR {{$r['quantity']*$r['price']}}</span>
                                             </li>
                                             @endforeach
                                          </ul>
                                       </div>
                                       <div class="your-order-total">
                                          <ul>
                                             <li class="order-total">
                                                <div class="small deleiveryname">Free Delivery</div>
                                                <div class="small">Subtotal</div>
                                                Total
                                             </li>
                                             <li>
                                                <input type="hidden" value="{{$total_price}}" id="subtotal">
                                                <div class="small deliveryprice form-control">INR 0</div>
                                                <div class="small">INR {{$total_price}}</div>
                                                INR <span id="totalprice"> {{$total_price}} </span>
                                             </li>
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
                  <!-- Tab One End -->
                  <!-- Tab Two Start -->
                  <div id="payment-information" class="tab-pane">
                     <div class="checkout-area mt-60px mb-40px">
                        <div class="container-fluid">
                           <div class="row">
                              <div class="col-lg-7 main-left-col">
                                 <div id="checkout2-tabs">
                                    <div class="checkout2-tab-block order-md-first">
                                       <div class="checkout2-tab-top-bar">
                                          <!-- Left Side start -->
                                          <h2>Select Payment Method</h2>
                                          <div class="checkout2-tab flex-nowrap nav">
                                             <a href="#credit-card" data-bs-toggle="tab">
                                             <span>
                                             {{--                                                            <img src="assets/images/icons/">--}}
                                             <img src="{{asset('public/website/assets/images/icons/green-credit-card.png')}}">
                                             Credit Card</span>
                                             </a>
                                             <a href="#paypal" data-bs-toggle="tab" class="active">
                                             <span>Paypal</span>
                                             </a>
                                             <a class="" href="#on-delivery" data-bs-toggle="tab">
                                             <span>On Delivery</span>
                                             </a>
                                          </div>
                                       </div>
                                       <!-- Tabs Top Area End -->
                                       <div class="mt-35">
                                          <div class="tab-content jump">
                                             <!-- Tab One Start -->
                                             <div id="credit-card" class="tab-pane active">
                                                <div class="checkout2-area mt-30px mb-40px">
                                                   <div class="billing-info-wrap">
                                                      <div class="row">
                                                         <div class="col-md-7">
                                                            <div class="col-md-12">
                                                               <div class="billing-info mb-20px">
                                                                  <label>Name on Card *</label>
                                                                  <input type="text" class="form-control" />
                                                               </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                               <div class="billing-info mb-20px">
                                                                  <label>Card Number *</label>
                                                                  <input class="form-control" type="text" />
                                                               </div>
                                                               <div class="payment-method">
                                                                  {{--                                                                                <img src="assets/images/icons/LO.svg"/>--}}
                                                                  <img src="{{asset('public/website/assets/images/icons/LO.svg')}}">
                                                               </div>
                                                            </div>
                                                            <div class="col-md-12 card-expiry-date">
                                                               <div class="billing-info form-control mb-20px">
                                                                  <label>Expiration Date *</label>
                                                                  <select>
                                                                     <option value="">Month</option>
                                                                     <option value="0">January</option>
                                                                     <option value="1">Febraury</option>
                                                                     <option value="2">March</option>
                                                                     <option value="3">April</option>
                                                                     <option value="4">May</option>
                                                                     <option value="5">June</option>
                                                                     <option value="6">July</option>
                                                                     <option value="7">August</option>
                                                                     <option value="8">September</option>
                                                                     <option value="9">October</option>
                                                                     <option value="10">November</option>
                                                                     <option value="11">December</option>
                                                                  </select>
                                                                  <select class="form-control">
                                                                     <option value="">Year</option>
                                                                     <option value="0">2022</option>
                                                                     <option value="1">2023</option>
                                                                     <option value="2">2024</option>
                                                                     <option value="3">2025</option>
                                                                     <option value="4">2026</option>
                                                                  </select>
                                                               </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                               <div class="billing-select form-control mb-20px">
                                                                  <label>Security Code *</label>
                                                                  <select>
                                                                     <option></option>
                                                                     <option>123</option>
                                                                     <option>456</option>
                                                                     <option>789</option>
                                                                  </select>
                                                               </div>
                                                            </div>
                                                            <div class="col-md-12"><span>(3-digits on the back of your card)</span></div>
                                                         </div>
                                                         <div class="col-md-5">
                                                            <div class="credit-card-area">
                                                               {{--<img src="{{asset('public/website/assets/images/icons/payment-card.png')}}">--}}
                                                               <img src="{{asset('public/website/assets/images/icons/payment-card.png')}}">
                                                            </div>
                                                            <div class="secure-info">
                                                               {{-- <img src="{{asset('public/website/assets/images/icons/secure-sheild.png')}}">--}}
                                                               <img src="{{asset('public/website/assets/images/icons/secure-sheild.png')}}">
                                                               <p><span>100% Secure data encrytion</span>We guarantee security of every transaction</p>
                                                            </div>
                                                            <div class="secure-info">
                                                               {{--<img src="assets/images/icons/outline-thumb.png">--}}
                                                               <img src="{{asset('public/website/assets/images/icons/outline-thumb.png')}}">
                                                               <p><span>Buy with confidence!</span>Free easy returns up to 30 days. <a href="#">Learn more</a></p>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <hr>
                                                      <div class="continue-btn order-place"><a href="#">Place order</a></div>
                                                   </div>
                                                </div>
                                             </div>
                                             <!-- Tab Two End -->
                                             <!-- Tab One Start -->
                                             <div id="paypal" class="tab-pane">
                                                <div class="checkout2-area mt-30px mb-40px">
                                                   <h1>Paypal</h1>
                                                </div>
                                             </div>
                                             <!-- Tab Two End -->
                                             <!-- Tab Three Start -->
                                             <div id="on-delivery" class="tab-pane">
                                                <div class="checkout2-area mt-30px mb-40px">
                                                   <h1>On Delivery</h1>
                                                </div>
                                             </div>
                                             <!-- Tab Three End -->
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-lg-5 mt-md-30px mt-lm-30px ">
                                 <div class="your-order-area delivery-address mb-5">
                                    <div class="your-order-wrap gray-bg-4">
                                       <div class="your-order-product-info">
                                          <div class="your-order-top">
                                             <ul>
                                                <li>Delivery Address</li>
                                                <li class="edit-order"><a href="#">Edit</a></li>
                                             </ul>
                                          </div>
                                          <div class="your-order-middle">
                                             <p>John Smith</p>
                                             <p>+971-123456789</p>
                                             <p>House no 321, Port Saeed Business Village.</p>
                                             <p>UAE</p>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="your-order-area">
                                    <div class="your-order-wrap gray-bg-4">
                                       <div class="your-order-product-info">
                                          <div class="your-order-top">
                                             <ul>
                                                <li>Order Summary</li>
                                                <li class="edit-order"><a href="#">Edit</a></li>
                                             </ul>
                                          </div>
                                          <div class="your-order-middle">
                                             <ul>
                                                <li>{{--                                                        <img src="assets/images/product-image/1.jpg"/>--}}
                                                   <img src="{{asset('public/website/assets/images/product-image/1.jpg')}}" >
                                                   <span class="order-middle-left">Large Fairy Light -10 X 10 Feet - Green Color - With Multi Function Box</span><span class="order-price">INR 529.00</span>
                                                </li>
                                                <li>
                                                   {{--                                                        <img src="assets/images/product-image/17.jpg"/>--}}
                                                   <img src="{{asset('public/website/assets/images/product-image/17.jpg')}}" >
                                                   <span class="order-middle-left">Large Fairy Light -10 X 10 Feet - Green Color - With Multi Function Box</span> <span class="order-price">INR 529.00</span>
                                                </li>
                                             </ul>
                                          </div>
                                          <div class="your-order-total">
                                             <ul>
                                                <li class="order-total">
                                                   <div class="small">Subtotal</div>
                                                   Total
                                                </li>
                                                <li>
                                                   <div class="small">INR 1029.00</div>
                                                   INR 1029.00
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- Tab Two End -->
                  <!-- Tab Three Start -->
                  <div id="thank-you" class="tab-pane">
                     <div class="checkout-area mt-60px mb-40px">
                        <div class="container-fluid order-successfully-placed">
                           <div class="thank-you-title content-box text-center">
                              {{--                                <img src="{{ asset('public/website/assets/images/icons/check.png')}}" class="check">--}}
                              <img src="{{asset('public/website/assets/images/icons/check.png')}}" class="check">
                              <h1>Thank You</h1>
                              <h3>For shopping At Oben!</h3>
                           </div>
                           <div class="container-fluid">
                              <div class="main row first">
                                 <div class="head-text" style="background:#f1f0f0">
                                    <h4>
                                       <img src="{{asset('public/website/assets/images/icons/outline-email.png')}}">
                                       {{--                                            <img src="assets/images/icons/outline-email.png">--}}
                                       An email confirmation has been sent to abc@gmail.com
                                    </h4>
                                 </div>
                                 <div class="inner-content-box d-flex">
                                    <div class="col-lg-6 left-col">
                                       <h4>Your order ID</h4>
                                       <h4>Estimated Delivery</h4>
                                       <h4>Delivery Address</h4>
                                    </div>
                                    <div class="col-lg-6 right-col">
                                       <p>POU1234568TRV679</p>
                                       <p>Your shipment will be with you by 7th Oct.</p>
                                       <p>JOHN SMITH. Phone Number: +9712345679</p>
                                       <p>House no: 321 Port Saeed, Business Village,AE</p>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="container-fluid">
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
                                                <input type="password" class="form-control" placeholder="Minimum 6 Characters"/>
                                                <button class="create-pswrd btn bg-blue" type="button">Create Password</button>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="container-fluid">
                              <div class="main row third text-center" style="background:#f1f0f0">
                                 <h4>What Happens Next?</h4>
                                 <div class="inner-content-box d-flex">
                                    <div class="col-lg-4 left-col">
                                       <div class="next-step content-box">
                                          <div class="img-box">
                                             {{--                                                    <img src="assets/images/icons/shopping-bag.png"/>--}}
                                             <img src="{{asset('public/website/assets/images/icons/shopping-bag.png')}}">
                                          </div>
                                          <h5>1- Order Placed</h5>
                                          <p>When your order is ready to be sent, we will call to confirm the delivery details & provide an estimated time</p>
                                       </div>
                                    </div>
                                    <div class="col-lg-4 center-col">
                                       <div class="complete line-bar next-step content-box">
                                          <div class="img-box">
                                             {{--                                                    <img src="assets/images/icons/shipping-truck.png"/>--}}
                                             <img src="{{asset('public/website/assets/images/icons/shipping-truck.png')}}">
                                          </div>
                                          <h5>2 - Order Shipped</h5>
                                          <p>You will recieve an SMS with an estimated time of arrival as your order leaves the warehouse.</p>
                                       </div>
                                    </div>
                                    <div class="col-lg-4 right-col">
                                       <div class="not-complete line-bar next-step content-box">
                                          <div class="img-box">
                                             {{--                                                    <img src="assets/images/icons/home.png"/>--}}
                                             <img src="{{asset('public/website/assets/images/icons/home.png')}}">
                                          </div>
                                          <h5>3- Order Arrived</h5>
                                          <p>Your shipment with you by 7th October.</p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="note">
                              <h6>Please note that after three unsuccessful attempts to deliver your order, it will be cancelled & you will be notified accordingly.</h6>
                              <div class="continue-btn shopping"><a class="text-center bg-blue" href="#">Continue Shoping</a></div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- Tab Three End -->
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@stop
@push('otherstyle')
<style>
   .custom_billing-info input{
   background: transparent none repeat scroll 0 0;
   border: 1px solid #707070;
   color: #666;
   font-size: 14px;
   padding-left: 20px;
   padding-right: 10px;
   width: 9%;
   outline: 0;
   height: 23px;
   }
   .custom_billing-info{
   display:inline-flex;
   width:100%;
   margin-top:10px;
   }
   .savedaddreess{
   border:1px solid gray;
   padding:10px;
   margin-bottom:10px;
   }
</style>
@endpush
@push('otherscript')
<script>
   $.ajaxSetup({
     headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     }
   });
</script>
<script>
   function loginajax(){
       var loginpassword = $("#passwordlogin").val();
       var loginemail = $("#loginemail").val();
       var form = new FormData();
       form.append('email',loginemail);
       form.append('password',loginpassword);
       form.append('type','checkout');
       $("#cover-spin").show();
       $.ajax({
           url:"{{route('website.login_process')}}",
           type:"POST",
           data:form,
           cache:false,
           contentType:false,
           processData:false,
           success:function(res){
               $("#cover-spin").hide();
               var js_data = JSON.parse(JSON.stringify(res));
               if(js_data == 1)
               {
                   location.reload();
               }else{
                   $('#loginerroralert').show();
                   return false;
               }
           }
       })
   }
</script>
<script async
   src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCPraI53LsplwhkIsXED0pMxPniz3YKYfg&libraries=places&callback=initMap"></script>
<script>
   function initMap(){
       const center = { lat: 50.064192, lng: -130.605469 };
   // Create a bounding box with sides ~10km away from the center point
       const defaultBounds = {
           north: center.lat + 0.1,
           south: center.lat - 0.1,
           east: center.lng + 0.1,
           west: center.lng - 0.1,
       };
       const input = document.getElementById("personal_companyadd");
       const options = {
           bounds: defaultBounds,
           componentRestrictions: { country: "ae" },
           fields: ["place_id", "geometry", "name"],
           strictBounds: false,
           types: ["establishment"],
       };
       const autocomplete = new google.maps.places.Autocomplete(input, options);
   
   }
   
   
</script>
<script>
   $("input.cus_address").click(function() {
       $('input.cus_address').not(this).prop('checked', false);
   });
   
   $("input.payment_mode").click(function() {
       $('input.payment_mode').not(this).prop('checked', false);
   });
</script>
@endpush