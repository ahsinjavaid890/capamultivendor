@extends('admin.layouts.master')
@section('content')
<main>
<div class="container-fluid px-4">
                        <h1 class="mt-4 text-center main-title">SubCategory</h1>
                        <div class="form-details subcatbody" style="display:none;">
                            <table class="table table-bordered">
                                <tbody>
                                    <td><div class="info-input"><input type="text" id="subcatname" class="form-control subcatname" placeholder="Enter Sub-category name"/></div></td>
                                    <td>
                                        <select type="text" class="form-control selectcat" name="selectcat" id="selectcat">
                                            <option value="0">--select category--</option>
                                            @foreach($cat as $category)
                                            <option value="{{$category->id}}">{{$category->category_name}}</option>
                                            @endforeach

                                         </select>
                                </td>
                                    <td>
                                        <button class="btn btn-success addsubcatprocess">Add</button>
                                        <button class="btn btn-success updatesubcat" style="display:none;">Update</button>
                                        <button class="btn btn-danger subremovecat">Remove</button>
                                </td>
                                </tbody>
                            </table>
                            </div>
                        
                        <div class="col-md-12">
                                <button class="btn btn-outline-success subcattbn"><i class="fa fa-plus"></i></button>
                            </div>
                    <div class="card mb-4">
                                
                                <div class="card-body">
                                    <table id="datatablesSimple">
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
                                                <button class="btn btn-outline-primary updatesub" title="Edit" data="{{$sub->subcatid}},{{$sub->parentCat}},{{$sub->subcat_name}}"><i class="fa fa-pen"></i></button>
                                                <button class="btn btn-outline-danger delete " title="Delete" data="{{$sub->subcatid}}"><i class="fa fa-trash"></i></button>
                                                
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

 <script>
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
 </script>

 <!-- update -->

 <script>
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
 </script>
 
 @endpush