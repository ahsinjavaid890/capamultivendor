@extends('admin.layouts.master')
@section('content')
<main>
<div class="container-fluid px-4">
                        <h1 class="mt-4 text-center main-title">Category</h1>
                            <div class="form-details catbody" style="display:none;">
                            <table class="table table-bordered">
                                <tbody>
                                    <td><div class="info-input"><input type="text" id="catname" class="form-control catname" placeholder="Enter Category name"/></div></td>
                                    <td><div class="info-input"><input type="file" id="caticon" class="form-control caticon" placeholder="upload category icons"/></div></td>
                                    
                                    <td>
                                        <button class="btn btn-success addcatprocess">Add</button>
                                        <button class="btn btn-success updatecatprocess" style="display:none;">Update</button>
                                        <button class="btn btn-danger removecat">Remove</button>
                                </td>
                                </tbody>
                            </table>
                            </div>

                        <div class="col-md-12">
                                <button class="btn btn-outline-success addcatbtn" title="add category"><i class="fa fa-plus"></i></button>
                            </div>
                    <div class="card mb-4">
                                
                                <div class="card-body">
                                    <table id="datatablesSimple">
                                        <thead>
                                            <tr>
                                                <th>Category Name</th>                                          
                                                <th>Icon</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody id="catlist">

                                          @foreach($cat as $category)
                                            <tr>
                                                <td>{{$category->category_name}}</td>
                                                <td><img src="{{asset('products/'.$category->icon)}}" style="width:50px"/></td>
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
                                                <button class="btn btn-outline-primary update" title="Edit" id="{{$category->id}}" data="{{$category->category_name}}"><i class="fa fa-pen"></i></button>
                                                <button class="btn btn-outline-danger delete" title="Delete" data="{{$category->id}}" ><i class="fa fa-trash"></i></button>
                                               
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

 <script>
     $("button.addcatbtn").click(function(e){
            e.preventDefault();
            $(".catbody").show();
            $(this).hide();
            $("#catname").val('');
            
     })
     $("button.removecat").click(function(e){
         e.preventDefault();
         $(".catbody").hide();
         $(".addcatbtn").show();
     })
 </script>

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

 <!-- add category -->

 <script>
     $(function(){
         $("button.addcatprocess").click(function(e){
             e.preventDefault();
             var isValid = true;
             $("input.catname").each(function(){
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
                    if(isValid != true){
                        e.preventDefault();
                        return false;
                    }else{
                        $("#cover-spin").show();
                        var catname = $("#catname").val();
                        var caticon = $("#caticon")[0].files;
                        var form = new FormData();
                        form.append('catname',catname);
                        form.append('caticon',caticon[0]);
                        $.ajax({
                            url:"{{route('admin.addCategory')}}",
                            type:"POST",
                            data:form,
                            cache:false,
                            contentType:false,
                            processData:false,
                            success:function(res){
                                var js_data = JSON.parse(res);
                                $("#cover-spin").hide();
                                if(js_data==2){
                                    toastr.success('Category created successfull!');
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
 </script>

 <!-- update -->
 <script>
     $(function(){
         $("button.update").click(function(e){
            e.preventDefault();
            $(".catbody").show();
            $(".addcatbtn").hide();
            $(".addcatprocess").hide();
           var cat=  $(this).attr('data');           
            $("#catname").val(cat);
            $(".updatecatprocess").show();
            var catid = $(this).attr('id');
            $('.updatecatprocess').attr('data',catid);
         })

         $("button.updatecatprocess").click(function(e){
             e.preventDefault();
             var isValid = true;
             $("input.catname").each(function(){
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
                    if(isValid != true){
                        e.preventDefault();
                        return false;
                    }else{
                        $("#cover-spin").show();
                        var cat_id = $(this).attr('data');
                        var catname = $("#catname").val();
                        var caticon = $("#caticon")[0].files;
                        var form = new FormData();
                        form.append('catname',catname);
                        form.append('catid',cat_id);
                        form.append('caticon',caticon[0]);
                        $.ajax({
                            url:"{{route('admin.categoryupdate')}}",
                            type:"POST",
                            data:form,
                            cache:false,
                            contentType:false,
                            processData:false,
                            success:function(res){
                                var js_data = JSON.parse(res);
                                $("#cover-spin").hide();
                                if(js_data==2){
                                    toastr.success('Category Updated successfull!');
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
 </script>
 
 @endpush