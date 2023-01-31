@extends('sellerupdated.layouts.main-layout')
@section('title','Seller Profile')
@section('content')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Card-->
            <div class="card card-custom mt-5">
                <div class="card-header flex-wrap py-5">
                    <div class="card-title">
                        <h3 class="card-label">
                            Seller Profile
                            <div class="text-muted pt-2 font-size-sm">Manage Seller Profile</div>
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                   <div class="tabs-main-block">
                        <h1 class="mt-4 main-title">Personal Information</h1>
                        
                        <div class="form-detail personal-info">
                                <div class="row">
                                <input type="hidden" value="{{Auth::guard('seller')->user()->id}}" id="id">
                                    <input type="hidden" value="{{Auth::guard('seller')->user()->bank}}" id="bankname">
                                    <input type="hidden" value="{{Auth::guard('seller')->user()->registered_as}}" id="registered_as">
                                    <input type="hidden" value="{{Auth::guard('seller')->user()->delivery_by}}" id="delivery_by">
                                    <input type="hidden" value="{{Auth::guard('seller')->user()->product_type}}" id="product_type">
                                    <input type="hidden" value="{{Auth::guard('seller')->user()->payment_option}}" id="payment_option">
                                    <input type="hidden" value="{{Auth::guard('seller')->user()->city}}" id="city">
                                    <div class="col-md-6">
                                        <div class="info-input mb-20px">
                                            <label>Email Address <span style="color:red">*</span></label>
                                            <input type="email" value="{{Auth::guard('seller')->user()->email}}" name="vendor_email" id="vendor_email"/>
                                           
                                        </div>
                                    </div>
                                    <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>
                                    <div class="col-md-6">
                                        <div class="info-input mb-20px">
                                            <label>Emirates ID <span style="color:red">*</span></label>
                                            <input data-inputmask="'mask': '999999-999999-999999-999999'" type="text" value="{{Auth::guard('seller')->user()->emirates_id}}" placeholder="000000-000000-000000-000000" name="emirates" id="emirates_id"/>
                                        </div>
                                    </div>
                                    <script>
                                      $(":input").inputmask();

                                     </script>
                                    <div class="payment-detail info-input">
                                        <label>Payment Details<span class="link-danger">*</span></label>
                                        <select class="paymentOption" id="payment_option" name="payment_option">
                                            <option value="0">-select payment option-</option>
                                            <option value="paypal">Paypal</option>
                                            <option value="stripe">Stripe</option>
                                            <option value="bank">Bank Transfer</option>
                                        </select>
                                    </div>
                                    <div class="payment-detail info-input paypal_section" style="display:none">
                                        <label>PayPal Id<span class="link-danger">*</span></label>
                                        <input type="text" class="" id="paypal_id" value="{{Auth::guard('seller')->user()->paypal_id }}" name="paypal"/>
                                    </div>

                                    <div class="payment-detail info-input stripe_section" style="display:none">
                                        <label>Stripe Id<span class="link-danger">*</span></label>
                                        <input type="text" class="" id="stripe_id" value="{{Auth::guard('seller')->user()->stripe_id }}"/>
                                    </div>
                                        
                                    <div class="col-md-12 bankdetails" >
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="info-input mb-20px">
                                                <label>Account Title <span style="color:red">*</span></label>
                                                <input type="text" placeholder="saving" value="{{Auth::guard('seller')->user()->account_title}}" id="accountTitle" />
                                            </div>
                                            </div>
                                    <div class="col-md-6 bankdetails">
                                    <div class="payment-detail info-input">
                                        <label>Bank Name<span class="link-danger">*</span></label>
                                        <select class="banktype" id="banktype">
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
                                    <div class="col-md-12 bankdetails">
                                            <div class="info-input mb-20px">
                                                <label>Account Number (IBAN)<span style="color:red">*</span></label>
                                                <input type="text" value="{{Auth::guard('seller')->user()->account_no}}" id="ibanno"/>
                                            </div>
                                        </div>
                                        
                                    <div class="register-yourself checkout-radio">
                                        <h4 class="mb-25"><strong>I am a</strong></h4>
                                        <div class="both-radio">
                                            <div class="radio-button">
                                        <div class="input-label me-5">
                                        <input type="checkbox" name="delivery" id="licensed_seller" class="registeras personal_info" value="Licensed"/>
                                        <label for="licensed_seller">Licensed Seller</label>
                                        </div>
                                        </div>
                                            <div class="radio-button">
                                        <div class="input-label">
                                        <input type="checkbox" name="delivery" id="freelancer_seller" class="registeras personal_info" value="Freelancer"/>
                                        <label for="freelancer_seller">Freelancer Seller</label>
                                        </div>
                                        </div> 
                                        </div>    
                                  </div>
                                    <!-- <div class="col-md-6 cmp_name">
                                        <div class="info-input mb-20px">
                                            <label>Company Name <span style="color:red">*</span></label>
                                            <input type="text" value="{{Auth::guard('seller')->user()->company_name}}"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6 cmp_add">
                                        <div class="info-input mb-20px">
                                            <label>Company Address </label>
                                            <input type="text" value="{{Auth::guard('seller')->user()->company_address}}"/>
                                        </div>
                                    </div> -->
                                    
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
                                            <input type="text" placeholder="" value="{{Auth::guard('seller')->user()->contact_address}}" id="venaddress">
                                            <div class="map-pin icon"><img src="assets/img/location-pin.svg"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="info-input mb-20px">
                                            <label>Phone No <span style="color:red">*</span></label>
                                            <input type="text" placeholder=""  value="{{Auth::guard('seller')->user()->mobile }}" id="venmobile">
                                            
                                        </div>
                                    </div>
                                    
                                    
                                </div>
                        <div class="row">                                   
                                    <div class="col-md-6">
                                        <div class="info-input mb-20px">
                                            <label>City <span style="color:red">*</span></label>
                                            <select class="selectcity" id="vencity">
                                            <option value="0">select city</option>
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
                                    <div class="col-md-6">
                                        <div class="info-input mb-20px">
                                            <label>Zip Code/P.O.Box <span style="color:red">*</span></label>
                                            <input type="text" placeholder="" value="{{Auth::guard('seller')->user()->zipcode }}" id="venzipcode">
                                            
                                        </div>
                                    </div>
                                    
                                    
                                </div>
                                
                            </div>
                        </div>
                        <div class="tabs-main-block">
                        <h1 class="mt-4 main-title">Upload Documents</h1>
                           <div class="form-detail">
                                <div class="row"> 
                                    @if(Auth::guard('seller')->user()->registered_as=="Licensed")                                  
                                       <!-- <div class="col-md-6 cmp_logo">
                                          <div class="info-input upload">
                                          <label class="control-label mb-2">Upload Company Logo <span class="link-danger">*</span></label>
                                         <input type="text" class="filestyle" placeholder="IMG-1.png" > 
                                         <button class="btn">View</button>
                                        </div>
                                        </div> -->
                                        <div class="col-md-6 cmp_name">
                                            <div class="info-input">
                                              <label class="control-label mb-2">Company Name<span class="link-danger">*</span></label>
                                              <input type="text" class="filestyle" placeholder="Diginite" value="{{Auth::guard('seller')->user()->company_name}}" id="cmp_name">
                                            </div>
                                        </div>
                                        <div class="col-md-6 cmp_add">
                                            <div class="info-input mb-20px">
                                                <label>Company Address </label>
                                                <input type="text" value="{{Auth::guard('seller')->user()->company_address}}" id="cmd_address"/>
                                            </div>
                                        </div>
                                        <div class="col-md-6 cmp_license">
                                            <div class="info-input">
                                              <label class="control-label mb-2">Name of License <span class="link-danger">*</span></label>
                                              <input type="text" class="filestyle" value="{{$getdata->name_of_license}}" id="license_name">
                                            </div>
                                        </div>
                                        <div class="col-md-4 cmp_no">
                                            <div class="info-input">
                                              <label class="control-label mb-2">License Number<span class="link-danger">*</span></label>
                                              <input type="text" class="filestyle" value="{{$getdata->license_no}}" id="license_no">
                                            </div>
                                        </div>
                                        <div class="col-md-4 cmp_exp">
                                            <div class="info-input">
                                              <label class="control-label mb-2">License Expiring Date<span class="link-danger">*</span></label>
                                              <input type="text" class="filestyle" placeholder="26/02/2024" value="{{$getdata->license_exp_date}}" id="license_expiry">
                                            </div>
                                        </div>
                                        <div class="col-md-4 cmp_logo">
                                        <div class="info-input upload">
                                            <img src="{{asset('uploads/'.$getdata->company_logo)}}" style="width:50px;"/>
                                          <label class="control-label mb-2"> Company Logo <span class="link-danger">*</span></label>
                                         <input type="text" class="filestyle" placeholder="IMG-1.png" value="{{$getdata->company_logo}}"> 
                                         <button class="btn">View</button>
                                        </div>
                                       </div>
                                        <div class="col-md-4 cmp_trade">
                                        <div class="info-input upload">
                                        <img src="{{asset('uploads/'.$getdata->trade_license_img)}}" style="width:50px;"/>
                                          <label class="control-label mb-2">Trade license <span class="link-danger">*</span></label>
                                         <input type="text" class="filestyle" placeholder="IMG-1.png" value="{{$getdata->trade_license_img}}"> 
                                         <button class="btn">View</button>
                                        </div>
                                        </div>
                                       <div class="col-md-4 cmp_passport">
                                        <div class="info-input upload">
                                        <img src="{{asset('uploads/'.$getdata->passport_img)}}" style="width:50px;"/>
                                          <label class="control-label mb-2">Passport <span class="link-danger">*</span></label>
                                         <input type="text" class="filestyle" placeholder="IMG-1.png" value="{{$getdata->passport_img}}"> 
                                         <button class="btn">View</button>
                                        </div>
                                        </div>
                                        <div class="col-md-4 cmp_emirates">
                                        <div class="info-input upload">
                                        <img src="{{asset('uploads/'.$getdata->emirates_id_img)}}" style="width:50px;"/>
                                          <label class="control-label mb-2">Emirates Front image<span class="link-danger">*</span></label>
                                         <input type="text" class="filestyle" placeholder="IMG-1.png" value="{{$getdata->emirates_id_img}}"> 
                                         <button class="btn">View</button>
                                        </div>
                                        </div>
                                        <div class="col-md-4 cmp_emirates">
                                        <div class="info-input upload">
                                        <img src="{{asset('uploads/'.$getdata->emirates_back_img)}}" style="width:50px;"/>
                                          <label class="control-label mb-2">Emirates back image<span class="link-danger">*</span></label>
                                         <input type="text" class="filestyle" placeholder="IMG-1.png" value="{{$getdata->emirates_back_img}}"> 
                                         <button class="btn">View</button>
                                        </div>
                                        </div>
                                        @elseif(Auth::guard('seller')->user()->registered_as=="Freelancer")
                                        <div class="col-md-4 ">
                                        <div class="info-input upload">
                                        <img src="{{asset('uploads/'.$getdata->passport_img)}}" style="width:100px;"/>
                                          <label class="control-label mb-2">Passport <span class="link-danger">*</span></label>
                                         <input type="text" class="filestyle" placeholder="IMG-1.png" value="{{$getdata->passport_img}}"> 
                                         <button class="btn">View</button>
                                        </div>
                                        </div>
                                        <div class="col-md-4 ">
                                        <div class="info-input upload">
                                        <img src="{{asset('uploads/'.$getdata->emirates_id_img)}}" style="width:100px;"/>
                                          <label class="control-label mb-2">Emirates Id <span class="link-danger">*</span></label>
                                         <input type="text" class="filestyle" placeholder="IMG-1.png" value="{{$getdata->emirates_id_img}}"> 
                                         <button class="btn">View</button>
                                        </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <hr/>
                                <button class="btn btn-success updatebtn">Update</button>
                                <hr/>
                            </div>
                        </div>                                
                    </div>    
                </div>
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
@endsection
@section('style')
<style>
.plans_details{
    border: 1px solid #8080805c;
    padding: 16px;
    margin-bottom: 10px;
    border-radius: 10px;
}
</style>
@endsection
@section('script')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

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
                    $(".cmp_loc").hide();
                    $(".cmp_logo").hide();
                    $(".cmp_license").hide();
                    $(".cmp_no").hide();
                    $(".cmp_exp").hide();
                    $(".cmp_trade").hide();
                    $(".cmp_passport").show();
                    $(".cmp_emirates").show();
                   
                }else if(registered_as == 'Licensed'){
                    $(".cmp_name").show();
                    $(".cmp_add").show();
                    $(".cmp_loc").show();
                    $(".cmp_logo").show();
                    $(".cmp_license").show();
                    $(".cmp_no").show();
                    $(".cmp_exp").show();
                    $(".cmp_passport").show();
                    $(".cmp_emirates").show();
                    $(".cmp_trade").show();
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
                if(payment_option=='paypal'){
                    $(".paypal_section").show();
                    $(".stripe_section").hide();
                    $('.bankdetails').hide();
                }else if(payment_option=='stripe'){
                    $(".paypal_section").hide();
                    $(".stripe_section").show();
                    $('.bankdetails').hide();
                }else if(payment_option=='bank'){
                    $(".paypal_section").hide();
                    $(".stripe_section").hide();
                    $('.bankdetails').show();
                }
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

<script>
    $(function(){
        $("button.cancelplan").click(function(e){
            e.preventDefault();
            if(!confirm('Are you sure want to cancel this plan')){
                return false;
            }else{
                $("form#cancelationFrm").submit();
            }
        })
    })
</script>

<script>
  $(function(){
    $("select#payment_option").change(function(){
      var option = $(this).val();
      console.log(option)
      if(option=='paypal'){
        $(".paypal_section").show();
        $(".stripe_section").hide();
        $(".bankdetails").hide();
      }else if(option=='stripe'){
        $(".stripe_section").show();
        $(".paypal_section").hide();
        $(".bankdetails").hide();
      }else if(option=='bank'){
        $(".bankdetails").show();
        $(".stripe_section").hide();
        $(".paypal_section").hide();
      }else{
        $(".bankdetails").hide();
        $(".stripe_section").hide();
        $(".paypal_section").hide();
      }

    })
  })
</script>

<script>
    $(function(){
       
        $("input.registeras").click(function () {   
       
       $('input.registeras').not(this).prop('checked', false);
            if($(this).is(':checked')){
              if($(this).val()=="Licensed"){
              $(".cmp_name").show();
              $(".cmp_add").show();
              $(".cmp_loc").show();
              $(".cmp_logo").show();
              $(".cmp_license").show();
              $(".cmp_no").show();
              $(".cmp_exp").show();
              $(".cmp_passport").show();
              $(".cmp_emirates").show();
              $(".cmp_trade").show();
              }else if($(this).val()=="Freelancer"){
                $(".cmp_name").hide();
                $(".cmp_add").hide();
                $(".cmp_loc").hide();
                $(".cmp_logo").hide();
                $(".cmp_license").hide();
                $(".cmp_no").hide();
                $(".cmp_exp").hide();
                $(".cmp_trade").hide();
                $(".cmp_passport").show();
                $(".cmp_emirates").show();
              }
            }else {
              $(".cmp_name").hide();
              $(".cmp_add").hide();
              $(".cmp_loc").hide();
              $(".cmp_logo").hide();
              $(".cmp_license").hide();
              $(".cmp_no").hide();
              $(".cmp_exp").hide();
              $(".cmp_passport").hide();
              $(".cmp_emirates").hide();
              $(".cmp_trade").hide();
            }
        })
    })
</script>



<script>
    $(function(){
        $("button.updatebtn").click(function(e){
            e.preventDefault();
            var vendor_email = $("#vendor_email").val();
            var emirates_id = $("#emirates_id").val();
            var payment_option = $("select#payment_option").val();
            
            if(payment_option=='bank'){
                var accountTitle = $("#accountTitle").val();
                var banktype = $("#banktype").val();
                var ibanno = $("#ibanno").val();
                var stripe_id = '';
                var paypal = '';
               
                
            }else if(payment_option=='paypal'){
                var accountTitle = '';
                var banktype = '';
                var ibanno = '';
                var stripe_id = '';
                var paypal = $("#paypal_id").val();
                
            }else if(payment_option=='stripe'){
                var accountTitle = '';
                var banktype = '';
                var ibanno = '';
                var stripe_id = $("#stripe_id").val();
                var paypal = '';
               
            }
            var venaddress = $("#venaddress").val();
            var venmobile = $("#venmobile").val();
            var vencity = $("#vencity").val();
            var venzipcode = $("#venzipcode").val();
            var registered_as = $("#registered_as").val();
            if(registered_as=='Licensed'){
                var cmp_name = $("#cmp_name").val();
                var cmd_address = $("#cmd_address").val();
                var license_name = $("#license_name").val();
                var license_no = $("#license_no").val();
                var license_expiry =$("#license_expiry").val();
            }else if(registered_as=='Freelancer'){
                var cmp_name = '';
                var cmd_address = '';
                var license_name = '';
                var license_no = '';
                var license_expiry = '';
            }

           
                var form = new FormData();
                form.append('payment_option',payment_option);
                form.append('accountTitle',accountTitle);
                form.append('banktype',banktype);
                form.append('ibanno',ibanno);
                form.append('stripe_id',stripe_id);
                form.append('paypal',paypal);
                form.append('vendor_email',vendor_email);
                form.append('emirates_id',emirates_id);
                form.append('venaddress',venaddress);
                form.append('venmobile',venmobile);
                form.append('vencity',vencity);
                form.append('venzipcode',venzipcode);
                form.append('cmp_name',cmp_name);
                form.append('cmd_address',cmd_address);
                form.append('license_name',license_name);
                form.append('license_no',license_no);
                form.append('license_expiry',license_expiry);
            $("#cover-spin").show();
            $.ajax({
                url:"{{route('seller.updateprofile_bnak')}}",
                type:"POST",
                data:form,
                cache:false,
                contentType:false,
                processData:false,
                success:function(res){
                    $("#cover-spin").hide();
                      var js_data = JSON.parse(res);
                      if(js_data==1){
                        toastr.success('bank details updated successfull!');
                            location.reload();
                      } else{
                        toastr.error('something went wrong!');
                         return false;  
                      }     
                }
            })
        })
    })
</script>

@endsection