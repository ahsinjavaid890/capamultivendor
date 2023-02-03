@extends('admin.layouts.master')
@section('content')
<main>
<div class="container-fluid px-4">
                        <h1 class="mt-4 text-center main-title">Guest Orders List </h1>
                        <p class="mb-5 text-center main-para">Check all the details of guest orders</p>
                       
                    <div class="card mb-4">
                        
                                <div class="card-body">
                                    <table id="datatablesSimple" >
                                        <thead>
                                            <tr>
                                                <th>Customer</th>
                                                <th>Email</th>
                                                <th>Mobile</th> 
                                                <th>Shipping Address</th>
                                                <th>Payment Id</th> 
                                                <th>Payment Mode</th>
                                                <th>Order Status</th>                                                
                                                <th>Action</th>                                                
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            @foreach($orders as $order)
                                                <tr>
                                                    <td>{{$order->name}} </td>
                                                    <td>{{$order->email}}</td>
                                                    <td>{{$order->mobile}}</td>
                                                    <td>
                                                        {{$order->address}},{{$order->emirates}},{{$order->area}}                                                       
                                                    </td>
                                                    <td>{{$order->payment_id}}</td>
                                                    <td>@if($order->payment_mode==1)
                                                        Online
                                                        @else
                                                        Offline
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($order->order_status==1)
                                                        process
                                                        @elseif($order->order_status==2)
                                                        confirmed
                                                        @elseif($order->order_status==5)
                                                        Delivered
                                                        @elseif($order->order_status==4)
                                                        Cancelled
                                                        @endif
                                                    </td>

                                                    

                                                    <td>
                                                       <a href="{{route('admin.order_details',[encrypt($order->orderid)])}}"><button class="btn btn-outline-dark" title="view orders"><i class="fa fa-eye"></i></button></a>
                                                       
                                                       @if($order->order_status==5 || $order->order_status==4 )
                                                       <button class="btn btn-outline-danger" disabled><i class="fa fa-times"></i></button>
                                                       <button class="btn btn-outline-success" disabled><i class="fa fa-check"></i></button>
                                                       @else
                                                       <form action="{{route('admin.guestcancelled')}}" method="POST" id="cancelfrm">
                                                           @csrf
                                                        <input type="hidden" name="cancel" value="{{$order->orderid}}"/>
                                                       <button class="btn btn-outline-danger cancel" data="{{$order->orderid}}"><i class="fa fa-times"></i></button>
                                                       </form>
                                                       <form action="{{route('admin.guestdelivered')}}" method="POST" id="deliveryfrm">
                                                       @csrf
                                                        <input type="hidden" name="delivery" value="{{$order->orderid}}"/>
                                                            <button class="btn btn-outline-success delivery" data="{{$order->orderid}}"><i class="fa fa-check"></i></button>
                                                        </form>
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