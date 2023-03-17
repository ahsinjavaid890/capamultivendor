<div class="col-md-3">
    <div class="pro-content">
        <article class="list-product pt-3 pb-1 px-3 border">
            <div class="img-block">
                <a href="{{ url('product') }}/{{ $r->url }}" class="thumbnail">
                    <img class="first-img rounded" src="{{asset('public/products/'.$r->featured_img)}}" alt="" />
                </a>
            </div>
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
                        <li class="new-price not-cut">{{$r->prod_price}} {{ Cmf::current_currency() }}</li>
                    </ul>
                </div>
                <div class="add-cart-btn">
                    <a href="javascript:void(0)" class="add-to-cart addtocartbutton{{ $r->id }} btn" onclick="addtocart({{$r->id}})">Add to cart</a>
                </div>
            </div>
        </article>
    </div>
</div>