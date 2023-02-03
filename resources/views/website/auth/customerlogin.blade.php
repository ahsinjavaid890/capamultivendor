@extends('website.layouts.master')
@section('content')


    <div class="offcanvas-overlay"></div>

        <!-- Slider Start -->
        <div class="slider-area slider-height-1">
            <!-- Single Slider  -->
            <div class="swiper-slide bg-img d-flex" style="background-image: url({{asset('public/website/assets/images/slider-image/sample-2.jpg')}});">
            </div>
        </div>
        <!-- Slider End -->
    
        
        
<section id="sign-up-tabs">
    <div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 register-as">
        <div class="d-flex tabs">
                <a href="/customer-login" class="customersign">Sign in as Customer</a>
                <a href="/seller-login" class="sellersignin">Sign in as Seller</a>
            </div>
		<div class="customer form">
            <div class="row">
                <div class="col-lg-6 text-center">
                     <a href="{{ url('auth/google') }}" class="submit btn sign-up-with" type="submit"><img src="{{asset('public/website/assets/images/icons/google.png')}}"/>Google Login</a>
                </div>
                <div class="col-lg-6 text-center">
                    <a class="submit btn sign-up-with" type="submit"><img src="{{asset('public/website/assets/images/icons/facebook.png')}}"/>Facebook Login</a>
                </div>
            </div>
            @include('website.layouts.flash')
            <div class="title mb-30">
                <h2 class="text-center">Sign In</h2>
            </div>
            <form class="contact-form-style" action="{{route('website.login_process')}}" method="POST">
                @csrf
                <input type="hidden"  name="type" value="login">
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
                    <p class="hv-account">forget password ?<a href="{{route('website.forgotpassword')}}">click here</a></p>
                    <div class="col-lg-12 text-center">
                        <button class="submit btn" type="submit" id="sellersignupbtn">Sign in</button>
                        <p class="hv-account">Don't have any account ?<a href="{{route('website.register')}}">Sign Up</a></p>
                    </div>
                    <!-- <div class="col-lg-4 text-center">
                        <button class="submit btn sign-up-with" type="submit"><img src="{{asset('public/website/assets/images/icons/google.png')}}"/>Sign Up with Google</button>
                    </div>
                    <div class="col-lg-4 text-center">
                        <button class="submit btn sign-up-with" type="submit"><img src="{{asset('public/website/assets/images/icons/facebook.png')}}"/>Sign Up with Facebook</button>
                    </div>
                    <div class="col-lg-4 text-center">
                        <button class="submit btn sign-up-with" type="submit"><img src="{{asset('public/website/assets/images/icons/twitter.png')}}"/>Sign Up with Twitter</button>
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

@push('otherstyle')
<style>
.register-as {
    position: relative;
    margin-top: -45%;
} 
.register-as .tabs {
    justify-content: center;
    column-gap: 10px;
    position: absolute;
    top: -52px;
    left: 0;
    right: 0;
}    
.register-as .tabs a {
    background: #009fbd;
    color: #fff;
    padding: 15px;
    text-align: center;
    width: 200px;
    font-size: 16px;
    font-weight: 600;
    border-radius: 5px 5px 0 0;
}  
.register-as .tabs a:focus, .register-as .tabs a:active {
    background: #d8d8d8;
    color: #009fbd;
} 
.active{
    background: #d8d8d8 !important;
    color: #009fbd !important;
}   
.register-as .tabs {
    justify-content: center;
    column-gap: 10px;
}

</style>

@push('otherscript')

    <script>
        $(function(){
            var loc = "<?php echo $_SERVER['REQUEST_URI']; ?>";
            if(loc=='/customer-register'||loc=="/customer-login"){
                $(".customersign").addClass('active');
                $(".sellersignin").removeClass('active')
            }
        })
    </script>


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


