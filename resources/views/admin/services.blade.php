@extends('admin.layouts.master')
@section('content')
<main>
<div class="container-fluid px-4">
                        <h1 class="mt-4 text-center main-title">Service</h1>
                           
                       
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

                            
</div>
                </main>
 @stop
 
 @push('otherscript')

 
 @endpush