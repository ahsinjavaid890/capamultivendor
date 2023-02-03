@extends('sellerupdated.layouts.main-layout')
@section('title','Complete Your Seller Profile')
@section('content')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Card-->
            <div class="row">
                <div class="col-md-12">
                     <ul class="nav nav-tabs nav-bold nav-tabs-line nav-tabs-line-3x">
                        <li class="nav-item mr-3">
                            <a disabled class="nav-link active" data-toggle="tab" href="#kt_user_edit_tab_1">
                                <span class="nav-text font-size-lg">Personal Information</span>
                            </a>
                        </li>
                        <li class="nav-item mr-3">
                            <a class="nav-link" data-toggle="tab" href="#kt_user_edit_tab_2">
                                <span class="nav-text font-size-lg">Contact Information</span>
                            </a>
                        </li>
                        <li class="nav-item mr-3">
                            <a class="nav-link" data-toggle="tab" href="#kt_user_edit_tab_3">
                                <span class="nav-text font-size-lg">Upload Documents</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#kt_user_edit_tab_4">
                                <span class="nav-text font-size-lg">Choose Membership Plan</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#kt_user_edit_tab_5">
                                <span class="nav-text font-size-lg">Profile Completed</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card card-custom mt-5">
                <div class="card-header flex-wrap py-5">
                    <div class="card-title">
                        <h3 class="card-label">
                            Complete Your Seller Profile
                            <div class="text-muted pt-2 font-size-sm">Basic Information</div>
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-pane show active px-7" id="kt_user_edit_tab_1" role="tabpanel">
                        <div class="row form-detail">
                           <div class="col-md-6">
                              <label>Email Address</label>
                              <div class="info-input mb-20px">
                                 <input type="email" value="{{Auth::guard('seller')->user()->email}}" class="personal_info" id="personal_eamil" readonly/>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <label>Emirates ID</label>
                              <div class="info-input mb-20px">
                                 <input data-inputmask="'mask': '999999-999999-999999-999999'" type="text" class="personal_info" id="personal_emirates_id" value="{{Auth::guard('seller')->user()->emirates_id}}" placeholder="000000-000000-000000-000000"/>
                              </div>
                           </div>
                           <div class="col-md-12 mt-3">
                              <label>Payement Details</label>
                              <div class="info-input">
                                 <select class="personal_info" id="payment_option">
                                    <option value="0">-select payment option-</option>
                                    <option @if(Auth::guard('seller')->user()->payment_option == 'paypal') selected @endif value="paypal">Paypal</option>
                                    <option @if(Auth::guard('seller')->user()->payment_option == 'stripe') selected @endif value="stripe">Stripe</option>
                                    <option @if(Auth::guard('seller')->user()->payment_option == 'bank') selected @endif value="bank">Bank Transfer</option>
                                 </select>
                              </div>
                           </div>
                           <div class="payment-detail info-input paypal_section" @if(Auth::guard('seller')->user()->payment_option != 'paypal') style="display:none" @else  @endif >
                              <label>PayPal Id<span class="link-danger">*</span></label>
                              <input type="text" class="" id="paypal_id" />
                           </div>
                           <div class="payment-detail info-input stripe_section" @if(Auth::guard('seller')->user()->payment_option != 'stripe') style="display:none" @else  @endif>
                              <label>Stripe Id<span class="link-danger">*</span></label>
                              <input type="text" class="" id="stripe_id" />
                           </div>
                           <div class="col-md-12 bank_details" @if(Auth::guard('seller')->user()->payment_option != 'bank') style="display:none" @else  @endif>
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="info-input mb-20px">
                                       <label>Account holder name<span style="color:red">*</span></label>
                                       <input type="text" class="" id="personal_accountTitle" value="{{Auth::guard('seller')->user()->account_title}}"/>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="payment-detail info-input">
                                       <label>Bank Name<span class="link-danger">*</span></label>
                                       <select class="" id="personal_bank">
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
                           <div class="col-md-12 bank_details" style="display:none">
                              <div class="info-input mb-20px">
                                 <label>Account Number (IBAN)<span style="color:red">*</span></label>
                                 <input type="text" class="" id="personal_accountno" value="{{Auth::guard('seller')->user()->account_no}}"  maxlength="23"/>
                              </div>
                           </div>
                           <div class="register-yourself checkout-radio">
                               <h4>Register Yourself As</h4>
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
                            <div class="col-md-12 cmp_name">
                               <div class="info-input mb-20px">
                                  <label>Company Name <span style="color:red">*</span></label>
                                  <input type="text" class="" id="personal_company" value="{{Auth::guard('seller')->user()->company_name}}"/>
                               </div>
                            </div>
                            <div class="col-md-12 cmp_add">
                               <div class="info-input mb-20px">
                                  <label>Company Address </label>
                                  <input type="text" class="" id="personal_companyadd" value="{{Auth::guard('seller')->user()->company_address}}"/>
                               </div>
                            </div>
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
                            <div class="col-md-12">
                               <div class="product-type info-input">
                                  <label>Products Type<span class="link-danger">*</span></label>
                                  <select multiple="" class="form-control" id="exampleSelect2">
                                     @foreach($cat as $category)
                                     <option value="{{$category->id}}">{{$category->category_name}}</option>
                                     @endforeach
                                  </select>
                               </div>
                            </div>
                            <div class="products-delivery checkout-radio">
                               <h4>Products Delivery Via</h4>
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
                            <p>Note: if you check delivery via vendor, you will be responsible for the delivery</p>
                            <div class="col-lg-12 checkbox-input">
                                <input type="checkbox" id="html" class="personal_checkbox">
                                <label for="html">By proceeding, I agree to Oben's <a href="javascript:void(0)">Terms</a> of use & acknowledge that I have read the privacy policy , I also agree that Oben or its representatives may contact me by email, SMS on the email or mobile no I provided, including for the marketing purposes.</label>
                            </div>
                            <div class="next btn"><a href="javascript:void(0)" id="nextbtn1">Next Step</a></div>
                        </div>
                    </div>
                    <div class="tab-pane px-7" id="kt_user_edit_tab_2" role="tabpanel">
                        <div class="row form-detail">
                            <div class="col-md-12">
                                <div class="info-input mb-20px">
                                    <label>Address <span style="color:red">*</span></label>
                                    <input type="text" placeholder="" class="contact_info" id="contact_add" value="{{Auth::guard('seller')->user()->contact_address}}"/>
                                    <div class="map-pin icon"><img src="{{asset('seller/assets/img/location-pin.svg')}}"/></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="info-input mb-20px">
                                    <label>Phone No <span style="color:red">*</span></label>
                                    <input type="text" placeholder="971 58 280 2786 " value="{{Auth::guard('seller')->user()->mobile}}" class="contact_info"  name="mobileno" id="mobileno"/>
                                </div>
                            </div>
                            <div class="row">                                   
                                <div class="col-md-6">
                                    <div class="info-input mb-20px">
                                        <label>City <span style="color:red">*</span></label>
                                        <select class="contact_info" id="contact_city">
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
                                        <input type="text" placeholder="" class="contact_info" id="zipcode" value="{{Auth::guard('seller')->user()->zipcode}}" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" maxlength="5"/>
                                    </div>
                                </div>
                                <div class="next btn"><a href="javascript:void(0)" id="nextbtn2">Next Step</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane px-7" id="kt_user_edit_tab_3" role="tabpanel">
                        <div class="row form-detail">
                            <div class="col-md-12">
                                <div class="form-group upload-doc cmp_logo">
                                  <label class="control-label mb-2">Upload Company Logo(size:110X65) <span class="link-danger">*</span></label>
                                  <input type="file" class="filestyle selledocs" data-buttonText="Upload" id="companylogo">
                                </div>
                                <div class="info-input cmp_license">
                                  <label class="control-label mb-2">Name of the Issuing Authority<span class="link-danger">*</span></label>
                                  <input type="text" class="filestyle selledocs" id="license_name">
                                </div>
                                <div class="info-input cmp_no">
                                  <label class="control-label mb-2">License Number<span class="link-danger">*</span></label>
                                  <input type="text" class="filestyle selledocs" id="licenseno">
                                </div>
                                <div class="info-input cmp_exp">
                                  <label class="control-label mb-2">License Expiring Date<span class="link-danger">*</span></label>
                                  <input type="date" class="filestyle selledocs" placeholder="26/02/2024" id="license_exp">
                                </div>
                                <div class="form-group upload-doc cmp_trade">
                                  <label class="control-label mb-2">Upload License (jpg,png) <span class="link-danger">*</span></label>
                                  <input type="file" class="filestyle selledocs" data-buttonText="Upload" id="licenseimage">
                                </div>
                                <div class="form-group upload-doc cmp_trade">
                                  <label class="control-label mb-2">Upload Trade License(jpg,png) <span class="link-danger">*</span></label>
                                  <input type="file" class="filestyle selledocs" data-buttonText="Upload" id="tradelicense">
                                </div>
                                <div class="form-group upload-doc mb-3 cmp_passport">
                                  <label class="control-label mb-2">Upload Passport(jpg,png) <span class="link-danger">*</span></label>
                                  <input type="file" class="filestyle selledocs" data-buttonText="Upload" id="passport">
                                </div>
                                <div class="form-group upload-doc cmp_emirates">
                                  <label class="control-label mb-2">Upload Emirates ID front(jpg,png) <span class="link-danger">*</span></label>
                                  <input type="file" class="filestyle selledocs" data-buttonText="Upload" id="emirates_img">
                                </div>
                                <div class="form-group upload-doc cmp_emirates">
                                  <label class="control-label mb-2">Upload Emirates ID Back (jpg,png)<span class="link-danger">*</span></label>
                                  <input type="file" class="filestyle selledocs" data-buttonText="Upload" id="emirates_img_back">
                                </div>
                                <div class="next btn"><a href="javascript:void(0)" id="uploaddocs">Submit</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane px-7" id="kt_user_edit_tab_4" role="tabpanel">
                        <div class="row form-detail">
                            <div class="row row-cols-1 row-cols-md-2 mb-3">  
                              @foreach($membership as $member)
                              <div class="col">
                                <div class="card mb-4 bg-white shadow-sm">
                                  
                                  <div class="card-body">
                                    <h1 class="card-title pricing-card-title text-center">{{$member->title}} <sub class="monthly"> {{$member->amount}}/month</sub></h1>
                                    
                                    <div class="membership_features">
                                       {!! $member->description !!}
                                    </div>
                                    <a href="javascript:void(0)" class="w-100 btn btn-lg btn-outline-primary" data="{{$member->id}},{{$member->title}},{{$member->amount}}" onclick="stripePay({{$member->amount}},{{$member->id}},'{{$member->title}}')">Get Started</a>
                                  </div>
                                </div>
                              </div>
                               @endforeach
                            </div>
                        </div>
                    </div>











                    <div class="row">
                        <div class="tab-content" id="pills-tabContent">
                         
                          <div class="tab-pane fade" id="pills-4" role="tabpanel" aria-labelledby="tab-4">
                            <div class="single-tab-content mt-4" style="background: #FBFBFB">
                                    <h3 class="text-center">Choose Your Membership Plan</h3>
                                    <div class="form-detail membership-plans">
                                        <!-- <div class="next btn"><a href="#" id="nextbtn3">Next Step</a></div> -->
                                    </div>
                              </div>
                          </div>
                          <div class="tab-pane fade" id="pills-5" role="tabpanel" aria-labelledby="tab-5">
                          <div class="single-tab-content mt-4" style="background: #FBFBFB">
                            <div class="form-detail profile-completed">
                                <div class="row">                                   
                                    <div class="col-md-12 text-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="119" height="118.942" viewBox="0 0 119 118.942">
                                          <defs>
                                            <filter id="Ellipse_218" x="0" y="0" width="119" height="118.942" filterUnits="userSpaceOnUse">
                                              <feOffset input="SourceAlpha"/>
                                              <feGaussianBlur stdDeviation="5" result="blur"/>
                                              <feFlood flood-opacity="0.161"/>
                                              <feComposite operator="in" in2="blur"/>
                                              <feComposite in="SourceGraphic"/>
                                            </filter>
                                          </defs>
                                          <g transform="matrix(1, 0, 0, 1, 0, 0)" filter="url(#Ellipse_218)">
                                            <ellipse id="Ellipse_218-2" data-name="Ellipse 218" cx="44.5" cy="44.471" rx="44.5" ry="44.471" transform="translate(15 15)" fill="#fff"/>
                                          </g>
                                          <path id="Path_418" data-name="Path 418" d="M135.472,179.278l-21.04-16.391,5.982-7.678,12.92,10.065,21.324-30.77,8,5.543Z" transform="translate(-79.541 -96.153)" fill="#009fbd"/>
                                        </svg>

                                    <p>Congratulations! Profile completed</p>
                                    </div>
                                </div>
                                
                                <div class="next btn"><a href="javascript:void(0)">Approval Pending</a></div>
                            </div>
                              
                              
                            </div>
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
<style type="text/css">
    #kt_user_edit_tab_2{
        display: none;
    }
    #kt_user_edit_tab_3{
        display: none;
    }
    #kt_user_edit_tab_4{
        display: none;
    }
    #kt_user_edit_tab_5{
        display: none;
    }
</style>
<script src="https://polyfill.io/v3/polyfill.min.js?version=3.52.1&features=fetch"></script>
    <style>
 .pac-container {
    position: absolute;
    bottom: 3vh;
    height: 200px;
    box-shadow: none;
    border: none;
    overflow: auto;
}

.pac-item {
    height: 30px;
    color: #605E5E !important;
}
.pac-item span { color: #605E5E !important; }

.pac-matched {
    color: #605E5E;
}

.pac-item-query {
    color: #605E5E;
}
</style>
@endsection

@section('script')
<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>
<script>
  $(":input").inputmask();
 </script>
<script src = "https://checkout.stripe.com/checkout.js" > </script> 
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

<script>
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


function stripePay(amount,id,title) {
 
    var handler = StripeCheckout.configure({
        key: 'pk_test_51Ixa8eDW7P9bN5xryCA6eKBVeO9Wk7npmovyDnbHTTAXQ7tzAhRvzwecsek84pZ37afwOee3hghhlphpnaZ1InXk00B17tscwd', // your publisher key id
        locale: 'auto',
        token: function(token) {
            // You can access the token ID with `token.id`.
            // Get the token ID to your server-side code for use.
            console.log('Token Created!!');
            //console.log(token)
            $('#res_token').html(JSON.stringify(token));
            $.ajax({
                url: "{{route('seller.StripePayment')}}",
                method: 'POST',
                data: {
                    stripeToken: token.id,
                    amount: amount                    
                },
                success: (response) => {
                  $("#cover-spin").show(); 
                    //console.log(response)
                    var js_data = JSON.parse(JSON.stringify(response));
                   
                    savetransaction(id,title,amount,js_data.msg.id);
                },
                error: (error) => {
                    console.log(error);
                    alert('Oops! Something went wrong')
                }
            })
        }
    });
    handler.open({
        image:"{{asset('seller/assets/img/oben-01__logo.png')}}",
        name: 'oben multivendor',
        email:"{{Auth::guard('seller')->user()->email}}",
        description: 'membership plan',
        amount: amount*100,
        currency:'AED'
    });
 
} 
</script>

<script>
  $(function(){
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

    $("input.deliveryvia").click(function () {   
         
   $('input.deliveryvia').not(this).prop('checked', false);
      
    })
  })
</script>

<script>
  $(function(){
    $("#nextbtn1").click(function(e){
      e.preventDefault();
      var isInvalid = true;
      $('input.personal_info').each(function(){
        
        if($.trim($(this).val())==''){
          isInvalid=false;
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
      $('select.personal_info').each(function(){
        
        if($.trim($(this).val())=='0'){
          isInvalid=false;
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
      if(isInvalid!=true){
        e.preventDefault();
      }else{
      
      var email = $("#personal_eamil").val();
      var emirates = $("#personal_emirates_id").val();
      var username = $("#personal_username").val();
      var account_title = $("#personal_accountTitle").val();
      var bank = $("#personal_bank").val();
      var account_no = $("#personal_accountno").val();
      var licensed_frelance = $(".registeras:checked").val();     
     
      var company_name = $("#personal_company").val();
      var company_address = $("#personal_companyadd").val();      
      var product_type = $("#productType").val();
      var payment_option = $("#payment_option").val();
      var delivery_via = $(".deliveryvia:checked").val();
      var paypal_id = $("#paypal_id").val();
      var stripe_id  = $("#stripe_id").val();
    
     
      var form  = new FormData();      
      form.append('emirates',emirates);     
      form.append('account_title',account_title);
      form.append('bank',bank);
      form.append('account_no',account_no);
      form.append('paypal_id',paypal_id);
      form.append('stripe_id',stripe_id);
      form.append('registered_as',licensed_frelance);
      form.append('company_name',company_name);
      form.append('company_address',company_address);
      form.append('product_type[]',product_type);
      form.append('payment_option',payment_option);
      form.append('delivery_by',delivery_via);
      $("#cover-spin").show();
      $.ajax({
        url:"{{route('seller.update_profile')}}",
        type:"POST",
        data:form,
        cache:false,
        contentType:false,
        processData:false,
        success:function(res){
          var js_data = JSON.parse(res);
          $("#cover-spin").hide();
          if(js_data==1){
              $('#kt_user_edit_tab_1').hide();
              $('#kt_user_edit_tab_2').show();
        }else{
          return false;
        }
        }
      })
      
      }
    })
// contact info
    $("#nextbtn2").click(function(e){
      e.preventDefault();
      var isInvalid = true;
      $('input.contact_info').each(function(){
        
        if($.trim($(this).val())==''){
          isInvalid=false;
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

      $('select.contact_info').each(function(){
        
        if($.trim($(this).val())=='0'){
          isInvalid=false;
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
      if(isInvalid!=true){
        e.preventDefault();
      }else{
        var contact_add = $("#contact_add").val();
        var contact_city = $("#contact_city").val();
        var zipcode = $("#zipcode").val();
        var mobileno = $("#mobileno").val();
        var form = new FormData();
        form.append('contact_add',contact_add);
        form.append('contact_city',contact_city);
        form.append('mobileno',mobileno);
        form.append('zipcode',zipcode);
        $("#cover-spin").show();
        $.ajax({
          url:"{{route('seller.contact_info')}}",
          type:"POST",
          data:form,
          cache:false,
          contentType:false,
          processData:false,
          success:function(res){
            var js_data = JSON.parse(res);
            if(js_data == 1){
              $('#kt_user_edit_tab_2').hide();
              $('#kt_user_edit_tab_3').show();
            }else{
              return false;
            }
          }
        })

      //$("#cover-spin").show();      
      
      }
      
    })


    // upload docs

    $("#uploaddocs").click(function(e){
      e.preventDefault(); 
      var company_logo = $("#companylogo")[0].files;
         
      var isInvalid = true;
      // $('input.selledocs').each(function(){
        
      //   if($.trim($(this).val())==''){
      //     isInvalid=false;
      //     $(this).css({
      //       "border": "1px solid red",
      //        "background": "#FFCECE",
      //     })
      //   }else{
      //     $(this).css({
      //       'background':'',
      //       'border':''
      //     })
      //   }
      // })

      // $('input[type=file]').each(function(){
        
      //   if($.trim($(this)[0].files.length)=='0'){
      //     isInvalid=false;
      //     $(this).css({
      //       "border": "1px solid red",
      //        "background": "#FFCECE",
      //     })
      //   }else{
      //     $(this).css({
      //       'background':'',
      //       'border':''
      //     })
      //   }
      // })

      if(isInvalid!=true){
        e.preventDefault();
      }else{
        var company_logo = $("#companylogo")[0].files;
        var name_of_license = $("#license_name").val();
        var license_no = $("#licenseno").val();
        var exp = $("#license_exp").val();
        var licenseimage = $("#licenseimage")[0].files;
        var tradelicense = $("#tradelicense")[0].files;
        var passport = $("#passport")[0].files;
        var emirates_img = $("#emirates_img")[0].files;
        var emirates_img_back = $("#emirates_img_back")[0].files;
        var form = new FormData();
        form.append('company_logo',company_logo[0]);
        form.append('name_of_license',name_of_license);
        form.append('license_no',license_no);
        form.append('exp',exp);
        form.append('licenseimage',licenseimage[0]);
        form.append('tradelicense',tradelicense[0]);
        form.append('passport',passport[0]);
        form.append('emirates_img',emirates_img[0]);
        form.append('emirates_img_back',emirates_img_back[0]);
        $("#cover-spin").show();
        $.ajax({
           url:"{{route('seller.upload_doc')}}",
           type:"POST",
           data:form,
           cache:false,
           contentType:false,
           processData:false,
           success:function(res){
             var js_data = JSON.parse(res);
             $("#cover-spin").hide();
             $("#tab-4").removeAttr('disabled');
              // $("#tab-4").click();
             if(js_data==1){
              // $("#tab-4").click();             
               window.location.href="seller-memberships";
             }else{
               return false;
             }
           }
        })
      }


    })



    $("#nextbtn3").click(function(e){
      e.preventDefault();
      $("#tab-5").removeAttr('disabled');
      $("#tab-5").click();
    })
  })
</script>

<script>
  function savetransaction(id,title,amount,payment_id){  
      
      var form = new FormData();
      form.append('plan_id',id);
      form.append('title',title);
      form.append('amount',amount);
      form.append('payment_id',payment_id);
      $.ajax({
        url:"{{route('seller.membership')}}",
        type:"POST",
        data:form,
        cache:false,
        contentType:false,
        processData:false,
        success:function(res){
          $("#cover-spin").hide();
          $("#tab-5").click();
          location.reload();
        }
      })
    }
</script>
<script>
  $(function(){
    var city = "{{Auth::guard('seller')->user()->city;}}";
    $("select#contact_city option").each(function(){
        if($(this).val()==city){
          $(this).attr('selected','selected');
        }
    })
  })
</script>
@endsection