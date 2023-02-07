@extends('sellerupdated.layouts.main-layout')
@section('title','All Serivces')
@section('content')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Card-->
            <div class="card card-custom mt-5">
                <div class="card-header flex-wrap py-5">
                    <div class="card-title">
                        <h3 class="card-label">
                            All Serivces
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                     <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Service name</th>                                          
                                <th>Category</th>
                                <th>Sub-category</th>
                                <th>Photo</th>
                                <th>Contact Details</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($services as $service)
                            <tr>
                                <td>{{$service->service_name}}</td>
                                <td>{{$service->catname}}</td>
                                <td>{{$service->subcat_name}}</td>
                                <td><img src="{{asset('public/uploads/'.$service->image)}}" style="width:100px" /></td>
                                <td>{{$service->contact_details}}</td>
                                <td>
                                   <a href="{{route('seller.servicesDelete',[encrypt($service->id)])}}"> <button class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
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
@section('script')
@endsection