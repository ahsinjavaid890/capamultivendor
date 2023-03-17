@extends('website.layouts.master')
@section('content')

<div class="offcanvas-overlay"></div>



<section id="sign-up-tabs"  style="background-color: #f2f2f2;">
<div class="container">
<div class="row">
<div class="register-as">
<div class="customer form">
    @include('website.layouts.flash')
    <!-- <div class="row">
        <div class="col-lg-6 text-center">
             <a href="{{ url('auth/google') }}" class="submit btn sign-up-with" type="submit"><img src="{{asset('public/website/assets/images/icons/google.png')}}"/>Sign Up with Google</a>
        </div>
        <div class="col-lg-6 text-center">
            <a class="submit btn sign-up-with" type="submit"><img src="{{asset('public/website/assets/images/icons/facebook.png')}}"/>Sign Up with Facebook</a>
        </div>
    </div> -->
    <div class="title mb-30">
        <h2 class="text-center">Registration Form</h2>
    </div>
    
    <form class="contact-form-style"  action="{{route('website.registerProcess')}}" method="POST">
    @csrf
        <div class="row">
            <div class="col-lg-6">
                <label>First Name<span>*</span></label>
                <input name="fname" class="form-control customer_register @error('fname') is-invalid @enderror" type="text" value="{{ old('fname') }}" required autocomplete="fname" autofocus>
                @error('fname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
            </div>
            <div class="col-lg-6">
                <label>Last Name<span>*</span></label>
                <input name="lname" class="form-control customer_register @error('lname') is-invalid @enderror" type="text" value="{{ old('lname') }}" required autocomplete="lname" autofocus>
                @error('lname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
            </div>
            <div class="col-lg-12">
                <label>Email Address<span>*</span></label>
                <input name="email" type="email" class="form-control customer_register @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
            </div>
            <div class="col-lg-12">
                <label>Mobile No<span>*</span></label>
                <input name="mobile" class="form-control customer_register @error('mobile') is-invalid @enderror" type="text" value="{{ old('mobile') }}" required autocomplete="mobile" autofocus>
                @error('mobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
            </div>
            <div class="col-lg-12">
                <label>Password<span>*</span></label>
                <input id="password" type="password" class="form-control customer_register  @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
                <div class="col-lg-12 text-center">
                    <button class="submit  btn" type="submit" id="signupbtn">Sign Up</button>
                    <p class="hv-account">Already have an account? <a href="{{route('website.login')}}">Sign in</a></p>
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

@push('otherscript')
<script>
    $(function(){
        $('button#signupbtn').click(function(e) {
            e.preventDefault();
        var isValid = true;
        $('input.customer_register').each(function() {
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