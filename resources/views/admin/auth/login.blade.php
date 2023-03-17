@extends('website.layouts.master')
@section('content')


    <div class="offcanvas-overlay"></div>

        <!-- Slider Start -->
        <div class="slider-area slider-height-1">
            <!-- Single Slider  -->
            <div class="swiper-slide bg-img d-flex" style="background-image: url({{asset('website/assets/images/slider-image/sample-2.jpg')}});">
            </div>
        </div>
        <!-- Slider End -->
    
        
        
<section id="sign-up-tabs">
    <div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 register-as">
		<div class="customer form">
            @include('website.layouts.flash')
            <div class="title mb-30">
                <h2 class="text-center">Admin Login</h2>
            </div>
            <form class="contact-form-style" action="{{route('admin.login_process')}}" method="POST">
                @csrf
            <div class="row">
                   
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
                    
                    <div class="col-lg-12 text-center">
                        <button class="submit btn" type="submit" id="sellersignupbtn">Sign in</button>
                       
                    </div>
                    <!-- <div class="col-lg-4 text-center">
                        <button class="submit btn sign-up-with" type="submit"><img src="{{asset('website/assets/images/icons/google.png')}}"/>Sign Up with Google</button>
                    </div>
                    <div class="col-lg-4 text-center">
                        <button class="submit btn sign-up-with" type="submit"><img src="{{asset('website/assets/images/icons/facebook.png')}}"/>Sign Up with Facebook</button>
                    </div>
                    <div class="col-lg-4 text-center">
                        <button class="submit btn sign-up-with" type="submit"><img src="{{asset('website/assets/images/icons/twitter.png')}}"/>Sign Up with Twitter</button>
                    </div> -->
                </div>
            </form>
            <p class="form-messege"></p>
        </div>
        <div class="col-md-3"></div>
        
        
     </div>   
	</div>
    </div> 
</section>
        

@stop



@push('otherscript')


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

        $('input.seller_register_checkbox').each(function() {
            if ($(this).prop('checked')!=true) {
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


