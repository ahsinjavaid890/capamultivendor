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
                            My Orders
                        </h2>
                    </div>
                </div>
                        <!-- <p class="mb-3 text-center main-para">Check all the details of orders</p> -->
                    <div class="tab-pane active in" id="account-dashboard">                                
                       <table style="" class="table table-bordered table-hover">
                                    <thead style=" background-color: #fbfbfb !important; " class="">
                                        <tr>
                                            <th class="text-center">Order</th>
                                            <th class="text-center">Date</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Total</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($orders->count() > 0)
                                        @foreach($orders as $r)
                                         <tr>
                                            <td class="text-center"><a href="{{ url('profile/orders') }}/{{ $r->id }}">
                                                {{ $r->order_number }}</a>
                                            </td>
                                            <td class="text-center">{{ Cmf::date_format($r->updated_at) }}</td>
                                            <td class="text-center">
                                                @if($r->status == 'completed')
                                                <div style="background-color:green;font-size: 16px;" class="badge badge-success">Completed</div>
                                                @endif
                                                @if($r->status == 'payementpending')
                                                <div style="background-color:red;font-size: 16px;" class="badge badge-success">Payemend Pending</div>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <span class="order-price">AED {{DB::table('orderdetails')->where('order_id' , $r->id)->sum('price')}}</span>
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ url('orders/downloadinvoice') }}/{{ $r->id }}"

                                                    class="btn btn-outline btn-primary btn-block btn-sm btn-rounded"><i class="fa fa-download"></i> Download Invoice</a>

                                                <a href="{{ url('return-product') }}/{{ $r->id }}"
                                                    class="btn btn-outline btn-success btn-block btn-sm btn-rounded"><i class="fa fa-address-card rq"></i> Return Request</a>

                                            </td>
                                        </tr> 
                                        @endforeach
                                        @else


                                        <div class="us-empty-text mt-5">
                                    <h5 class="">You have no orders to show</h5>
                                        <p class="">You will see a history of your purchases when you place new orders</p>
                                            <img src="{{asset('products/order-box.svg')}}" alt="" class="" >      
                                </div>

                                        @endif 
                                    </tbody>
                                </table>

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