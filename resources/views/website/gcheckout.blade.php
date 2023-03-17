@extends('website.layouts.master')
@section('content')
<div id="checkout">
        <div class="checkout-top-area">
        <div class="container">
            <div class="row">
                    <div class="col-md-6">
                        <div class="back-to-cart"><a href="{{route('website.cartpage')}}"><img src="{{asset('public/website/assets/images/icons/left-arrow.svg')}}"/>Back</a></div>
                    </div>
                    <div class="col-md-6">
                        <div class="helpful-links">
                            <span><a class="btn btn-block" href="javascript:void(0)">Need help?</a></span>
                            <span><a class="btn btn-block" href="javascript:void(0)"><img src="{{asset('public/website/assets/images/icons/CALL.svg')}}"/>Call Us</a></span>
                            <span><a class="btn btn-block" href="javascript:void(0)"><img src="{{asset('public/website/assets/images/icons/whatsapp.svg')}}"/>Whatsapp Us</a></span>
                        </div>
                    </div>
                </div>
        </div>
        </div>    
            
        <div id="checkout-tabs">
                        <div class="row">
                          <div class="checkout-tab-block order-md-first">
                            <!-- Shop Top Area Start -->
                            <div class="checkout-tab-top-bar" style="background:#000">
                                <!-- Left Side start -->
                                <div class="container">
                                <div class="checkout-tab nav">
                                    <a href="#shipping-address" data-bs-toggle="tab" class="active">
                                        <img src="{{asset('public/website/assets/images/icons/free-delivery.svg')}}">
                                        <span>Shipping Address</span>
                                    </a>
                                    <!-- <a class="" href="#payment-information" data-bs-toggle="tab" id="paymentopt">
                                        <img src="{{asset('public/website/assets/images/icons/credit-card.svg')}}">
                                        <span>Payment Information</span>
                                    </a>
                                    <a class="" href="#thank-you" data-bs-toggle="tab">
                                        <img src="{{asset('public/website/assets/images/icons/thumbs-up-hand-symbol.svg')}}">
                                        <span>Thank You</span>
                                    </a> -->
                                </div>
                                </div>        
                            </div>
                            <!-- Checkout Tabs Top Area End -->

                            <!-- Checkout Tabs Bottom Area Start -->
                            <div class="tab-bottom-area mt-35" style="background-color: #f2f2f2;">
                                <!-- Checkout Tabs Content Start -->
                                <div class="tab-content jump">
                                    <!-- Tab One Start -->
                                <div id="shipping-address" class="tab-pane active">
                                    <div class="checkout-area mt-60px mb-40px">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-lg-7">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="billing-info-wrap">
                                                            <div class="row" id="custaddress" > 
                                                               
                                                                <div class="col-lg-6 col-md-6">
                                                                    <div class="billing-info mb-20px">
                                                                        <label>First Name *</label>
                                                                        <input type="text" name="fname" id="fname" placeholder="e.g.John" class="form-control" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-md-6">
                                                                    <div class="billing-info mb-20px">
                                                                        <label>Last Name *</label>
                                                                        <input type="text" name="lname" id="lname" placeholder="e.g.Smith" class="form-control" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div class="billing-info mb-20px">
                                                                        <label>Email Address *</label>
                                                                        <input type="text" name="gemail" id="gemail" placeholder="e.g.mail@example.com" class="form-control" />
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="col-lg-12">
                                                                    <div class="billing-info mb-20px">
                                                                        <label>Phone Number *</label>
                                                                        <input type="tel" name="gmobile" id="gmobile" placeholder="e.g.501234567" class="form-control" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div class="billing-select mb-20px">
                                                                        <label>Emirates *</label>
                                                                        <select name="emirates" id="emirates" class="shippingadd form-control">
                                                                            <option value="0">-select emirates-</option>
                                                                            <option>Dubai</option>
                                                                            <option>Abu Dhabi</option>
                                                                            <option>Sharjah</option>
                                                                            <option>Ajman</option>
                                                                            <option>Tarif</option>
                                                                            <option>Dhayd</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div class="billing-select mb-20px">
                                                                        <label>Area *</label>
                                                                        <select name="area" class="shippingadd form-control" id="shiparea">
                                                                            <option value="0">-select area-</option>
                                                                            <option>Dubai</option>
                                                                            <option>Abu Dhabi</option>
                                                                            <option>Sharjah</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="col-lg-12">
                                                                    <div class="billing-select mb-20px">
                                                                        <label>Delivery Address*</label>
                                                                        <textarea name="address" rows="3" name="delivery_Add" id="delivery_Add" class="shippingadd form-control" placeholder="Building name/street"></textarea>
                                                                           
                                                                       
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div class="billing-info google-map mb-20px">
                                                                        <h5>OR</h5>
                                                                        <label>Pick Your Location Through Google Map</label>
                                                                        <input type="text" id="personal_companyadd" class="form-control" />
                                                                        <img src="{{asset('public/website/assets/images/icons/location-pin.svg')}}"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12 billing-select">
                                                                    <label>Payment Option*</label>
                                                                    <div class="savedaddreess">
                                                                    <h4>Payment Mode</h4><br>
                                                                    <div class="col-lg-12">
                                                                    <div class="custom_billing-info mb-20px">
                                                                            <input type="checkbox" name="payment_mode" class="payment_mode" value="1">
                                                                            <label>Online Payment (Stripe)</label>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-lg-12">
                                                                    <div class="custom_billing-info mb-20px">
                                                                            <input type="checkbox" name="payment_mode" class="payment_mode" value="2">
                                                                            <label>Cash on Delivery </label>
                                                                        </div>
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                                <input type="hidden" name="cust_address_id" id="cust_address_id"/>
                                                                <div class="btn btn-block continue-btn">
                                                                <a href="javascript:void(0)" class="saveadd">Place order</a>
                                                               
                                                            </div>

                                                            </div>
                                                        </div>
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
                                                                                <li class="edit-order"><a href="{{route('website.cartpage')}}">Edit</a></li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="your-order-middle">
                                                                            <ul>
                                                                                <?php $total_price = 0; ?>
                                                                                @foreach($cartproduct as $cartprod)
                                                                                <?php $total_price += $qty*$cartprod->sale_price; ?>
                                                                                <li><img src="{{asset('public/products/'.$cartprod->featured_img)}}"/>
                                                                                    <span class="order-middle-left">{{$cartprod->product_title}}</span><span class="order-price">AED {{$qty*$cartprod->sale_price}}</span>
                                                                                </li>
                                                                                <input type="hidden" name="cart_id" class="cartid" value="{{$cartprod->crtid}}" />
                                                                                <input type="hidden" name="prod_id" class="prod_id" value="{{$cartprod->id}}" />
                                                                                <input type="hidden" name="qty" class="qty" value="{{$qty}}" />
                                                                                <input  type="hidden" name="seller" class="seller_id" value="{{$cartprod->added_by_seller}}" />
                                                                                @endforeach
                                                                               
                                                                            </ul>
                                                                        </div>
                                                                        <div class="your-order-total">
                                                                            <input type="hidden" name="amount" id="totalamount" value="{{$total_price}}" />
                                                                            <ul>
                                                                                <li class="order-total"><div class="small">Subtotal</div>Total</li>
                                                                                <li><div class="small">AED {{$total_price}}</div>AED {{$total_price}}</li>
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
                                    <!-- Tab One End -->
                                    
                                    <!-- Tab Two Start -->
                                    
                                </div>        
                            </div>
                                    <!-- Tab Two End -->
                                    
                                    <!-- Tab Three Start -->
                                    <!-- <div id="thank-you" class="tab-pane">
                                        <div class="checkout-area mt-60px mb-40px">
                                        <div class="container order-successfully-placed">
                                            <div class="thank-you-title content-box text-center">
                                                <img src="assets/images/icons/check.png" class="check">
                                                <h1>Thank You</h1>
                                                <h3>For shopping At Oben!</h3>
                                            </div>
                                            <div class="container">
                                                <div class="main row first">
                                                    <div class="head-text" style="background:#f1f0f0"><h4><img src="assets/images/icons/outline-email.png">An email confirmation has been sent to abc@gmail.com</h4></div>
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
                                            <div class="container">
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
                                            </div>
                                            <div class="container">
                                                <div class="main row third text-center" style="background:#f1f0f0">
                                                    <h4>What Happens Next?</h4>
                                                    <div class="inner-content-box d-flex">
                                                    <div class="col-lg-4 left-col">
                                                        <div class="next-step content-box">
                                                            <div class="img-box"><img src="assets/images/icons/shopping-bag.png"/></div>
                                                            <h5>1- Order Placed</h5>
                                                            <p>When your order is ready to be sent, we will call to confirm the delivery details & provide an estimated time</p>
                                                        </div>    
                                                    </div>
                                                    <div class="col-lg-4 center-col">
                                                        <div class="complete line-bar next-step content-box">
                                                            <div class="img-box"><img src="assets/images/icons/shipping-truck.png"/></div>
                                                            <h5>2 - Order Shipped</h5>
                                                            <p>You will recieve an SMS with an estimated time of arrival as your order leaves the warehouse.</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 right-col">
                                                        <div class="not-complete line-bar next-step content-box">
                                                            <div class="img-box"><img src="assets/images/icons/home.png"/></div>
                                                            <h5>3- Order Arrived</h5>
                                                            <p>Your shipment with you by 7th October.</p>
                                                        </div>
                                                    </div>
                                                    </div>    
                                                </div>
                                            </div>    
                                            <div class="note"><h6>Please note that after three unsuccessful attempts to deliver your order, it will be cancelled & you will be notified accordingly.</h6>
                                                <div class="continue-btn shopping"><a class="text-center bg-blue" href="#">Continue Shoping</a></div>
                                            </div>
                                        </div>
                                        </div>        
                                    </div> -->
                                    <!-- Tab Three End -->
                                </div>
                                <!-- Checkout Tabs Content End -->
                            </div>
                            <!-- Checkout Tabs Bottom Area End -->
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
            padding:20px;
            margin-bottom:10px;
        }
    </style>
@endpush

@push('otherscript')
<script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCPraI53LsplwhkIsXED0pMxPniz3YKYfg&libraries=places&callback=initMap">
</script>

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

<script>
    $("a.saveadd").click(function(e){
        e.preventDefault();
        var cust_address = '';
        var isValid = true;
        
        $("input.cus_address").each(function(){
            if($(this).is(":checked")){
                cust_address = $(this).val();
            }
        });
        if(cust_address==''){
            
            $("select.shippingadd").each(function(){
                if($(this).val()==0){
                    isValid = false;
                    $(this).css({
                        "border": "1px solid red",
                            "background": "#FFCECE",   
                    })
                }else{
                    isValid = true;
                    $(this).css({
                        "border": "",
                            "background": "",     
                    })
                }
            }) 

            $("input.payment_mode").each(function(){
                if($(this).prop('checked')!=true){
                    isValid = false;
                    $(this).css({
                        "border": "1px solid red",
                            "background": "#FFCECE",   
                    })
                }else{
                    isValid = true;
                    $(this).css({
                        "border": "",
                            "background": "",     
                    })
                }
            })
         
            $("textarea.shippingadd").each(function(){
                if($(this).val()==''){
                    isValid = false;
                    $(this).css({
                        "border": "1px solid red",
                            "background": "#FFCECE",   
                    })
                }else{
                    isValid = true;
                    $(this).css({
                        "border": "",
                            "background": "",     
                    })
                }
            })
            console.log(isValid)
            if(isValid!=true){                
                e.preventDefault();
                return false;
                
            }else{
                
                e.preventDefault();
                var emirates = $("#emirates").val();
                var shiparea = $("#shiparea").val();
                var delivery_Add = $("#delivery_Add").val();
                var name = $("#fname").val()+' '+$("#lname").val();
                var gemail = $("#gemail").val();
                var gmobile = $("#gmobile").val();
                var form = new FormData();
                form.append('emirates',emirates);
                form.append('shiparea',shiparea);
                form.append('delivery_Add',delivery_Add);
                form.append('gemail',gemail);
                form.append('name',name);
                form.append('gmobile',gmobile);
                $("#cover-spin").show();
                $.ajax({
                    url:"{{route('website.guestUserDetails')}}",
                    type:"POST",
                    data:form,
                    cache:false,
                    contentType:false,
                    processData:false,
                    success:function(res){
                        var js_data = JSON.parse(JSON.stringify(res));
                        $("#cover-spin").hide();
                        if(js_data.status==200){
                            //$('#paymentopt')[0].click();
                            $("#cust_address_id").val(js_data.msg);
                            placeorder();
                            console.log(js_data.msg);
                        }else{
                            console.log('error');
                        }
                    }
                })
            }
        }else{
           
            

            var payment_mode = $("input.payment_mode:checked").val();
                    
           
            
            if(payment_mode!=''){
                $("#cover-spin").show();
            //$('#paymentopt')[0].click();
            $("#cust_address_id").val(cust_address);
            console.log(cust_address);
            placeorder();
            }else{
                e.preventDefault();
                return false;
            }
        }
    })
</script>

<script src = "https://checkout.stripe.com/checkout.js" > </script> 
<script>
function stripePay(amount,order_id) {
  
    var handler = StripeCheckout.configure({
        key: 'pk_test_51Ixa8eDW7P9bN5xryCA6eKBVeO9Wk7npmovyDnbHTTAXQ7tzAhRvzwecsek84pZ37afwOee3hghhlphpnaZ1InXk00B17tscwd', // your publisher key id
        locale: 'auto',
        token: function(token) {
            // You can access the token ID with `token.id`.
            // Get the token ID to your server-side code for use.
            console.log('Token Created!!');
            //console.log(token)
            $('#res_token').html(JSON.stringify(token));
            $.ajax({
                url: "{{route('website.StripePayment')}}",
                method: 'POST',
                data: {
                    stripeToken: token.id,
                    amount: amount                    
                },
                success: (response) => {
                  $("#cover-spin").show(); 
                    //console.log(response)
                    var js_data = JSON.parse(JSON.stringify(response)); 
                    createTransaction(amount,order_id,js_data.msg.id);                  
                   console.log(js_data.msg) ;
                },
                error: (error) => {
                    console.log(error);
                    alert('Oops! Something went wrong')
                }
            })
        }
    });
    handler.open({
        image:"{{asset('seller/assets/img/oben-01__logo.png')}}",
        name: 'oben multivendor',        
        description: 'product checkout',
        amount: amount*100,
        currency:'AED'
    });

} 


</script>
<script>
    function placeorder(){
        var totalamt = $("#totalamount").val();
        var prodid = [];
        var qty = [];
        
        $("input.prod_id").each(function(){
            var id = $(this).val();
            prodid.push(id);
        });
        $("input.qty").each(function(){
            var prodqty = $(this).val();
            qty.push(prodqty);
        });

        var seller_id = [];
        $("input.seller_id").each(function(){
            var seller = $(this).val();
            seller_id.push(seller);
        })
        var cust_address_id = $("#cust_address_id").val();
        var payment_mode = $("input.payment_mode:checked").val();
       
            var form = new FormData();
            form.append('prodid',prodid);
            form.append('qty',qty);
            form.append('cust_address_id',cust_address_id);
            form.append('payment_mode',payment_mode);
            form.append('seller_id',seller_id);
            $.ajax({
                url:"{{route('website.guestplaceOrder')}}",
                type:"POST",
                data:form,
                cache:false,
                contentType:false,
                processData:false,
                success:function(res){
                    var js_data = JSON.parse(JSON.stringify(res));
                    $("#cover-spin").hide();
                    if(js_data.status==200){
                        console.log(js_data.msg);
                        if(payment_mode==1){
                            stripePay(totalamt,js_data.msg);
                        }else if(payment_mode==2){
                            console.log(js_data.msg);
                           createTransaction(totalamt,js_data.msg,'COD');
                        }
                    }else{
                        console.log('error');
                    }
                    

                }
            })
        


    }


    function createTransaction(amount,order,payment_id){
        var form = new FormData();
        form.append('amount',amount);
        form.append('order',order);
        form.append('payment_id',payment_id);
        $.ajax({
            url:"{{route('website.guestordertransaction')}}",
            type:"POST",
            data:form,
            cache:false,
            contentType:false,
            processData:false,
            success:function(res){
                location.href='/thankyou';
                var js_data = JSON.parse(JSON.stringify(res));
                console.log(js_data.msg);
            }
        })

    }
</script>


@endpush