@extends('adminupdated.layouts.main-layout')
@section('title','All Submited Proposal')
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
                            All Submited Proposal
                            <div class="text-muted pt-2 font-size-sm">Manage All Submited Proposal</div>
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                	<table class="table table-condensed table-bordered" id="datatablesSimple">
                        <thead>
                        <tr>
                          <th>Request</th>                                       
                          <th>Request Sender</th>
                          <th>Cost</th>
                          <th>Time Line</th>
                          <th>Status</th>
                          <th>Actions</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($data as $r)
                        
                        <tr>                                        
                            <td>
                                <a class="btn btn-primary" href="{{route('admin.viewRequestDetails',[encrypt($r->request_id)])}}">View Request</a>
                            </td>
                            <td>
                                @if($r->vendor_id == 0)


                                Admin

                                @else


                                Vendor

                                @endif

                            </td>
                            <td>{{$r->product_cost}}</td>
                            <td>{{$r->product_timeline}}</td>  
                            <td>{{$r->status}}</td>    
                            <td>{{$r->email}}</td>                         
                            <td class="text-center">
                                <div class="btn-group">
                                    
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    
                        </tbody>
                        </table>
                            <!-- Modal -->
                             
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection