@extends('adminupdated.layouts.main-layout')
@section('title','All Brands')
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
                            All Brands
                            <div class="text-muted pt-2 font-size-sm">Manage All Brands</div>
                        </h3>
                    </div>
                    <div class="card-btn text-end">
                    	<button class="btn btn-outline-success addcatbtn" data-toggle="modal" data-target="#addnewbrand" title="add category"><i class="fa fa-plus"></i>Add Brand</button>
                    </div>
                </div>
                <div class="card-body">
                    <table id="example" class="table table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                	<th>Icon</th>
                                    <th>Brand Name</th>                                          
                                    <th>Action</th>
                                </tr>
                            </thead>
                            
                            <tbody id="catlist">

                              @foreach($data as $r)
                                <tr>
                                	<td><img src="{{ url('public/images') }}/{{ $r->icon }}" width="120" /></td>
                                    <td>{{$r->name}}</td>
                                
                                    <td>
                                    <button class="btn btn-outline-primary" data-toggle="modal" data-target="#updatecategory{{ $r->id }}"  title="Edit"><i class="fa fa-pen"></i> Edit</button>
                                    <!-- <button class="btn btn-outline-danger delete" title="Delete" data="{{$r->id}}" ><i class="fa fa-trash"></i></button> -->
                                   
                                    </td>
                                </tr>


                                <div class="modal fade" id="updatecategory{{ $r->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								  <div class="modal-dialog" role="document">
								    <div class="modal-content">
								      <div class="modal-header">
								        <h5 class="modal-title" id="exampleModalLabel">Update Brand</h5>
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

								          <span aria-hidden="true">&times;</span>
								        </button>
								      </div>
								      <form enctype="multipart/form-data" action="{{ url('admin/updatebrand') }}" method="POST">
								      	@csrf
								      	<input type="hidden" value="{{ $r->id }}" name="id">
								      <div class="modal-body">
								        <div class="form-group">
                                            <label>Brand Name</label>
								        	<input value="{{$r->name}}" type="text" name="name" class="form-control catname" placeholder="Enter Category name"/>
								        </div>
								        <div class="form-group">
                                            <label>Brand Image</label>
											<input type="file" name="icon" class="form-control caticon" placeholder="upload category icons"/>	
										</div>
								      </div>
								      <div class="modal-footer">
								        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								       	<button type="submit" class="btn btn-success">Update Brand</button>
								      </div>
								      </form>
								    </div>
								  </div>
								 </div>	

                                @endforeach
                                                         
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>

<div class="modal fade" id="addnewbrand" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Brand</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form enctype="multipart/form-data" action="{{ url('admin/addbrand') }}" method="POST">
        @csrf
      <div class="modal-body">
        <div class="form-group">
            <label>Brand Name</label>
            <input type="text" name="name" class="form-control catname" placeholder="Enter Category name"/>
        </div>
        <div class="form-group">
            <label>Brand Image</label>
            <input type="file" name="icon" class="form-control caticon" placeholder="upload category icons"/>    
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Update Brand</button>
      </div>
      </form>
    </div>
  </div>
 </div> 
@endsection
