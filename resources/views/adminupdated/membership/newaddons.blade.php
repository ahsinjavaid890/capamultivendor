@extends('adminupdated.layouts.main-layout')
@section('title','Category')
@section('content')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Entry-->
    <div class="flex-column-fluid">
        <div class="container-fluid">
            <form action="{{route('admin.addnsprocess')}}" method="POST" enctype="multipart/form-data">
                @csrf
               <div class="card mb-4">
                    <div class="card-header flex-wrap py-5 d-flex justify-content-between">
                        <div class="card-title">
                            <h3 class="card-label">
                                Add New Addons
                                <div class="text-muted pt-2 font-size-sm">Add New Addons</div>
                            </h3>
                        </div>
                    </div>
                    <div class="card-body">
                       <div class="form-detail">
                            <div class="row">
                                <div class="col-md-12" style="margin-bottom:10px">
                                    <div class="info-input mb-20px">
                                        <label>Plans Type <span class="link-danger">*</span></label>
                                        <select type="text" class="form-control Addmembership"  id="plan_type" name="plan_type" >
                                            <option value="0">-select plan type-</option>
                                            @foreach($plans as $plan)
                                            <option value="{{$plan->id}}">{{$plan->title}}</option>                                                
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Benefits</th>
                                                <th>Qty</th>
                                                <th>Price</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody id="addons">
                                            <tr class="addonsrow" id="0">
                                                <td><input type="checkbox" name="benefits[]" value="online_support" class="Addmembership"/><label>Online support</label></td>
                                                <td><input type="text" class="form-control Addmembership" name="qty[]"/></td>
                                                <td><input type="text" class="form-control Addmembership" name="price[]"/></td>                                               
                                            </tr>

                                            <tr class="addonsrow" id="1">
                                                <td><input type="checkbox" name="benefits[]" value="no_of_product"/><label>Adding Additional Product</label></td>
                                                <td><input type="text" class="form-control Addmembership" name="qty[]"/></td>
                                                <td><input type="text" class="form-control Addmembership" name="price[]"/></td>                                               
                                            </tr>

                                            <tr class="addonsrow" id="0">
                                                <td><input type="checkbox" name="benefits[]" value="upload_product"/><label>Assist in uploading product info in account,per products </label> </td>
                                                <td><input type="text" class="form-control Addmembership" name="qty[]"/></td>
                                                <td><input type="text" class="form-control Addmembership" name="price[]"/></td>                                               
                                            </tr>

                                            <tr class="addonsrow" id="0">
                                                <td><input type="checkbox" name="benefits[]" value="taking_photo"/><label>Assist in taking photo per products</label></td>
                                                <td><input type="text" class="form-control Addmembership" name="qty[]"/></td>
                                                <td><input type="text" class="form-control Addmembership" name="price[]"/></td>                                               
                                            </tr>

                                            <tr class="addonsrow" id="0">
                                                <td><input type="checkbox" name="benefits[]" value="fullaccount"/><label>Full account assist,4 product,update once a weeak/month</label> </td>
                                                <td><input type="text" class="form-control Addmembership" name="qty[]"/></td>
                                                <td><input type="text" class="form-control Addmembership" name="price[]"/></td>                                               
                                            </tr>
                                        </tbody>
                                    </table>
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
            </form>
        </div>
    </div>
    <!--end::Entry-->
</div>
@endsection
@section('script')
<script>
    $(function(){
        $("button.addmore").click(function(e){
            e.preventDefault();
            var row_count = $(".addonsrow").length; 
            $("#addons").append('<tr class="addonsrow" id="'+row_count+'"> <td><input type="text" class="form-control" name="benefit[]"/></td><td><input type="text" class="form-control" name="qty[]"/></td><td><input type="text" class="form-control" name="price[]"/></td><td><button type="btn" class="btn btn-danger remove'+row_count+'"><i class="fa fa-minus"></i></button></td></tr>')

            $("button.remove"+row_count).click(function(e){
            e.preventDefault();
            $(this).closest('tr#'+row_count).remove();
        })
        })

        
    })
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