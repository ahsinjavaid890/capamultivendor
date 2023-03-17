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
                            @php
                                $offer_ar = $products->prod_price-$products->sale_price;
                                $off_ar = round(($offer_ar/$products->prod_price)*100);
                            @endphp
                                <ul>
                                    <li>Price : </li>
                                    <li class="amount"> <ins class="sale-price">INR {{$products->sale_price}}</ins><del>INR {{$products->prod_price}}</del></li>
                                    <li class="tax"><span class="discount">{{$off_ar}}% Off</span>Tax Included</li>
                                </ul>
                            </div>
                            <div class="pro-details-list">
                                <p>{{$products->short_desc}}</p>
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
                                    <a class="addtocartbutton{{ $products->id }}" href="javascript:void(0)" onclick="addtocart({{$products->id}})">Add To Cart <svg id="shopping-cart_2_" data-name="shopping-cart (2)" xmlns="http://www.w3.org/2000/svg" width="22.545" height="22.545" viewBox="0 0 22.545 22.545">
                                    <path id="Path_425" data-name="Path 425" d="M21.885,17.687c-18.3,0-17.488,0-17.489-.006a12.378,12.378,0,0,1-.179-1.506c8.783-.046-12.219,0,16.207,0A2.037,2.037,0,0,0,22.5,14.091V5.141a1.578,1.578,0,0,0-1.573-1.576L15.46,3.556v-1.4A1.411,1.411,0,0,0,14.051.749h-1.32a1.41,1.41,0,0,0-1.409,1.409V3.548l-5.866-.01-.44-2.421A1.359,1.359,0,0,0,3.68,0H.661a.661.661,0,0,0,0,1.321c3.2,0,3.048-.018,3.057.032C4.434,5.3,3.978,2.541,5.9,14.845l-1.69.009A1.328,1.328,0,0,0,2.9,16.347l.187,1.5A1.33,1.33,0,0,0,4.4,19.008H5.575a2.429,2.429,0,1,0,4.321,0h6.291a2.429,2.429,0,1,0,4.321,0h1.377a.661.661,0,1,0,0-1.321ZM12.644,2.157a.088.088,0,0,1,.088-.088h1.32a.088.088,0,0,1,.088.088V7.045a.661.661,0,0,0,.661.661h.981l-2.059,2.06a.467.467,0,0,1-.661,0L11,7.706h.981a.661.661,0,0,0,.661-.661V2.157ZM11.323,4.869V6.385h-1.1a1,1,0,0,0-.705,1.7L12.126,10.7a1.787,1.787,0,0,0,2.53,0l2.612-2.613a1,1,0,0,0-.705-1.7h-1.1V4.877l5.466.009a.255.255,0,0,1,.254.255v8.95a.721.721,0,0,1-.756.766H7.24l-1.562-10ZM8.843,20.116a1.108,1.108,0,1,1-1.108-1.108A1.109,1.109,0,0,1,8.843,20.116Zm10.612,0a1.108,1.108,0,1,1-1.108-1.108A1.109,1.109,0,0,1,19.456,20.116Z" transform="translate(0 0)" fill="#fff"/>
                                    </svg></a>
                                </div>
                                @if(Auth::guard('cust')->check())
                                @else
                                <div class=" pro-details-cart btn-hover">
                                    <a href="javascript:void(0)" id="proceedAsGuest">Proceed as guest<svg  data-name="shopping-cart (2)" xmlns="http://www.w3.org/2000/svg" width="22.545" height="22.545" viewBox="0 0 22.545 22.545">
                                    <path id="Path_425" data-name="Path 425" d="M21.885,17.687c-18.3,0-17.488,0-17.489-.006a12.378,12.378,0,0,1-.179-1.506c8.783-.046-12.219,0,16.207,0A2.037,2.037,0,0,0,22.5,14.091V5.141a1.578,1.578,0,0,0-1.573-1.576L15.46,3.556v-1.4A1.411,1.411,0,0,0,14.051.749h-1.32a1.41,1.41,0,0,0-1.409,1.409V3.548l-5.866-.01-.44-2.421A1.359,1.359,0,0,0,3.68,0H.661a.661.661,0,0,0,0,1.321c3.2,0,3.048-.018,3.057.032C4.434,5.3,3.978,2.541,5.9,14.845l-1.69.009A1.328,1.328,0,0,0,2.9,16.347l.187,1.5A1.33,1.33,0,0,0,4.4,19.008H5.575a2.429,2.429,0,1,0,4.321,0h6.291a2.429,2.429,0,1,0,4.321,0h1.377a.661.661,0,1,0,0-1.321ZM12.644,2.157a.088.088,0,0,1,.088-.088h1.32a.088.088,0,0,1,.088.088V7.045a.661.661,0,0,0,.661.661h.981l-2.059,2.06a.467.467,0,0,1-.661,0L11,7.706h.981a.661.661,0,0,0,.661-.661V2.157ZM11.323,4.869V6.385h-1.1a1,1,0,0,0-.705,1.7L12.126,10.7a1.787,1.787,0,0,0,2.53,0l2.612-2.613a1,1,0,0,0-.705-1.7h-1.1V4.877l5.466.009a.255.255,0,0,1,.254.255v8.95a.721.721,0,0,1-.756.766H7.24l-1.562-10ZM8.843,20.116a1.108,1.108,0,1,1-1.108-1.108A1.109,1.109,0,0,1,8.843,20.116Zm10.612,0a1.108,1.108,0,1,1-1.108-1.108A1.109,1.109,0,0,1,19.456,20.116Z" transform="translate(0 0)" fill="#fff"/>
                                    </svg></a>
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
                                    <a href="{{route('website.login')}}" type="btn">Add in Wishlist <i class="fa fa-heart" style="font-size:18px;margin-left:5px"></i>
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
</script>
@endpush