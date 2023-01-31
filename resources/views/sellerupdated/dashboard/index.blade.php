@extends('sellerupdated.layouts.main-layout')
@section('title','Dashboard')
@section('content') 
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Card-->
            	@if(Auth::guard('seller')->user()->isCompleted == 1)
				<div class="alert alert-danger alert-block">
					<strong>Please Complete Your Seller Profile</strong>
				    <a href="{{ url('seller/seller-profile') }}" class="text-white" style="float:right;font-size: 17px;">Click to Complete Your Profile</a>	
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
		                        <h3>1</h3>
		                    </div> 
		                </div>
		            </div>
		            <div class="col-md-4 mb-2">
		                <div class="card widget-flat">
		                    <div class="card-body">
		                        <h5 class="text-muted font-weight-normal mt-0" title="Number of Customers">Assigned used Coupon</h5>
		                        <h3>1</h3>
		                    </div> 
		                </div>
		            </div>
		            <div class="col-md-4 mb-2">
		                <div class="card widget-flat">
		                    <div class="card-body">
		                        <h5 class="text-muted font-weight-normal mt-0" title="Number of Customers">Total Orders <span class=" badge border border-light rounded-circle bg-danger p-1">1</span></h5>
		                        <h3>1</h3>
		                    </div> 
		                </div>
		            </div>
		            <div class="col-md-4 mb-2">
		                <div class="card widget-flat">
		                    <div class="card-body">
		                        <h5 class="text-muted font-weight-normal mt-0" title="Number of Customers">Total Cancelled Orders</h5>
		                        <h3>1</h3>
		                    </div> 
		                </div>
		            </div>
		            <div class="col-md-4 mb-2">
		                <div class="card widget-flat">
		                    <div class="card-body">
		                        <h5 class="text-muted font-weight-normal mt-0" title="Number of Customers">Total delivered Orders</h5>
		                        <h3>1</h3>
		                    </div> 
		                </div>
		            </div>
		        </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
@endsection