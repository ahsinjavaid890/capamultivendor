@extends('website.layouts.master')
@section('content')
<div class="offcanvas-overlay"></div>

<div class="page-header mt-30 mb-50">
    <div class="container">
        <div class="archive-header">
            <div class="row align-items-center">
                <div class="col-xl-3">
                    <h1 class="mb-15">{{ $category->category_name }}</h1>
                    <div class="breadcrumb">
                        <a href="{{ url('') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                        <span></span> {{ $category->category_name }}
                    </div>
                </div>
                <div class="col-xl-9 text-end d-none d-xl-block">
                    <ul class="tags-list">
                        @foreach(DB::table('sub_categories')->where('category_name' , $category->id)->limit(4)->get() as $r)
                        <li class="hover-up">
                            <a href=""><i class="fi-rs-cross mr-10"></i>{{ $r->subcat_name }}</a>
                        </li>
                        @endforeach
                        
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
 <section class="product-tabs section-padding position-relative">
    <div class="container">
        <div class="section-title style-2 wow animate__animated animate__fadeIn">
            <h3>Product Category</h3>
        </div>
        <!--End nav-tabs-->
        <div class="row product-grid-4">
            @foreach($products as $r)
               @include('website.show.product')
            @endforeach
            <!--end product card-->
        </div>
    </div>
</section> 
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
                url:"{{route('website.filterprice')}}",
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
        $("input.catfilterlist").each(function(){
            if($(this).val()==catid){
                $(this).prop('checked',true);
            }else{
                $(this).prop('checked',false);
            }
        })
    })
</script>

@endpush