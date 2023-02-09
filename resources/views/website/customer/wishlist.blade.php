@extends('website.layouts.master')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('public/website/assets/css/customerdashboard.css') }}">
<main class="main bg-grey min-height-600">
    <div class="page-content pt-2">
        <div class="container">
            <div class="tab tab-vertical row gutter-lg us-nav-cover-cls">
                @include('website.customer.sidebar')
                <div class="tab-content mb-6 bg-white p-4 us-md-cls">
                <div class="tab-body-head">
                    <div class="">
                        <h2 class="">
                            Wishlist
                        </h2>
                    </div>
                </div>
                    <div class="tab-pane active in" id="account-dashboard">                                
                       <table style=" border-color: ; " class="table table-bordered table-hover">
                                    <thead style=" background-color: rgb(251, 251, 251) !important; " class="">
                                <tr>
                                    <th>Product icon</th> 
                                    <th>Product Description</th>                     
                                    <th>Amount</th>
                                    <th>Action</th>                                           

                                </tr>
                            </thead>
                            
                            <tbody>
                            @foreach($wishlists as $wishlist)
                            <tr>
                                <td>
                                    <a href="{{route('website.productDetails',[encrypt($wishlist->id)])}}" style="text-decoration:none;"><img src="{{asset('public/products/'.$wishlist->featured_img)}}" style="width:100px"/></a>
                                </td>
                                <td><a href="{{route('website.productDetails',[encrypt($wishlist->id)])}}" style="text-decoration:none;"><h5 class="whishlist_heading">{{$wishlist->product_title}}</h5></a></td>
                                <td>{{$wishlist->sale_price}}</td>
                                <td>
                                    <a href="{{url('deletewishlist')}}/{{ $wishlist->wishlistID }}"><button class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                                    <a href="javascript:void(0)" onclick="addTocart({{Auth::guard('cust')->user()->id}},{{$wishlist->id}},1)"><button class="btn btn-success"><i class="fa fa-pen"></i></button></a>
                                </td>
                            </tr>
                            @endforeach
                                                                
                            </tbody>
                        </table>
                        <!-- <div class="us-empty-text mt-5">
                                    <h5 class="">You have no item to show</h5>
                                        <p class="">You will see a history of your items when you place them to wishlist</p>
                                            <img src="" alt="" class="">      
                                </div>   -->
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</main>

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
     $(function(){
         $("button.cancel").click(function(e){
             e.preventDefault();
             if(!confirm("Are you sure want to cancel this ")){
                 return false;
             }else{
                 $("#cover-spin").show();
                 $("form#cancelfrm").submit();
             }
         })

         $("button.delivery").click(function(e){
             e.preventDefault();
             if(!confirm("Are you sure want to change this ")){
                 return false;
             }else{
                 $("#cover-spin").show();
                 $("form#deliveryfrm").submit();
             }
         })
     })
 </script>
 <script>
       function addTocart(cust,prod,qty){
            var form = new FormData();
            form.append('cust',cust);
            form.append('prod',prod);
            form.append('qty',qty);
            $("#cover-spin").show();
            $.ajax({
                url:"{{route('website.addTocart')}}",
                type:"POST",
                data:form,
                cache:false,
                contentType:false,
                processData:false,
                success:function(res){
                    var js_data = JSON.parse(JSON.stringify(res));
                    $("#cover-spin").hide();
                    if(js_data.status==200){
                        toastr.success('Product added to cart');
                        location.reload();
                    }else{
                        toastr.error('something went wrong');
                        return false;
                    }
                    
                }
            })

        }
 </script>

 @endpush