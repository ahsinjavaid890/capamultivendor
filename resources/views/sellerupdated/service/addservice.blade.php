@extends('sellerupdated.layouts.main-layout')
@section('title','Add New Serivce')
@section('content')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Card-->
            @include('sellerupdated.alerts.index')
            <div class="card card-custom mt-5">
                <div class="card-header flex-wrap py-5">
                    <div class="card-title">
                        <h3 class="card-label">
                            Add New Serivce
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('seller.addserviceProcess')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                                <div class="col-md-12 col-left">
                                    <div class="shadow-block" id="pills-tabContent">
                                    <div class="form-detail">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="info-input mb-20px">
                                                    <label>Service Name<span class="link-danger">*</span></label>
                                                    <input type="text" class="coupons" placeholder="Write service name here" id="service_title" name="service_title" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="info-input mb-20px">
                                                    <label>Category<span class="link-danger">*</span></label>
                                                   <select class="coupons" type="text" name="category" id="category"> 
                                                       <option value="0">select category</option>
                                                       @foreach($categories as $category)
                                                       <option value="{{$category->id}}">{{$category->category_name}}</option>
                                                       @endforeach
                                                   </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="info-input mb-20px">
                                                    <label>Sub-Category<span class="link-danger">*</span></label>
                                                   <select class="coupons" type="text" name="sub_cat" id="sub_cat">
                                                       <option value="0">select sub-category</option>
                                                   </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="info-input mb-20px">
                                                    <label>Image<span class="link-danger">*</span></label>
                                                    <input type="file" class="coupons"  id="service_img" name="service_img" />
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="info-input mb-20px">
                                                    <label>Contact Details<span class="link-danger">*</span></label>
                                                    <input type="text" class="coupons" placeholder="Write contact details here" id="contact_details" name="contact_details" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12" style="margin-top:20px;">
                                            <div class="info-input mb-20px">
                                                <button type="submit" class="btn btn-success submit">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>                       
                </div>
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
@endsection
@section('script')
<script>
  $(function(){
    $("select#category").change(function(){
              var prod_cat = $(this).val();
              $("#sub_cat option").remove();
              var app_url = '{{ url('') }}';
                $.ajax({
                    url: app_url+'/getsubcategory/'+prod_cat,
                    type:"GET",
                    cache:false,
                    contentType:false,
                    processData:false,
                  success:function(res){
                      var js_data = JSON.parse(JSON.stringify(res)); 
                      console.log(js_data)
                      if(js_data.status==200){                      
                              $.each(js_data.msg,function(a,v){
                                  if(prod_cat==v.category_name){
                                  $("#sub_cat").append('<option value="'+v.id+'">'+v.subcat_name+'</option>');
                                  }
                                })
                            }else{
                                $("#sub_cat").append('<option value="0">-select other category-</option>');
                            }
                  }
              })
          })  
  })
</script>
<script>
    $(function(){
        $("button.submit").click(function(e){
              e.preventDefault();
              var isValid = true;                          
             $("input.coupons").each(function(){
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


                $("select.coupons").each(function(){
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
                
                $("textarea.coupons").each(function(){
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