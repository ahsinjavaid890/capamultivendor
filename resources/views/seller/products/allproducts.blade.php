@extends('seller.layouts.master')


@section('content')
<div class="main-internal">
	<div class="container-fluid">
		<div class="card">
			<div class="card-header">
				All Products
			</div>
			<div class="card-body">
				<div class="row">
				   <div class="col-md-12">
				      <div class="shadow-block panel panel-default">
				         <div class="panel-body">
				            <div class="form-make" style="margin-bottom:30px">
				               <form>
				                  <div class="row">
				                     <div class="col-md-3">
				                        <select class="form-control" id="typeof">
				                           <option value="0">--select type of offer--</option>
				                           <option value="1">Deals of the Day</option>
				                           <option value="2">Arrivals</option>
				                           <option value="3">Top Pics</option>
				                        </select>
				                     </div>
				                     <div class="col-md-3">
				                        <button type="submit" class="btn btn-success productmake">make</button>
				                     </div>
				                  </div>
				               </form>
				            </div>
				            <table class="table table-bordered table-striped">
				               <thead>
				                  <tr>
				                     <th></th>
				                     <th>Featured Image</th>
				                     <th>Product Title</th>
				                     <th>Category</th>
				                     <th>Subcategory</th>
				                     
				                     <th>Status</th>
				                     <th>Action</th>
				                  </tr>
				               </thead>
				               <tbody>
				                  @foreach($product_list as $product)
				                  <tr>
				                     <td><input type="checkbox" id="makecheckbox" class="makecheckbox" value="{{$product->id}}"/></td>
				                     <td><img src="{{asset('products/'.$product->featured_img)}}" style="width:100px;"/></td>
				                     <td>{{$product->product_title}}</td>
				                     <td>{{$product->cat_name}}</td>
				                     <td>{{$product->subcat_name}}</td>
				                     
				                     <td>
				                        @if($product->status==1)
				                        <span class="badge badge-warning" style="font-size:12px;">Pending</span>
				                        @elseif($product->status==2)
				                        <span class="badge badge-success" style="font-size:12px;">Approved</span>
				                        @endif
				                     </td>
				                     <td>
				                        @if($product->status==1)
				                        <button class="btn btn-outline-warning activate" title="Block" data="{{$product->id}}" ><i class="fa fa-ban"></i></button>
				                        @elseif($product->status==2)
				                        <button class="btn btn-outline-success deactivate" title="approved" data="{{$product->id}}"  ><i class="fa fa-check"></i></button>
				                        @endif
				                        <button class="btn btn-outline-primary update" title="Edit" id="{{$product->id}}" ><i class="fa fa-edit"></i></button>
				                        <button class="btn btn-outline-danger delete" title="Delete" data="{{$product->id}}" ><i class="fa fa-trash"></i></button>
				                     </td>
				                  </tr>
				                  @endforeach    
				               </tbody>
				            </table>
				         </div>
				      </div>
				   </div>
				   <!--<div class="col-md-4">
				      <div class="shadow-block"></div>
				      </div>  -->
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@push('otherscript')
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
        $("button.addmoreexpress").click(function(e){
            e.preventDefault();
            var row_count = $(".express_delivery_row").length; 
            $("#expressdelivery_attr").append(' <tr class="express_delivery_row" id="'+row_count+'"> <td> <select class="form-control experess Addproduct" id="0" name="express_delivery[]"> <option value="0">select delivery</option> <option value="1">Abu Dhabi</option> <option value="2">Sharjah</option> <option value="3">Dubai</option> <option value="4">Ras Al Khamiah</option> <option value="5">Ajman</option> <option value="6">Fujairah</option> <option value="7">Al Ain</option> <option value="8">Ummal Queen</option> </select> </td><td> <input type="text" name="timedays[]" id="timedays" class="form-control Addproduct"/></td><td> <select class="form-control experess Addproduct" id="0" name="selectarea[]"> <option value="0">select area</option> <option value="1">Abu Dhabi</option> <option value="2">Sharjah</option> <option value="3">Dubai</option> <option value="4">Ras Al Khamiah</option> <option value="5">Ajman</option> <option value="6">Fujairah</option> <option value="7">Al Ain</option> <option value="8">Ummal Queen</option> </select> </td><td><input type="text" name="cast[]" id="cast" class="form-control Addproduct"/></td><td><button class="btn btn-danger removeexpress'+row_count+'"><i class="fa fa-minus"></i></button></td></tr>')

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
                  url:"{{route('seller.listSubCat')}}",
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
                    $("div.previe_multiple_image").append('<div class="col-md-6 prev_mul_img"> <div class="uploaded-img"> <img src="'+event.target.result+'"/> <div class="edit-trash d-flex"> <img class="white remove_prod_mul_img" src="{{asset("seller/assets/img/white-trash.svg")}}"/> </div></div></div>').show();
                   
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
                    $('form').submit();                   

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
                    url:"{{route('seller.productActive')}}",
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
                    url:"{{route('seller.productdeactive')}}",
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
                    url:"{{route('seller.productDelete')}}",
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
                      url:"{{route('seller.productDfDAP')}}",
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
            url:"{{route('seller.product_varient_attribute')}}",
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


@endpush