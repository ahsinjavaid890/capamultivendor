@extends('adminupdated.layouts.main-layout')
@section('title','All Services')
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
                            All Services
                            <div class="text-muted pt-2 font-size-sm">Manage All Services</div>
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <table id="example" class="table table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Photo</th>
                                <th>Service name</th>                                          
                                <th>Category</th>
                                <th>Sub-category</th>
                                
                                <th>Contact Details</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                             @foreach($services as $service)
                                <tr>
                                    <td><img src="{{asset('public/uploads/'.$service->image)}}" width="120" /></td>
                                    <td>{{$service->service_name}}</td>
                                    <td>{{$service->catname}}</td>
                                    <td>{{$service->subcat_name}}</td>
                                    
                                    <td>{{$service->contact_details}}</td>
                                    <td>
                                        @if($service->status==1)
                                        Pending
                                        @elseif($service->status==2)  
                                        Activate
                                        @elseif($service->status==3)
                                        Deactivate 

                                        @endif 
                                    </td>
                                    <td>
                                       <a href="{{route('admin.servicesDelete',[encrypt($service->id)])}}"> <button class="btn btn-danger">Delete</button></a>
                                       @if($service->status==1)
                                       <a href="{{route('admin.activateService',[encrypt($service->id)])}}"> <button class="btn btn-outline-warning">Activate</button></a>
                                       @elseif($service->status==2)
                                       <a href="{{route('admin.deactivateService',[encrypt($service->id)])}}"> <button class="btn btn-outline-danger">Deactivate</button></a>
                                       @elseif($service->status==3)
                                       <a href="{{route('admin.activateService',[encrypt($service->id)])}}"> <button class="btn btn-outline-warning">Activate</button></a>
                                       @endif
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