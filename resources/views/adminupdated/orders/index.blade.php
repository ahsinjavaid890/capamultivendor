@extends('adminupdated.layouts.main-layout')
@section('title','All Orders')
@section('content')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class=" container-fluid ">
            <!--begin::Card-->
            <div class="card card-custom mt-5">
                <div class="card-header flex-wrap py-5">
                    <div class="card-title">
                        <h3 class="card-label">
                            Search Orders
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-lg-8">
                            <form method="get" action="{{ url('admin/ecommerece/searchorder') }}" class="">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group mb-2">
                                            <label for="inputPassword2" class="sr-only">Search</label>
                                            <input type="search" name="keyword" class="form-control" id="inputPassword2" placeholder="Search By Order Number">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group mb-2">
                                            <select class="custom-select" name="payment_method" id="status-select">
                                                <option value="">Payment Type</option>
                                                <option value="stripe">Stripe</option>
                                                <option value="cod">Cod</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group mb-2">
                                            <select class="custom-select" name="orderstatus" id="status-select">
                                                <option value="">Order Status</option>
                                                <option value="completed">Completed </option>
                                                <option value="shipped">Shipped</option>
                                                <option value="received">Received To Customer</option>
                                                <option value="cancled">Canceled</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group mb-2">
                                            <button class="btn btn-primary" type="submit">Search</button>
                                        </div>
                                    </div>
                                </div>
                                
                                
                            </form>                            
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="card card-custom mt-5">
                <div class="card-header flex-wrap py-5">
                    <div class="card-title">
                        <h3 class="card-label">
                            All Orders
                            <div class="text-muted pt-2 font-size-sm">Manage All Orders</div>
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Order Number</th>
                                <th>Date</th>
                                <th>Sub Total</th>
                                <th>Delivery Fee</th>
                                <th>Total</th>
                                <th>Order Status</th>
                                <th style="width: 125px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $r)
                            <tr @if($r->newstatus == 'new') style="background-color: #DDD;" @endif>
                                <td><a href="{{url('admin/ecommerece/orderdetail')}}/{{ $r->id }}" class="text-body font-weight-bold">{{ $r->order_number }}</a> @if($r->newstatus == 'new') <small class="badge badge-success">New</small>@endif </td>
                                <td>
                                    {{ date('d M Y', strtotime($r->created_at)) }}   <small class="text-muted">{{ date('h:i A', strtotime($r->created_at)) }}</small>
                                </td>
                                <td>
                                    {{ Cmf::currency($r->grand_total)  }}
                                    <small class="badge badge-success">@if($r->payment_method == 2)
                                    COD
                                    @else

                                    Stripe

                                    @endif</small>
                                </td>
                                <td>
                                    {{ $r->delivery }}
                                </td>
                                <td>
                                    @if($r->delivery == 'express')
                                    {{ Cmf::currency($r->grand_total+30)  }}
                                    @else
                                    {{ Cmf::currency($r->grand_total)  }}
                                    @endif
                                </td>
                                <td style="font-size: 18px;">
                                    <span class="badge @if($r->status == 'completed') badge-warning @endif @if($r->status == 'shipped') badge-warning @endif @if($r->status == 'received') badge-success @endif custom-success"> 
                                        @if($r->status == 'completed')
                                        Pending
                                        @else
                                        {{$r->status}}
                                        @endif
                                    </span>
                                </td>
                                <td style="width:150px;">
                                    <a href="{{url('admin/ecommerece/orderdetail')}}/{{ $r->id }}" class="btn btn-sm btn-primary"> <i class="fa fa-eye"></i>Order Details</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div id="pagination" style="margin-top: 50px;">
                        {!! $data->links('adminupdated.pagination.index') !!}
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