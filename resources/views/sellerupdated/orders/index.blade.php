@extends('sellerupdated.layouts.main-layout')
@section('title','All Orders')
@section('content')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                        <h3 class="card-label">
                            Search Orders
                        </h3>
                </div>
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-lg-8">
                            <form method="GET" action="{{ url('vendor/orders/ordersearch') }}" class="">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group mb-2">
                                            <label for="inputPassword2" class="sr-only">Search</label>
                                            <input value="<?php if(isset($_GET['orderid'])) echo $_GET['orderid']; ?>" type="search" name="orderid" class="form-control" id="inputPassword2" placeholder="Search By Order ID...">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <div class="form-group mb-2">
                                            <select name="orderstatus" class="custom-select" id="status-select">
                                                <option value="">Order Status</option>
                                                <option value="">All</option>
                                                <option 

                                                <?php 



                                                    if(isset($_GET['orderstatus']))
                                                    {
                                                        if($_GET['orderstatus'] == 'completed')
                                                        {
                                                            echo "selected"; 
                                                        } 
                                                    }



                                                     ?> 

                                                 value="completed">Completed</option>
                                                <option
                                                <?php 



                                                    if(isset($_GET['orderstatus']))
                                                    {
                                                        if($_GET['orderstatus'] == 'cancelled')
                                                        {
                                                            echo "selected"; 
                                                        } 
                                                    }



                                                     ?> 

                                                 value="cancelled">Cancelled</option>
                                                <option

                                                <?php 



                                                    if(isset($_GET['orderstatus']))
                                                    {
                                                        if($_GET['orderstatus'] == 'shipped')
                                                        {
                                                            echo "selected"; 
                                                        } 
                                                    }



                                                     ?> 


                                                 value="shipped">Shipped</option>
                                                <option

                                                <?php 



                                                    if(isset($_GET['orderstatus']))
                                                    {
                                                        if($_GET['orderstatus'] == 'recieved')
                                                        {
                                                            echo "selected"; 
                                                        } 
                                                    }



                                                     ?> 


                                                 value="recieved">Received</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group mb-2">
                                            <button class="btn btn-primary">Search</button>
                                        </div>
                                    </div>
                                </div>
                            </form>                            
                        </div>
                        
                    </div>
                </div>
            </div>

            <!--begin::Card-->
            <div class="card card-custom mt-5">
                <div class="card-header flex-wrap py-5">
                    <div class="card-title">
                        <h3 class="card-label">
                            All Orders
                            <div class="text-muted pt-2 font-size-sm">Manage All All Orders</div>
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <table id="example" class="table table-bordered table-hover table-centered mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <th>Order ID</th>
                                    <th>Date</th>
                                    <th>Total</th>
                                    <th>Order Status</th>
                                    <th style="width: 125px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $r)
                                <tr @if($r->new_vendor_status == 'new') style="background-color:#f1f3fa;" @endif>
                                    
                                    <td><a href="{{url('vendor/orders/orderdetail')}}/{{ $r->order_id }}" class="text-body font-weight-bold">{{$r->order_number}}</a> @if($r->newstatus == 'new') <small class="badge badge-success">New</small>@endif</td>
                                    <td>
                                        {{ date('d M Y', strtotime($r->created_at)) }}   <small class="text-muted">{{ date('h:i A', strtotime($r->created_at)) }}</small>
                                    </td>
                                    
                                    <td>
                                       AED {{ $orderdetails->where('users' , Auth::user()->id)->where('order_id' , $r->order_id)->sum('price')  }}
                                    </td>
                                    <td style="text-align: left;">
                                        <span  class="badge @if($r->status == 'received') badge-success @endif @if($r->status == 'completed') badge-warning @endif @if($r->status == 'shipped') badge-info @endif custom-badges">

                                            @if($r->status == 'completed')

                                            Pending

                                            @endif

                                            @if($r->status == 'shipped')

                                            shipped

                                            @endif


                                            @if($r->status == 'received')

                                            Deleivered

                                            @endif


                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{url('seller/orders')}}/{{ $r->order_id }}" class="btn btn-primary"> <i class="fa fa-eye"></i>Order Details</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
@endsection