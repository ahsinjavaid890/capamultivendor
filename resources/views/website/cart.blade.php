@extends('website.layouts.master')
@section('content')
    <style>
        .list-product {
            position: relative;
            background: #fff;
            z-index: 1;
            border: 1px solid #707070;
            padding: 40px 15px 0;
            margin-bottom: 30px;
            -webkit-transition: all .3s linear;
            transition: all .3s linear;
            border-radius: 0;
        }
        .list-product:hover {
            border: 1px solid #ebebeb;
        }
    </style>
<div class="offcanvas-overlay"></div>

    <div class="breadcrumb-area" style="background:#ecebeb;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-content">
                        <ul class="nav">
                            <li><a href="index.html">Home</a></li>
                            <li><a href="#">My Cart</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- <div class="checkout-top-area">
        <div class="container">
            <div class="row">
                    <div class="col-md-6">

                    </div>
                    <div class="col-md-6">
                        <div class="helpful-links">
                            <span><a href="#">Need help?</a></span>
                            <span><a href="#"><img src="assets/images/icons/CALL.svg"/>Call Us</a></span>
                            <span><a href="#"><img src="assets/images/icons/whatsapp.svg"/>Whatsapp Us</a></span>
                        </div>
                    </div>
                </div>
        </div>
        </div>      -->
   <!-- cart area start -->
            <div class="cart-main-area mtb-60px">
                <div class="container">
                    <h3 class="cart-page-title">My Cart</h3>
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-12 col-8">
                            <div class="form-detail">
                                <form action="#" class="cart-main-area text-center">
                                    <div class="table-content table-responsive cart-table-content">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th class="product-title">Products</th>
                                                    <th>Price</th>
                                                    <th>Quantity</th>
{{--                                                    <th></th>--}}
                                                </tr>
                                            </thead>
                                            <tbody>
                                                                @php
                                                $subtotal = 0;
                                                $shippingcost = 0;
                                            @endphp
                                            @foreach($cart as $r)
                                            <tr>
                                                <td class="product-name">
                                                    <a class="product-thumb-title " href="{{url('product')}}/{{ $r['url'] }}">
                                                    <img class="img-responsive" src="{{ asset('products') }}/{{ $r['image'] }}" alt="" />
                                                    <span>{{$r['name']}}</span>

                                                    </a>
                                                    <div class="wishlish-or-remove">
                                                        <a href="javascript:void(0)"><img src="{{asset('website/assets/images/icons/like.svg')}}"/>Move to Wishlist</a>
                                                        <a href="javascript:void(0)" onclick="removecartpage({{$r['id']}})"><img src="{{asset('website/assets/images/icons/trash.svg')}}"/>Remove</a>
                                                    </div>

                                                </td>
                                                <td class="product-price-cart">AED<span class="amount" > {{$r['price']}}</span></td>
                                                <td class="product-quantity">
                                                    <div class="prodqty d-flex justify-content-center">
                                                        <div class="cart-plus-minus">
                                                            <div class="dec qtybutton" onclick="pluscartquantity({{$r['id']}})">-</div>
                                                            <input class="cart-plus-minus-box" type="text" value="1" name="qty"  maxlength="12" value="{{ $r['quantity'] }}" onChange="qtyamt()">
                                                            <div class="inc qtybutton" onclick="minuscartquantity({{$r['id']}})">+</div>
                                                        </div>
{{--                                                <span class="plus button" onclick="pluscartquantity({{$r['id']}})">--}}
{{--                                                    +--}}
{{--                                                    </span>--}}
{{--                                                    <input class="prod_input_qty " type="text" name="qty"  maxlength="12" value="{{ $r['quantity'] }}" onChange="qtyamt()"/>--}}
{{--                                                    <span class="min button" onclick="minuscartquantity({{$r['id']}})">--}}
{{--                                                    ---}}
{{--                                                    </span>--}}
                                                </div>
                                                </td>
{{--                                                <td><a href="javascript:void(0)" class="removeprod"  onclick="removecartpage({{$r['id']}})"><img src="{{asset('website/assets/images/icons/trash.svg')}}"/>Remove</a></td>--}}
                                            </tr>
                                            @php
                                                $subtotal += $r['price']*$r['quantity'];
                                            @endphp
                                            @endforeach
                                        </tbody>
                                        </table>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-4">

                             <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <img src="{{asset('website/assets/images/icons/coupon.svg')}}"/>Apply Coupon
                            </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                            <input type="text" placeholder="Enter Coupon Code">
                            </div>
                            </div>
                            </div>
                            <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <img src="{{asset('website/assets/images/icons/gift-box.svg')}}"/>Add Your Gift Note
                            </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                            <textarea style="width:100%"></textarea>
                            </div>
                            </div>
                            </div>
                            <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <img src="{{asset('website/assets/images/icons/reward.svg')}}"/>Rewards- Earn & Redeem
                            </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                            It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
                            </div>
                            </div>
                            </div>
                            <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            <img src="{{asset('website/assets/images/icons/calendar.svg')}}"/>Want to pay in 0% installments? Learn more
                            </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                            It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
                            </div>
                            </div>
                            </div>
                            </div>
                        <div class="your-cart-info">
                        <div class="cart-total">
                            <ul class="d-flex">
                                <li class="sub-total"><div class="small">Subtotal</div>Total</li>
                                <li class="total-price">{{$subtotal}} AED</li>
                            </ul>
                         </div>
                        <div class="secure-checkout"><a href="{{route('website.checkoutpage')}}">Secure Checkout</a></div>
                        </div>
                        <div class="payment-method mt-25">
                          <img src="{{asset('website/assets/images/icons/LO.svg')}}"/>
                        </div>

                        </div>
                    </div>
                </div>
            </div>
<div class="feature-area single-product-responsive mt-60px mb-30px">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-start">
                    <h2 class="section-heading">CUSTOMERS ALSO BOUGHT</h2>
                </div>
            </div>
        </div>
        <div class="feature-slider-two slider-nav-style-1 swiper-initialized swiper-horizontal swiper-pointer-events">
            <div class="feature-slider-wrapper swiper-wrapper" id="swiper-wrapper-5bef516b40686abc" aria-live="polite" style="transform: translate3d(0px, 0px, 0px);">
                <!-- Single Item -->
                <div class="feature-slider-item swiper-slide swiper-slide-active" style="width: 235px;" role="group" aria-label="1 / 17">
                    <article class="list-product">
                        <div class="img-block">
                            <a href="single-product.html" class="thumbnail">
                                <img class="first-img" src="{{ asset('products') }}/{{ $r['image'] }}" alt="" />
                            </a>
                            <div class="quick-view">
                                <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <i class="icon-magnifier icons"></i>
                                </a>
                            </div>
                        </div>
                        <ul class="product-flag"><li class="new">-5%</li></ul>
                        <span class="wishlist"><img src="{{asset('website/assets/images/icons/like.svg')}}"/></span>
                        <div class="product-decs text-center">
                            <a class="inner-link" href="shop-4-column.html"><span>Outdoor Fan</span></a>
                            <div class="pricing-meta">
                                <ul>
                                    <li class="old-price cut"><del>36.99 AED</del></li>
                                    <li class="new-price not-cut">26.99 AED</li>
                                </ul>
                            </div>
                            <div class="rating-product">
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                                <span class="rating-point">(4.5)</span>
                                <span class="pro-availbility">183 Products</span>
                            </div>
                            <div class="add-cart-btn">
                                <a href="#" class="add-to-cart btn">Add to cart</a>
                            </div>
                        </div>

                    </article>
                </div>
                <!-- Single Item -->
                <div class="feature-slider-item swiper-slide swiper-slide-next" style="width: 235px;" role="group" aria-label="2 / 17">
                    <article class="list-product">
                        <div class="img-block">
                            <a href="single-product.html" class="thumbnail">
                                <img class="first-img" src="{{ asset('products') }}/{{ $r['image'] }}" alt="" />
                            </a>
                            <div class="quick-view">
                                <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <i class="icon-magnifier icons"></i>
                                </a>
                            </div>
                        </div>
                        <ul class="product-flag"><li class="new">-5%</li></ul>
                        <span class="wishlist"><img src="{{asset('website/assets/images/icons/like.svg')}}"/></span>
                        <div class="product-decs text-center">
                            <a class="inner-link" href="shop-4-column.html"><span>Outdoor Fan</span></a>
                            <div class="pricing-meta">
                                <ul>
                                    <li class="old-price cut"><del>36.99 AED</del></li>
                                    <li class="new-price not-cut">26.99 AED</li>
                                </ul>
                            </div>
                            <div class="rating-product">
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                                <span class="rating-point">(4.5)</span>
                                <span class="pro-availbility">183 Products</span>
                            </div>
                            <div class="add-cart-btn">
                                <a href="#" class="add-to-cart btn">Add to cart</a>
                            </div>
                        </div>

                    </article>
                </div>
                <!-- Single Item -->
                <div class="feature-slider-item swiper-slide" style="width: 235px;" role="group" aria-label="3 / 17">
                    <article class="list-product">
                        <div class="img-block">
                            <a href="single-product.html" class="thumbnail">
                                <img class="first-img" src="{{ asset('products') }}/{{ $r['image'] }}" alt="" />
                            </a>
                            <div class="quick-view">
                                <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <i class="icon-magnifier icons"></i>
                                </a>
                            </div>
                        </div>
                        <ul class="product-flag"><li class="new">-5%</li></ul>
                        <span class="wishlist"><img src="{{asset('website/assets/images/icons/like.svg')}}"/></span>
                        <div class="product-decs text-center">
                            <a class="inner-link" href="shop-4-column.html"><span>Outdoor Fan</span></a>
                            <div class="pricing-meta">
                                <ul>
                                    <li class="old-price cut"><del>36.99 AED</del></li>
                                    <li class="new-price not-cut">26.99 AED</li>
                                </ul>
                            </div>
                            <div class="rating-product">
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                                <span class="rating-point">(4.5)</span>
                                <span class="pro-availbility">183 Products</span>
                            </div>
                            <div class="add-cart-btn">
                                <a href="#" class="add-to-cart btn">Add to cart</a>
                            </div>
                        </div>

                    </article>
                </div>
                <!-- Single Item -->
                <div class="feature-slider-item swiper-slide" style="width: 235px;" role="group" aria-label="3 / 17">
                    <article class="list-product">
                        <div class="img-block">
                            <a href="single-product.html" class="thumbnail">
                                <img class="first-img" src="{{ asset('products') }}/{{ $r['image'] }}" alt="" />
                            </a>
                            <div class="quick-view">
                                <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <i class="icon-magnifier icons"></i>
                                </a>
                            </div>
                        </div>
                        <ul class="product-flag"><li class="new">-5%</li></ul>
                        <span class="wishlist"><img src="{{asset('website/assets/images/icons/like.svg')}}"/></span>
                        <div class="product-decs text-center">
                            <a class="inner-link" href="shop-4-column.html"><span>Outdoor Fan</span></a>
                            <div class="pricing-meta">
                                <ul>
                                    <li class="old-price cut"><del>36.99 AED</del></li>
                                    <li class="new-price not-cut">26.99 AED</li>
                                </ul>
                            </div>
                            <div class="rating-product">
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                                <span class="rating-point">(4.5)</span>
                                <span class="pro-availbility">183 Products</span>
                            </div>
                            <div class="add-cart-btn">
                                <a href="#" class="add-to-cart btn">Add to cart</a>
                            </div>
                        </div>

                    </article>
                </div>


            </div>
            <!-- Add Arrows -->
            <div class="swiper-buttons">
                <div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide" aria-controls="swiper-wrapper-c6057306510ebca7b" aria-disabled="false"></div>
                <div class="swiper-button-prev swiper-button-disabled" tabindex="-1" role="button" aria-label="Previous slide" aria-controls="swiper-wrapper-c6057306510ebca7b" aria-disabled="true"></div>
            </div>
            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
    </div>
</div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-5 col-sm-12 col-xs-12 mb-lm-100px mb-sm-30px">
                            <!-- Swiper -->
                            <div class="swiper-container gallery-top">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <img class="img-responsive m-auto" src="{{ asset('products') }}/{{ $r['image'] }}" alt="">
                                    </div>
                                    <div class="swiper-slide">
                                        <img class="img-responsive m-auto" src="{{ asset('products') }}/{{ $r['image'] }}" alt="">
                                    </div>
                                    <div class="swiper-slide">
                                        <img class="img-responsive m-auto" src="{{ asset('products') }}/{{ $r['image'] }}" alt="">
                                    </div>
                                    <div class="swiper-slide">
                                        <img class="img-responsive m-auto" src="{{ asset('products') }}/{{ $r['image'] }}" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-container gallery-thumbs">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <img class="img-responsive m-auto" src="{{ asset('products') }}/{{ $r['image'] }}" alt="">
                                    </div>
                                    <div class="swiper-slide">
                                        <img class="img-responsive m-auto" src="{{ asset('products') }}/{{ $r['image'] }}" alt="">
                                    </div>
                                    <div class="swiper-slide">
                                        <img class="img-responsive m-auto" src="{{ asset('products') }}/{{ $r['image'] }}" alt="">
                                    </div>
                                    <div class="swiper-slide">
                                        <img class="img-responsive m-auto" src="{{ asset('products') }}/{{ $r['image'] }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 col-sm-12 col-xs-12">
                            <div class="product-details-content quickview-content">
                                <h2>Originals Kaval Windbr</h2>
                                <p class="reference">Reference:<span> demo_17</span></p>
                                <div class="pro-details-rating-wrap">
                                    <div class="rating-product">
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                    </div>
                                    <span class="read-review"><a class="reviews" href="#">Read reviews (1)</a></span>
                                </div>
                                <div class="pricing-meta">
                                    <ul>
                                        <li class="old-price not-cut">€18.90</li>
                                    </ul>
                                </div>
                                <p class="quickview-para">Lorem ipsum dolor sit amet, consectetur adipisic elit eiusm tempor incidid ut labore et dolore magna aliqua. Ut enim ad minim venialo quis nostrud exercitation ullamco</p>
                                <div class="pro-details-size-color">
                                    <div class="pro-details-color-wrap">
                                        <span>Color</span>
                                        <div class="pro-details-color-content">
                                            <ul>
                                                <li class="blue"></li>
                                                <li class="maroon active"></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="pro-details-quality">
                                    <div class="cart-plus-minus">
                                        <input class="cart-plus-minus-box" type="text" name="qtybutton" value="1" />
                                    </div>
                                    <div class="pro-details-cart btn-hover">
                                        <a href="#"> + Add To Cart</a>
                                    </div>
                                </div>
                                <div class="pro-details-wish-com">
                                    <div class="pro-details-wishlist">
                                        <a href="wishlist.html"><i class="ion-android-favorite-outline"></i>Add to wishlist</a>
                                    </div>
                                    <div class="pro-details-compare">
                                        <a href="compare.html"><i class="ion-ios-shuffle-strong"></i>Add to compare</a>
                                    </div>
                                </div>
                                <div class="pro-details-social-info">
                                    <span>Share</span>
                                    <div class="social-info">
                                        <ul>
                                            <li>
                                                <a href="#"><i class="ion-social-facebook"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="ion-social-twitter"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="ion-social-google"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="ion-social-instagram"></i></a>
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
@stop

@push('otherscript')
<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
     </script>


<script>
    function removecartpage(id)
    {
        $.ajax({
            type: "GET",
            url: app_url()+'/removecartpage/'+id,
            success: function(resp) {
                location.reload();
            }
        });
    }



    function increment(val,price){
        var n = $("#qty"+val).val();
        $("#qty"+val).val(++n);
        var qtyprod = $("#qty"+val).val();
        var form = new FormData();
        form.append('qty',qtyprod);
        form.append('cart_id',val);
        $("#cover-spin").show();
        $.ajax({
            url:"{{route('website.updateQTY')}}",
            type:"POST",
            data:form,
            cache:false,
            contentType:false,
            processData:false,
            success:function(res){
                $("#cover-spin").show();
                var js_data = JSON.parse(JSON.stringify(res));
                if(js_data.status==200){
                    location.reload();
                }else{
                    return false;
                }
            }
        })
    }

    function decreament(val,price){
        var n = $("#qty"+val).val();
        if (n >= 1) {
            $("#qty"+val).val(--n);

            var qtyprod = $("#qty"+val).val();
            var form = new FormData();
            form.append('qty',qtyprod);
            form.append('cart_id',val);
            $("#cover-spin").show();
            $.ajax({
                url:"{{route('website.updateQTY')}}",
                type:"POST",
                data:form,
                cache:false,
                contentType:false,
                processData:false,
                success:function(res){
                    $("#cover-spin").show();
                    var js_data = JSON.parse(JSON.stringify(res));
                    if(js_data.status==200){
                        location.reload();
                    }else{
                        return false;
                    }
                }
            })

        }else{
            return false;
        }
    }
</script>
@endpush
