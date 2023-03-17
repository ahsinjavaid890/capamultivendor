@extends('adminupdated.layouts.main-layout')
@section('title','All Attributes')
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
                            All Varients
                            <div class="text-muted pt-2 font-size-sm">Manage All Varients</div>
                        </h3>
                    </div>
                    <div class="card-btn text-end">
                        <button class="btn btn-outline-success " data-toggle="modal" data-target="#addvarients" title="add category"><i class="fa fa-plus"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <table id="example"  class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Varient name</th>                                   
                                
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        
                        <tbody id="catlist">

                          @foreach($cat as $category)
                            <tr>
                                <td>{{$category->varient_name}}</td>
                              
                                <td>
                                @if($category->status==1)
                                <span class="badge badge-warning" style="font-size:12px;">Pending</span>
                                @elseif($category->status==2)
                                <span class="badge badge-success" style="font-size:12px;">Approved</span>
                                @endif
                                </td>
                                <td>
                                @if($category->status==1)
                                <a href="{{route('admin.varientActive',[encrypt($category->id)])}}"><button class="btn btn-outline-warning activate" title="Block" data="{{$category->id}}" ><i class="fa fa-ban"></i></button></a>
                                @elseif($category->status==2)
                                <a href="{{route('admin.varientdeactive',[encrypt($category->id)])}}"><button class="btn btn-outline-success deactivate" title="approved" data="{{$category->id}}"  ><i class="fa fa-check"></i></button></a>
                                @endif
                               
                                <a href="{{route('admin.varientDelete',[encrypt($category->id)])}}"><button class="btn btn-outline-danger delete" title="Delete" data="{{$category->id}}" ><i class="fa fa-trash"></i></button></a>
                               
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



        <!-- Add Varient Modal -->
<div class="modal fade" id="addvarients" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Varients</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form action="{{route('admin.Addvarient')}}" method="POST" id="varientfrm">
                                @csrf
      <div class="modal-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Varient name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="varient_name_body">
                   <tr class="varient_row" id="0">
                       <td><input type="text" class="form-control varient_body" name="varient_name[]" id="varient_name"/></td>
                       <td><button class="btn btn-success addmore_varient"><i class="fa fa-plus"></i></button></td>
                   </tr>
                </tbody>
            </table>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button class="btn btn-success varient_submit">Submit</button>
      </div>
      </form>
    </div>
  </div>
 </div>




        <!-- Add Attribute  -->

<!-- Add Varient Modal -->
<div class="modal fade" id="addattribute" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Attributes</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form action="{{route('admin.AddattributeProcess')}}" method="POST" id="attributefrm">
                                @csrf
      <div class="modal-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Varient Name</th>
                    <th>Varient Attribute</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="attribute_body">
               <tr class="attribute_row" id="0">
                   <td >
                       <select name="varient_name_id[]" id="varient_name_id" class="form-control attribute">
                           <option value="0">-select varient-</option>
                           @foreach($varient_name as $varient)
                           <option value="{{$varient->id}}">{{$varient->varient_name}}</option>
                            @endforeach
                   </select>
                </td>
                   <td><input type="text" class="form-control attribute" name="attribute_name[]" id="attribute_name"/></td>
                   <td><button class="btn btn-success add_attribute"><i class="fa fa-plus"></i></button></td>
               </tr>
            </tbody>
        </table>
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button class="btn btn-success attribute_submit">Submit</button>
      </div>
      </form>
    </div>
  </div>
 </div>








@endsection
@section('script')
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

     $("button.addsizebtn").click(function(e){
            e.preventDefault();
            $(".sizebody").show();
            $(this).hide();
            $("#sizename").val('');
            
     })
     $("button.removeattr").click(function(e){
         e.preventDefault();
         $(".sizebody").hide();
         $(".addsizebtn").show();
     })
 </script>

 <script>
      $(function(){
        $("button.addmore_varient").click(function(e){
            e.preventDefault();
            var row_count = $(".varient_row").length; 
            $("#varient_name_body").append(' <tr class="varient_row" id="'+row_count+'"> <td><input type="text" class="form-control varient_body" name="varient_name[]" id="varient_name"/></td><td><button class="btn btn-danger remove_varient'+row_count+'"><i class="fa fa-minus"></i></button></td></tr>')

            $("button.remove_varient"+row_count).click(function(e){
            e.preventDefault();
            $(this).closest('tr#'+row_count).remove();
        })
        })


        // attribute

        $("button.add_attribute").click(function(e){
            e.preventDefault();
            var row_count = $(".attribute_row").length; 
            $("#attribute_body").append('<tr class="attribute_row" id="'+row_count+'"> <td > <select name="varient_name_id[]" id="varient_name_id" class="form-control attribute"> <option value="0">-select varient-</option> @foreach($varient_name as $varient) <option value="{{$varient->id}}">{{$varient->varient_name}}</option> @endforeach </select> </td><td><input type="text" class="form-control attribute" name="attribute_name[]" id="attribute_name"/></td><td><button class="btn btn-danger remove_attribute'+row_count+'"><i class="fa fa-minus"></i></button></td></tr>')

            $("button.remove_attribute"+row_count).click(function(e){
            e.preventDefault();
            $(this).closest('tr#'+row_count).remove();
        })
        })

        
    })
 </script>

 <script>
     $(function(){
         $("button.varient_submit").click(function(e){
             e.preventDefault();
             var isValid = true;
             $("input.varient_body").each(function(){
                 if($(this).val()==''){
                     isValid=false;
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

             if(isValid!=true){
                 e.preventDefault();
                 return false;
             }else{
                 $("form#varientfrm").submit();
             }
         })

        //  attribute 

        $("button.attribute_submit").click(function(e){
             e.preventDefault();
             var isValid = true;
             $("input.attribute").each(function(){
                 if($(this).val()==''){
                     isValid=false;
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

             $("select.attribute").each(function(){
                 if($(this).val()=='0'){
                     isValid=false;
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

             if(isValid!=true){
                 e.preventDefault();
                 return false;
             }else{
                 $("form#attributefrm").submit();
             }
         })
     })
 </script>



 


 
@endsection
