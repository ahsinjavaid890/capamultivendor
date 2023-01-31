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
                            Design Requests
                        </h2>
                    </div>
                </div>
                    <div class="tab-pane active in" id="account-dashboard">                                
                       <table style=" border-color: #; " class="table table-bordered table-hover">
                            <thead style=" background-color: #fbfbfb !important; " class="">
                                <tr>
                                    <th>Image</th>
                                    <th>Product</th>
                                    <th>Category</th>
                                    <th>Cost Range</th>   
                                    <th>Action</th>                                            
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($designReq as $req)
                                <tr style="vertical-align:baseline;">
                                    <td class="text-center">
                                        <div style="height:100px;width: 100px;"><img style="width:100%;height:100%;" class="img-fluid img-thumbnail" src="{{asset('uploads/'.$req->product_img)}}"/>
                                        </div>
                                    </td>
                                    <td>{{$req->product_name}}</td>
                                    <td>{{$req->catname}}</td>
                                    <td>{{$req->cost}}</td>
                                    <td>
                                       <a href="{{route('website.deleteReq',[encrypt($req->id)])}}"> <button class="btn btn-outline-danger"><i class="fa fa-trash"></i></button></a>
                                    </td>
                                </tr> 
                                @endforeach                                     
                            </tbody>
                        </table>
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

 @endpush