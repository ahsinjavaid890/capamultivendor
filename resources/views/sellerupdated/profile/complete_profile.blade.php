@extends('sellerupdated.layouts.main-layout')
@section('title','Complete Your Seller Profile')
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->

        <div class="container-fluid">
            <!--begin::Card-->
            @if(session()->has('message'))

            <div class="alert alert-success">{{ session()->get('message') }}</div>
            @endif 
            <form method="POST" enctype="multipart/form-data" action="{{ route('seller.update_profile') }}">
            @csrf
            <div class="card card-custom mt-5">
                <div class="card-header flex-wrap py-5">
                    <div class="card-title">
                        <h3 class="card-label">
                            Complete Your Seller Profile (Basic Information)
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
                                 <input type="email" value="{{Auth::guard('seller')->user()->email}}" class="personal_info" name="personal_eamil" readonly/>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <label>Shop Name</label>
                              <div class="info-input mb-20px">
                                 <input required name="shop_name" type="text" value="{{Auth::guard('seller')->user()->shop_name}}" class="personal_info" name="shop_name"/>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <label>Shop Logo</label>
                              <div class="info-input mb-20px">
                                 <input required name="shop_logo" type="file" style="height:52px;" class="form-control" name="shop_logo"/>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <label>Shop Banner</label>
                              <div class="info-input mb-20px">
                                 <input required name="shop_banner" type="file" style="height:52px;" class="form-control"/>
                              </div>
                           </div>
                           <div class="col-md-12">
                              <label>Shop Address</label>
                              <div class="info-input mb-20px">
                                 <input value="{{Auth::guard('seller')->user()->shop_address}}" required name="shop_address" type="text" style="height:52px;" class="form-control"/>
                              </div>
                           </div>
                           
                        </div>
                    </div>
                </div>
            </div>
            <div class="card card-custom mt-5">
                <div class="card-header flex-wrap py-5">
                    <div class="card-title">
                        <h3 class="card-label">
                            Complete Your Seller Profile (Payement Details)
                            <div class="text-muted pt-2 font-size-sm">Payement Details</div>
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-pane show active px-7" id="kt_user_edit_tab_1" role="tabpanel">
                        <div class="row form-detail">
                            <div class="col-md-12 bank_details">
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="info-input mb-20px">
                                       <label>Account holder name<span style="color:red">*</span></label>
                                       <input style="height:52px;" type="text" class="form-control" name="personal_accountTitle" value="{{Auth::guard('seller')->user()->account_title}}"/>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="payment-detail info-input">
                                       <label>Bank Name<span class="link-danger">*</span></label>
                                       <input style="height:52px;" type="text" class="form-control" name="bank" value="{{Auth::guard('seller')->user()->bank}}"/>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-12 bank_details">
                              <div class="info-input mb-20px">
                                 <label>Account Number (IBAN)<span style="color:red">*</span></label>
                                 <input style="height:52px;" type="text" class="form-control" name="personal_accountno" value="{{Auth::guard('seller')->user()->account_no}}"  maxlength="23"/>
                              </div>
                           </div>
                           <br><br><br><br><br><br><br>
                           <div class="col-md-12">
                               <button type="submit" class="btn btn-success">Submit Application</button>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Card-->
            </form>
        </div>
        
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
@endsection