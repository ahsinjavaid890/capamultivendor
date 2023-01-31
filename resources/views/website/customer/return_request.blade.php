@extends('website.layouts.master')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('website/assets/css/customerdashboard.css') }}">
<main class="main bg-grey min-height-600">
    <div class="page-content pt-2">
        <div class="container">
            <div class="tab tab-vertical row gutter-lg us-nav-cover-cls">
                @include('website.customer.sidebar')
                <div class="tab-content mb-6 bg-white p-4 us-md-cls">
                    <div class="tab-body-head">
                        <div class="">
                            <h2 class="">
                                Return Requests
                            </h2>
                        </div>
                    </div>
                    <div class="tab-pane active in" id="account-dashboard">                                
                       <table style=" border-color: ; " class="table table-bordered table-hover">
                                    <thead style=" background-color: #fbfbfb !important; " class="">
                                <tr>
                                    <th>Product</th>
                                    <th>Reason of return</th>
                                    <th>Message</th>
                                    <th>Status</th>

                                </tr>
                            </thead>
                            
                            <tbody>
                               @foreach($requestList as $requests)
                               <tr>
                                   <td>
                                       <img src="{{asset('products/'.$requests->productImg)}}" style="width:100px"/>{{$requests->prodTitle}}
                                   </td>
                                   <td>{{$requests->reason}}</td>
                                   <td>{{$requests->message}}</td>
                                   <td>
                                       @if($requests->status==1)
                                       Pending
                                       @elseif($requests->status==2)
                                       Accepted
                                       @elseif($requests->status==3)
                                       Rejected
                                       @endif
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