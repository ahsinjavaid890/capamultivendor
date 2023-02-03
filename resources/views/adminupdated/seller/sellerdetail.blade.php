@extends('adminupdated.layouts.main-layout')
@section('title','All Seller')
@section('content')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class=" container-fluid ">
            <!--begin::Card-->
            <div class="row">
            	 <div class="col-lg-12">
            	 	@include('website.layouts.flash')
            	 </div>
            </div>
            <div class="card card-custom mt-5">
                <div class="card-header flex-wrap py-5">
                    <div class="card-title">
                        <h3 class="card-label">
                            Seller Detail
                            <div class="text-muted pt-2 font-size-sm">Manage Seller Detail</div>
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tabs-main-block">
                        <h1 class="mt-4 main-title">Personal Information</h1>
                        <div class="form-detail personal-info">
                                <div class="row">
                                <input type="hidden" value="{{$vendors->id}}" id="id">
                                    <input type="hidden" value="{{$vendors->bank}}" id="bankname">
                                    <input type="hidden" value="{{$vendors->registered_as}}" id="registered_as">
                                    <input type="hidden" value="{{$vendors->delivery_by}}" id="delivery_by">
                                    <input type="hidden" value="{{$vendors->product_type}}" id="product_type">
                                    <input type="hidden" value="{{$vendors->payment_option}}" id="payment_option">
                                    <input type="hidden" value="{{$vendors->city}}" id="city">
                                    <div class="col-md-6">
                                        <div class="info-input mb-20px">
                                            <label>Email Address <span style="color:red">*</span></label>
                                            <input type="email" class="form-control" value="{{$vendors->email}}" />
                                           
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="info-input mb-20px">
                                            <label>Emirates ID <span style="color:red">*</span></label>
                                            <input type="text" class="form-control" value="{{$vendors->emirates_id}}"/>
                                        </div>
                                    </div>
                                    
                                   
                                        
                                    <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="info-input mb-20px">
                                                <label>Account Title <span style="color:red">*</span></label>
                                                <input type="text" class="form-control" placeholder="saving" value="{{$vendors->account_title}}" />
                                            </div>
                                            </div>
                                    <div class="col-md-6">
                                    <div class="payment-detail info-input">
                                        <label>Bank Name<span class="link-danger">*</span></label>
                                        <select class="banktype form-control" id="banktype">
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
                                                <input type="text" class="form-control" value="{{$vendors->account_no}}"/>
                                            </div>
                                        </div>
                                    <div class="col-md-6">
                                        <div class="register-yourself checkout-radio d-flex">
                                        <h4><strong>I am a</strong></h4>
                                        </div>
                                    </div>
                                       <div class="col-md-6">
                                            <div class="both-radio d-flex mt-1">
                                            <div class="radio-button">
                                        <div class="input-label me-5 d-flex">
                                        <input type="checkbox" name="delivery" id="licensed_seller" class="registeras personal_info form-control" value="Licensed"/>
                                        <label for="licensed_seller">Licensed Seller</label>
                                        </div>
                                        </div>
                                        <div class="radio-button">
                                        <div class="input-label d-flex">
                                        <input type="checkbox" name="delivery" id="freelancer_seller" class="registeras personal_info form-control" value="Freelancer"/>
                                        <label for="freelancer_seller">Freelancer Seller</label>
                                        </div>
                                        </div> 
                                        </div> 
                                        </div>
                                    <div class="col-md-6 cmp_name">
                                        <div class="info-input mb-20px">
                                            <label>Company Name <span style="color:red">*</span></label>
                                            <input type="text" class="form-control" value="{{$vendors->company_name}}"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6 cmp_add">
                                        <div class="info-input mb-20px">
                                            <label>Company Address </label>
                                            <input type="text" class="form-control" value="{{$vendors->company_address}}"/>
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
                                        <select class="paymentOption form-control">
                                            <option value="Paypal">Paypal</option>
                                            <option value="Stripe">Stripe</option>
                                            <option value="Bank Transfer">Bank Transfer</option>
                                        </select>
                                    </div>
                                    </div>
                                    <div class="col-md-3">
                                    <div class="products-delivery checkout-radio d-flex">
                                        <h4 class=""><strong>Products Delivery Via</strong></h4>    
                                    </div>
                                    </div>
                                    <div class="col-md-3">
                                    <div class="both-radio d-flex">
                                            <div class="radio-button d-flex">
                                            <div class="input-label">
                                            <input type="checkbox" name="delivery" id="delivery_vendor" class="deliveryvia personal_info form-control" value="vendor"/>
                                            <label for="delivery_vendor">Vendor</label>
                                            </div>
                                            </div>
                                            <div class="radio-button d-flex">
                                            <div class="input-label">
                                            <input type="checkbox" name="delivery" id="delivery_third" class="deliveryvia personal_info form-control" value="third party"/>
                                            <label for="delivery_third">Third Party Delivery Service</label>
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
                                            <input type="text" class="form-control" placeholder="" value="{{$vendors->contact_address}}">
                                            <div class="map-pin icon"><img src="{{asset('seller/assets/img/location-pin.svg')}}"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="info-input mb-20px">
                                            <label>Phone No <span style="color:red">*</span></label>
                                            <input type="text" class="form-control" placeholder=""  value="{{$vendors->mobile }}">
                                            
                                        </div>
                                    </div>
                                    
                                    
                                </div>
                                <div class="row">                                   
                                    <div class="col-md-6">
                                        <div class="info-input mb-20px">
                                            <label>City <span style="color:red">*</span></label>
                                            <select class="selectcity form-control">
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
                                            <input type="text" class="form-control" placeholder="" value="{{$vendors->zipcode }}">
                                            
                                        </div>
                                    </div>
                                    
                                    
                                </div>
                                
                            </div>
                        </div>
                        <div class="tabs-main-block">
                        <h1 class="mt-4 main-title">Upload Documents</h1>
                            <div class="form-detail">
                                <div class="row"> 
                                    @if($vendors->registered_as=="Licensed")                                  
                                        <div class="col-md-6 cmp_logo">
                                        <div class="info-input upload">
                                          <label class="control-label mb-2">Upload Company Logo <span class="link-danger">*</span></label>
                                         <input type="text" class="filestyle form-control" placeholder="IMG-1.png" > 
                                         <button class="btn">View</button>
                                        </div>
                                        </div>
                                        <div class="col-md-6 cmp_name">
                                        <div class="info-input">
                                          <label class="control-label mb-2">Company Name<span class="link-danger">*</span></label>
                                          <input type="text" class="filestyle form-control" placeholder="Diginite" value="{{$vendors->company_name}}">
                                        </div>
                                        </div>
                                        <div class="col-md-4 cmp_license">
                                        <div class="info-input">
                                          <label class="control-label mb-2">Name of License <span class="link-danger">*</span></label>
                                          <input type="text" class="filestyle form-control" value="{{$vendors->name_of_license}}">
                                        </div>
                                        </div>
                                        <div class="col-md-4 cmp_license_no">
                                        <div class="info-input">
                                          <label class="control-label mb-2">License Number<span class="link-danger">*</span></label>
                                          <input type="text" class="filestyle form-control" value="{{$vendors->license_no}}">
                                        </div>
                                        </div>
                                          <div class="col-md-4 cmp_exp">
                                        <div class="info-input">
                                          <label class="control-label mb-2">License Expiring Date<span class="link-danger">*</span></label>
                                          <input type="text" class="filestyle form-control" placeholder="26/02/2024" value="{{$vendors->license_exp_date}}">
                                        </div>
                                        </div>
                                        <div class="col-md-4 cmp_logo">
                                        <div class="info-input upload">
                                            <img src="{{asset('public/uploads/'.$vendors->company_logo)}}" style="width:50px;"/>
                                          <label class="control-label mb-2">Upload Company Logo <span class="link-danger">*</span></label>
                                         <input type="text" class="filestyle form-control" placeholder="IMG-1.png" value="{{$vendors->company_logo}}"> 
                                         <button class="btn">View</button>
                                        </div>
                                        </div>
                                        <div class="col-md-4 cmp_logo">
                                        <div class="info-input upload">
                                        <img src="{{asset('public/uploads/'.$vendors->trade_license_img)}}" style="width:50px;"/>
                                          <label class="control-label mb-2">Upload Trade license <span class="link-danger">*</span></label>
                                         <input type="text" class="filestyle form-control" placeholder="IMG-1.png" value="{{$vendors->trade_license_img}}"> 
                                         <button class="btn">View</button>
                                        </div>
                                        </div>
                                        <div class="col-md-4 cmp_logo">
                                        <div class="info-input upload">
                                        <img src="{{asset('public/uploads/'.$vendors->passport_img)}}" style="width:50px;"/>
                                          <label class="control-label mb-2">Upload Passport <span class="link-danger">*</span></label>
                                         <input type="text" class="filestyle form-control" placeholder="IMG-1.png" value="{{$vendors->passport_img}}"> 
                                         <button class="btn">View</button>
                                        </div>
                                        </div>
                                        @elseif($vendors->registered_as=="Freelancer")
                                        <div class="col-md-4 ">
                                        <div class="info-input upload">
                                        <img src="{{asset('public/uploads/'.$vendors->passport_img)}}" style="width:100px;"/>
                                          <label class="control-label mb-2">Passport <span class="link-danger">*</span></label>
                                         <input type="text" class="filestyle form-control" placeholder="IMG-1.png" value="{{$vendors->passport_img}}"> 
                                         <button class="btn">View</button>
                                        </div>
                                        </div>
                                        <div class="col-md-4 ">
                                        <div class="info-input upload">
                                        <img src="{{asset('public/uploads/'.$vendors->emirates_id_img)}}" style="width:100px;"/>
                                          <label class="control-label mb-2">Emirates Id <span class="link-danger">*</span></label>
                                         <input type="text" class="filestyle form-control" placeholder="IMG-1.png" value="{{$vendors->emirates_id_img}}"> 
                                         <button class="btn">View</button>
                                        </div>
                                        </div>
                                        @endif
                                       
                                        
                                    </div>
                                    
                                    
                                    
                                </div>
                                
                               
                            </div>
                        <div class="tabs-main-block">
                                <h1 class="mt-4 main-title mb-4">Membership Plan</h1>
                                <div class="form-detail membership-plans">
                                        <div class="row">
                                          <div class="col-12">
                                            <div class="card mb-4 bg-white shadow-sm">
                                              
                                              @if($vendors->isMembership==1){
                                              <div class="card-body">
                                                <h3 class="pricing-card-title">FREE $0<sub class="monthly">monthly</sub></h3>
                                               
                                                <ul class="list-unstyled mt-3 mb-4 ">
                                                 <div class="row">
                                                    <div class="col-4"><li><svg xmlns="http://www.w3.org/2000/svg" width="15.779" height="14.649" viewBox="0 0 15.779 14.649">
                                                    <path id="Path_537" data-name="Path 537" d="M121.316,149.153l-6.884-5.363,1.957-2.512,4.227,3.293,6.977-10.067,2.618,1.814Z" transform="translate(-114.432 -134.504)" fill="#009fbd"/></svg> Lorem ipsum dolor sit amet</li>
                                                  <li><svg xmlns="http://www.w3.org/2000/svg" width="15.779" height="14.649" viewBox="0 0 15.779 14.649">
                                                    <path id="Path_537" data-name="Path 537" d="M121.316,149.153l-6.884-5.363,1.957-2.512,4.227,3.293,6.977-10.067,2.618,1.814Z" transform="translate(-114.432 -134.504)" fill="#009fbd"/></svg>10 users included</li>
                                                  <li><svg xmlns="http://www.w3.org/2000/svg" width="15.779" height="14.649" viewBox="0 0 15.779 14.649">
                                                    <path id="Path_537" data-name="Path 537" d="M121.316,149.153l-6.884-5.363,1.957-2.512,4.227,3.293,6.977-10.067,2.618,1.814Z" transform="translate(-114.432 -134.504)" fill="#009fbd"/></svg>2 GB of storage</li>
                                                  <li><svg xmlns="http://www.w3.org/2000/svg" width="15.779" height="14.649" viewBox="0 0 15.779 14.649">
                                                    <path id="Path_537" data-name="Path 537" d="M121.316,149.153l-6.884-5.363,1.957-2.512,4.227,3.293,6.977-10.067,2.618,1.814Z" transform="translate(-114.432 -134.504)" fill="#009fbd"/></svg>Lorem ipsum dolor sit amet</li></div>
                                                    <div class="col-4"> <li><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15">
  <path id="close_1_" data-name="close (1)" d="M9.976,7.5,14.616,2.86a1.312,1.312,0,0,0,0-1.856L14,.385a1.312,1.312,0,0,0-1.856,0L7.5,5.026,2.86.384A1.312,1.312,0,0,0,1,.384L.385,1a1.312,1.312,0,0,0,0,1.856L5.026,7.5l-4.64,4.64A1.312,1.312,0,0,0,.386,14L1,14.615a1.312,1.312,0,0,0,1.856,0L7.5,9.975l4.64,4.641a1.312,1.312,0,0,0,1.856,0L14.616,14a1.312,1.312,0,0,0,0-1.856Zm0,0" transform="translate(0 0)" fill="#009fbd"/>
</svg>
Email support</li>
                                                  <li><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15">
  <path id="close_1_" data-name="close (1)" d="M9.976,7.5,14.616,2.86a1.312,1.312,0,0,0,0-1.856L14,.385a1.312,1.312,0,0,0-1.856,0L7.5,5.026,2.86.384A1.312,1.312,0,0,0,1,.384L.385,1a1.312,1.312,0,0,0,0,1.856L5.026,7.5l-4.64,4.64A1.312,1.312,0,0,0,.386,14L1,14.615a1.312,1.312,0,0,0,1.856,0L7.5,9.975l4.64,4.641a1.312,1.312,0,0,0,1.856,0L14.616,14a1.312,1.312,0,0,0,0-1.856Zm0,0" transform="translate(0 0)" fill="#009fbd"/>
</svg>
Help center access</li>                                                  
                                                  <li><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15">
  <path id="close_1_" data-name="close (1)" d="M9.976,7.5,14.616,2.86a1.312,1.312,0,0,0,0-1.856L14,.385a1.312,1.312,0,0,0-1.856,0L7.5,5.026,2.86.384A1.312,1.312,0,0,0,1,.384L.385,1a1.312,1.312,0,0,0,0,1.856L5.026,7.5l-4.64,4.64A1.312,1.312,0,0,0,.386,14L1,14.615a1.312,1.312,0,0,0,1.856,0L7.5,9.975l4.64,4.641a1.312,1.312,0,0,0,1.856,0L14.616,14a1.312,1.312,0,0,0,0-1.856Zm0,0" transform="translate(0 0)" fill="#009fbd"/>
</svg>
Lorem ipsum dolor sit amet</li></div>
@else

                                    <div class="card-body">
                                                <h3 class="pricing-card-title">{{$chooseplan->plan_title}} <sub class="monthly">{{$chooseplan->plan_amount}} AED/monthly</sub></h3>
                                               
                                                <ul class="list-unstyled mt-3 mb-4 ">
                                                 <div class="row">
                                                    <div class="col-12">
                                                        <div class="membership_features">
                                                            {!! $chooseplan->description !!}
                                                        </div>
                                                       </div> 

@endif
                                                </div>
                                                </ul>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                            </div> 
                </div>
            </div>
        </div>
    </div>
</div>   
@endsection
@section('script')
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
                   
                }else if(registered_as == 'Licensed'){
                    $(".cmp_name").show();
                    $(".cmp_add").show();
                    $(".cmp_logo").show();
                    $(".cmp_license").show();
                    $(".cmp_license_no").show();
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

@endsection