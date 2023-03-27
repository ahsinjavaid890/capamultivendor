@extends('website.layouts.master')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-9">
            <div class="product-details-area">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-12">
                        <div class="product-details-img product-details-tab">
                            <div style="height:400px;" class="zoompro-wrap zoompro-2">
                                <div style="height:400px;" class="zoompro-border zoompro-span">
                                <!-- data-zoom-image="{{asset('products/1671975997.jpg')}}" -->
                                    <img style="width: 100%;height: 100%;" class="zoompro zoombox2" src="{{asset('public/products/'.$products->featured_img)}}" data-zoom-image="{{asset('public/products/'.$products->featured_img)}}" alt="">
                                </div>
                            </div>
                            <div id="gallery" class="product-dec-slider-2 swiper-container swiper-initialized swiper-horizontal swiper-pointer-events">
                                <div class="swiper-wrapper" id="swiper-wrapper-3ba1210621ed60bac" aria-live="polite" style="transform: translate3d(0px, 0px, 0px);">
                                    <div class="swiper-slide swiper-slide-active" role="group">
                                        <a class="active" data-image="{{asset('public/products/'.$products->featured_img)}}" data-zoom-image="{{asset('public/products/'.$products->featured_img)}}">
                                            <img class="img-responsive" src="{{asset('public/products/'.$products->featured_img)}}" alt="">
                                        </a>
                                    </div>
                                   @foreach(DB::table('productgallerimages')->where('product_id' , $products->id)->get() as $gimg)
                                    <div class="swiper-slide swiper-slide-active" role="group">
                                        <a class="active" data-image="{{asset('public/images/'.$gimg->image)}}" data-zoom-image="{{asset('public/images/'.$gimg->image)}}">
                                            <img class="img-responsive" src="{{asset('public/images/'.$gimg->image)}}" alt="">
                                        </a>
                                    </div>
                                    @endforeach                                
                                </div>
                            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-6 col-md-12">
                        <div class="product-details-content">
                            <h2>{{$products->product_title}}</h2>
                            
                            <div class="pricing-meta">
                                <ul>
                                    <li>Price : </li>
                                    <li class="amount"> <ins class="sale-price">INR {{$products->prod_price}}</ins></li>
                                </ul>
                            </div>
                            <div class="pro-details-list">
                                <p>{{$products->short_desc}}</p>
                            </div>
                            <div class="products-use mb-3">
                                <div class="product-use-basic">
                                    <h2>Product We Use In Regular</h2>
                                        <ul class="mt-3">
                                           <li>Tropolite, </li> 
                                           <li>Pillsbury, </li>
                                           <li>Morde, </li>
                                           <li>Mala, </li>
                                           <li>Delmonte, </li>
                                        </ul>
                                </div>
                                <div class="product-use-premium" style="display: none;">
                                    <h2>Product We Use In Premium</h2>
                                        <ul class="mt-3"> 
                                           <li>Pristine, </li>
                                           <li>Tropolite, </li>
                                           <li>Puratos, </li>
                                           <li>Vian Huten, </li>
                                           <li>Morde, </li>
                                        </ul>
                                </div>
                            </div>
                            <form action="{{route('website.guestCheckout')}}" method="POST" id="productdetailFrm">
                                @csrf
                                <input type="hidden" name="product_id" value="{{$products->id}}" id="product_id"/>
                                @if(Auth::guard('cust')->check())
                                <input type="hidden" name="cust_id" value="{{Auth::guard('cust')->user()->id}}" id="cust_id"/>
                                @endif
                            <div class="pro-options">
                                @foreach($productsattrs as $prodcut_attribute)
                                <div class="pro-variants mt-0px">
                                <label>{{$prodcut_attribute->varientName}}</label>
                                    <select class="form-select" name="attri" id="attri">
                                      <option value="0">Choose an option</option>
                                   
                                    </select>
                                </div>
                                @endforeach

                                <div class="buttonprices d-flex">
                                    <span onclick="selectprice('basicprice' , {{$products->prod_price}})" id="basicprice" class="btn btn-price btn-price-selected">Regular (INR {{$products->prod_price}})</span>
                                    <span onclick="selectprice('premiumprice' , {{$products->sale_price}})" id="premiumprice" style="margin-left:10px;" class="btn btn-price">Premium (INR {{$products->sale_price}})</span>

                                    <input type="hidden" id="pricetype" value="basicprice" name="">
                                </div>
                            </form>
                            </div>
                            <div class="">
                                @if($products->refund_return==1)
                                Refund available
                                @else
                                Refund not available
                                @endif
                            </div>
                            <div class="pro-details-buttons">
                                <div class=" pro-details-cart btn-hover">
                                    <a class="addtocartbutton{{ $products->id }}" href="javascript:void(0)" onclick="addtocart({{$products->id}})">Add To Cart </a>
                                </div>
                                @if(Auth::guard('cust')->check())
                                @else
                                <div class=" pro-details-cart btn-hover">
                                    <a href="javascript:void(0)" id="proceedAsGuest">Proceed as guest</a>
                                </div>
                                @endif
                                <div class="">
                                @if(Auth::guard('cust')->check())
                                <form action="{{route('website.add_to_wishlist')}}" method="POST" id="wishlistFrm">
                                    @csrf
                                    <input type="hidden" name="prod_id" value="{{$products->id}}" />
                                <div class="pro-details-cart btn-hover">
                                    <a href="javascript:void(0)" id="addwishlist">Add in Wishlist <i class="fa fa-heart" style="font-size:18px;margin-left:5px"></i>
                                    </a>
                                </div>
                                </form>

                                @else
                               
                                <div class="pro-details-cart btn-hover">
                                    <a href="{{route('website.login')}}" type="btn">Add in Wishlist </i>
                                    </a>
                                </div>
                                @endif
                                </div>
                              
                               
                            </div>
                            <div class="pro-details-category">
                                <label>Categories: </label>
                                <ul>
                                    <li> {{$products->cat_name}}, </li>
                                    <li> {{$products->subcat_name}}</li>
                                </ul>
                            </div>
                            <div class="pro-details-social-info">
                                <div class="social-info">
                                    <ul>
                                        <li>
                                            <a title="Facebook" href="http://www.facebook.com/sharer.php?u={{URL::current()}}" target="_blank"><i class="ion-social-facebook"></i></a>
                                        </li>
                                        <li>
                                            <a title="Twitter" href="https://twitter.com/share?url={{URL::current()}}&amp;text=Simple%20Share%20Buttons&amp;hashtags=simplesharebuttons" target="_blank"><i class="ion-social-twitter"></i></a>
                                        </li>
                                         <li>
                                            <a title="Instagram" href="https://www.instagram.com/?url={{URL::current()}}" target="_blank"><i class="ion-social-instagram"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            
                        </div>
                </div>
                </div>

                <div class="row mt-5" style="margin: 0 auto 10px;">
                   <div class="col-md-3" style="padding:0 7px 0">
                      <img class=" responsive-img " src="https://assets.winni.in/groot/2022/06/27/productdetailpage/desktop/customerstaisfaction.jpg" style="box-shadow: 0px 0px 4px #00000029;width:100%;height:100%">
                   </div>
                   <div class="col-md-3" style="padding:0 7px 0">
                      <img class="responsive-img " src="https://assets.winni.in/groot/2022/06/27/productdetailpage/desktop/customer.jpg" style="box-shadow: 0px 0px 4px #00000029;width:100%;height:100%" "="">
                   </div>
                   <!-- <div class="col-md-2" style="padding:0 7px 0">
                      <img class="   responsive-img " src="https://assets.winni.in/groot/2022/06/27/productdetailpage/desktop/pincodes.jpg" style="box-shadow: 0px 0px 4px #00000029;width:100%;height:100%" "="">
                   </div> -->
                   <div class="col-md-3" style="padding:0 7px 0">
                      <img class="   responsive-img " src="https://assets.winni.in/groot/2022/06/27/productdetailpage/desktop/purchaseprotection.jpg" style="box-shadow: 0px 0px 4px #00000029;width:100%;height:100%" "="">
                   </div>
                   <div class="col-md-3" style="padding:0 7px 0">
                      <img class="   responsive-img " src="https://assets.winni.in/groot/2022/06/27/productdetailpage/desktop/hygenic.jpg" style="box-shadow: 0px 0px 4px #00000029;width:100%;height:100%" "="">
                   </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="row">
                @foreach($catproducts as $r)
                    @include('website.show.ourbestproducts')
                @endforeach
            </div>
        </div>
    </div>
</div>


@stop

@push('otherscript')
<script>
    $(function(){
        $("#addwishlist").click(function(e){
              e.preventDefault();
              $("form#wishlistFrm").submit();  
        })

        $("#proceedAsGuest").click(function(e){
            e.preventDefault();
            $("form#productdetailFrm").submit();
        })

        $("#addtocartprod").click(function(e){
            e.preventDefault();
            var attri = $("#attri").val();
            var product_id = $("#product_id").val();
            var qty = $("input[name='qtybutton']").val();
            var cust_id = $("#cust_id").val();

            addTocart(cust_id,product_id,qty);
            //console.log(attri,product_id,qty);

        })
    })



    function selectprice(type , price) {

        $('.btn-price').removeClass('btn-price-selected');
        if(type == 'premiumprice')
        {
            $('.product-use-basic').hide();
            $('.product-use-premium').show();
        }else{
            $('.product-use-premium').hide();
            $('.product-use-basic').show();
        }
        $('#'+type).addClass('btn-price-selected');

        $('#pricetype').val(type)
        $('.sale-price').html('INR '+price);
        $('.').html('INR '+price);
    }
</script>
@endpush