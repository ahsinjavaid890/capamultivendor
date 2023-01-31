@extends('adminupdated.layouts.main-layout')
@section('title','Dashboard')
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class=" container-fluid ">
        	<h3>Products</h3> 
		    <div class="row">
		        <div class="col-lg-2 col-md-2">
		            <div class="card widget-flat">
		                <div class="card-body">
		                    <h5 class="text-muted font-weight-normal mt-0" title="Number of Customers">Total Products</h5>
		                    <h3>{{ DB::table('products')->count() }}</h3>
		                    
		                </div> <!-- end card-body-->
		            </div>
		        </div>
		        <div class="col-lg-2 col-md-2">
		            <div class="card widget-flat">
		                <div class="card-body">
		                    
		                    <h5 class="text-muted font-weight-normal mt-0" title="Number of Customers">Active Products</h5>
		                    <h3>{{ DB::table('products')->where('status' , 1)->count() }}</h3>
		                    
		                </div> <!-- end card-body-->
		            </div>
		        </div>
		        <div class="col-lg-2 col-md-2">
		            <div class="card widget-flat">
		                <div class="card-body">
		                    
		                    <h5 class="text-muted font-weight-normal mt-0" title="Number of Customers">Rejected Products</h5>
		                    <h3>{{ DB::table('products')->where('status' , 2)->count() }}</h3>
		                    
		                </div> <!-- end card-body-->
		            </div>
		        </div>
		        <div class="col-lg-2 col-md-2">
		            <div class="card widget-flat">
		                <div class="card-body">
		                    
		                    <h5 class="text-muted font-weight-normal mt-0" title="Number of Customers">Trash Products</h5>
		                    <h3>{{ DB::table('products')->where('status' , 3)->count() }}</h3>
		                    
		                </div> <!-- end card-body-->
		            </div>
		        </div>
		        <div class="col-lg-2 col-md-2">
		            <div class="card widget-flat">
		                <div class="card-body">
		                    
		                    <h5 class="text-muted font-weight-normal mt-0" title="Number of Customers">Pending Products</h5>
		                    <h3>{{ DB::table('products')->where('status' , 0)->count() }}</h3>
		                    
		                </div> <!-- end card-body-->
		            </div>
		        </div>
		    </div>
		    <br>
		    <h3>Users</h3>
		    <div class="row">
		        <div class="col-lg-2 col-md-2">
		            <div class="card widget-flat">
		                <div class="card-body">
		                    <h5 class="text-muted font-weight-normal mt-0" title="Number of Customers">Customers</h5>
		                    <h3>{{ DB::table('customers')->count() }}</h3>
		                    
		                </div> <!-- end card-body-->
		            </div>
		            
		        </div>
		        <div class="col-lg-2 col-md-2">
		            <div class="card widget-flat">
		                <div class="card-body">
		                    
		                    <h5 class="text-muted font-weight-normal mt-0" title="Number of Customers">All Sellers</h5>
		                    <h3>{{ DB::table('sellers')->count() }}</h3>
		                    
		                </div> <!-- end card-body-->
		            </div>
		        </div>
		        <div class="col-lg-2 col-md-2">
		            <div class="card widget-flat">
		                <div class="card-body">
		                    
		                    <h5 class="text-muted font-weight-normal mt-0" title="Number of Customers">Seller Request <small>Not Approved</small></h5>
		                    <h3>{{ DB::table('sellers')->where('status' , 1)->count() }}</h3>
		                    
		                </div> <!-- end card-body-->
		            </div>
		        </div>
		        <div class="col-lg-2 col-md-2">
		            <div class="card widget-flat">
		                <div class="card-body">
		                    
		                    <h5 class="text-muted font-weight-normal mt-0" title="Number of Customers">Seller Request <small>Approved</small></h5>
		                    <h3>{{ DB::table('sellers')->where('status' , 2)->count() }}</h3>
		                    
		                </div> <!-- end card-body-->
		            </div>
		        </div>
		    </div>
		    <br>
		    <div class="row">
        <div class="col-xl-12 col-lg-12 order-lg-2 order-xl-1">
            <div class="card">
                <div class="card-body">
                    <a href="" class="btn btn-sm btn-link float-right mb-3">Export
                        <i class="mdi mdi-download ml-1"></i>
                    </a>
                    <h4 class="header-title mt-2">Top Selling Products</h4>

                    <div class="table-responsive">
                        <table class="table table-centered table-nowrap table-hover mb-0">
                            <tbody>



                                @foreach(
             DB::table('products')
            ->leftJoin('orderdetails','products.id','=','orderdetails.product_id')
            ->groupBy('products.id')
            ->take(5)
            ->get() as $r)


                                <tr>
                                    <td>
                                        <h5 class="font-14 my-1 font-weight-normal">{{ $r->product_title }}</h5>
                                        <span class="text-muted font-13">07 April 2018</span>
                                    </td>
                                    <td>
                                        <h5 class="font-14 my-1 font-weight-normal">Rs. {{ $r->prod_price }} <small>({{ $r->sale_price }})</small></h5>
                                        <span class="text-muted font-13">Price</span>
                                    </td>
                                    <td>
                                        <h5 class="font-14 my-1 font-weight-normal">{{ $r->stock_alert }}</h5>
                                        <span class="text-muted font-13">Quantity</span>
                                    </td>
                                    <td>
                                        <h5 class="font-14 my-1 font-weight-normal">Rs. {{ $r->cast_price }}</h5>
                                        <span class="text-muted font-13">Amount</span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> <!-- end table-responsive-->
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->

    </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
@endsection