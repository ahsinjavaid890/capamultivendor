<div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
    <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
        <div class="product-img-action-wrap">
            <div class="product-img product-img-zoom">
                <a href="{{ url('product') }}/{{ $r->url }}">
                    <img class="default-img" src="{{asset('public/products/'.$r->featured_img)}}" alt="" />
                    <img class="hover-img" src="{{asset('public/products/'.$r->featured_img)}}" alt="" />
                </a>
            </div>
            <div class="product-action-1">
                <a aria-label="Add To Wishlist" class="action-btn" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal{{$r->id}}"><i class="fi-rs-eye"></i></a>
            </div>
            <div class="product-badges product-badges-position product-badges-mrg">
                <?php 
                    $offer_ar = $r->prod_price-$r->sale_price;
                    $off_ar = round(($offer_ar/$r->prod_price)*100);
                ?> 
                <span class="hot">{{$offer_ar}}%</span>
            </div>
        </div>
        <div class="product-content-wrap mt-3">
            <h2><a href="{{ url('product') }}/{{ $r->url }}">{{Str::limit($r->product_title, 20)}}</a></h2>
            <div class="product-card-bottom">
                <div class="product-price">
                    <span>{{$r->sale_price}} {{ Cmf::current_currency() }}</span>
                    <span class="old-price">{{$r->prod_price}} {{ Cmf::current_currency() }}</span>
                </div>
                <div class="add-cart">
                    <a class="add" href="{{ url('product') }}/{{ $r->url }}"><i class="fi-rs-shopping-cart mr-5 addtocartbutton{{ $r->id }}" onclick="addtocart({{$r->id}})"></i>Add </a>
                </div>
            </div>
        </div>
    </div>
</div>











<div class="modal fade custom-modal" id="quickViewModal{{$r->id}}" tabindex="-1" aria-labelledby="quickViewModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                            <div class="detail-gallery">
                                <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                <!-- MAIN SLIDES -->
                                <div class="product-image-slider">
                                    <figure class="border-radius-10">
                                        <img src="{{asset('public/products/'.$r->featured_img)}}" alt="product image" />
                                    </figure>
                                    <figure class="border-radius-10">
                                        <img src="{{asset('public/products/'.$r->featured_img)}}" alt="product image" />
                                    </figure>
                                    <figure class="border-radius-10">
                                        <img src="{{asset('public/products/'.$r->featured_img)}}" alt="product image" />
                                    </figure>
                                    <figure class="border-radius-10">
                                        <img src="{{asset('public/products/'.$r->featured_img)}}" alt="product image" />
                                    </figure>
                                    <figure class="border-radius-10">
                                        <img src="{{asset('public/products/'.$r->featured_img)}}" alt="product image" />
                                    </figure>
                                    <figure class="border-radius-10">
                                        <img src="{{asset('public/products/'.$r->featured_img)}}" alt="product image" />
                                    </figure>
                                    <figure class="border-radius-10">
                                        <img src="{{asset('public/products/'.$r->featured_img)}}" alt="product image" />
                                    </figure>
                                </div>
                                <!-- THUMBNAILS -->
                                <div class="slider-nav-thumbnails">
                                    <div><img src="{{asset('public/products/'.$r->featured_img)}}" alt="product image" /></div>
                                    <div><img src="{{asset('public/products/'.$r->featured_img)}}" alt="product image" /></div>
                                    <div><img src="{{asset('public/products/'.$r->featured_img)}}" alt="product image" /></div>
                                    <div><img src="{{asset('public/products/'.$r->featured_img)}}" alt="product image" /></div>
                                    <div><img src="{{asset('public/products/'.$r->featured_img)}}" alt="product image" /></div>
                                    <div><img src="{{asset('public/products/'.$r->featured_img)}}" alt="product image" /></div>
                                    <div><img src="{{asset('public/products/'.$r->featured_img)}}" alt="product image" /></div>
                                </div>
                            </div>
                            <!-- End Gallery -->
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="detail-info pr-30 pl-30">
                                <span class="stock-status out-stock"> Sale Off </span>
                                <h3 class="title-detail"><a href="shop-product-right.html" class="text-heading">{{$r->product_title}}</a></h3>
                                <div class="clearfix product-price-cover">
                                    <div class="product-price primary-color float-left">
                                        <span class="current-price text-brand">{{$r->sale_price}} {{ Cmf::current_currency() }}</span>
                                        <span>
                                            <span class="save-price font-md color3 ml-15">26% Off</span>
                                        <span class="old-price font-md ml-15">{{$r->prod_price}} {{ Cmf::current_currency() }}</span>
                                        </span>
                                    </div>
                                </div>
                                <div class="detail-extralink mb-30">
                                    <div class="detail-qty border radius">
                                        <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                        <span class="qty-val">1</span>
                                        <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                    </div>
                                    <div class="product-extra-link2">
                                        <button type="submit" class="button button-add-to-cart"><i class="fi-rs-shopping-cart addtocartbutton{{ $r->id }}" onclick="addtocart({{$r->id}})"></i>Add to cart</button>
                                    </div>
                                </div>
                            </div>
                            <!-- Detail Info -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>