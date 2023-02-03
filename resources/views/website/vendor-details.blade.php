@extends('website.layouts.master')
@section('content')
<div class="vendor-top-bar ptb-60px" style="background-color: #ecebeb;">
    <div class="container-fluid">
      <div class="archive-header mb-3">
         <div class="row align-items-center">
            <div class="col-xl-6">
               <h1 class="mb-4">{{$vendors->shop_name}}</h1>
               <div class="breadcrumb">
                  <a href="{{ url(' ') }}" rel="nofollow"><i class="fa fa-home mx-1"></i>Home</a><span><i class="fa fa-angle-right mr-3"></i> Vendors</span>
                  <span><i class="fa fa-angle-right mr-5"></i> {{$vendors->shop_name}}</span> 
               </div>
            </div>
         </div>
      </div>
    </div>
</div> 
<div class="shop-category-area mt-30px">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 order-lg-last col-md-12 order-md-first">
                <div id="ven-banner" class="vendor">
                    <div class="row inner-banner-box">
                        <div class="col-lg-3 col left-col" style="background: #000;">
                            <div class="vendor-content">
                                <div style="background-color: white;width:100px;height:100px;border-radius: 10px;margin-bottom: 10px;margin: auto;" class="mb-4">
                                    <img style="width:100px;height:100px;border-radius: 10px;" src="{{asset('public/images/'.$vendors->shop_logo)}}" class="profile" />
                                </div>
                                <h1>{{$vendors->shop_name}}</h1>
                                <h4><img src="{{asset('public/website/assets/images/icons/map-pin.png')}}" />{{$vendors->shop_address}}</h4>
                                <h4><img src="{{asset('public/website/assets/images/icons/phone.png')}}" />{{$vendors->shop_phone}}</h4>
                            </div>
                        </div>
                        <div class="col-lg-9 col right-col">
                            <div class="content-box">
                                @if($vendors->shop_banner)
                                <img class="bg-img d-flex" src="{{asset('public/images/'.$vendors->shop_banner)}}" style="width: 100%;height: 100%;" />
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
                    <div id="new-arrivals" class="deal-area pt-60px pb-30px">
                        <div class="container-fluid">
                            @if(count($vendorsProd)!=0)
                            <div class="row">
                                @foreach($vendorsProd as $r)
                                    @include('website.show.product')
                                @endforeach
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

                            $("#filterproducts").append(' <div class="pro-content"> <article class="list-product"> <div class="img-block"> <a href="javascript:void(0)" class="thumbnail"> <img class="first-img" src="{{asset("products")}}/'+v.featured_img+'" alt=""/> </a> <div class="quick-view"> <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" data-bs-toggle="modal" data-bs-target="#exampleModal"> <i class="icon-magnifier icons"></i> </a> </div></div> <ul class="product-flag"><li class="new">'+off_ar+' %</li></ul> @if(Auth::guard("cust")->check()) <form action="{{route("website.add_to_wishlist")}}" method="POST" id="addwishlist'+v.id+'"> @csrf <input type="hidden" name="prod_id" value="'+v.id+'"/> </form> <span class="wishlist addtowishlist" data="'+v.id+'"><img src="{{asset("public/website/assets/images/icons/like.svg")}}"/></span> @else <span class="wishlist"><img src="{{asset("public/website/assets/images/icons/like.svg")}}"/></span> @endif <div class="product-decs text-center"> <a class="inner-link" href="javascript:void(0)"><span>'+v.product_title+'</span></a> <div class="pricing-meta"> <ul> <li class="old-price cut"><del>'+v.prod_price+'AED</del></li><li class="new-price not-cut">'+v.sale_price+'AED</li></ul> </div><div class="rating-product filterating'+a+'"> <span class="rating-point customratingpont'+a+'">'+v.rating+'</span> </div>@if(Auth::guard("cust")->check()) <div class="add-cart-btn"> <a href="javascript:void(0)" class="add-to-cart btn" onclick="addTocart({{Auth::guard("cust")->user()->id}},'+v.id+',1)">Add to cart</a> </div>@else <div class="add-cart-btn"> <a href="{{route("website.login")}}" class="add-to-cart btn">Add to cart</a> </div>@endif </div></article> </div>')
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