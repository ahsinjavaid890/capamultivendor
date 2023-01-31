@extends('admin.layouts.master')
@section('content')
<main>
                    <div class="container-fluid px-4">
                    <h1 class="mt-4 text-center main-title">Update Vendors details</h1>
                        <p class="mb-5 text-center main-para">Check all the details of vendors</p>
                        <form action="{{route('admin.updatevendorprocess')}}" method="POST" enctype="multipart/form-data" id="updatevendor">
                        @csrf
                        <div class="tabs-main-block">
                        <h1 class="mt-4 main-title">Personal Information</h1>
                        <div class="form-detail personal-info">

                                <div class="row">
                                <input type="hidden" value="{{$vendors->id}}" id="id" name="id">
                                    <input type="hidden" value="{{$vendors->bank}}" id="bankname">
                                    <input type="hidden" value="{{$vendors->registered_as}}" id="registered_as">
                                    <input type="hidden" value="{{$vendors->delivery_by}}" id="delivery_by">
                                    <input type="hidden" value="{{$vendors->product_type}}" id="product_type">
                                    <input type="hidden" value="{{$vendors->payment_option}}" id="payment_option">
                                    <input type="hidden" value="{{$vendors->city}}" id="city">
                                    <div class="col-md-6">
                                        <div class="info-input mb-20px">
                                            <label>First name <span style="color:red">*</span></label>
                                            <input type="email" value="{{$vendors->fname}}" name="fname"/>
                                           
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="info-input mb-20px">
                                            <label>Last name <span style="color:red">*</span></label>
                                            <input type="email" value="{{$vendors->lname}}" name="lname"/>
                                           
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="info-input mb-20px">
                                            <label>Email Address <span style="color:red">*</span></label>
                                            <input type="email" value="{{$vendors->email}}" name="email"/>
                                           
                                        </div>
                                    </div>
                                    <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>
                                    <div class="col-md-6">
                                        <div class="info-input mb-20px">
                                            <label>Emirates ID <span style="color:red">*</span></label>
                                            <input placeholder="000000-000000-000000-000000" data-inputmask="'mask': '999999-999999-999999-999999'" type="text" value="{{$vendors->emirates_id}}" name="emiratesid"/>
                                        </div> 
                                    </div>
                                    
                                    <script>
                                      $(":input").inputmask();

                                     </script>
                                        
                                    <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="info-input mb-20px">
                                                <label>Account Title <span style="color:red">*</span></label>
                                                <input type="text" placeholder="saving" value="{{$vendors->account_title}}" name="accounttitle"/>
                                            </div>
                                            </div>
                                    <div class="col-md-6">
                                    <div class="payment-detail info-input">
                                        <label>Bank Name<span class="link-danger">*</span></label>
                                        <select class="banktype" id="banktype" name="banktype">
                                             <option value="0">-select bank-</option>
                                            <option value="Emirates NBD">Emirates NBD</option>
                                            <option value="ADCB">ADCB</option>
                                            <option value="Bank Islamic">Bank Islamic</option>
                                            <option value="Dubai Islamic Bank">Dubai Islamic Bank</option>
                                        </select>
                                    </div>
                                    </div>
                                            
                                    </div>
                                    </div>
                                    <div class="col-md-12">
                                            <div class="info-input mb-20px">
                                                <label>Account Number (IBAN)<span style="color:red">*</span></label>
                                                <input type="text" value="{{$vendors->account_no}}" name="accountno"/>
                                            </div>
                                        </div>
                                    <div class="register-yourself checkout-radio">
                                        <h4 class="mb-25"><strong>I am a</strong></h4>
                                        <div class="both-radio">
                                            <div class="radio-button">
                                        <div class="input-label me-5">
                                        <input type="checkbox" name="registeras" id="licensed_seller" class="registeras personal_info" value="Licensed"/>
                                        <label for="licensed_seller">Licensed Seller</label>
                                        </div>
                                        </div>
                                            <div class="radio-button">
                                        <div class="input-label">
                                        <input type="checkbox" name="registeras" id="freelancer_seller" class="registeras personal_info" value="Freelancer"/>
                                        <label for="freelancer_seller">Freelancer Seller</label>
                                        </div>
                                        </div> 
                                        </div>    
                                  </div>
                                    <div class="col-md-6 cmp_name">
                                        <div class="info-input mb-20px">
                                            <label>Company Name <span style="color:red">*</span></label>
                                            <input type="text" value="{{$vendors->company_name}}" name="companyname"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6 cmp_add">
                                        <div class="info-input mb-20px">
                                            <label>Company Address </label>
                                            <input type="text" value="{{$vendors->company_address}}" name="companyadd"/>
                                        </div>
                                    </div>
                                    
                                    <!-- <div class="col-md-12">
                                    <div class="product-type info-input">
                                        <label>Products Type<span class="link-danger">*</span></label>
                                        <select class="custom-multiple-types" multiple="multiple">
                                            <option>Fans</option>
                                            <option>Lights</option>
                                            <option>Chairs</option>
                                            <option>Tents</option>
                                            <option>Speakers</option>
                                            <option>Generators</option>
                                        </select>
                                    </div>
                                    </div>  -->
                                    <div class="col-md-6">   
                                    	<div class="payment-detail info-input">
                                        <label>Payment Details<span class="link-danger">*</span></label>
                                        <select class="paymentOption" name="paymentoption">
                                            <option value="Paypal">Paypal</option>
                                            <option value="Stripe">Stripe</option>
                                            <option value="Bank Transfer">Bank Transfer</option>
                                        </select>
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="products-delivery checkout-radio">
                                        <h4 class="mb-25"><strong>Products Delivery Via</strong></h4>
                                        <div class="both-radio">
                                            <div class="radio-button">
                                            <div class="input-label me-5">
                                            <input type="checkbox" name="delivery" id="delivery_vendor" class="deliveryvia personal_info" value="vendor"/>
                                            <label for="delivery_vendor">Vendor</label>
                                            </div>
                                            </div>
                                            <div class="radio-button">
                                            <div class="input-label">
                                            <input type="checkbox" name="delivery" id="delivery_third" class="deliveryvia personal_info" value="third party"/>
                                            <label for="delivery_third">Third Party Delivery Service</label>
                                            </div>
                                            </div>   
                                        </div>    
                                  </div>
                                  	</div>
                                    
                                </div>

                                
                            </div>
                        
                       </div> 
                       
                        <div class="tabs-main-block">
                        <h1 class="mt-4 main-title">Contact Information</h1>
                        	<div class="form-detail">
                                <div class="row">                                   
                                    <div class="col-md-6">
                                        <div class="info-input mb-20px">
                                            <label>Address <span style="color:red">*</span></label>
                                            <input type="text" placeholder="" value="{{$vendors->contact_address}}" name="vendoradd">
                                            <div class="map-pin icon"><img src="{{asset('seller/assets/img/location-pin.svg')}}"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="info-input mb-20px">
                                            <label>Phone No <span style="color:red">*</span></label>
                                            <input type="text" placeholder=""  value="{{$vendors->mobile }}" name="mobile">
                                            
                                        </div>
                                    </div>
                                    
                                    
                                </div>
								<div class="row">                                   
                                    <div class="col-md-6">
                                        <div class="info-input mb-20px">
                                            <label>City <span style="color:red">*</span></label>
                                            <select class="selectcity" name="city">
                                            <option value="0">select city</option>
                                            <option value="1">Dubai</option>
                                            <option value="2">Abu Dhabi</option>
                                            <option value="3">Dhayn</option>
                                        </select>
                                           
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="info-input mb-20px">
                                            <label>Zip Code/P.O.Box <span style="color:red">*</span></label>
                                            <input type="text" placeholder="" value="{{$vendors->zipcode }}" name="pincode">
                                            
                                        </div>
                                    </div>
                                    
                                    
                                </div>
                                
                            </div>
                        </div>
                        <div class="tabs-main-block">
                        <h1 class="mt-4 main-title">Upload Documents</h1>
                        	<div class="form-detail">
                                <div class="row"> 
                                                                     
                                    	<div class="col-md-6 cmp_logo">
                                       	<div class="info-input upload">
                                          <label class="control-label mb-2">Upload Company Logo <span class="link-danger">*</span></label>
                                         <input type="text" class="filestyle" placeholder="IMG-1.png" name="cmp_logo"> 
                                         <button class="btn">View</button>
                                        </div>
                                        </div>
                                        <div class="col-md-6 cmp_name">
                                        <div class="info-input">
                                          <label class="control-label mb-2">Company Name<span class="link-danger">*</span></label>
                                          <input type="text" class="filestyle" placeholder="Diginite" value="{{$vendors->company_name}}" name="cmp_name">
                                        </div>
                                        </div>
                                        <div class="col-md-6 cmp_license">
                                        <div class="info-input">
                                          <label class="control-label mb-2">Name of License <span class="link-danger">*</span></label>
                                          <input type="text" class="filestyle" value="{{$vendors->name_of_license}}" name="license_name">
                                        </div>
                                        </div>
                                        <div class="col-md-6 cmp_license_no">
                                        <div class="info-input">
                                          <label class="control-label mb-2">License Number<span class="link-danger">*</span></label>
                                          <input type="text" class="filestyle" value="{{$vendors->license_no}}" name="license_no">
                                        </div>
                                        </div>
                                          <div class="col-md-4 cmp_exp">
                                    	<div class="info-input">
                                          <label class="control-label mb-2">License Expiring Date<span class="link-danger">*</span></label>
                                          <input type="text" class="filestyle" placeholder="26/02/2024" value="{{$vendors->license_exp_date}}" name="license_exp">
                                        </div>
                                        </div>
                                        <div class="col-md-4 cmp_logo">
                                        <div class="info-input upload">
                                            <img src="{{asset('uploads/'.$vendors->license_img)}}" style="width:50px;"/>
                                          <label class="control-label mb-2">Upload License<span class="link-danger">*</span></label>
                                         <input type="text" class="filestyle" placeholder="IMG-1.png" value="{{$vendors->license_img}}" name="license_img"> 
                                         <button class="btn">View</button>
                                        </div>
                                   		</div>
                                        <div class="col-md-4 cmp_logo">
                                        <div class="info-input upload">
                                        <img src="{{asset('uploads/'.$vendors->trade_license_img)}}" style="width:50px;"/>
                                          <label class="control-label mb-2">Upload Trade license <span class="link-danger">*</span></label>
                                         <input type="text" class="filestyle" placeholder="IMG-1.png" value="{{$vendors->trade_license_img}}" name="trade_img"> 
                                         <button class="btn">View</button>
                                        </div>
                                        </div>
                                    	<div class="col-md-4">
                                        <div class="info-input upload">
                                        <img src="{{asset('uploads/'.$vendors->passport_img)}}" style="width:50px;"/>
                                          <label class="control-label mb-2">Upload Passport <span class="link-danger">*</span></label>
                                         <input type="text" class="filestyle" placeholder="IMG-1.png" value="{{$vendors->passport_img}}" name="passport_img"> 
                                         <button class="btn">View</button>
                                        </div>
                                        </div>
                                       
                                        <div class="col-md-4 ">
                                        <div class="info-input upload">
                                        <img src="{{asset('uploads/'.$vendors->emirates_id_img)}}" style="width:100px;"/>
                                          <label class="control-label mb-2">Emirates Id <span class="link-danger">*</span></label>
                                         <input type="text" class="filestyle" placeholder="IMG-1.png" value="{{$vendors->emirates_id_img}}" name="emirates_fr_img"> 
                                         <button class="btn">View</button>
                                        </div>
                                        </div>
                                      
                                       
                                        
                                    </div>
                                    
                                    
                                    
                                </div>
								
                               
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-success vendorupdate">update</button>
                            </div>
                    </form>
                                                
                                              </div>
                                            </div>
                                          </div>
                                          
                                          
                                        </div>
                                        
                                       
                                    </div>
								
                                
                            </div>    
                        </div>
                    
                </main>
@stop
@push('otherscript')
<script>
    $(function(){
        var bankname = $("#bankname").val();
        $("#banktype option").each(function(){
            if($(this).val()==bankname){
                $(this).attr('selected','selected');
            }
        })
        var registered_as = $("#registered_as").val();
        $(".registeras").each(function(){
            if($(this).val()==registered_as){
                $(this).prop('checked',true);
                if(registered_as=='Freelancer'){
                    $(".cmp_name").hide();
                    $(".cmp_add").hide();
                    $(".cmp_logo").hide();
                    $(".cmp_license").hide();
                    $(".cmp_license_no").hide();
                    $(".cmp_exp").hide();
                   
                }else if(registered_as == 'Licensed'){
                    $(".cmp_name").show();
                    $(".cmp_add").show();
                    $(".cmp_logo").show();
                    $(".cmp_license").show();
                    $(".cmp_license_no").show();
                    $(".cmp_exp").show();
                }
            }
        })

        var delivery_by = $("#delivery_by").val();

        $(".deliveryvia").each(function(){
            if($(this).val()==delivery_by){
                $(this).prop('checked',true);
            }
        })
        
        var payment_option = $("#payment_option").val();
        $(".paymentOption option").each(function(){
            if($(this).val()==payment_option){
                $(this).attr('selected','selected');
            }
        })

        $("input.registeras").click(function () {   
       
       $('input.registeras').not(this).prop('checked', false);

       
               if($(this).is(':checked')){
                if($(this).val()=='Freelancer'){
                    $(".cmp_name").hide();
                    $(".cmp_add").hide();
                    $(".cmp_logo").hide();
                    $(".cmp_license").hide();
                    $(".cmp_license_no").hide();
                   
                }else if($(this).val() == 'Licensed'){
                    $(".cmp_name").show();
                    $(".cmp_add").show();
                    $(".cmp_logo").show();
                    $(".cmp_license").show();
                    $(".cmp_license_no").show();
                }
            }
            
        });

        $("input.deliveryvia").click(function () {   
         
         $('input.deliveryvia').not(this).prop('checked', false);
            
          })

        var city = $("#city").val();
        $(".selectcity option").each(function(){
            if($(this).val()==city){
                $(this).attr('selected','selected');
            }
        })
    })
</script>

<script>
    $("button.vendorupdate").click(function(e){
        e.preventDefault();
        $("#cover-spin").show();
        $("form#updatevendor").submit();

    })
</script>


@endpush