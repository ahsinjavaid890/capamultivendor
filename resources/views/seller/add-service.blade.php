@extends('seller.layouts.master')
@section('content')
<main>
    <div class="container-fluid px-4">
         <h1 class="mt-4 text-center main-title">Add Service</h1> 
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
            </form>
        </div>
</main>


@stop
@push('otherscript')
<script>
  $(function(){
    $("select#category").change(function(){
              var prod_cat = $(this).val();
              $("#sub_cat option").remove();
              var form = new FormData();
              form.append('prod_cat',prod_cat);
              $.ajax({
                  url:"{{route('seller.listSubCat')}}",
                  type:"POST",
                  data:form,
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
@endpush