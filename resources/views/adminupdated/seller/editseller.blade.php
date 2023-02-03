@extends('adminupdated.layouts.main-layout')
@section('title','Edit Seller')
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
                            Edit Sallers
                            <div class="text-muted pt-2 font-size-sm">
                                <a class="badge badge-success" href="">Basic Details</a>
                                <a class="badge badge-primary" href="">Contact Info</a>
                                <a class="badge badge-primary" href="">Documents</a>
                            </div>
                        </h3>
                    </div>
                </div>
                <div class="card-body">
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
                            <input type="hidden" value="{{$vendors->city}}" id="city">
                                <div class="col-md-6">
                                    <label>First name</label>
                                    <input type="email" class="form-control form-control-lg form-control-solid" value="{{$vendors->fname}}" name="fname"/>
                                </div>
                                <div class="col-md-6">
                                    <label>Last name <span style="color:red">*</span></label>
                                    <input type="email" class="form-control form-control-lg form-control-solid" value="{{$vendors->lname}}" name="lname"/>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-md-6">
                                    <label>Email Address</label>
                                    <input type="email" class="form-control form-control-lg form-control-solid" value="{{$vendors->email}}" name="email"/>
                                </div>
                                <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>
                                <div class="col-md-6">
                                    <label>Emirates ID</label>
                                    <input placeholder="000000-000000-000000-000000" data-inputmask="'mask': '999999-999999-999999-999999'" class="form-control form-control-lg form-control-solid" type="text" value="{{$vendors->emirates_id}}" name="emiratesid"/>
                                </div>
                                <script>
                                  $(":input").inputmask();
                                </script>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">   
                                    <div class="payment-detail info-input">
                                        <label>Payment Details</label>
                                        <select id="payment_option" class="paymentOption form-control form-control-lg form-control-solid" name="paymentoption">
                                            <option value="0">-select payment option-</option>
                                            <option @if($vendors->payment_option == 'Paypal') selected @endif value="paypal">Paypal</option>
                                            <option @if($vendors->payment_option == 'stripe') selected @endif value="stripe">Stripe</option>
                                            <option @if($vendors->payment_option == 'bank') selected @endif value="bank">Bank Transfer</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="payment-detail info-input paypal_section mt-3" @if($vendors->payment_option != 'Paypal') style="display:none" @else  @endif >
                              <label>PayPal Id<span class="link-danger">*</span></label>
                              <input type="text" class="form-control form-control-lg form-control-solid" id="paypal_id" />
                           </div>
                           <div class="payment-detail info-input stripe_section mt-3" @if($vendors->payment_option != 'stripe') style="display:none" @else  @endif>
                              <label>Stripe Id<span class="link-danger">*</span></label>
                              <input type="text" class="form-control form-control-lg form-control-solid" id="stripe_id" />
                           </div> 
                           <div class="row mt-3">
                                <div class="col-md-12 bank_details" @if($vendors->payment_option != 'bank') style="display:none" @else  @endif>
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="info-input mb-20px">
                                       <label>Account holder name<span style="color:red">*</span></label>
                                       <input type="text" class="form-control form-control-lg form-control-solid" id="personal_accountTitle" value="{{$vendors->account_title}}"/>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="payment-detail info-input">
                                       <label>Bank Name<span class="link-danger">*</span></label>
                                       <select class="form-control form-control-lg form-control-solid" id="personal_bank">
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
                            <div class="col-md-12 bank_details" @if($vendors->payment_option != 'bank') style="display:none" @else  @endif>
                              <div class="info-input mb-20px">
                                 <label>Account Number (IBAN)<span style="color:red">*</span></label>
                                 <input type="text" class="form-control form-control-lg form-control-solid" id="personal_accountno" value="{{$vendors->account_no}}"  maxlength="23"/>
                              </div>
                           </div> 
                           </div> 
                           <div class="row">
                               <div class="col-md-6">                                    
                                    <div class="register-yourself checkout-radio mt-3 d-flex">
                                       <h4 style="margin-right: 20px;">Register Yourself As</h4>
                                       <div class="both-radio d-flex">
                                          <div style="margin-right: 20px;" class="radio-button">
                                             <div class="input-label me-5">
                                                <input style="height: 20px;width: 20px;" type="checkbox" name="delivery" id="licensed_seller" class="registeras personal_info" value="Licensed"/>
                                                <label for="licensed_seller">Licensed Seller</label>
                                             </div>
                                          </div>
                                          <div class="radio-button">
                                             <div class="input-label">
                                                <input style="height: 20px;width: 20px;" type="checkbox" name="delivery" id="freelancer_seller" class="registeras personal_info" value="Freelancer"/>
                                                <label for="freelancer_seller">Freelancer Seller</label>
                                             </div>
                                          </div>
                                       </div>
                                    </div>  
                                </div>
                                <div class="col-md-6">
                                    <div class="register-yourself checkout-radio mt-3 d-flex">
                                       <h4 style="margin-right: 20px;">Products Delivery Via</h4>
                                       <div class="both-radio d-flex">
                                          <div style="margin-right: 20px;" class="radio-button">
                                             <div class="input-label me-5">
                                                <input style="height: 20px;width: 20px;" type="checkbox" name="delivery" id="licensed_seller" class="registeras personal_info" value="Licensed"/>
                                                <label for="licensed_seller">Vendor</label>
                                             </div>
                                          </div>
                                          <div class="radio-button">
                                             <div class="input-label">
                                                <input style="height: 20px;width: 20px;" type="checkbox" name="delivery"  id="delivery_third" class="deliveryvia personal_info" value="third party"/>
                                                <label for="freelancer_seller">Third Party Delivery Service</label>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                </div>
                           </div>                                    
                            <div class="row">
                                <div class="col-md-6 cmp_name">
                                    <div class="info-input mb-20px">
                                        <label>Company Name <span style="color:red">*</span></label>
                                        <input type="text" class="form-control form-control-lg form-control-solid" value="{{$vendors->company_name}}" name="companyname"/>
                                    </div>
                                </div>
                                <div class="col-md-6 cmp_add">
                                    <div class="info-input mb-20px">
                                        <label>Company Address </label>
                                        <input id="personal_companyadd" type="text" class="form-control form-control-lg form-control-solid" value="{{$vendors->company_address}}" name="companyadd"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 cmp_loc">
                                   <div class="info-input mb-20px">
                                      <iframe
                                         id="ifrm_preview"
                                         width="100%"
                                         height="450"
                                         frameborder="0" style="border:0"
                                         referrerpolicy="no-referrer-when-downgrade"
                                         src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCPraI53LsplwhkIsXED0pMxPniz3YKYfg&q=''"
                                         allowfullscreen>
                                      </iframe>
                                   </div>
                                </div>
                            </div>  
                            <div class="row mt-5">
                                <div class="col-md-12">
                                    <button class="btn btn-success vendorupdate">Update Basic Details</button>
                                </div>
                            </div>                                          
                            </div>
                        </div>
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
<script>
  $(function(){
    $("#payment_option").change(function(){
      var option = $(this).val();
      if(option=='paypal'){
        $(".paypal_section").show();
        $(".stripe_section").hide();
        $(".bank_details").hide();
      }else if(option=='stripe'){
        $(".stripe_section").show();
        $(".paypal_section").hide();
        $(".bank_details").hide();
      }else if(option=='bank'){
        $(".bank_details").show();
        $(".stripe_section").hide();
        $(".paypal_section").hide();
      }else{
        $(".bank_details").hide();
        $(".stripe_section").hide();
        $(".paypal_section").hide();
      }

    })
  })
</script>
<script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCPraI53LsplwhkIsXED0pMxPniz3YKYfg&libraries=places&callback=initMap">
</script>

<script>
  function initMap(){
const center = { lat: 50.064192, lng: -130.605469 };
// Create a bounding box with sides ~10km away from the center point
const defaultBounds = {
  north: center.lat + 0.1,
  south: center.lat - 0.1,
  east: center.lng + 0.1,
  west: center.lng - 0.1,
};
const input = document.getElementById("personal_companyadd");
const options = {
  bounds: defaultBounds,
  componentRestrictions: { country: "ae" },
  fields: ["place_id", "geometry", "name"],
  strictBounds: false,
  types: ["establishment"],
};
const autocomplete = new google.maps.places.Autocomplete(input, options);
// contact address
const input2 = document.getElementById("contact_add");
const options2 = {
  bounds: defaultBounds,
  componentRestrictions: { country: "ae" },
  fields: ["place_id", "geometry", "name"],
  strictBounds: false,
  types: ["establishment"],
};
const autocomplete2 = new google.maps.places.Autocomplete(input2, options2);

}


</script>

<script>
  $("#personal_companyadd").on("blur",function(){
    var place = $(this).val();   
    $("#ifrm_preview").attr('src',"https://www.google.com/maps/embed/v1/place?key=AIzaSyCPraI53LsplwhkIsXED0pMxPniz3YKYfg&q="+place);
    
  })
</script>
@endsection