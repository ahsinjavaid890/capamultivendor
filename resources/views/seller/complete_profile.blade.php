@extends('seller.layouts.master')
@section('content')
<main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4 text-center main-title">Complete Your Profile</h1>
                        <p class="mb-5 text-center main-para">Fill all the fields to complete your Profile</p>
                        <ul class="nav nav-pills mb-3 nav-fill" id="profile-steps" role="tablist">
                          <li class="nav-item" role="presentation">
                          
                            <button class="nav-link active" id="tab-1" data-bs-toggle="pill" data-bs-target="#pills-1" type="button" role="tab" aria-controls="pills-personal" aria-selected="true">
								<div class="connecting-line border-right"></div>
                                <span><svg xmlns="http://www.w3.org/2000/svg" width="40" height="45.511" viewBox="0 0 40 45.511">
                                  <g id="Group_2275" data-name="Group 2275" transform="translate(-727 -385)">
                                    <g id="Group_773" data-name="Group 773" transform="translate(735 385)">
                                      <g id="Group_772" data-name="Group 772">
                                        <path id="Path_412" data-name="Path 412" d="M133,0a12,12,0,1,0,12,12A12.014,12.014,0,0,0,133,0Z" transform="translate(-121)" fill="#fff"/>
                                      </g>
                                    </g>
                                    <g id="Group_775" data-name="Group 775" transform="translate(727 411.667)">
                                      <g id="Group_774" data-name="Group 774">
                                        <path id="Path_413" data-name="Path 413" d="M65.93,305.173A17.107,17.107,0,0,0,53.667,300H48.333a17.107,17.107,0,0,0-12.264,5.173A17.488,17.488,0,0,0,31,317.511a1.333,1.333,0,0,0,1.333,1.333H69.667A1.333,1.333,0,0,0,71,317.511,17.488,17.488,0,0,0,65.93,305.173Z" transform="translate(-31 -300)" fill="#fff"/>
                                      </g>
                                    </g>
                                  </g>
                                </svg></span>
                            	<label>Personal Information</label>
                            </button>
                                
                          </li>
                          <li class="nav-item" role="presentation">
                         
                            <button class="nav-link" id="tab-2" data-bs-toggle="pill" data-bs-target="#pills-2" type="button" role="tab" aria-controls="pills-contact" aria-selected="false" disabled>
                                <div class="connecting-line border-right"></div>
                                <span><svg id="Group_778" data-name="Group 778" xmlns="http://www.w3.org/2000/svg" width="48.455" height="45.862" viewBox="0 0 48.455 45.862">
                                <g id="Group_777" data-name="Group 777" transform="translate(0 0)">
                                <path id="Path_414" data-name="Path 414" d="M36.908,135.2l-8.168-5.446a.841.841,0,0,0-1.125.183L25.236,133a2.55,2.55,0,0,1-3.267.673l-.44-.241c-1.586-.865-3.561-1.942-7.482-5.863s-5-5.9-5.863-7.483l-.242-.44a2.549,2.549,0,0,1,.673-3.266L11.672,114a.84.84,0,0,0,.183-1.125L6.41,104.7a.837.837,0,0,0-1.125-.254L1.867,106.5a3.288,3.288,0,0,0-1.505,1.94c-1.122,4.088-.178,11.245,10.693,22.117s18.027,11.818,22.118,10.695a3.289,3.289,0,0,0,1.94-1.506l2.049-3.418A.836.836,0,0,0,36.908,135.2Z" transform="translate(0 -95.753)" fill="#fff"/>
                                <path id="Path_415" data-name="Path 415" d="M137.793,13.838a.471.471,0,0,0-.338-.138H101.192a.471.471,0,0,0-.476.476v12.6l2.056,3.085a2.577,2.577,0,0,1-.56,3.452l-3.054,2.379a.826.826,0,0,0-.223,1.058l.249.454a21.823,21.823,0,0,0,2.888,4.21h35.383a.473.473,0,0,0,.476-.466V14.176A.471.471,0,0,0,137.793,13.838ZM113.2,29.578v0l-8.866,9.5a.866.866,0,0,1-1.266-1.18l8.866-9.494a.866.866,0,1,1,1.266,1.18Zm6.12-.682a2.869,2.869,0,0,1-1.731-.571L103.127,17.355a.867.867,0,1,1,1.051-1.38l14.459,10.969a1.168,1.168,0,0,0,1.373,0l14.464-10.969a.866.866,0,0,1,1.046,1.38L121.054,28.324A2.868,2.868,0,0,1,119.324,28.9Zm16.264,10.219a.866.866,0,0,1-1.224-.042l-8.865-9.5a.865.865,0,0,1,1.268-1.176l8.863,9.494A.866.866,0,0,1,135.588,39.114Z" transform="translate(-89.476 -13.7)" fill="#fff"/>
                                </g>
                                </svg></span>
                                <label>Contact Information</label>
							</button>
                          </li>
                          <li class="nav-item" role="presentation">
                         
                            <button class="nav-link" id="tab-3" data-bs-toggle="pill" data-bs-target="#pills-3" type="button" role="tab" aria-controls="pills-upload" aria-selected="false" disabled>
							<div class="connecting-line border-right"></div>
                            <span><svg xmlns="http://www.w3.org/2000/svg" width="37.745" height="48.862" viewBox="0 0 37.745 48.862">
  <g id="surface1" transform="translate(-0.5)">
    <path id="Path_416" data-name="Path 416" d="M25.06,8.428V0H5.205A4.728,4.728,0,0,0,.5,4.692V44.169a4.728,4.728,0,0,0,4.705,4.692H33.54a4.728,4.728,0,0,0,4.7-4.692V13.831H30.476A5.4,5.4,0,0,1,25.06,8.428ZM11.048,24.185l7.575-8.13a1.034,1.034,0,0,1,.762-.323,1.055,1.055,0,0,1,.763.323l7.575,8.13a1.027,1.027,0,0,1-.75,1.732,1.1,1.1,0,0,1-.763-.323l-5.8-6.2V34.164a1.034,1.034,0,1,1-2.068,0V19.39l-5.778,6.2a1.034,1.034,0,1,1-1.512-1.409Zm20,16.791a1.037,1.037,0,0,1-1.034,1.034H8.734a1.034,1.034,0,1,1,0-2.068h21.29A1.026,1.026,0,0,1,31.045,40.976Zm0,0" fill="#fff"/>
    <path id="Path_417" data-name="Path 417" d="M282.875,26.833h6.347L279.527,16.66V23.5A3.329,3.329,0,0,0,282.875,26.833Zm0,0" transform="translate(-252.399 -15.07)" fill="#fff"/>
  </g>
</svg></span> 
							<label>Upload Documents</label>
                            </button>
                          </li>
                          <li class="nav-item" role="presentation">
                         
                            <button class="nav-link" id="tab-4" data-bs-toggle="pill" data-bs-target="#pills-4" type="button" role="tab" aria-controls="pills-member" aria-selected="false" disabled>
							 <div class="connecting-line border-right"></div>
                            <span><svg xmlns="http://www.w3.org/2000/svg" width="49.5" height="34.805" viewBox="0 0 49.5 34.805">
  <g id="membership" transform="translate(0 -76)">
    <path id="Path_552" data-name="Path 552" d="M0,76H29.1v5.8H0Z" fill="#fff"/>
    <path id="Path_553" data-name="Path 553" d="M333.9,85.551V76H331v9.551l1.45-1.45Z" transform="translate(-298.999)" fill="#fff"/>
    <path id="Path_554" data-name="Path 554" d="M391,76h11.7v5.8H391Z" transform="translate(-353.198)" fill="#fff"/>
    <circle id="Ellipse_248" data-name="Ellipse 248" cx="1" cy="1" r="1" transform="translate(12.5 91)" fill="#fff"/>
    <path id="Path_555" data-name="Path 555" d="M37.8,173.851,33.451,169.5,29.1,173.851V166H0v26.1H49.5V166H37.8ZM20.4,186.3H5.9v-1.45a7.259,7.259,0,0,1,7.251-7.251,4.351,4.351,0,1,1,4.351-4.351,4.355,4.355,0,0,1-4.351,4.351,7.259,7.259,0,0,1,7.251,7.251Zm23.2,0H23.3v-2.9H43.6Zm0-5.8H23.3v-2.9H43.6Z" transform="translate(0 -81.299)" fill="#fff"/>
    <path id="Path_556" data-name="Path 556" d="M97.679,316a4.355,4.355,0,0,0-4.1,2.9h8.2A4.355,4.355,0,0,0,97.679,316Z" transform="translate(-84.531 -216.797)" fill="#fff"/>
  </g>
</svg></span> <label>Choose Membership Plan</label></button>
                          </li>
                          <li class="nav-item" role="presentation">
                         
                            <button class="nav-link" id="tab-5" data-bs-toggle="pill" data-bs-target="#pills-5" type="button" role="tab" aria-controls="pills-profile" aria-selected="false" disabled>
							 <div class="connecting-line border-right"></div>
                            <span><svg xmlns="http://www.w3.org/2000/svg" width="58.152" height="58.114" viewBox="0 0 58.152 58.114">
  <g id="check_2_" data-name="check (2)" transform="translate(0 -0.168)">
    <ellipse id="Ellipse_218" data-name="Ellipse 218" cx="29.076" cy="29.057" rx="29.076" ry="29.057" transform="translate(0 0.168)" fill="#fff"/>
    <path id="Path_418" data-name="Path 418" d="M128.18,163.759l-13.748-10.71,3.909-5.017,8.442,6.577L140.716,134.5l5.228,3.622Z" transform="translate(-101.435 -119.078)" fill="#d1d1d1"/>
  </g>
</svg> </span> <label>Profile Completed</label></button>
                          </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                          <div class="tab-pane fade show active" id="pills-1" role="tabpanel" aria-labelledby="tab-1">
                              <div class="single-tab-content mt-4" style="background: #FBFBFB">
                                  <h3 class="text-center">Personal Information</h3>
                                  
                            <div class="form-detail">
                                <div class="row">
                                    
                                    <div class="col-md-12">
                                        <div class="info-input mb-20px">
                                            <label>Email Address <span style="color:red">*</span></label>
                                            <input type="email" value="{{Auth::guard('seller')->user()->email}}" class="personal_info" id="personal_eamil" readonly/>
                                            <!-- <div class="verify-email"><a href="javascript:void(0)" id="verify_email">Verify your email to proceed further</a></div> -->
                                        </div>
                                    </div>
                                    <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>
                                    <div class="col-md-12">
                                        <div class="info-input mb-20px">
                                            <label>Emirates ID <span style="color:red">*</span></label>
                                            <input data-inputmask="'mask': '999999-999999-999999-999999'" type="text" class="personal_info" id="personal_emirates_id" value="{{Auth::guard('seller')->user()->emirates_id}}" placeholder="000000-000000-000000-000000"/>
                                        </div>
                                    </div>
                                    <script>
                                      $(":input").inputmask();

                                     </script>
                                    <div class="payment-detail info-input">
                                        <label>Payment Details<span class="link-danger">*</span></label>
                                        <select class="personal_info" id="payment_option">
                                            <option value="0">-select payment option-</option>
                                            <option value="paypal">Paypal</option>
                                            <option value="stripe">Stripe</option>
                                            <option value="bank">Bank Transfer</option>
                                        </select>
                                    </div>
                                    <div class="payment-detail info-input paypal_section" style="display:none">
                                        <label>PayPal Id<span class="link-danger">*</span></label>
                                        <input type="text" class="" id="paypal_id" />
                                    </div>

                                    <div class="payment-detail info-input stripe_section" style="display:none">
                                        <label>Stripe Id<span class="link-danger">*</span></label>
                                        <input type="text" class="" id="stripe_id" />
                                    </div>
                                    <!-- <div class="col-md-12">
                                        <div class="info-input mb-20px">
                                            <label>Username <span style="color:red">*</span></label>
                                            <input type="text" value="{{Auth::guard('seller')->user()->fname}}" class="personal_info" id="personal_username"/>
                                        </div>
                                    </div> -->
                                    <!-- <div class="col-md-12">
                                        <div class="info-input mb-20px">
                                            <label>Password <span style="color:red">*</span></label>
                                            <input type="password" />
                                            <div class="icon"><img src="{{asset('seller/assets/img/eye.svg')}}"/></div>
                                            <div class="forget-password"><a href="#">Forget Your Password?</a></div>
                                        </div>
                                    </div> -->
                                    <div class="col-md-12 bank_details" style="display:none">
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
                                            <option>Emirates NBD</option>
                                            <option>ADCB</option>
                                            <option>Bank Islamic</option>
                                            <option>Dubai Islamic Bank</option>
                                            
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
                                        <h4 class="mb-25">Register Yourself As</h4>
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
                                        <select class="custom-multiple-types" multiple="multiple" id="productType">
                                          @foreach($cat as $category)
                                            <option value="{{$category->id}}">{{$category->category_name}}</option>                                            
                                            @endforeach
                                        </select>
                                    </div>
                                    </div>    
                                    
                                           
                                    <div class="products-delivery checkout-radio">
                                        <h4 class="mb-25">Products Delivery Via</h4>
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
                                </div>

                                <div class="next btn"><a href="#" id="nextbtn1">Next Step</a></div>
                            </div>
                              
                              
                              </div>
                         </div>
                          <div class="tab-pane fade" id="pills-2" role="tabpanel" aria-labelledby="tab-2">
                          	<div class="single-tab-content mt-4" style="background: #FBFBFB">
                                  <h3 class="text-center">Contact Information</h3>
                                  
                            <div class="form-detail">
                                <div class="row">                                   
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
                                    
                                    
                                </div>
                                <div class="next btn"><a href="#" id="nextbtn2">Next Step</a></div>
                            </div>
                              
                              
                              </div>
                          </div>
                          <div class="tab-pane fade" id="pills-3" role="tabpanel" aria-labelledby="tab-3">
                          	<div class="single-tab-content mt-4" style="background: #FBFBFB">
                                  <h3 class="text-center">Upload Documents</h3>
                                  
                            <div class="form-detail">
                                <div class="row">                                   
                                    <div class="col-md-12">
                                        <div class="form-group upload-doc cmp_logo">
                                          <label class="control-label mb-2">Upload Company Logo(size:110X65) <span class="link-danger">*</span></label>
                                          <input type="file" class="filestyle selledocs" data-buttonText="Upload" id="companylogo">
                                        </div>
                                        
                                        <!-- <div class="info-input">
                                          <label class="control-label mb-2">Company Name<span class="link-danger">*</span></label>
                                          <input type="text" class="filestyle selledocs" value="" readonly>
                                        </div> -->
                                        
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
                                        
                                        <!-- <div class="info-input">
                                          <label class="control-label mb-2">Phone Number<span class="link-danger">*</span></label>
                                          <input type="text" class="filestyle" value="{{Auth::guard('seller')->user()->mobile}}" readonly>
                                        </div>
                                        
                                        <div class="info-input">
                                          <label class="control-label mb-2">Email Address<span class="link-danger">*</span></label>
                                          <input type="text" class="filestyle" value="{{Auth::guard('seller')->user()->email}}" readonly>
                                        </div> -->
                                        
                                    </div>
                                    
                                    
                                    
                                </div>
								
                                <div class="next btn"><a href="javascript:void(0)" id="uploaddocs">Submit</a></div>
                            </div>
                              
                              
                              </div>
                          </div>
                          <div class="tab-pane fade" id="pills-4" role="tabpanel" aria-labelledby="tab-4">
                          	<div class="single-tab-content mt-4" style="background: #FBFBFB">
                                  <h3 class="text-center">Choose Your Membership Plan</h3>
                                  
                                    <div class="form-detail membership-plans">
                                        <div class="row row-cols-1 row-cols-md-2 mb-3">                                          
                                          @foreach($membership as $member)
                                          <div class="col">
                                            <div class="card mb-4 bg-white shadow-sm">
                                              
                                              <div class="card-body">
                                                <h1 class="card-title pricing-card-title text-center">{{$member->title}} <sub class="monthly"> {{$member->amount}}/month</sub></h1>
                                                <!-- <ul class="list-unstyled mt-3 mb-4 ">
                                                    <li><svg xmlns="http://www.w3.org/2000/svg" width="15.779" height="14.649" viewBox="0 0 15.779 14.649">
                                                    <path id="Path_537" data-name="Path 537" d="M121.316,149.153l-6.884-5.363,1.957-2.512,4.227,3.293,6.977-10.067,2.618,1.814Z" transform="translate(-114.432 -134.504)" fill="#009fbd"/></svg>4 Free products download per account</li>
                                                  <li><svg xmlns="http://www.w3.org/2000/svg" width="15.779" height="14.649" viewBox="0 0 15.779 14.649">
                                                    <path id="Path_537" data-name="Path 537" d="M121.316,149.153l-6.884-5.363,1.957-2.512,4.227,3.293,6.977-10.067,2.618,1.814Z" transform="translate(-114.432 -134.504)" fill="#009fbd"/></svg>Account Registration support with fee, 350 AED per hour online</li>
                                                  <li><svg xmlns="http://www.w3.org/2000/svg" width="15.779" height="14.649" viewBox="0 0 15.779 14.649">
                                                    <path id="Path_537" data-name="Path 537" d="M121.316,149.153l-6.884-5.363,1.957-2.512,4.227,3.293,6.977-10.067,2.618,1.814Z" transform="translate(-114.432 -134.504)" fill="#009fbd"/></svg>Website marketing</li>
                                                  <li><svg xmlns="http://www.w3.org/2000/svg" width="15.779" height="14.649" viewBox="0 0 15.779 14.649">
                                                    <path id="Path_537" data-name="Path 537" d="M121.316,149.153l-6.884-5.363,1.957-2.512,4.227,3.293,6.977-10.067,2.618,1.814Z" transform="translate(-114.432 -134.504)" fill="#009fbd"/></svg>Per transaction fee : 3% + 1.75 AED (only online)</li>
                                                    <li><svg xmlns="http://www.w3.org/2000/svg" width="15.779" height="14.649" viewBox="0 0 15.779 14.649">
                                                    <path id="Path_537" data-name="Path 537" d="M121.316,149.153l-6.884-5.363,1.957-2.512,4.227,3.293,6.977-10.067,2.618,1.814Z" transform="translate(-114.432 -134.504)" fill="#009fbd"/></svg>Cash transaction : free</li>
                                                    <li><svg xmlns="http://www.w3.org/2000/svg" width="15.779" height="14.649" viewBox="0 0 15.779 14.649">
                                                    <path id="Path_537" data-name="Path 537" d="M121.316,149.153l-6.884-5.363,1.957-2.512,4.227,3.293,6.977-10.067,2.618,1.814Z" transform="translate(-114.432 -134.504)" fill="#009fbd"/></svg>Online support: 500</li>

                                                    <li><svg xmlns="http://www.w3.org/2000/svg" width="15.779" height="14.649" viewBox="0 0 15.779 14.649">
                                                    <path id="Path_537" data-name="Path 537" d="M121.316,149.153l-6.884-5.363,1.957-2.512,4.227,3.293,6.977-10.067,2.618,1.814Z" transform="translate(-114.432 -134.504)" fill="#009fbd"/></svg>Add Additional products: +100</li>

                                                    <li><svg xmlns="http://www.w3.org/2000/svg" width="15.779" height="14.649" viewBox="0 0 15.779 14.649">
                                                    <path id="Path_537" data-name="Path 537" d="M121.316,149.153l-6.884-5.363,1.957-2.512,4.227,3.293,6.977-10.067,2.618,1.814Z" transform="translate(-114.432 -134.504)" fill="#009fbd"/></svg>Taking photo per product: 500</li>
                                                 
                                                    
                                                </ul> -->
                                                <div class="membership_features">
                                                   {!! $member->description !!}
                                                </div>
                                                <a href="javascript:void(0)" class="w-100 btn btn-lg btn-outline-primary" data="{{$member->id}},{{$member->title}},{{$member->amount}}" onclick="stripePay({{$member->amount}},{{$member->id}},'{{$member->title}}')">Get Started</a>
                                              </div>
                                            </div>
                                          </div>
                                           @endforeach     
                                          <!-- <div class="col">
                                            <div class="card mb-4 bg-green shadow-sm">
                                              
                                              <div class="card-body">
                                                <h1 class="card-title pricing-card-title text-center">Monthly <sub class="monthly">650/month</sub></h1>
                                                <ul class="list-unstyled mt-3 mb-4">
                                                <li><svg xmlns="http://www.w3.org/2000/svg" width="15.779" height="14.649" viewBox="0 0 15.779 14.649">
                                                    <path id="Path_537" data-name="Path 537" d="M121.316,149.153l-6.884-5.363,1.957-2.512,4.227,3.293,6.977-10.067,2.618,1.814Z" transform="translate(-114.432 -134.504)" fill="#009fbd"/></svg>4 Free products download per account</li>
                                                  <li><svg xmlns="http://www.w3.org/2000/svg" width="15.779" height="14.649" viewBox="0 0 15.779 14.649">
                                                    <path id="Path_537" data-name="Path 537" d="M121.316,149.153l-6.884-5.363,1.957-2.512,4.227,3.293,6.977-10.067,2.618,1.814Z" transform="translate(-114.432 -134.504)" fill="#009fbd"/></svg>Account Registration support with fee, 350 AED per hour online</li>
                                                  <li><svg xmlns="http://www.w3.org/2000/svg" width="15.779" height="14.649" viewBox="0 0 15.779 14.649">
                                                    <path id="Path_537" data-name="Path 537" d="M121.316,149.153l-6.884-5.363,1.957-2.512,4.227,3.293,6.977-10.067,2.618,1.814Z" transform="translate(-114.432 -134.504)" fill="#009fbd"/></svg>Website marketing</li>
                                                  <li><svg xmlns="http://www.w3.org/2000/svg" width="15.779" height="14.649" viewBox="0 0 15.779 14.649">
                                                    <path id="Path_537" data-name="Path 537" d="M121.316,149.153l-6.884-5.363,1.957-2.512,4.227,3.293,6.977-10.067,2.618,1.814Z" transform="translate(-114.432 -134.504)" fill="#009fbd"/></svg>Per transaction fee : 3% + 1.75 AED (only online)</li>
                                                    <li><svg xmlns="http://www.w3.org/2000/svg" width="15.779" height="14.649" viewBox="0 0 15.779 14.649">
                                                    <path id="Path_537" data-name="Path 537" d="M121.316,149.153l-6.884-5.363,1.957-2.512,4.227,3.293,6.977-10.067,2.618,1.814Z" transform="translate(-114.432 -134.504)" fill="#009fbd"/></svg>Cash transaction : free</li>
                                                    <li><svg xmlns="http://www.w3.org/2000/svg" width="15.779" height="14.649" viewBox="0 0 15.779 14.649">
                                                    <path id="Path_537" data-name="Path 537" d="M121.316,149.153l-6.884-5.363,1.957-2.512,4.227,3.293,6.977-10.067,2.618,1.814Z" transform="translate(-114.432 -134.504)" fill="#009fbd"/></svg>Online support: 500</li>

                                                    <li><svg xmlns="http://www.w3.org/2000/svg" width="15.779" height="14.649" viewBox="0 0 15.779 14.649">
                                                    <path id="Path_537" data-name="Path 537" d="M121.316,149.153l-6.884-5.363,1.957-2.512,4.227,3.293,6.977-10.067,2.618,1.814Z" transform="translate(-114.432 -134.504)" fill="#009fbd"/></svg>Add Additional products: +100</li>

                                                    <li><svg xmlns="http://www.w3.org/2000/svg" width="15.779" height="14.649" viewBox="0 0 15.779 14.649">
                                                    <path id="Path_537" data-name="Path 537" d="M121.316,149.153l-6.884-5.363,1.957-2.512,4.227,3.293,6.977-10.067,2.618,1.814Z" transform="translate(-114.432 -134.504)" fill="#009fbd"/></svg>Taking photo per product: 500</li>
                                                </ul>
                                                <a href="javascript:void(0)" class="w-100 btn btn-lg btn-outline-primary membership" data="650,Monthly">Get Started</a>
                                              </div>
                                            </div>
                                          </div>

                                          <div class="col">
                                            <div class="card mb-4 bg-green shadow-sm">
                                              
                                              <div class="card-body">
                                                <h1 class="card-title pricing-card-title text-center">SILVER <sub class="monthly">550/month</sub></h1>
                                                <ul class="list-unstyled mt-3 mb-4">
                                                <li><svg xmlns="http://www.w3.org/2000/svg" width="15.779" height="14.649" viewBox="0 0 15.779 14.649">
                                                    <path id="Path_537" data-name="Path 537" d="M121.316,149.153l-6.884-5.363,1.957-2.512,4.227,3.293,6.977-10.067,2.618,1.814Z" transform="translate(-114.432 -134.504)" fill="#009fbd"/></svg>6 Free products download per account</li>
                                                  <li><svg xmlns="http://www.w3.org/2000/svg" width="15.779" height="14.649" viewBox="0 0 15.779 14.649">
                                                    <path id="Path_537" data-name="Path 537" d="M121.316,149.153l-6.884-5.363,1.957-2.512,4.227,3.293,6.977-10.067,2.618,1.814Z" transform="translate(-114.432 -134.504)" fill="#009fbd"/></svg>Account Registration support : Free online, in person: +350 AED per hour</li>
                                                  <li><svg xmlns="http://www.w3.org/2000/svg" width="15.779" height="14.649" viewBox="0 0 15.779 14.649">
                                                    <path id="Path_537" data-name="Path 537" d="M121.316,149.153l-6.884-5.363,1.957-2.512,4.227,3.293,6.977-10.067,2.618,1.814Z" transform="translate(-114.432 -134.504)" fill="#009fbd"/></svg>Website marketing: one free, special discount 25%</li>
                                                    <li><svg xmlns="http://www.w3.org/2000/svg" width="15.779" height="14.649" viewBox="0 0 15.779 14.649">
                                                    <path id="Path_537" data-name="Path 537" d="M121.316,149.153l-6.884-5.363,1.957-2.512,4.227,3.293,6.977-10.067,2.618,1.814Z" transform="translate(-114.432 -134.504)" fill="#009fbd"/></svg>Free uploading product assist: 1</li>
                                                    <li><svg xmlns="http://www.w3.org/2000/svg" width="15.779" height="14.649" viewBox="0 0 15.779 14.649">
                                                    <path id="Path_537" data-name="Path 537" d="M121.316,149.153l-6.884-5.363,1.957-2.512,4.227,3.293,6.977-10.067,2.618,1.814Z" transform="translate(-114.432 -134.504)" fill="#009fbd"/></svg>Free Advertisements: 1/year</li>
                                                    <li><svg xmlns="http://www.w3.org/2000/svg" width="15.779" height="14.649" viewBox="0 0 15.779 14.649">
                                                    <path id="Path_537" data-name="Path 537" d="M121.316,149.153l-6.884-5.363,1.957-2.512,4.227,3.293,6.977-10.067,2.618,1.814Z" transform="translate(-114.432 -134.504)" fill="#009fbd"/></svg>Free influencers: 1</li>
                                                    <li><svg xmlns="http://www.w3.org/2000/svg" width="15.779" height="14.649" viewBox="0 0 15.779 14.649">
                                                    <path id="Path_537" data-name="Path 537" d="M121.316,149.153l-6.884-5.363,1.957-2.512,4.227,3.293,6.977-10.067,2.618,1.814Z" transform="translate(-114.432 -134.504)" fill="#009fbd"/></svg>Per transaction fee : 3% + 1.5 AED (only online)</li>
                                                    <li><svg xmlns="http://www.w3.org/2000/svg" width="15.779" height="14.649" viewBox="0 0 15.779 14.649">
                                                    <path id="Path_537" data-name="Path 537" d="M121.316,149.153l-6.884-5.363,1.957-2.512,4.227,3.293,6.977-10.067,2.618,1.814Z" transform="translate(-114.432 -134.504)" fill="#009fbd"/></svg>Cash transaction : free</li>
                                                    <li><svg xmlns="http://www.w3.org/2000/svg" width="15.779" height="14.649" viewBox="0 0 15.779 14.649">
                                                    <path id="Path_537" data-name="Path 537" d="M121.316,149.153l-6.884-5.363,1.957-2.512,4.227,3.293,6.977-10.067,2.618,1.814Z" transform="translate(-114.432 -134.504)" fill="#009fbd"/></svg>Online support: free</li>

                                                    <li><svg xmlns="http://www.w3.org/2000/svg" width="15.779" height="14.649" viewBox="0 0 15.779 14.649">
                                                    <path id="Path_537" data-name="Path 537" d="M121.316,149.153l-6.884-5.363,1.957-2.512,4.227,3.293,6.977-10.067,2.618,1.814Z" transform="translate(-114.432 -134.504)" fill="#009fbd"/></svg>Add Additional products: +100</li>

                                                    <li><svg xmlns="http://www.w3.org/2000/svg" width="15.779" height="14.649" viewBox="0 0 15.779 14.649">
                                                    <path id="Path_537" data-name="Path 537" d="M121.316,149.153l-6.884-5.363,1.957-2.512,4.227,3.293,6.977-10.067,2.618,1.814Z" transform="translate(-114.432 -134.504)" fill="#009fbd"/></svg>Taking photo per product: 400</li>
                                                </ul>
                                                <a href="javascript:void(0)" class="w-100 btn btn-lg btn-outline-primary membership" data="550,Silver">Get Started</a>
                                              </div>
                                            </div>
                                          </div>

                                          <div class="col">
                                            <div class="card mb-4 bg-white shadow-sm">
                                              
                                              <div class="card-body">
                                                <h1 class="card-title pricing-card-title text-center">GOLDEN <sub class="monthly">450/month</sub></h1>
                                                <ul class="list-unstyled mt-3 mb-4">
                                                <li><svg xmlns="http://www.w3.org/2000/svg" width="15.779" height="14.649" viewBox="0 0 15.779 14.649">
                                                    <path id="Path_537" data-name="Path 537" d="M121.316,149.153l-6.884-5.363,1.957-2.512,4.227,3.293,6.977-10.067,2.618,1.814Z" transform="translate(-114.432 -134.504)" fill="#009fbd"/></svg>8 Free products download per account</li>
                                                  <li><svg xmlns="http://www.w3.org/2000/svg" width="15.779" height="14.649" viewBox="0 0 15.779 14.649">
                                                    <path id="Path_537" data-name="Path 537" d="M121.316,149.153l-6.884-5.363,1.957-2.512,4.227,3.293,6.977-10.067,2.618,1.814Z" transform="translate(-114.432 -134.504)" fill="#009fbd"/></svg>Account Registration support : Online or in person account registration support</li>
                                                  <li><svg xmlns="http://www.w3.org/2000/svg" width="15.779" height="14.649" viewBox="0 0 15.779 14.649">
                                                    <path id="Path_537" data-name="Path 537" d="M121.316,149.153l-6.884-5.363,1.957-2.512,4.227,3.293,6.977-10.067,2.618,1.814Z" transform="translate(-114.432 -134.504)" fill="#009fbd"/></svg>Website marketing: Two free, special discount 30%</li>
                                                    <li><svg xmlns="http://www.w3.org/2000/svg" width="15.779" height="14.649" viewBox="0 0 15.779 14.649">
                                                    <path id="Path_537" data-name="Path 537" d="M121.316,149.153l-6.884-5.363,1.957-2.512,4.227,3.293,6.977-10.067,2.618,1.814Z" transform="translate(-114.432 -134.504)" fill="#009fbd"/></svg>Free uploading product assist: 2</li>
                                                    <li><svg xmlns="http://www.w3.org/2000/svg" width="15.779" height="14.649" viewBox="0 0 15.779 14.649">
                                                    <path id="Path_537" data-name="Path 537" d="M121.316,149.153l-6.884-5.363,1.957-2.512,4.227,3.293,6.977-10.067,2.618,1.814Z" transform="translate(-114.432 -134.504)" fill="#009fbd"/></svg>Free Advertisements: 2/year</li>
                                                    <li><svg xmlns="http://www.w3.org/2000/svg" width="15.779" height="14.649" viewBox="0 0 15.779 14.649">
                                                    <path id="Path_537" data-name="Path 537" d="M121.316,149.153l-6.884-5.363,1.957-2.512,4.227,3.293,6.977-10.067,2.618,1.814Z" transform="translate(-114.432 -134.504)" fill="#009fbd"/></svg>Free influencers: 2</li>
                                                    <li><svg xmlns="http://www.w3.org/2000/svg" width="15.779" height="14.649" viewBox="0 0 15.779 14.649">
                                                    <path id="Path_537" data-name="Path 537" d="M121.316,149.153l-6.884-5.363,1.957-2.512,4.227,3.293,6.977-10.067,2.618,1.814Z" transform="translate(-114.432 -134.504)" fill="#009fbd"/></svg>Per transaction fee : 3% + 1.25 AED (only online)</li>
                                                    <li><svg xmlns="http://www.w3.org/2000/svg" width="15.779" height="14.649" viewBox="0 0 15.779 14.649">
                                                    <path id="Path_537" data-name="Path 537" d="M121.316,149.153l-6.884-5.363,1.957-2.512,4.227,3.293,6.977-10.067,2.618,1.814Z" transform="translate(-114.432 -134.504)" fill="#009fbd"/></svg>Cash transaction : free</li>
                                                    <li><svg xmlns="http://www.w3.org/2000/svg" width="15.779" height="14.649" viewBox="0 0 15.779 14.649">
                                                    <path id="Path_537" data-name="Path 537" d="M121.316,149.153l-6.884-5.363,1.957-2.512,4.227,3.293,6.977-10.067,2.618,1.814Z" transform="translate(-114.432 -134.504)" fill="#009fbd"/></svg>Online support: free</li>

                                                    <li><svg xmlns="http://www.w3.org/2000/svg" width="15.779" height="14.649" viewBox="0 0 15.779 14.649">
                                                    <path id="Path_537" data-name="Path 537" d="M121.316,149.153l-6.884-5.363,1.957-2.512,4.227,3.293,6.977-10.067,2.618,1.814Z" transform="translate(-114.432 -134.504)" fill="#009fbd"/></svg>Add Additional products: +75</li>

                                                    <li><svg xmlns="http://www.w3.org/2000/svg" width="15.779" height="14.649" viewBox="0 0 15.779 14.649">
                                                    <path id="Path_537" data-name="Path 537" d="M121.316,149.153l-6.884-5.363,1.957-2.512,4.227,3.293,6.977-10.067,2.618,1.814Z" transform="translate(-114.432 -134.504)" fill="#009fbd"/></svg>Taking photo per product: 300</li>
                                                </ul>
                                                <a href="javascript:void(0)" class="w-100 btn btn-lg btn-outline-primary membership" data="450,Golden">Get Started</a>
                                              </div>
                                            </div>
                                          </div> -->

                                         
                                          
                                        </div>
                                        
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
								
                                <div class="next btn"><a href="#">Approval Pending</a></div>
                            </div>
                              
                              
                              </div>
                          
                          </div>
                        </div>
                    </div>
                </main>
@stop

@push('otherstyle')
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
@endpush

@push('otherscript')
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
         
          $("#tab-1").removeAttr('disabled');
          $(this).hide();
          $("#tab-2").removeAttr('disabled');
          $("#tab-2").click();
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
              $("#cover-spin").hide();
              $(this).hide();
              $("#tab-3").removeAttr('disabled');
              $("#tab-3").click()
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
@endpush