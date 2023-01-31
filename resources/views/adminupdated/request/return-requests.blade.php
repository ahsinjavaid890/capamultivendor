@extends('adminupdated.layouts.main-layout')
@section('title','Return Request')
@section('content')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class=" container-fluid ">
            <!--begin::Card-->
            <div class="row">
            	 <div class="col-lg-12">
            	 	@include('website.layouts.flash')
            	 </div>
            </div>
            <div class="card card-custom mt-5">
                <div class="card-header flex-wrap py-5">
                    <div class="card-title">
                        <h3 class="card-label">
                            Return Request
                            <div class="text-muted pt-2 font-size-sm">Manage Return Request</div>
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                	<table id="example" class="table table-bordered" >
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
					               <img src="{{asset('public/products/'.$requests->productImg)}}" style="width:100px"/>{{$requests->prodTitle}}
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
    </div>
</div>
@endsection
@section('script')

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

@endsection