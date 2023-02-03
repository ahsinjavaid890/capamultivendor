@extends('adminupdated.layouts.main-layout')
@section('title','Sub Category')
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
                            All Sub Category
                            <div class="text-muted pt-2 font-size-sm">Manage All Sub Category</div>
                        </h3>
                    </div>
                    <div class="card-btn text-end">
                        <button class="btn btn-outline-success addcatbtn" data-toggle="modal" data-target="#addcategory" title="add category"><i class="fa fa-plus"></i>Add Category</button>
                    </div>
                </div>
                <div class="card-body">
                        <table id="example" class="table table-bordered">
	                        <thead>
	                            <tr>
	                                <th>SubCategory Name</th>                                          
	                                <th>Category Name</th>
	                                <th>Status</th>
	                                <th>Action</th>
	                            </tr>
	                        </thead>
	                        
	                        <tbody>
	                          @foreach($subcat as $sub)
	                            <tr>
	                                <td>{{$sub->subcat_name}}</td>
	                                <td>{{$sub->cat_name}}</td>
	                              
	                                <td>
	                               @if($sub->subcat_status==1)
	                                <span class="badge badge-warning" style="font-size:12px;">Pending</span>
	                              @elseif($sub->subcat_status==2)
	                                <span class="badge badge-success" style="font-size:12px;">Approved</span>
	                               @endif
	                                </td>
	                                <td>
	                                @if($sub->subcat_status==1)
	                                <button class="btn btn-outline-warning activate" title="Block" data="{{$sub->subcatid}}"><i class="fa fa-ban"></i></button>
	                                @elseif($sub->subcat_status==2)
	                                <button class="btn btn-outline-success deactivate" title="Block" data="{{$sub->subcatid}}"><i class="fa fa-check"></i></button>
	                                @endif
	                                <button class="btn btn-outline-primary updatesub"data-toggle="modal" data-target="#updatesubcategory{{$sub->subcatid}}" title="Edit"><i class="fa fa-pen"></i></button>
	                                <button class="btn btn-outline-danger delete " title="Delete" data="{{$sub->subcatid}}"><i class="fa fa-trash"></i></button>
	                                
	                                </td>
	                            </tr>
                                <!-- update Category -->
                                <div class="modal fade" id="updatesubcategory{{$sub->subcatid}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Update Sub Category</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                        <form enctype="multipart/form-data" action="{{route('admin.subcategoryupdate')}}" method="POST">
                                            @csrf
                                          <input type="hidden" value="{{ $sub->subcatid }}" name="subcat_id">
                                          <div class="modal-body">
                                            <div class="form-group">
                                                <select type="text" class="form-control selectcat" name="selectcat" id="selectcat">
                                                <option value="">Select Sub Category</option>
                                                @foreach($cat as $category)
                                                <option @if($sub->category_name == $category->id) selected @endif value="{{$category->id}}">{{$category->category_name}} </option>
                                                @endforeach

                                             </select>
                                             </div>
                                            <div class="form-group">
                                                <input type="text" name="subcatname" class="form-control subcatname" value="{{ $sub->subcat_name}}" placeholder="Sub Category Name"/>
                                            </div>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-success">Save</button>
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
        <h5 class="modal-title" id="exampleModalLabel">Add Sub Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form enctype="multipart/form-data" action="{{route('admin.addsubCategory')}}" method="POST">
        @csrf
      <div class="modal-body">
        <div class="form-group">
            <select required type="text" class="form-control selectcat" name="selectcat" id="selectcat">
            <option value="">Select Category</option>
            @foreach($cat as $category)
            <option value="{{$category->id}}">{{$category->category_name}}</option>
            @endforeach

         </select>
         </div>
        <div class="form-group">
        	<input required type="text" name="subcatname" class="form-control subcatname" placeholder="Sub Category Name"/>
        </div>
      </div>
      <div class="modal-footer">
      	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Save</button>
      </div>
    </form>
    </div>
  </div>
 </div>



						 <!-- Update Category Modal -->
<!-- 
<div class="modal fade" id="updatecategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
        	<input type="text" id="catname" class="form-control catname" placeholder="Enter Category name"/>
        </div>
        <div class="form-group">
			<input type="file" id="caticon" class="form-control caticon" placeholder="upload category icons"/>	
		</div>
        <div class="form-group">
                <button class="btn btn-success updatecatprocess" =>Update</button>
                <button class="btn btn-danger removecat">Remove</button>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
 </div>			 
 -->




@endsection
@section('script')
<!-- <script>
     $("button.subcattbn").click(function(e){
            e.preventDefault();
            $(".subcatbody").show();
            $(this).hide();
            $("#subcatname").val('');
            $("#selectcat").val('0');
            
     })
     $("button.subremovecat").click(function(e){
         e.preventDefault();
         $(".subcatbody").hide();
         $(".subcattbn").show();
     })
 </script>
 -->
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
                    url:"{{route('admin.subcategoryActive')}}",
                    type:"POST",
                    data:form,
                    cache:false,
                    contentType:false,
                    processData:false,
                    success:function(res){
                        var js_data = JSON.parse(res);
                        $("#cover-spin").hide();
                        if(js_data==1){
                            toastr.success('Subcategory activated successfull!');
                            location.reload();
                        }else{
                            toastr.error('something went wrong!');
                         return false;   
                    }
                }
                })
            }
        })

      
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
                    url:"{{route('admin.subcategoryDeactive')}}",
                    type:"POST",
                    data:form,
                    cache:false,
                    contentType:false,
                    processData:false,
                    success:function(res){
                        var js_data = JSON.parse(res);
                        $("#cover-spin").hide();
                        if(js_data==1){
                            toastr.success('Subcategory deactivated successfull!');
                            location.reload();
                        }else{
                            toastr.error('something went wrong!');
                         return false;   
                    }
                }
                })
            }
        })

     

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
                    url:"{{route('admin.subcategoryDelete')}}",
                    type:"POST",
                    data:form,
                    cache:false,
                    contentType:false,
                    processData:false,
                    success:function(res){
                        var js_data = JSON.parse(res);
                        $("#cover-spin").hide();
                        if(js_data==1){
                            toastr.success('Sub category deleted successfull!');
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

 <!-- add sub cat -->

<!--  <script>
     $(function(){
         $("button.addsubcatprocess").click(function(e){
             e.preventDefault();
             var isValid = true;
             $("input.subcatname").each(function(){
                    if($.trim($(this).val())==''){
                        isValid = false;
                        $(this).css({
                            "border": "1px solid red",
                            "background": "#FFCECE",
                        })
                        }else{
                        $(this).css({
                            'background':'',
                            'border':''
                        })                        
                    }
                })

                $("select.selectcat").each(function(){
                    if($.trim($(this).val())=='0'){
                        isValid = false;
                        $(this).css({
                            "border": "1px solid red",
                            "background": "#FFCECE",
                        })
                        }else{
                        $(this).css({
                            'background':'',
                            'border':''
                        })                        
                    }
                })

                    if(isValid != true){
                        e.preventDefault();
                        return false;
                    }else{
                        $("#cover-spin").show();
                        var subcatname = $("#subcatname").val();
                        var parentcat = $("#selectcat").val();
                        var form = new FormData();
                        form.append('subcatname',subcatname);
                        form.append('parentcat',parentcat);
                        $.ajax({
                            url:"{{route('admin.addsubCategory')}}",
                            type:"POST",
                            data:form,
                            cache:false,
                            contentType:false,
                            processData:false,
                            success:function(res){
                                var js_data = JSON.parse(res);
                                $("#cover-spin").hide();
                                if(js_data==2){
                                    toastr.success('Sub Category created successfull!');
                                    location.reload();
                                }else if(js_data==1){
                                    toastr.error('category already exist');
                                return false;   
                            }else if(js_data.msg==3){
                                toastr.error('something went wrong');
                                return false; 
                            }
                        }

                        })
                    }
            
         })
     })
 </script> -->

 <!-- update -->

 <!-- <script>
     $(function(){
        $("button.updatesub").click(function(e){
            e.preventDefault();
            $(".subcatbody").show();
            $(".subcattbn").hide();
            $(".addsubcatprocess").hide();             
             $(".updatesubcat").show();
            var data = $(this).attr('data');
            var listdata = data.split(',');
            $(".updatesubcat").attr('data',listdata[0]);
            $(".subcatname").val(listdata[2]);
            $(".selectcat option").each(function(){
                if($(this).val()==listdata[1]){
                    $(this).attr('selected','selected');
                }
            })

           
         })


         $("button.updatesubcat").click(function(e){
            e.preventDefault();
             var isValid = true;
             $("input.subcatname").each(function(){
                    if($.trim($(this).val())==''){
                        isValid = false;
                        $(this).css({
                            "border": "1px solid red",
                            "background": "#FFCECE",
                        })
                        }else{
                        $(this).css({
                            'background':'',
                            'border':''
                        })                        
                    }
                })

                $("select.selectcat").each(function(){
                    if($.trim($(this).val())=='0'){
                        isValid = false;
                        $(this).css({
                            "border": "1px solid red",
                            "background": "#FFCECE",
                        })
                        }else{
                        $(this).css({
                            'background':'',
                            'border':''
                        })                        
                    }
                })
                    if(isValid != true){
                        e.preventDefault();
                        return false;
                    }else{
                        $("#cover-spin").show();
                        var subcat_id = $(this).attr('data');
                        var subcatname = $("#subcatname").val();
                        var parentcat = $("#selectcat").val();
                        var form = new FormData();
                        form.append('subcatname',subcatname);
                        form.append('parentcat',parentcat);
                        form.append('subcat_id',subcat_id);
                        $.ajax({
                            url:"{{route('admin.subcategoryupdate')}}",
                            type:"POST",
                            data:form,
                            cache:false,
                            contentType:false,
                            processData:false,
                            success:function(res){
                                var js_data = JSON.parse(res);
                                $("#cover-spin").hide();
                                if(js_data==2){
                                    toastr.success('Sub Category Updated successfull!');
                                    location.reload();
                                }else if(js_data==1){
                                    toastr.error('category already exist');
                                return false;   
                            }else if(js_data.msg==3){
                                toastr.error('something went wrong');
                                return false; 
                            }
                        }

                    });
                }

         })

     })
 </script> -->
 
@endsection