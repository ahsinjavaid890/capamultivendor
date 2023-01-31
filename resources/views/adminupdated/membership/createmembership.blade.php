@extends('adminupdated.layouts.main-layout')
@section('title','Category')
@section('content')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Entry-->
    <div class="flex-column-fluid">
        <div class="container-fluid">
            <form action="{{route('admin.addmemProcess')}}" method="POST" enctype="multipart/form-data">
            @csrf
               <div class="card mb-4">
                    <div class="card-header flex-wrap py-5 d-flex justify-content-between">
                        <div class="card-title">
                            <h3 class="card-label">
                                Create Membership Plan
                                <div class="text-muted pt-2 font-size-sm">Create Membership Plan</div>
                            </h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-detail">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="info-input mb-20px">
                                        <label>Plans Type <span class="link-danger">*</span></label>
                                        <select type="text" class="form-control Addmembership"  id="plan_type" name="plan_type" >
                                            <option value="0">-select plan type-</option>
                                            <option value="1">Regular Plan</option>
                                            <option value="2">Add-Ons</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="info-input mb-20px">
                                        <label>Membership Title <span class="link-danger">*</span></label>
                                        <input type="text" class="form-control Addmembership" placeholder="Write plan title here" id="plan_title" name="plan_title" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="info-input mb-20px">
                                        <label>Amount <span class="link-danger">*</span></label>
                                        <input type="text" class="form-control Addmembership" placeholder="Write plan amount here" id="amount" name="amount" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="info-input mb-20px">
                                        <label> No of products<span class="link-danger">*</span></label>
                                        <input type="text" class="form-control Addmembership" placeholder="Write product quantity here" id="no_of_product" name="no_of_product" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="info-input mb-20px">
                                        <label>Online Directory<span class="link-danger">*</span></label>
                                        <select type="text" class="form-control Addmembership"  id="onlinedirectory" name="onlinedirectory" >                                                
                                            <option value="0">No</option>
                                            <option value="1">Yes</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="info-input mb-20px">
                                        <label>Online Marketplace<span class="link-danger">*</span></label>
                                        <select type="text" class="form-control Addmembership"  id="marketplace" name="marketplace" >
                                            <option value="0">No</option>
                                            <option value="1">Yes</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="info-input mb-20px">
                                        <label>Desctiption <span class="link-danger">*</span></label>
                                        <textarea type="text" class="form-control Addmembership" placeholder="plan details" id="plan_details" name="plan_details" ></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12" style="margin-top:20px;">
                                    <div class="info-input mb-20px">
                                        <button type="submit" class="btn btn-success submit">Submit</button>
                                        <!-- <button type="button" class="btn btn-danger addmore">Add more</button> -->
                                
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--end::Entry-->
</div>
@endsection
@section('script')
<script>
    tinymce.init({
        selector:'textarea#plan_details', 
        plugins: 'lists',              
             
    });
</script>

<script>
    $(function(){
        $("button.submit").click(function(e){
              e.preventDefault();
              var isValid = true;                          
             $("input.Addmembership").each(function(){
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
                
                $("select.Addmembership").each(function(){
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

               
                if(isValid !=true){
                    return false;
                }else{
                    $("#cover-spin").show();
                    $("form").submit();
                    
                }
             
          
        })
    })
</script>
 @endsection