@extends('seller.layouts.master')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4 text-center main-title">Service</h1>                   
        <div class="col-md-12">
            <a href="{{route('seller.addService')}}"><button class="btn btn-outline-success addcatbtn" title="add category"><i class="fa fa-plus"></i></button></a>
        </div>
        <div class="card mb-4">     
            <div class="card-body">
                <table id="datatablesSimple">
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
                    
                    <tbody id="catlist">
                        @foreach($services as $service)
                        <tr>
                            <td>{{$service->service_name}}</td>
                            <td>{{$service->catname}}</td>
                            <td>{{$service->subcat_name}}</td>
                            <td><img src="{{asset('uploads/'.$service->image)}}" style="width:100px" /></td>
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
    </div>
</main>
 @stop
 
 @push('otherscript')

 
 @endpush