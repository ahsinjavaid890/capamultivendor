<div class="col-md-2">
    <div class="pro-content">
        <article class="list-product">
            <div class="img-block">
                <a href="{{ url('product') }}/{{ $r->url }}" class="thumbnail">
                    <img class="first-img" src="{{asset('public/products/'.$r->featured_img)}}" alt="" />
                </a>
                <!-- <div class="quick-view">
                    <a onclick="quickproductview({{$r->id}})" class="quick_view" href="javascript:void(0)"  title="{{ $r->product_title }}" >
                        <i class="icon-magnifier icons"></i>
                    </a>
                </div> -->
            </div>
            <?php 
                $offer_ar = $r->prod_price-$r->sale_price;
                $off_ar = round(($offer_ar/$r->prod_price)*100);
            ?> 
            <ul class="product-flag"><li class="new">{{$off_ar}} %</li></ul>
            @if(Auth::guard('cust')->check())


            @if(DB::table('wishlists')->where('prod_id' , $r->id)->where('cust_id' , Auth::guard('cust')->user()->id)->count() == 0)
            <form action="{{route('website.add_to_wishlist')}}" method="POST" id="addwishlist{{$r->id}}">
                @csrf
                <input type="hidden" name="prod_id" value="{{$r->id}}"/>
            </form>
            <span class="wishlist" onclick="addproductinwishlist({{$r->id}})">
                <img src="{{asset('public/website/assets/images/icons/like.svg')}}"/>
            </span>
            @else

            <form action="{{route('website.removewishlistfromproduct')}}" method="POST" id="removewishlist{{$r->id}}">
                @csrf
                <input type="hidden" name="prod_id" value="{{$r->id}}"/>
            </form>
            <span title="Click To Remove Wishlist" class="wishlist" onclick="removeproductinwishlist({{$r->id}})">
                <img style="width: 25px;height: 25px" src="{{asset('public/website/assets/images/icons/liked.svg')}}"/>
            </span>

            @endif
            @else
            <a href="{{ url('customer-login') }}">
                <span class="wishlist"><img src="{{asset('public/website/assets/images/icons/like.svg')}}"/></span>
            </a>
            @endif
            <div class="product-decs text-center">
                <a class="inner-link" href="{{ url('product') }}/{{ $r->url }}"><span>{{$r->product_title}}</span></a>
                <div class="pricing-meta">
                    <ul>
                        <li class="old-price cut"><del>{{$r->prod_price}} {{ Cmf::current_currency() }}</del></li>
                        <li class="new-price not-cut">{{$r->sale_price}} {{ Cmf::current_currency() }}</li>
                    </ul>
                </div>
                <div class="rating-product">
                @if($r->rating==1.00)
                <i class="ion-android-star"></i>
                @elseif($r->rating==2.00)
                <i class="ion-android-star"></i>
                <i class="ion-android-star"></i>
                @elseif($r->rating==3.00)
                <i class="ion-android-star"></i>
                <i class="ion-android-star"></i>
                <i class="ion-android-star"></i>
                @elseif($r->rating==4.00)
                <i class="ion-android-star"></i>
                <i class="ion-android-star"></i>
                <i class="ion-android-star"></i>
                <i class="ion-android-star"></i>
                @elseif($r->rating==5.00)
                <i class="ion-android-star"></i>
                <i class="ion-android-star"></i>
                <i class="ion-android-star"></i>
                <i class="ion-android-star"></i>
                <i class="ion-android-star"></i>
                @endif
                <span class="rating-point">{{$r->rating}}</span>
                </div>
                <div class="add-cart-btn">
                    <a href="javascript:void(0)" class="add-to-cart addtocartbutton{{ $r->id }} btn" onclick="addtocart({{$r->id}})">Add to cart</a>
                </div>
            </div>
        </article>
    </div>
</div>