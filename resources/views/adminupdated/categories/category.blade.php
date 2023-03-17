@extends('adminupdated.layouts.main-layout')
@section('title','Category')
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
                            All Category
                            <div class="text-muted pt-2 font-size-sm">Manage All Category</div>
                        </h3>
                    </div>
                    <div class="card-btn text-end">
                    	<button class="btn btn-outline-success addcatbtn" data-toggle="modal" data-target="#addcategory" title="add category"><i class="fa fa-plus"></i>Add Category</button>
                    </div>
                </div>
                <div class="card-body">
                    <table id="example" class="table table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                	<th>Icon</th>
                                    <th>Category Name</th>                                          
                                    <th>Homepage Show</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            
                            <tbody id="catlist">

                              @foreach($cat as $category)
                                <tr>
                                	<td class="text-center"><img class="img-thumbnail" src="{{asset('public/products/'.$category->icon)}}" style="width:100px;height: 100px;" /></td>
                                    <td>{{$category->category_name}}</td>
                                    <td>
                                        @if($category->show_on_homepage == 1)

                                        Yes

                                        @else 

                                        No

                                        @endif

                                    </td>
                                    <td>
                                    @if($category->status==1)
                                    <span class="badge badge-warning" style="font-size:12px;">Pending</span>
                                    @elseif($category->status==2)
                                    <span class="badge badge-success" style="font-size:12px;">Approved</span>
                                    @endif
                                    </td>
                                    <td>
                                    @if($category->status==1)
                                    <button class="btn btn-outline-warning activate" title="Block" data="{{$category->id}}" ><i class="fa fa-ban"></i></button>
                                    @elseif($category->status==2)
                                    <button class="btn btn-outline-success deactivate" title="approved" data="{{$category->id}}"  ><i class="fa fa-check"></i></button>
                                    @endif
                                    <button class="btn btn-outline-primary" data-toggle="modal" data-target="#updatecategory{{ $category->id }}"  title="Edit"><i class="fa fa-pen"></i></button>
                                    <button class="btn btn-outline-danger delete" title="Delete" data="{{$category->id}}" ><i class="fa fa-trash"></i></button>
                                   
                                    </td>
                                </tr>


                                <div class="modal fade" id="updatecategory{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								  <div class="modal-dialog" role="document">
								    <div class="modal-content">
								      <div class="modal-header">
								        <h5 class="modal-title" id="exampleModalLabel">Update Category</h5>
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

								          <span aria-hidden="true">&times;</span>
								        </button>
								      </div>
								      <form enctype="multipart/form-data" action="{{route('admin.categoryupdate')}}" method="POST">
								      	@csrf
								      	<input type="hidden" value="{{ $category->id }}" name="catid">
								      <div class="modal-body">
								        <div class="form-group">
								        	<input value="{{$category->category_name}}" type="text" name="catname" class="form-control catname" placeholder="Enter Category name"/>
								        </div>
								        <div class="form-group">
											<input type="file" name="caticon" class="form-control caticon" placeholder="upload category icons"/>	
										</div>
                                        <div class="form-group">
                                            <select required class="form-control" name="show_on_homepage">
                                                <option value="">Show On Homepage</option>
                                                <option value="1" @if($category->show_on_homepage == 1) selected @endif>Yes</option>
                                                <option value="0" @if($category->show_on_homepage == 0) selected @endif>No</option>
                                            </select>    
                                        </div>
								      </div>
								      <div class="modal-footer">
								        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								       	<button type="submit" class="btn btn-success">Save Category</button>
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



			<!-- Add Category Modal -->
<div class="modal fade" id="addcategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form enctype="multipart/form-data" action="{{route('admin.addCategory')}}" method="POST">
      	@csrf
      <div class="modal-body">
        <div class="form-group">
        	<input required type="text" name="catname" class="form-control catname" placeholder="Enter Category name"/>
        </div>
        <div class="form-group">
			<input required type="file" name="caticon" class="form-control caticon" placeholder="upload category icons"/>	
		</div>
        <div class="form-group">
            <select required class="form-control" name="show_on_homepage">
                <option value="">Show On Homepage</option>
                <option value="1">Yes</option>
                <option value="0">Mo</option>
            </select>    
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       	<button type="submit" class="btn btn-success">Add Category</button>
      </div>
      </form>
    </div>
  </div>
 </div>



						 <!-- Update Category Modal -->

		 




@endsection
@section('script')
 <script>
     $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
 </script>

 <script>
     $(function(){
        $("button.activate").click(function(e){
            e.preventDefault();
            if(!confirm("Are you sure want to change this status")){
                return false;
            }else{
                $("#cover-spin").show();
                var id = $(this).attr('data');
                var form = new FormData();
                form.append('id',id);
                $.ajax({
                    url:"{{route('admin.categoryActive')}}",
                    type:"POST",
                    data:form,
                    cache:false,
                    contentType:false,
                    processData:false,
                    success:function(res){
                        var js_data = JSON.parse(res);
                        $("#cover-spin").hide();
                        if(js_data==1){
                            toastr.success('Category activated successfull!');
                            location.reload();
                        }else{
                            toastr.error('somethign went wrong!');
                         return false;   
                    }
                }
                })
            }
        })

        // deactivate vendor
        $("button.deactivate").click(function(e){
            e.preventDefault();
            if(!confirm("Are you sure want to change this status")){
                return false;
            }else{
                $("#cover-spin").show();
                var id = $(this).attr('data');
                var form = new FormData();
                form.append('id',id);
                $.ajax({
                    url:"{{route('admin.categorydeactive')}}",
                    type:"POST",
                    data:form,
                    cache:false,
                    contentType:false,
                    processData:false,
                    success:function(res){
                        var js_data = JSON.parse(res);
                        $("#cover-spin").hide();
                        if(js_data==1){
                            toastr.success('Cateogry deactivated successfull!');
                            location.reload();
                        }else{
                            toastr.error('somethign went wrong!');
                         return false;   
                    }
                }
                })
            }
        })

        // delete vendor

        $("button.delete").click(function(e){
            e.preventDefault();
            if(!confirm("Are you sure want to delete this")){
                return false;
            }else{
                $("#cover-spin").show();
                var id = $(this).attr('data');
                var form = new FormData();
                form.append('id',id);
                $.ajax({
                    url:"{{route('admin.categoryDelete')}}",
                    type:"POST",
                    data:form,
                    cache:false,
                    contentType:false,
                    processData:false,
                    success:function(res){
                        var js_data = JSON.parse(res);
                        $("#cover-spin").hide();
                        if(js_data==1){
                            toastr.success('Category deleted successfull!');
                            location.reload();
                        }else{
                            toastr.error('somethign went wrong!');
                         return false;   
                    }
                }
                })
            }
        })



     })
 </script> 
@endsection