@extends('website.layouts.master')
@section('content')
<div class="shop-category-area mt-30px">
    <div class="container-sm">
        <div class="row">
            <div class="col-lg-9 order-lg-last col-md-12 order-md-first">
                <div id="ven-banner" class="vendor">
                    <div class="row inner-banner-box">
                        <div class="col-lg-3 col left-col" style="background: #000;">
                            <div class="vendor-content">
                                <div style="background-color: white;width:100px;height:100px;border-radius: 10px;margin-bottom: 10px;">
                                    <img style="width:100px;height:100px;border-radius: 10px;" src="{{asset('images/'.$vendors->shop_logo)}}" class="profile" />
                                </div>
                                <h1>{{$vendors->shop_name}}</h1>
                                <h4><img src="{{asset('website/assets/images/icons/map-pin.png')}}" />{{$vendors->shop_address}}</h4>
                                <h4><img src="{{asset('website/assets/images/icons/phone.png')}}" />{{$vendors->shop_phone}}</h4>
                            </div>
                        </div>
                        <div class="col-lg-9 col right-col">
                            <div class="content-box">
                                @if($vendors->shop_banner)
                                <img class="bg-img d-flex" src="{{asset('images/'.$vendors->shop_banner)}}" style="width: 100%;height: 100%;" />
                                @else

                                <img style="width: 100%;height: 100%;" src="https://img.freepik.com/free-vector/gradient-minimalist-background_23-2149989166.jpg?w=2000">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="shop-bottom-area mt-35">
                    <div class="ven-shop-text">
                        <p>
                            {{$vendors->description}}
                        </p>
                    </div>

                    <div class="tabs-main-block">
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                <div id="new-arrivals" class="deal-area mt-30px pb-30px">
                                    <div class="container-sm">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12">
                                            @if(count($vendorsProd)!=0)
                                            <div class="arrival-products d-flex" id="filterproducts"></div>
                                                <div class="arrival-products d-flex" id="oldData">
                                                    @foreach($vendorsProd as $r)
                                                        @include('website.show.product')
                                                    @endforeach
                                                </div>
                                                @else
                                                <div class="col-md-12">
                                                    <p style="padding-top: 60px;border: 1px solid #009fbd; text-align: center; padding-bottom: 60px; background: #009fbd;color: #fff;">No products are found !!</p>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                    <!-- New Arrivals Area End -->
                </div>
                <!-- Shop Bottom Area End -->
            </div>
            <!-- Sidebar Area Start -->
            <div class="col-lg-3 order-lg-first col-md-12 order-md-last mb-md-60px mb-lm-60px">
                <div class="shop-sidebar-wrap">
                    <div class="sidebar-widget-group padding-30px mb-30px">
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <a href="#" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="true" aria-controls="collapseSeven" class="collapsed"><h4 class="pro-sidebar-title">Price</h4></a>
                                </div>

                                <div id="collapseSeven" class="collapse show" aria-labelledby="headingSeven" data-parent="#accordionExample" style="">
                                <div class="card-body">
                                                    <div class="price-filters">
                                                        <input type="hidden" id="catid" name="catid" value={{$vendor_id}} />
                                                        <label><input type="text" value="" id="minprice" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))"></label>
                                                            <span>To</span>
                                                        <label><input type="text" value="" id="maxprice"  onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))"></label>
                                                        <button id="filterprice">GO</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!-- card -->
                                        <div class="card">
                                            <div class="card-header" id="headingThree">
                                                <a href="#" class="collapsed" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree"><h4 class="pro-sidebar-title">Product Rating</h4></a>
                                               
                                            </div>
                                            <div id="collapseThree" class="collapse show" aria-labelledby="headingThree" data-parent="#accordionExample">
                                                <div class="card-body">
                                               
                                                    <div class="rating-filter mt-10">    
                                                        <a href="#">1.0 Stars or More<span></span></a>
                                                        <input type="range" class="form-range" min="1" max="5" step="1" id="ratingRange3">
                                                        <div class="review-rating">
                                                            <span class="min-rating">1 Star</span>
                                                            <span class="max-rating">5 Stars</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!-- card -->
                                        <div class="card">
                                            <div class="card-header" id="headingFour">
                                                <a href="#" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="true" aria-controls="headingFour" class="collapsed"><h4 class="pro-sidebar-title">Seller</h4></a>
                                            </div>

                                            <div id="collapseFour" class="collapse show" aria-labelledby="headingFour" data-parent="#accordionExample" style="">
                                                <div class="card-body">
                                                    <!-- Sidebar single item -->
                                                    <div class="sidebar-widget mt-30">
                                                        <div class="search"> <i class="fa fa-search"></i> <input type="text" class="form-control" placeholder=""> </div>
                                                        <div class="sidebar-widget-list">
                                                            <ul style="max-height:250px;overflow:auto;">
                                                            @foreach($allvendors as $vendor)
                                                                <li>
                                                                    <div class="sidebar-widget-list-left">
                                                                        <input type="checkbox"value="{{$vendor->id}}" class="vendorfilterlist"> <a href="{{route('website.vendorDetails',[encrypt($vendor->id)])}}">{{$vendor->company_name}}</a>
                                                                        <span class="checkmark"></span>
                                                                    </div>
                                                                </li>
                                                                @endforeach
                                                               
                                                            </ul>
                                                        </div>
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!-- card -->
                                        <div class="card">
                                            <div class="card-header" id="headingFive">
                                                <a href="#" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="true" aria-controls="headingFive" class="collapsed"><h4 class="pro-sidebar-title">New Arrivals</h4></a>
                                            </div>

                                            <div id="collapseFive" class="collapse show" aria-labelledby="headingFive" data-parent="#accordionExample" style="">
                                                <div class="card-body">
                                                    <!-- Sidebar single item -->
                                                    <div class="sidebar-widget mt-30">
                                                       
                                                        <div class="sidebar-widget-list">
                                                            <ul style="max-height:250px;overflow:auto;">
                                                                <li>
                                                                    <div class="sidebar-widget-list-left">
                                                                        <input type="checkbox"> <a href="#">Last 24 Hours</a>
                                                                        <span class="checkmark"></span>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="sidebar-widget-list-left">
                                                                        <input type="checkbox" value=""> <a href="#">Last 3 Days</a>
                                                                        <span class="checkmark"></span>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="sidebar-widget-list-left">
                                                                        <input type="checkbox"> <a href="#">Last 7 Days</a>
                                                                        <span class="checkmark"></span>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="sidebar-widget-list-left">
                                                                        <input type="checkbox" value=""> <a href="#">Last 30 Days</a>
                                                                        <span class="checkmark"></span>
                                                                    </div>
                                                                </li>
                                                               
                                                            </ul>
                                                        </div>
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!-- card -->
                                       
                                        <div class="card">
                                            <div class="card-header" id="headingOne">
                                                <a href="#" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="true" aria-controls="collapseSeven" class="collapsed"><h4 class="pro-sidebar-title">Categories</h4></a>
                                            </div>

                                            <div id="collapseSeven" class="collapse show" aria-labelledby="headingSeven" data-parent="#accordionExample" style="">
                                                <div class="card-body">
                                                    <!-- Sidebar single item -->
                                                    <div class="sidebar-widget mt-30">
                                                        <div class="search"> <i class="fa fa-search"></i> <input type="text" class="form-control" placeholder=""> </div>
                                                        <div class="sidebar-widget-list">
                                                            <ul style="max-height:250px;overflow:auto;">
                                                            @foreach($getcatlist as $category)
                                                                <li>
                                                                    <div class="sidebar-widget-list-left">
                                                                        <input type="checkbox" value="{{$category->id}}" > <a href="{{ url('category') }}/{{ $category->url }}">{{$category->category_name}}</a>
                                                                        <span class="checkmark"></span>
                                                                    </div>
                                                                </li>
                                                                @endforeach
                                                               
                                                            </ul>
                                                        </div>
                                                       
                                                    </div>
                                                </div>
                                            </div>
                            <!-- card -->
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
    $(function(){
        $("button#filterprice").click(function(e){
            e.preventDefault();
            var minprice = $("#minprice").val();
            var mxprice = $("#maxprice").val();
            var catid = $("#catid").val();
            var form = new FormData();
            form.append('minprice',minprice);
            form.append('maxprice',mxprice);
            form.append('catid',catid);
            $("#cover-spin").show();
            $.ajax({
                url:"{{route('website.filterpricebyVendor')}}",
                type:"POST",
                data:form,
                cache:false,
                processData:false,
                contentType:false,
                success:function(res){
                    $("#cover-spin").hide();
                    js_data=JSON.parse(JSON.stringify(res));
                    if(js_data.status==200){
                        $("#oldData").hide();
                        $("#oldData").removeClass('d-flex');
                        $.each(js_data.msg,function(a,v){
                            
                            var offer_ar=parseInt(v.prod_price)-parseInt(v.sale_price); 
                            var off_ar=parseInt((offer_ar/parseInt(v.prod_price))*100); 

                            $("#filterproducts").append(' <div class="pro-content"> <article class="list-product"> <div class="img-block"> <a href="javascript:void(0)" class="thumbnail"> <img class="first-img" src="{{asset("products")}}/'+v.featured_img+'" alt=""/> </a> <div class="quick-view"> <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" data-bs-toggle="modal" data-bs-target="#exampleModal"> <i class="icon-magnifier icons"></i> </a> </div></div> <ul class="product-flag"><li class="new">'+off_ar+' %</li></ul> @if(Auth::guard("cust")->check()) <form action="{{route("website.add_to_wishlist")}}" method="POST" id="addwishlist'+v.id+'"> @csrf <input type="hidden" name="prod_id" value="'+v.id+'"/> </form> <span class="wishlist addtowishlist" data="'+v.id+'"><img src="{{asset("website/assets/images/icons/like.svg")}}"/></span> @else <span class="wishlist"><img src="{{asset("website/assets/images/icons/like.svg")}}"/></span> @endif <div class="product-decs text-center"> <a class="inner-link" href="javascript:void(0)"><span>'+v.product_title+'</span></a> <div class="pricing-meta"> <ul> <li class="old-price cut"><del>'+v.prod_price+'AED</del></li><li class="new-price not-cut">'+v.sale_price+'AED</li></ul> </div><div class="rating-product filterating'+a+'"> <span class="rating-point customratingpont'+a+'">'+v.rating+'</span> </div>@if(Auth::guard("cust")->check()) <div class="add-cart-btn"> <a href="javascript:void(0)" class="add-to-cart btn" onclick="addTocart({{Auth::guard("cust")->user()->id}},'+v.id+',1)">Add to cart</a> </div>@else <div class="add-cart-btn"> <a href="{{route("website.login")}}" class="add-to-cart btn">Add to cart</a> </div>@endif </div></article> </div>')
                            if(v.rating==1.00){
                              $(".filterating"+a).html('<i class="ion-android-star"></i>');
                            }else if(v.rating==2.00){
                                $(".filterating"+a).html('<i class="ion-android-star"></i> <i class="ion-android-star"></i>');
                            }else if(v.rating==3.00){
                                $(".filterating"+a).html('<i class="ion-android-star"></i> <i class="ion-android-star"> </i><i class="ion-android-star"></i>');
                            
                        }else if(v.rating==4.00){
                            $(".filterating"+a).html('<i class="ion-android-star"></i> <i class="ion-android-star"> </i><i class="ion-android-star"></i><i class="ion-android-star"></i>');
                        }else if(v.rating==5.00){
                            $(".filterating"+a).html('<i class="ion-android-star"></i> <i class="ion-android-star"> </i><i class="ion-android-star"></i><i class="ion-android-star"></i><i class="ion-android-star"></i>');
                        }  

                        if(v.rating==null){
                           $(".customratingpont"+a).text(0); 
                        }
                        })
                    }else{
                        ("#filterproducts").hide();
                        $("#oldData").show();
                        $("#oldData").addClass('d-flex');
                    }

                }
            })
        })
    })
</script>


<script>
    $(function(){
        var catid = $("#catid").val();
        $("input.vendorfilterlist").each(function(){
            if($(this).val()==catid){
                $(this).prop('checked',true);
            }else{
                $(this).prop('checked',false);
            }
        })
    })
</script>

@endpush