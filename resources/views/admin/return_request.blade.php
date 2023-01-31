@extends('admin.layouts.master')
@section('content')
<main>
<div class="container-fluid px-4">
                        <h1 class="mt-4 text-center main-title">Return Request</h1>
                        <p class="mb-5 text-center main-para">Check all the details of return product</p>
                       
                    <div class="card mb-4">
                        
                                <div class="card-body">
                                    <table id="datatablesSimple" >
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Reason of return</th>
                                                <th>Account no</th>
                                                <th>Account holder name</th> 
                                                <th>Bank</th>                                                
                                                <th>IFSC</th>
                                                <th>customer Details</th>  
                                                <th>Status</th>                                              
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                           @foreach($requestList as $requests)
                                           <tr>
                                               <td>
                                                   <img src="{{asset('products/'.$requests->productImg)}}" style="width:100px"/>{{$requests->prodTitle}}
                                               </td>
                                               <td>{{$requests->reason}}</td>
                                               <td>{{$requests->accno}}</td>
                                               <td>{{$requests->accholdname}}</td>
                                               <td>{{$requests->bankname}}</td>
                                               <td>{{$requests->ifsc}}</td>
                                               <td>
                                                   <strong>Name : </strong>{{$requests->fname}} {{$requests->lname}}<br/>
                                                   <strong>Email : </strong>{{$requests->email}}<br/>
                                                   <strong>Mobile : </strong>{{$requests->mobile}}<br/>
                                               </td>
                                               <td>
                                                   @if($requests->status==1)
                                                   pending
                                                   @elseif($requests->status==2)
                                                   Accepted
                                                   @elseif($requests->status==3)
                                                   Rejected
                                                   @endif
                                               </td>
                                               <td>
                                                   @if($requests->status==1)
                                                  <a href="{{route('admin.accept_return_request',[encrypt($requests->id)])}}"><button class="btn btn-success">Accept</button></a>
                                                  <a href="{{route('admin.reject_return_request',[encrypt($requests->id)])}}"> <button class="btn btn-danger">Reject</button></a>
                                                   @else
                                                   <button class="btn btn-success" disabled>Accept</button>
                                                   <button class="btn btn-danger" disabled>Reject</button>
                                                   @endif
                                               </td>
                                           </tr>
                                           @endforeach
                                                                                 
                                        </tbody>
                                    </table>
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