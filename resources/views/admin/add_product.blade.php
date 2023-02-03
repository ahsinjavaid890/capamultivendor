@extends('admin.layouts.master')
@section('content')
<main class="dash-add-products">
                    <div class="container-fluid px-4">
                        <div class="row">
                        <div class="col-md-12 col-left">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                          <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Available Stock</button>
                          </li>
                          <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Add New Stock</button>
                          </li>
                          <li class="nav-item" role="presentation">
                            <a href="{{route('admin.category')}}" style="text-decoration:none;"><button class="nav-link" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Category</button></a>
                          </li>
                          <li class="nav-item" role="presentation">
                          <a href="{{route('admin.subcategory')}}" style="text-decoration:none;"> <button class="nav-link"  type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Subcategory</button></a>
                          </li>

                          <li class="nav-item" role="presentation">
                          <a href="{{route('admin.varientAttribute')}}" style="text-decoration:none;"> <button class="nav-link"  type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Varient</button></a>
                          </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                          <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

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
                                <table class="table table-condensed table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th></th>
                                  <th>Product Title</th>
                                  <th>Category</th>
                                  <th>Subcategory</th>
                                  <th>Featured Image</th>
                                  <th>Status</th>
                                  <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                                            
                                 @foreach($product_list as $product)
                                <tr>
                                    <td><input type="checkbox" id="makecheckbox" class="makecheckbox" value="{{$product->id}}"/></td>
                                    <td>{{$product->product_title}}</td>  
                                    <td>{{$product->cat_name}}</td>  
                                    <td>{{$product->subcat_name}}</td>  
                                    <td><img src="{{asset('products/'.$product->featured_img)}}" style="width:100px;"/></td> 
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
                                                <button class="btn btn-outline-primary update" title="Edit" id="{{$product->id}}" ><i class="fa fa-pen"></i></button>
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
                          <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                             <form action="{{route('admin.addProductProcess')}}" method="POST" enctype="multipart/form-data">
                             @csrf   
                          <div class="row"> 
                                <div class="col-md-8 col-left">
                                   <div class="shadow-block" id="pills-tabContent"> 
                                        <div class="form-detail">
                                    <div class="row">
                                    <div class="col-md-12">
                                            <hr/>
                                            <h5>Product :</h4>
                                            <hr/>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="info-input mb-20px">
                                                <label>Product Name/Title <span class="link-danger">*</span></label>
                                                <input type="text" class="Addproduct" placeholder="Write product title here" id="prod_title" name="prod_title"/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="info-input mb-20px">
                                                <label>Product Code/SKU <span class="link-danger">*</span></label>
                                                <input type="text" class="Addproduct" placeholder="Write product code/sku here" id="prod_code" name="prod_code" />
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
                                        
                                        <!-- <div class="col-md-6">
                                            <div class="info-input mb-20px order-tax">
                                                <label>Order Tax <span class="link-danger">*</span></label>
                                                <select class="form-select">
                                                    <option value="selected">Write Product quantity here</option>
                                                </select>
                                                <p class="percentage">%</p>
                                            </div>
                                        </div> 
                                        <div class="col-md-6">
                                            <div class="info-input mb-20px">
                                                <label>Tax Type <span class="link-danger">*</span></label>
                                                <select class="form-select">
                                                    <option value="selected">Choose tax type</option>
                                                </select>
                                            </div>
                                        </div>  -->
                                        <div class="col-md-12">
                                            <div class="info-input mb-20px">
                                                <label>Product Short Description <span class="link-danger">*</span></label>
                                                <textarea placeholder="Write product short description here " id="short_desc" name="short_desc" class="Addproduct"></textarea>
                                            </div>
                                        </div> 
                                        <div class="col-md-12">
                                            <div class="info-input mb-20px">
                                                <label>Product Long Description <span class="link-danger">*</span></label>
                                                <textarea placeholder="Write product long description here" rows="8" id="long_desc" name="long_desc" class="Addproduct"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <hr/>
                                            <h5>Price of the Product and Stock :</h4>
                                            <hr/>
                                        </div>
                                        <!-- <div class="info-input mb-20px">
                                            <label>Discounted Price for Vendors :</label>
                                        </div> -->
                                        <div class="col-md-6">
                                            <div class="info-input mb-20px">
                                            <label>Product Price <span class="link-danger">*</span></label>
                                            <input type="text" class="Addproduct" placeholder="Write Product Price here" id="prod_price" name="prod_price"/>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="info-input mb-20px">
                                                <label>Sale Price <span class="link-danger">*</span></label>
                                                <input type="text" class="Addproduct" placeholder="Write Sale Price here" id="sale_price" name="sale_price"/>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="info-input mb-20px">
                                                <label>Cost Price <span class="link-danger">*</span></label>
                                                <input type="text" class="Addproduct" placeholder="Write Cost Price here" id="cost_price" name="cost_price"/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="info-input mb-20px">
                                                <label>Product Unit <span class="link-danger">*</span></label>
                                                <input type="text" class="form-control Addproduct" id="prod_unit" name="prod_unit" placeholder="Unit(Kg,PC,etc)"/>
                                                
                                            </div>
                                        </div> 
                                        <div class="col-md-6">
                                            <div class="info-input mb-20px">
                                                <label>Stock Alert <span class="link-danger">*</span></label>
                                                <input type="text" class="Addproduct" placeholder="Write Product quantity here" id="stock" name="stock"/>
                                            </div>
                                        </div> 

                                        <div class="col-md-12">
                                            <hr/>
                                            <h5>Product Attribute :</h4>
                                            <hr/>
                                        </div>
                                        <div class="col-md-12">
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
                                                            <select class="form-control varient_select0 Addproduct" id="0" name="varient[]">
                                                                <option value="0">-select varient-</option>
                                                                @foreach($varient as $varients)
                                                                <option value="{{$varients->id}}">{{$varients->varient_name}}</option>
                                                                @endforeach
                                                            </select>
                                                    </td>
                                                    <td>
                                                        <select class="form-control attribute_select0 Addproduct" id="0" name="attribute[]">
                                                            <option value="0">-select attribute-</option>
                                                        </select>
                                                    </td>

                                                        <td><input type="text" name="cprice[]" id="price" class="form-control Addproduct"/></td>
                                                        <td><input type="text" name="qty[]" id="price" class="form-control Addproduct"/></td>                                                     
                                                        
                                                        <td><input type="file" name="image_attr[]" id="image_attr" class="form-control Addproduct"/></td>
                                                        <td><button class="btn btn-success addmore"><i class="fa fa-plus"></i></button></td>
                                                    </tr>
                                                </tbody>

                                            </table>
                                        </div>
                                            
                                        <div class="col-md-12">
                                            <hr/>
                                        </div>
                                        <!-- <div class="col-md-6">
                                            <div class="info-input mb-20px">
                                                <label>Variant Options</label>
                                                <input type="text" placeholder="Write Variant options" />
                                            </div>
                                        </div> -->
                                       
                                        <!-- <div class="col-md-6">
                                            <div class="info-input mb-20px">
                                            <label>Start Date  </label>
                                            <input type="text" placeholder="16/02/2022" />
                                            </div>
                                        </div> -->

                                        <!-- <div class="col-md-6">
                                            <div class="info-input mb-20px">
                                                <label>End Date </label>
                                                <input type="text" placeholder="16/02/2024" />
                                            </div>
                                        </div> -->
                                        <!-- <div class="info-input mb-20px">
                                                <label>Modify the variants to be created :</label>
                                            </div>
                                        <div class="modify-variants d-flex">
                                            
                                            <div class="info-input mb-20px">
                                                <label>Variant</label>
                                                <input type="text" />
                                            </div>
                                            <div class="info-input mb-20px">
                                                <label>Price</label>
                                                <input type="text" />
                                            </div>
                                            <div class="info-input mb-20px">
                                                <label>SKU</label>
                                                <input type="text" />
                                            </div>
                                            <div class="info-input mb-20px">
                                                <label>Quanity</label>
                                                <input type="text" />
                                            </div>
                                            <div class="info-input mb-20px">
                                                <label>Photo</label>
                                                <input type="text" />
                                            </div>
                                        </div> -->
                                        <div class="col-lg-12 vendor-input">
                                        <input type="checkbox" class="forvendor_attr1" id="html" value="onlyvendor">
                                        <label for="html">For Vendor! if the product can be done as Gift </label>
                                    </div>
                                    <div class="col-md-12">
                                            <hr/>
                                            <h5>Delivery and shipping details:</h4>
                                            <hr/>
                                        </div>
                                    <div class="col-md-12 delivery_partner" style="display:block;margin-top:30px">
                                    
                                    <!-- <div class="payment-detail info-input">
                                        <label>Express delivery</label>
                                        <select name="delivery_exp" id="delivery_exp">
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
                                    </div> -->
                                    <!-- </div>
                                    <div class="col-md-6 delivery_fess" style="display:block">
                                    <div class="payment-detail info-input">
                                        <label>Express delivery with extra fees</label>
                                        <input type="text" placeholder="25AED" id="delivery_with_fess" name="delivery_with_fess" />
                                    </div>
                                    </div>
									
                                    <div class="col-md-6 delivery_loc" style="display:block">
                                    <div class="payment-detail info-input">
                                        <label>Delivery Location</label>
                                        <select id="delivery_location" name="delivery_location">
                                        <option value="0">select location</option>
                                            <option value="1">Abu Dhabi</option>
                                            <option value="2">Sharjah</option>
                                            <option value="3">Dubai</option>
                                            <option value="4">Ras Al Khamiah</option>
                                            <option value="5">Ajman</option>
                                            <option value="6">Fujairah</option>
                                            <option value="7">Al Ain</option>
                                            <option value="8">Ummal Queen</option>
                                        </select>
                                    </div>
                                    </div>
                                    <div class="col-md-6 delivery_Area" style="display:block">
                                    <div class="payment-detail info-input">
                                        <label>Delivery Area</label>
                                        <select id="delivery_area" name="delivery_area">
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
                                    </div>
                                    </div>									 -->




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
                                                        <input type="text" name="timedays[]" id="timedays" class="form-control Addproduct"/></td>

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
                                    <div class="col-md-12">
                                            <div class="info-input mb-20px">
                                                <label>Products Warranty <span class="link-danger">*</span></label>
                                                <input type="text" class="Addproduct" placeholder="Write product warranty here" id="warranty" name="warranty"/>
                                            </div>
                                        </div>
                                    
                                </div>
                                   </div>
                                  </div>    
                                <div class="col-md-4 col-right">
                                <div class="shadow-block" id="pills-tabContent">
                                    <div class="featured-img upload-content">    
                                    <div class="featured-image d-flex"><p>Upload Featued Image(360X332) (jpg,png,svg)<span class="link-danger">*</span></p>
                                        <input class="form-control" type="file" id="featured_img" onchange="previewFile()" name="featured_img">
                                        <label for="featured_img"><img src="{{asset('seller/assets/img/upload.svg')}}"/>Upload</label> 
                                    </div>
                                    <div class="uploaded-img">    
                                    <img class="featured_prev_img" />
                                    <div class="edit-trash d-flex">
                                        <!-- <img class="white" src="{{asset('seller/assets/img/white-edit.svg')}}"/> -->
                                        <img class="white featured_img_delete" onclick="removeFeatured()" src="{{asset('seller/assets/img/white-trash.svg')}}" style="display:none"/>
                                    </div>    
                                    </div>    
                                    </div>
                                    <div class="info-input"> 
                                    <label style="font-weight:500;font-size:18px">youtube link <span class="link-danger">*</span></label>
                                        <input type="text" id="prod_video" name="prod_video" placeholder="https://www.youtube.com/watch?v=suk3mW0tDPA" class="form-control"/> 
                                    <!-- <div class="featured-image d-flex"><p>Upload Product Video <span class="link-danger">*</span></p>
                                        <input class="form-control" type="file" id="prod_video" onchange="previewVideo()" name="prod_video">
                                        <label for="prod_video"><img src="{{asset('seller/assets/img/upload.svg')}}"/>Upload</label> 
                                    </div> -->
                                    <!-- <div class="uploaded-img">    
                                    <video class="prod_prev_video" ></video>
                                    <div class="edit-trash d-flex"> -->
                                        <!-- <img class="white" src="{{asset('seller/assets/img/black-edit.svg')}}"/> --> 
                                        <!-- <img class="white prod_video_remove" onclick="removeVideo()" src="{{asset('seller/assets/img/black-trash.svg')}}" style="display:none"/>
                                    </div>    
                                    </div>     -->
                                    </div>
                                    <div class="product-img upload-content">    
                                            <div class="featured-image d-flex"><p>Upload Product Images (jpg,png,svg)<span class="link-danger">*</span></p>
                                            <input class="form-control" type="file" id="product_gallery_img" name="product_gallery_img[]" multiple>
                                            <label for="product_gallery_img"><img src="{{asset('seller/assets/img/upload.svg')}}"/>Upload</label> 
                                            </div>
                                      <div class="row previe_multiple_image">
                                        <!-- <div class="col-md-6">
                                            <div class="uploaded-img">    
                                            <img src="{{asset('seller/assets/img/featured-img.png')}}"/>
                                            <div class="edit-trash d-flex">                                           
                                            <img class="white" src="{{asset('seller/assets/img/white-trash.svg')}}"/>
                                            </div>    
                                            </div>    
                                        </div> -->
                                      
                                        </div>  
                                    </div>  
                                    <div class="col-lg-12 vendor-input " style="margin-top:30px">
                                        <input type="checkbox" class="refund_return" id="returnrefundable" name="returnrefundable" value="1">
                                        <label for="returnrefundable">Refundable and return</label>
                                    </div>    
                                </div>
                                </div>
                                  <div class="next btn"><a href="javascript:void()" id="addProduct_btn">Update Stock</a></div>
                            </div>  
                        </div>
                        </form>
                        </div>
                        
                      </div>
                        
                        
                        
                            
                      </div>  
                    </div>
                </main>
@stop
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
        $("button.addmore").click(function(e){
            e.preventDefault();
            var row_count = $(".product_attr_row").length; 
            $("#product_attr").append(' <tr class="product_attr_row" id="'+row_count+'"> <td> <select class="form-control varient_select'+row_count+' Addproduct" id="'+row_count+'" name="varient[]"> <option value="0">-select varient-</option> @foreach($varient as $varients) <option value="{{$varients->id}}">{{$varients->varient_name}}</option> @endforeach </select> </td><td> <select class="form-control attribute_select'+row_count+' Addproduct" id="'+row_count+'" name="attribute[]"> <option value="0">-select attribute-</option> </select> </td><td><input type="text" name="cprice[]" id="price" class="form-control Addproduct"/></td><td><input type="text" name="qty[]" id="price" class="form-control Addproduct"/></td><td><input type="file" name="image_attr[]" id="image_attr" class="form-control Addproduct"/></td><td><button class="btn btn-danger remove'+row_count+'"><i class="fa fa-minus"></i></button></td></tr>')

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


@endpush
