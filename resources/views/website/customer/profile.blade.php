@extends('website.layouts.master')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('public/website/assets/css/customerdashboard.css') }}">
<main class="main bg-grey min-height-600">
    <!-- Start of PageContent -->
    <div class="page-content pt-2">
        <div class="container">
            <div class="tab tab-vertical row gutter-lg us-nav-cover-cls">
                @include('website.customer.sidebar')

                
                <div class="tab-content mb-6 bg-white p-4 us-md-cls">
                <div class="tab-body-head">
                    <div class="">
                        <h2 class="">
                            Profile
                        </h2>
                    </div>
                </div>
                    <div class="tab-pane active in" id="account-dashboard">                                
                        <form action="{{route('website.custProfileUpdateProcess')}}" method="POST" enctype="multipart/form-data">
                @csrf
               <input type="hidden" name="cust_id" value="{{Auth::guard('cust')->user()->id}}" />
            <div class="row">
                    <div class="col-md-12 col-left">
                        <div class="shadow-block" id="pills-tabContent">
                            <div class="form-detail us-form">
                                <div class="row">                                 
                                        <div class="col-md-6">
                                            <div class="info-input mb-20px">
                                                <label>First name<span class="link-danger">*</span></label>
                                                <input type="text" class="coupons" placeholder="First name" id="fname" name="fname" value="{{Auth::guard('cust')->user()->fname}}"  />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="info-input mb-20px">
                                                <label>Last name<span class="link-danger">*</span></label>
                                                <input type="text" class="coupons" placeholder="Last name" id="lname" name="lname" value="{{Auth::guard('cust')->user()->lname}}" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="info-input mb-20px">
                                                <label>Email<span class="link-danger">*</span></label>
                                                <input type="text" class="coupons" placeholder="Email" id="email" name="email" value="{{Auth::guard('cust')->user()->email}}" />
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="info-input mb-20px">
                                                <label>Mobile<span class="link-danger">*</span></label>
                                                <input type="text" class="coupons" placeholder="Mobile" id="mobile" name="mobile" value="{{Auth::guard('cust')->user()->mobile}}" />
                                            </div>
                                        </div>
                                        
                                       
                                
                                </div>
                                <div class="col-md-12" style="margin-top:20px;">
                                    <div class="info-input mb-20px">
                                        <button type="submit" class="btn btn-success" id="submitPFL">Update Profile</button>
                                
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
</main>
@stop
@push('otherscript')
<script>
    $(function(){
        $("#updatepfl").click(function(e){
            e.preventDefault();
            $("input").removeAttr('disabled');
            $(this).hide();
            $("#submitPFL").show();
        })
        $("button#submitPFL").click(function(e){
              e.preventDefault();
              var isValid = true;                          
             $("input.coupons").each(function(){
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
                
                $("textarea.coupons").each(function(){
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

               
                if(isValid !=true){
                    return false;
                }else{
                    $("#cover-spin").show();
                    $("form").submit();
                    
                }
             
          
        })
    })
</script>
@endpush