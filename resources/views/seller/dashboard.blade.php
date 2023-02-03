@extends('seller.layouts.master')
@section('content')
<main>
    <div class="container-fluid">
@if($ordersnotification!=0)
<div class="alert alert-success alert-block">
	<strong>{{$ordersnotification}} new orders</strong>
    <a href="javascript:void(0)" class="close" data-dismiss="alert" style="float:right"><i class="fa fa-times"></i></a>	
</div>
@endif
@if($design_requests_notification !=0)
<div class="alert alert-success alert-block">
    <strong>{{$design_requests_notification}} new design request</strong>
    <a href="javascript:void(0)" class="close" data-dismiss="alert" style="float:right"><i class="fa fa-times"></i></a>	
</div>
@endif
        <div class="row">
            <div class="col-md-4 mb-2">
                <div class="card widget-flat">
                    <div class="card-body">
                        <h5 class="text-muted font-weight-normal mt-0" title="Number of Customers">Total Products</h5>
                        <h3>{{$product}}</h3>
                    </div> 
                </div>
            </div>
            <div class="col-md-4 mb-2">
                <div class="card widget-flat">
                    <div class="card-body">
                        <h5 class="text-muted font-weight-normal mt-0" title="Number of Customers">Activate Products</h5>
                        <h3>{{$activateProducts}}</h3>
                    </div> 
                </div>
            </div>
            <div class="col-md-4 mb-2">
                <div class="card widget-flat">
                    <div class="card-body">
                        <h5 class="text-muted font-weight-normal mt-0" title="Number of Customers">Assigned Coupon</h5>
                        <h3>{{$assignedCoupon}}</h3>
                    </div> 
                </div>
            </div>
            <div class="col-md-4 mb-2">
                <div class="card widget-flat">
                    <div class="card-body">
                        <h5 class="text-muted font-weight-normal mt-0" title="Number of Customers">Assigned used Coupon</h5>
                        <h3>{{$usedCoupon}}</h3>
                    </div> 
                </div>
            </div>
            <div class="col-md-4 mb-2">
                <div class="card widget-flat">
                    <div class="card-body">
                        <h5 class="text-muted font-weight-normal mt-0" title="Number of Customers">Total Orders <span class=" badge border border-light rounded-circle bg-danger p-1">{{$ordersnotification}}</span></h5>
                        <h3>{{$total_orders}}</h3>
                    </div> 
                </div>
            </div>
            <div class="col-md-4 mb-2">
                <div class="card widget-flat">
                    <div class="card-body">
                        <h5 class="text-muted font-weight-normal mt-0" title="Number of Customers">Total Cancelled Orders</h5>
                        <h3>{{$cancelled}}</h3>
                    </div> 
                </div>
            </div>
            <div class="col-md-4 mb-2">
                <div class="card widget-flat">
                    <div class="card-body">
                        <h5 class="text-muted font-weight-normal mt-0" title="Number of Customers">Total delivered Orders</h5>
                        <h3>{{$delivered}}</h3>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</main>
@stop

