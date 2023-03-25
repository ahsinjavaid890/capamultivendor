@extends('website.layouts.master')
@section('content')


    <div class="offcanvas-overlay"></div>
        
        
<section id="sign-up-tabs" style="background-color: #f2f2f2;">
    <div class="container">
    <div class="row">
        <div class="register-as">
		<div class="customer form">
            @include('website.layouts.flash')
            <div class="title mb-30">
                <h2 class="text-center">Vendor Registration</h2>
            </div>
            <form class="contact-form-style" action="{{route('seller.registerProcess')}}" method="POST">
                @csrf
            <div class="row">
                    <div class="col-lg-6">
                        <label>First Name<span>*</span></label>
                        <input name="fname" class="seller_register @error('fname') is-invalid @enderror" type="text" value="{{ old('fname') }}" required autocomplete="fname" autofocus>
                        @error('fname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="col-lg-6">
                        <label>Last Name<span>*</span></label>
                        <input name="lname" class=" seller_register @error('lname') is-invalid @enderror" type="text" value="{{ old('lname') }}" required autocomplete="lname" autofocus>
                @error('lname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="col-lg-12">
                        <label>Email Address<span>*</span></label>
                        <input name="email" type="email" class="seller_register @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="col-lg-12">
                        <label>Password<span>*</span></label>
                        <input id="password" type="password" class="seller_register  @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="col-lg-12">
                        <label>City<span>*</span></label>
                        <select name="city" type="text" required class="seller_register">
                            <option value="">Select Cities</option>
                            <option value="Chandigarh">Chandigarh</option>
                            <option value="Mohali">Mohali</option>
                            <option value="Panchkula">Panchkula</option>
                            <option value="Zirakpur">Zirakpur</option>
                            <option value="Haryana & hp">Haryana & hp</option>
                            <option value="more cities from nearby areas of Punjab">More cities from nearby areas of Punjab</option>
                        </select>
                    </div>
                    <div class="col-lg-12 checkbox-input">
                        <input type="checkbox" id="html" name="terms_and_condition" class="seller_register_checkbox"  style="width:60px">
                        <label for="html">By proceeding, I agree to Capa's <a href="javascript:void(0)">Terms</a> of use & acknowledge that I have read the privacy policy, I also agree that Capa or its representatives may contact me by email, SMS on the email or mobile no I provide, including for the maketing</label>
                    </div>
                    <span class="invalid-feedback terms_and_condition" role="alert">
                        <strong>Please Check the Terms and Condtion for Proceding Next</strong>
                    </span>
                    <div class="col-lg-12 text-center">
                        <button class="submit btn" type="submit" id="sellersignupbtn">Sign Up</button>
                        <p class="hv-account">Already have an account? <a href="{{route('seller.login')}}">Sign in</a></p>
                    </div>
                </div>
            </form>
            <p class="form-messege"></p>
        </div>
        
        
        
     </div>   
	</div>
    </div> 
</section>
        

@stop


@push('otherstyle')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.css" />

<style>
.product-type select {display: none;}
.product-type .select2-container {
width: 100% !important;
}
.product-type ul {
padding: 0;
list-style: none;
}
.product-type .select2-container--default.select2-container--focus .select2-selection--multiple {
border: solid #c7c7c7 1px;
outline: 0;
}
.product-type .select2-container--default .select2-selection--multiple {
padding: 10px;
}
.product-type .select2-container--empty span {
display: none!important;
}
.product-type .select2-container--default .select2-selection--multiple .select2-selection__choice {
background-color: #000000!important;
border: 0!important;    color: #fff;
border-radius: 5px!important;
padding: 8px 10px!important;
}
.product-type .select2-container:focus {
    border: 1px solid #000;
    border-radius: 5px;
}
.product-type .select2-selection--custom {
border: 0 !important;
padding: 10px 0 !important;
}
.select2-container--default .select2-search--inline .select2-search__field{height:33px;}
.select2-results li {
    display: block !important;
}
.iti__country-list{
    white-space:normal !important;
    }
    .iti{
        width:100%;
    } 
</style>


  
  
 @endpush

@push('otherscript')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.js"></script>



<script>
    $(function(){
        $('button#sellersignupbtn').click(function(e) {
            e.preventDefault();
        var isValid = true;
        $('input.seller_register').each(function() {
            if ($.trim($(this).val()) == '') {
                isValid = false;
                $(this).css({
                    "border": "1px solid red",
                    "background": "#FFCECE",
                    
                });
            }
            else {
                $(this).css({
                    "border": "",
                    "background": ""
                });
            }
        });

        $('select.seller_register').each(function() {
            if ($.trim($(this).val()) == '0') {
                isValid = false;
                $(this).css({
                    "border": "1px solid red",
                    "background": "#FFCECE",
                    
                });
            }
            else {
                $(this).css({
                    "border": "",
                    "background": ""
                });
            }
        });

        $('input.seller_register_checkbox').each(function() {
            if ($(this).prop('checked')!=true) {
                isValid = false;
                $(this).css({
                    "border": "1px solid red",
                    "background": "#FFCECE",
                });

                $('.terms_and_condition').show();
            }
            else {
                $(this).css({
                    "border": "",
                    "background": ""
                });
                $('.terms_and_condition').hide();
            }
        });
       

        if (isValid == false){ 
            e.preventDefault();
        }
        else {
            $('form').submit();
        }
    });

    })
</script>
@endpush


