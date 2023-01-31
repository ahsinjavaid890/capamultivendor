@extends('website.layouts.master')
@section('content')

 <!-- OffCanvas Search End -->

 <div class="offcanvas-overlay"></div>

<!-- Events area start -->
     
     <div id="Events">
         
     <div class="breadcrumb-area" style="background:#ecebeb;">
         <div class="container">
             <div class="row">
                 <div class="col-md-12">
                     <div class="breadcrumb-content">
                         <ul class="nav">
                             <li><a href="index.html">Home</a></li>
                             <li><a href="#">Design Your Own Product</a></li>
                         </ul>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <div class="container">
         <div class="row">
                 <h1 class="designUpload-heading">Upload Your Design</h1>
                 <form action="{{route('website.desginRequestProcess')}}" method="POST" enctype="multipart/form-data" id="designFrm">
                 @csrf
                 <div class="form-detail design-own-product">
                    
                     <div class="row">
                         <div class="col-md-12">
                             <div class="info-input  mb-20px">
                                 <label>Product Category</label>
                                 <select onchange="getsubcategory(this.value)" class="custom-multiple-types designownProd" name="prodCat">
                                     <option value="0">--select category--</option>
                                     @foreach($categories as $category)
                                     <option value="{{$category->id}}">{{$category->category_name}}</option>
                                     @endforeach
                                    
                                 </select>
                             </div>
                         </div>
                         <!-- <div class="col-md-12">
                             <div class="info-input  mb-20px">
                                 <label>Product Sub-Category</label>
                                 <select class="custom-multiple-types" id="subcategory" name="prodSubCat">
                                    <option value="0">--select sub-category--</option>
                                    
                                 </select>
                             </div>
                         </div> -->
                         <div class="col-md-12">
                             <div class="info-input mb-20px">
                                 <label>Product Name</label>
                                 <input type="text" placeholder="Write Product Name Here" class="designownProd" name="prodName"/>
                                 
                             </div>
                         </div>
                         <div class="col-md-12">
                             <div class="info-input mb-20px">
                                 <label>Product Description</label>
                                 <textarea rows="10" cols="40" placeholder="Write Product Description Here" class="designownProd" name="prodDesc"></textarea>
                             </div>
                         </div>
                         <div class="col-md-12">
                             <div class="info-input mb-20px">
                                 <label>Upload Product Image</label>
                                 <div class="dropzone-wrapper">
                                   <div class="dropzone-desc">
                                       <img src="" style="width:100px;display:none" id="prev_img" />
                                     <svg xmlns="http://www.w3.org/2000/svg" width="102.738" height="87.521" viewBox="0 0 102.738 87.521" id="upload_img">
                                       <g id="Group_1_" data-name="Group (1)" opacity="0.53">
                                         <path id="Path_822" data-name="Path 822" d="M102.225,41.288a6.948,6.948,0,0,0-.462-1.7,21.43,21.43,0,0,0-.925-2.928c-.257-.616-.616-1.233-.925-1.9A19.961,19.961,0,0,0,98.68,32.5c-.462-.719-1.079-1.079-1.079-1.49s-1.027-1.284-1.592-1.9-1.079-1.027-1.644-1.541l-1.9-1.7-1.849-1.233a18.914,18.914,0,0,0-2.26-1.181l-2-.925a21.2,21.2,0,0,0-2.568-.771,15.42,15.42,0,0,0-2.106-.462L80.5,20.741a30.821,30.821,0,0,0-58.253,0L21.318,21a15.421,15.421,0,0,0-2.106.462,21.2,21.2,0,0,0-2.568.771l-2,.925a18.916,18.916,0,0,0-2.26,1.181l-1.849,1.541L8.63,27.47c-.565.514-1.13.976-1.644,1.541s-1.079,1.284-1.592,1.9a15.321,15.321,0,0,0-1.336,1.849c-.411.668-.822,1.49-1.233,2.26a20.828,20.828,0,0,0-.925,1.9A21.422,21.422,0,0,0,.976,39.85a10.4,10.4,0,0,1-.462,1.7A26.866,26.866,0,0,0,0,46.425,28.253,28.253,0,0,0,.462,51.1a7.856,7.856,0,0,0,.36,1.49,28.667,28.667,0,0,0,.925,2.979l.616,1.49A25.687,25.687,0,0,0,3.9,59.935l.719,1.13a2.876,2.876,0,0,0,.257.411l.257.36A25.685,25.685,0,0,0,25.685,72.11H41.1V65.072a10.274,10.274,0,0,1-5.137,1.387,10.53,10.53,0,0,1-7.4-3.134,10.274,10.274,0,0,1,.257-14.537l15.411-14.9a10.234,10.234,0,0,1,14.383.154L74.023,49.456A10.274,10.274,0,0,1,66.78,66.973a9.862,9.862,0,0,1-5.137-1.387V72.11H77.054A25.685,25.685,0,0,0,97.6,61.836l.257-.257a2.876,2.876,0,0,0,.257-.411l.719-1.13a25.691,25.691,0,0,0,1.541-2.877l.616-1.49a28.672,28.672,0,0,0,.925-2.979,7.856,7.856,0,0,1,.36-1.49,28.264,28.264,0,0,0,.462-4.777A26.862,26.862,0,0,0,102.225,41.288Z" transform="translate(0 0)" fill="rgba(0,0,0,0.63)"/>
                                         <path id="Path_823" data-name="Path 823" d="M47.066,28.227a5.137,5.137,0,0,0-7.192,0l-15.411,14.9a5.137,5.137,0,1,0,7.089,7.4L38.282,44V72.969a5.137,5.137,0,0,0,10.274,0V44.254l6.627,6.678a5.158,5.158,0,1,0,7.294-7.294Z" transform="translate(7.95 9.414)" fill="rgba(0,0,0,0.63)"/>
                                       </g>
                                     </svg>

                                     <p>Drop files here or Browse</p>
                                   </div>
                                   <input type="file" name="img_logo" class="dropzone" onchange="previewFile()" id="prodimg"> 
                                 </div>
                                   
                             </div>
                         </div>
                         <div class="col-md-6">
                             <div class="info-input mb-20px">
                                 <label>Cost Range</label>
                                 <input type="text" placeholder="Write Cost Range Here" name="prodRange" class="designownProd" />
                                 
                             </div>
                         </div>
                         <div class="col-md-6">
                             <div class="info-input mb-20px">
                                 <label>Expected date of delivery</label>
                                 <input type="text" placeholder="Write expected date of delivery" name="deliveryDate" class="designownProd" />
                                 
                             </div>
                         </div>
                         <div class="col-md-6">
                             <div class="info-input mb-20px">
                                 <label>Area of delivery</label>
                                 <input type="text" placeholder="Write area of delivery" name="prodArea" class="designownProd" />
                                 
                             </div>
                         </div>
                         
                         
                     </div>
                 </div>
                 <div class="btn-main-block text-center">
                     <div class="next btn"><a href="javascript:void(0)" id="submitReq">Submit Your Design</a></div>
                 </div>
            </form>    
         </div>
     </div>  
     <!-- checkout area end -->
     <!-- Footer Area Start -->

@stop

@push('otherstyle')
<style>
.dropzone-wrapper {border: 1px dashed #707070;color: #AEA9A9;position: relative;height: 334px;max-width: 594px;border-radius: 12px;}
.dropzone-desc {position: absolute;margin: 0 auto;left: 0;right: 0;text-align: center;top: calc(50% - 60px);font-size: 16px;}
.dropzone,
.dropzone:focus {position: absolute;outline: none !important;width: 100%;height: 150px;cursor: pointer;opacity: 0;}
.dropzone-wrapper:hover,
.dropzone-wrapper.dragover {background: #fff;}   
.own-design .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {margin-left: 10px;float: right;font-size: 20px;line-height: 18px;color: #fff;}
.own-design.variant-attribute .select2-container--default .select2-selection--multiple .select2-selection__choice {background-color: #01a0bd!important;color: #fff;}    
.own-design select {display: none;}
.own-design .select2-container {width: 100% !important;}
.own-design ul {padding: 0;list-style: none;}
.own-design .select2-container--default.select2-container--focus .select2-selection--multiple {border: solid #c7c7c7 1px;outline: 0;}
.own-design .select2-container--default .select2-selection--multiple {padding: 10px;}
.own-design .select2-container--empty span {display: none!important;}
.own-design .select2-container--default .select2-selection--multiple .select2-selection__choice {background-color: #000000!important;border: 0!important;    color: #fff;border-radius: 5px!important;
padding: 8px 10px!important;}
.own-design .select2-container:focus {border: 1px solid #000; border-radius: 5px;}
.own-design .select2-selection--custom {border: 0 !important;padding: 10px 0 !important;}
.select2-container--default .select2-search--inline .select2-search__field{height:33px;margin: 0;padding: 0;}
.select2-results li {display: block !important;}
</style>            
@endpush

@push('otherscript')
<script>

</script>
<script>
    function getsubcategory(id) {
        var app_url = '{{ url('') }}';
        $.ajax({
            url:app_url+"/getsubcategory/"+id, 
            type:"get",
            success:function(res){
                var js_data =  JSON.parse(JSON.stringify(res));
                $("#subcategory option").remove();
                if(js_data.status==200){
                    $.each(js_data.msg,function(a,v){
                        $("#subcategory").append('<option value="'+v.id+'">'+v.subcat_name+'</option>');
                    })
                    
                }else{
                    $("#subcategory").append('<option value="0">--please select sub-category--</option>');
                }
            }
        })
    }
</script>
<script>
    function previewFile() {    
  var preview = document.querySelector('#prev_img');
  var file    = document.querySelector('#prodimg').files[0];
  var reader  = new FileReader();

  reader.onloadend = function () {
    preview.src = reader.result; 
    $("#upload_img").hide();
    $("#prev_img").show();      
  }

  if (file) {
    reader.readAsDataURL(file);
  } else {
    preview.src = "";
    $("#upload_img").show();
  }
}
</script>

<script>
    $(function(){
        $('a#submitReq').click(function(e){
            e.preventDefault();
            var isValid = true;
            $('input.designownProd').each(function(){
                if($(this).val()==''){
                    isValid = false;
                    $(this).css({
                            "border": "1px solid red",
                            "background": "#FFCECE",
                        })
                }else{
                    $(this).css({
                            "border": "",
                            "background": "",
                        })
                }
            })


            $('select.designownProd').each(function(){
                if($(this).val()=='0'){
                    isValid = false;
                    $(this).css({
                            "border": "1px solid red",
                            "background": "#FFCECE",
                        })
                }else{
                    $(this).css({
                            "border": "",
                            "background": "",
                        })
                }
            })

            $('textarea.designownProd').each(function(){
                if($(this).val()==''){
                    isValid = false;
                    $(this).css({
                            "border": "1px solid red",
                            "background": "#FFCECE",
                        })
                }else{
                    $(this).css({
                            "border": "",
                            "background": "",
                        })
                }
            })

            if(isValid!=true){
                e.preventDefault();
                return false;
            }else{
                $('#cover-spin').show();
                $("form#designFrm").submit();
            }


        })
    })
</script>

@endpush