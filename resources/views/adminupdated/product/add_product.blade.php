@extends('adminupdated.layouts.main-layout')
@section('title','Add Product')
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Entry-->
    <link rel="stylesheet" type="text/css" href="{{ url('admin/assets/css/productstyle.css') }}">
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class=" container-fluid ">
            <!--begin::Card-->
            <div class="card card-custom mt-5">
            	<div class="card-header flex-wrap py-5">
                    <div class="card-title">
                        <h3 class="card-label">
                            Add Products
                            <div class="text-muted pt-2 font-size-sm">Manage All Products</div>
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.addProductProcess')}}" method="POST" enctype="multipart/form-data">
                      @csrf   
                      <div class="row">
                         <div class="col-md-7 col-left">
                            <div class="card user-information">
                               <div class="card-body">
                                  <div class="shadow-block" id="pills-tabContent">
                               <div class="form-detail">
                                  <div class="row">
                                     <div class="col-lg-4">
                                       <label>Is Variated Product?</label>
                                          <div class="switch">
                                            <input name="variated" class="switch__input" type="checkbox" id="variated">
                                            <label aria-hidden="true" class="switch__label" for="variated">On</label>
                                            <div aria-hidden="true" class="switch__marker"></div>
                                          </div>
                                     </div>
                                     <div class="col-lg-4">
                                          <label>For Vendor! if the product can be done as Gift?</label>
                                          <div class="switch">
                                            <input class="switch__input" type="checkbox" id="gift">
                                            <label aria-hidden="true" class="switch__label" for="gift">On</label>
                                            <div aria-hidden="true" class="switch__marker"></div>
                                          </div>
                                     </div>
                                     <div class="col-lg-4">
                                          <label>Products Warranty</label>
                                          <select id="warranty" class="Addproduct form-control" name="warranty">
                                             <option value="">Select Warenty</option>
                                             <option value="No Warenty">No Warenty</option>
                                             <option value="Brand Warenty">Brand Warenty</option>
                                             <option value="1 Month Warenty">1 Month Warenty</option>
                                             <option value="2 Month Warenty">2 Month Warenty</option>
                                             <option value="3 Month Warenty">3 Month Warenty</option>
                                             <option value="4 Month Warenty">4 Month Warenty</option>
                                             <option value="5 Month Warenty">5 Month Warenty</option>
                                             <option value="6 Month Warenty">6 Month Warenty</option>
                                          </select>
                                     </div>
                                     <div class="col-md-12">
                                        <div class="info-input mb-20px">
                                           <label>Product Name/Title <span class="link-danger">*</span></label>
                                           <input type="text" class="Addproduct" placeholder="Write product title here" id="prod_title" name="prod_title"/>
                                        </div>
                                     </div>
                                     <div class="col-md-6">
                                        <div class=" info-input">
                                           <label>Choose Category <span class="link-danger">*</span></label>
                                           <select class="form-select Addproduct" id="prod_cat" name="prod_cat">
                                              <option value="0">-choose category-</option>
                                              @foreach($cat as $category)
                                              <option value="{{$category->id}}">{{$category->category_name}}</option>
                                              @endforeach
                                           </select>
                                        </div>
                                     </div>
                                     <div class="col-md-6">
                                        <div class="info-input">
                                           <label>Choose Sub-Category <span class="link-danger">*</span></label>
                                           <select class="form-select Addproduct" id="prod_subcat" name="prod_subcat">
                                              <option value="0">-choose subcategory-</option>
                                           </select>
                                        </div>
                                     </div>
                                     <div class="col-md-12">
                                        <div class="info-input mb-20px">
                                           <label>Product Short Description <span class="link-danger">*</span></label>
                                           <textarea placeholder="Write product long description here" rows="8" id="short_desc" name="short_desc" class="Addproduct"></textarea>
                                        </div>
                                     </div>
                                     <div class="col-md-12">
                                        <div class="info-input mb-20px">
                                           <label>Product Long Description <span class="link-danger">*</span></label>
                                           <textarea  class="summernote"placeholder="Write product long description here" rows="8" id="long_desc" name="long_desc" class="Addproduct"></textarea>
                                        </div>
                                     </div>
                                     <div class="col-md-4">
                                        <div class="info-input mb-20px">
                                           <label>Product Price <span class="link-danger">*</span></label>
                                           <input type="text" class="Addproduct" placeholder="Write Product Price here" id="prod_price" name="prod_price"/>
                                        </div>
                                     </div>
                                     <div class="col-md-4">
                                        <div class="info-input mb-20px">
                                           <label>Sale Price <span class="link-danger">*</span></label>
                                           <input type="text" class="" placeholder="Write Sale Price here" id="sale_price" name="sale_price"/>
                                        </div>
                                     </div>
                                     <div class="col-md-4">
                                        <div class="info-input mb-20px">
                                           <label>Cost Price <span class="link-danger">*</span></label>
                                           <input type="text" class="Addproduct" placeholder="Write Cost Price here" id="cost_price" name="cost_price"/>
                                        </div>
                                     </div>
                                     <div class="col-md-4">
                                        <div class="info-input mb-20px">
                                           <label>Product Code/SKU <span class="link-danger">*</span></label>
                                           <input type="text" class="Addproduct" placeholder="Write product code/sku here" id="prod_code" name="prod_code" />
                                        </div>
                                     </div>
                                     <div class="col-md-4">
                                        <div class="info-input mb-20px">
                                           <label>Product Unit <span class="link-danger">*</span></label>
                                           <input type="text" class="Addproduct" id="prod_unit" name="prod_unit" placeholder="Unit(Kg,PC,etc)"/>
                                        </div>
                                     </div>
                                     <div class="col-md-4">
                                        <div class="info-input mb-20px">
                                           <label>Stock Alert <span class="link-danger">*</span></label>
                                           <input type="text" class="Addproduct" placeholder="Write Product quantity here" id="stock" name="stock"/>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                            </div>
                               </div>
                            </div>
                         </div>
                         <div class="col-md-5 col-right ">
                            <div class="card user-image">
                               <div class="card-body">
                                  <div class="shadow-block" id="pills-tabContent">
                               <div class="featured-img upload-content">
                                  <div class="featured-image d-flex">
                                     <p>Main Image<span class="link-danger">*</span></p>
                                     <input class="form-control" type="file" id="featured_img" onchange="previewFile()" name="featured_img">
                                     <label for="featured_img"><img src="{{asset('seller/assets/img/upload.svg')}}"/>Upload</label> 
                                  </div>

                                  <div class="uploaded-img">
                                     <img style="width:120px;height: 120px;" class="featured_prev_img img-thumbnail" />
                                     <div class="edit-trash d-flex">
                                        <img class="white featured_img_delete" onclick="removeFeatured()" src="{{asset('seller/assets/img/white-trash.svg')}}" style="display:none"/>
                                     </div>
                                  </div>
                               </div>
                               <!-- <div class="info-input">
                                  <label style="font-weight:500;font-size:18px">youtube link <span class="link-danger">*</span></label>
                                  <input type="text" id="prod_video" name="prod_video" placeholder="https://www.youtube.com/watch?v=suk3mW0tDPA" class="form-control"/>    
                               </div> -->
                               <div class="product-img upload-content">
                                  <div class="featured-image d-flex">
                                     <p>Gallery Images<span class="link-danger">*</span></p>
                                     <input class="form-control" type="file" id="product_gallery_img" name="product_gallery_img[]" multiple>
                                     <label for="product_gallery_img"><img src="{{asset('seller/assets/img/upload.svg')}}"/>Upload</label> 
                                  </div>
                                  <div class="row previe_multiple_image">
                                  </div>
                               </div>
                               <div class="col-lg-12 vendor-input " style="margin-top:30px">
                                  <input type="checkbox" class="refund_return" id="returnrefundable" name="returnrefundable" value="1">
                                  <label for="returnrefundable">Refundable and return</label>
                               </div>
                            </div>
                         </div>
                               </div>
                            </div>
                        <div class="col-md-12 mt-5">
                           <div class="card mb-5">
                              <div class="card-header">
                                 Product Attribute
                              </div>
                              <div class="card-body">
                                 <table class="table table-bordered">
                                  <thead>
                                     <tr>
                                        <th>Varient</th>
                                        <th>Attribute</th>
                                        <th>Price</th>
                                        <th>Qty</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                     </tr>
                                  </thead>
                                  <tbody id="product_attr">
                                     <tr class="product_attr_row" id="0">
                                        <td>
                                           <select class="form-control varient_select0" id="0" name="varient[]">
                                              <option value="0">-select varient-</option>
                                              @foreach($varient as $varients)
                                              <option value="{{$varients->id}}">{{$varients->varient_name}}</option>
                                              @endforeach
                                           </select>
                                        </td>
                                        <td>
                                           <select class="form-control attribute_select0" id="0" name="attribute[]">
                                              <option value="0">-select attribute-</option>
                                           </select>
                                        </td>
                                        <td><input type="text" name="cprice[]" id="price" class="form-control"/></td>
                                        <td><input type="text" name="qty[]" id="price" class="form-control"/></td>
                                        <td><input type="file" name="image_attr[]" id="image_attr" class="form-control"/></td>
                                        <td><button class="btn btn-success addmore"><i class="fa fa-plus"></i></button></td>
                                     </tr>
                                  </tbody>
                               </table>
                              </div>
                           </div>
                            <div class="card product-attribute">
                               <div class="card-body">
                                     <div class="col-md-12">
                                        <h5>Delivery and shipping details:</h5>
                                     </div>
                                     <div class="col-md-12 delivery_partner" style="display:block;margin-top:30px">
                                        <table class="table table-bordered">
                                           <thead>
                                              <tr>
                                                 <th>Express Delivery</th>
                                                 <th>Time/days</th>
                                                 <th>Area</th>
                                                 <th>Cast</th>
                                                 <th>Action</th>
                                              </tr>
                                           </thead>
                                           <tbody id="expressdelivery_attr">
                                              <tr class="express_delivery_row" id="0">
                                                 <td>
                                                    <select class="form-control experess Addproduct" id="0" name="express_delivery[]">
                                                       <option value="0">select delivery</option>
                                                       <option value="1">Abu Dhabi</option>
                                                       <option value="2">Sharjah</option>
                                                       <option value="3">Dubai</option>
                                                       <option value="4">Ras Al Khamiah</option>
                                                       <option value="5">Ajman</option>
                                                       <option value="6">Fujairah</option>
                                                       <option value="7">Al Ain</option>
                                                       <option value="8">Ummal Queen</option>
                                                    </select>
                                                 </td>
                                                 <td>
                                                    <input type="text" name="timedays[]" id="timedays" class="form-control Addproduct"/>
                                                 </td>
                                                 <td>
                                                    <select class="form-control experess Addproduct" id="0" name="selectarea[]">
                                                       <option value="0">select area</option>
                                                       <option value="1">Abu Dhabi</option>
                                                       <option value="2">Sharjah</option>
                                                       <option value="3">Dubai</option>
                                                       <option value="4">Ras Al Khamiah</option>
                                                       <option value="5">Ajman</option>
                                                       <option value="6">Fujairah</option>
                                                       <option value="7">Al Ain</option>
                                                       <option value="8">Ummal Queen</option>
                                                    </select>
                                                 </td>
                                                 <td><input type="text" name="cast[]" id="cast" class="form-control Addproduct"/></td>
                                                 <td><button class="btn btn-success addmoreexpress"><i class="fa fa-plus"></i></button></td>
                                              </tr>
                                           </tbody>
                                        </table>
                                     </div>
                               </div>
                            </div>
                            </div>
                         <div class="next btn"><a href="javascript:void(0)" id="addProduct_btn">Update Stock</a></div>
                      </div>
                   </form>
                </div>
            </div>             
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function(){
        @if (Session::has('error'))
                toastr.error('{{ Session::get('error') }}');
            @elseif(Session::has('success'))
                toastr.success('{{ Session::get('success') }}');
            @endif
    })
</script>

<!-- product attribute -->

<script>
    $(function(){        
        $("button.addmore").click(function(e){
            e.preventDefault();
            var row_count = $(".product_attr_row").length; 
            $("#product_attr").append(' <tr class="product_attr_row" id="'+row_count+'"> <td> <select class="form-control varient_select'+row_count+' Addproduct form-control" id="'+row_count+'" name="varient[]"> <option value="0">-select varient-</option> @foreach($varient as $varients) <option value="{{$varients->id}}">{{$varients->varient_name}}</option> @endforeach </select> </td><td> <select class="form-control attribute_select'+row_count+' Addproduct form-control" id="'+row_count+'" name="attribute[]"> <option value="0">-select attribute-</option> </select> </td><td><input type="text" name="cprice[]" id="price" class="form-control Addproduct form-control"/></td><td><input type="text" name="qty[]" id="price" class="form-control Addproduct form-control"/></td><td><input type="file" name="image_attr[]" id="image_attr" class="form-control Addproduct form-control"/></td><td><button class="btn btn-danger remove'+row_count+'"><i class="fa fa-minus"></i></button></td></tr>')

            $("button.remove"+row_count).click(function(e){
            e.preventDefault();
            $(this).closest('tr#'+row_count).remove();
        })

        attribute_Select(row_count);
        })

        
    })
</script>

<script>
      $(function(){        
        $("button.addmoreexpress").click(function(e){
            e.preventDefault();
            var row_count = $(".express_delivery_row").length; 
            $("#expressdelivery_attr").append(' <tr class="express_delivery_row" id="'+row_count+'"> <td> <select class="form-control experess Addproduct form-control" id="0" name="express_delivery[]"> <option value="0">select delivery</option> <option value="1">Abu Dhabi</option> <option value="2">Sharjah</option> <option value="3">Dubai</option> <option value="4">Ras Al Khamiah</option> <option value="5">Ajman</option> <option value="6">Fujairah</option> <option value="7">Al Ain</option> <option value="8">Ummal Queen</option> </select> </td><td> <input type="text" name="timedays[]" id="timedays" class="form-control Addproduct form-control"/></td><td> <select class="form-control experess Addproduct form-control" id="0" name="selectarea[]"> <option value="0">select area</option> <option value="1">Abu Dhabi</option> <option value="2">Sharjah</option> <option value="3">Dubai</option> <option value="4">Ras Al Khamiah</option> <option value="5">Ajman</option> <option value="6">Fujairah</option> <option value="7">Al Ain</option> <option value="8">Ummal Queen</option> </select> </td><td><input type="text" name="cast[]" id="cast" class="form-control Addproduct form-control"/></td><td><button class="btn btn-danger removeexpress'+row_count+'"><i class="fa fa-minus"></i></button></td></tr>')

            $("button.removeexpress"+row_count).click(function(e){
            e.preventDefault();
            $(this).closest('tr#'+row_count).remove();
        })

       
        })

        
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
    $("input.forvendor_attr").click(function(){
        if($(this).is(':checked')){
            if($(this).val()=='onlyvendor'){
                $(".delivery_partner").show();
                $(".delivery_fess").show();
                $(".delivery_loc").show();
                $(".delivery_Area").show();
            }else{
                $(".delivery_partner").hide();
                $(".delivery_fess").hide();
                $(".delivery_loc").hide();
                $(".delivery_Area").hide();
            }
        }else{
            $(".delivery_partner").hide();
                $(".delivery_fess").hide();
                $(".delivery_loc").hide();
                $(".delivery_Area").hide();
        }
    })
</script>

<script>
    $(function(){
          $("#prod_cat").change(function(){
              var prod_cat = $(this).val();
              $("#prod_subcat option").remove();
              var form = new FormData();
              form.append('prod_cat',prod_cat);
              $.ajax({
                  url:"{{route('admin.listSubCat')}}",
                  type:"POST",
                  data:form,
                  cache:false,
                  contentType:false,
                  processData:false,
                  success:function(res){
                      var js_data = JSON.parse(JSON.stringify(res)); 
                      if(js_data.status==200){                      
                              $.each(js_data.msg,function(a,v){
                                  if(prod_cat==v.category_name){
                                  $("#prod_subcat").append('<option value="'+v.id+'">'+v.subcat_name+'</option>');
                                  }
                                })
                            }else{
                                $("#prod_subcat").append('<option value="0">-select other category-</option>');
                            }
                  }
              })
          })  
    })
</script>


<script>
function previewFile() {    
  var preview = document.querySelector('.featured_prev_img');
  var file    = document.querySelector('#featured_img').files[0];
  var reader  = new FileReader();

  reader.onloadend = function () {
    preview.src = reader.result;
    $(".featured_img_delete").show();   
  }

  if (file) {
    reader.readAsDataURL(file);
  } else {
    preview.src = "";
  }
}

function previewVideo() {    
  var preview = document.querySelector('.prod_prev_video');
  var file    = document.querySelector('#prod_video').files[0];
  var reader  = new FileReader();

  reader.onloadend = function () {
    preview.src = reader.result;
    $(".prod_video_remove").show();
  }

  if (file) {
    reader.readAsDataURL(file);
  } else {
    preview.src = "";
  }
}

function removeVideo(){
    $(".prod_prev_video").attr('src','');
    $("#prod_video").val('');
    $(".prod_video_remove").hide();
}

function removeFeatured(){
    $(".featured_prev_img").attr('src','');
    $("#featured_img").val('');
    $(".featured_img_delete").hide(); 

}

$(function() {
    // Multiple images preview in browser
    var imagesPreview = function(input) {

        if (input.files) {
           
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function(event) {
                    $("div.previe_multiple_image").append('<div class="col-md-3 prev_mul_img"> <div class="uploaded-img"> <img style="width:120px;height:120px;" class="img-thumbnail" src="'+event.target.result+'"/> <div class="edit-trash d-flex"> <img class="white remove_prod_mul_img" src="{{asset("seller/assets/img/white-trash.svg")}}"/> </div></div></div>').show();
                   
                }

                reader.readAsDataURL(input.files[i]);
            }
        }else{
            $('div.previe_multiple_image.prev_mul_img').remove();
        }

    };

    $('#product_gallery_img').on('change', function() {
        $(".prev_mul_img").remove();
        $(".prev_mul_img").hide();
        imagesPreview(this);

    });
});

</script>

<script>
    $(function(){
        $("#addProduct_btn").click(function(e){
            e.preventDefault();
            var isValid = true;
             $("input.Addproduct").each(function(){
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

                $("select.Addproduct").each(function(){
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

                $("textarea.Addproduct").each(function(){
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
                    e.preventDefault();
                    $("#cover-spin").show();
                    if( document.getElementById("featured_img").files.length == 0 ){
                        toastr.error('Please Select Main Image');
                    }else{
                        if(document.getElementById("product_gallery_img").files.length == 0)
                        {
                           toastr.error('Please Select Gallery Image');
                        }else{
                           $('form').submit();
                        }
                        
                    }
                }
        })
    })
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
                    url:"{{route('admin.productActive')}}",
                    type:"POST",
                    data:form,
                    cache:false,
                    contentType:false,
                    processData:false,
                    success:function(res){
                        var js_data = JSON.parse(res);
                        $("#cover-spin").hide();
                        if(js_data==1){
                            toastr.success('Product activated successfull!');
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
                    url:"{{route('admin.productdeactive')}}",
                    type:"POST",
                    data:form,
                    cache:false,
                    contentType:false,
                    processData:false,
                    success:function(res){
                        var js_data = JSON.parse(res);
                        $("#cover-spin").hide();
                        if(js_data==1){
                            toastr.success('Product deactivated successfull!');
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
                    url:"{{route('admin.productDelete')}}",
                    type:"POST",
                    data:form,
                    cache:false,
                    contentType:false,
                    processData:false,
                    success:function(res){
                        var js_data = JSON.parse(res);
                        $("#cover-spin").hide();
                        if(js_data==1){
                            toastr.success('Product deleted successfull!');
                            location.reload();
                        }else{
                            toastr.error('something went wrong!');
                         return false;   
                    }
                }
                })
            }
        })



     })
 </script>

 <!-- type of offer -->
<script>
    $(function(){
        $("button.productmake").click(function(e){
              e.preventDefault();
              var prod_id = [];
              var isValid = true;
              $("input.makecheckbox").each(function(){
                  if($(this).is(':checked')){
                  var products = $(this).val();
                  prod_id.push(products);
                  }
              }) 
              console.log(prod_id.length)
              var typeof_pr = $("#typeof").val();
              if(typeof_pr =='0'){
                isValid = false;
                toastr.error('please select offer');
                return false; 
              }else{
                isValid = true;
              } 
              
              if(prod_id.length==0){
                isValid = false;
                toastr.error('please select product');
                return false; 
              }else{
                isValid=true;
              }
              if(isValid==true){
                  $("#cover-spin").show();
                  var form = new FormData();
                  form.append('prod_id',prod_id);
                  form.append('typeof_pr',typeof_pr);
                  $.ajax({
                      url:"{{route('admin.productDfDAP')}}",
                      type:"POST",
                      data:form,
                      cache:false,
                      contentType:false,
                      processData:false,
                      success:function(res){
                        var js_data = JSON.parse(res);
                        $("#cover-spin").hide();
                        if(js_data==1){
                            toastr.success('Product type changed successfull!');
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


<script>
    attribute_Select(0);
   
    function attribute_Select(row){
    $("select.varient_select"+row).change(function(){
        var id = $(this).attr('id');
        var data = $(this).val();
        var form = new FormData();
        form.append('varient',data);
        $.ajax({
            url:"{{route('admin.product_varient_attribute')}}",
            type:"POST",
            data:form,
            cache:false,
            contentType:false,
            processData:false,
            success:function(res){
                var js_data = JSON.parse(JSON.stringify(res));
                $.each(js_data.msg,function(a,v){ 
                    if(data==v.varient_name){                   
                    $(".attribute_select"+id).append('<option value="'+v.id+'">'+v.attribute_name+'</option>');
                    }
                })
               
            }
        })
    })
}
  
</script>


@endsection