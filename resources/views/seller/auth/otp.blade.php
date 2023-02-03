@extends('website.layouts.master')
@section('content')

<div class="container">
  <div class="row justify-content-md-center">
      <div class="col-md-4 text-center">
        <div class="row">
          <div class="col-sm-12 mt-5 bgWhite">
            <div class="title">
              Verify OTP
            </div>
            
            <form action="{{route('seller.verifyOtp')}}" method="POST" class="mt-5" id="otpfrm">
                @csrf
                <input type="hidden" name="email" value="{{$email}}"/>
                <input type="hidden" name="password" value="{{$password}}"/>
              <input class="otp" type="text" oninput='digitValidate(this)' onkeyup='tabChange(1)' maxlength=1  name="otp1">
              <input class="otp" type="text" oninput='digitValidate(this)' onkeyup='tabChange(2)' maxlength=1 name="otp2">
              <input class="otp" type="text" oninput='digitValidate(this)' onkeyup='tabChange(3)' maxlength=1 name="otp3">
              <input class="otp" type="text" oninput='digitValidate(this)'onkeyup='tabChange(4)' maxlength=1 name="otp4">
            
            <hr class="mt-4">
            <button class='btn btn-primary btn-block mt-4 mb-4 customBtn' type="submit">Verify</button>
            </form>
          </div>
        </div>
      </div>
  </div>
</div>

@stop
@push('otherstyle')
<style>
    .bgWhite{
  background:white;
  box-shadow:0px 3px 6px 0px #cacaca;
}

.title{
  font-weight:600;
  margin-top:20px;
  font-size:24px
}

.customBtn{
  border-radius:0px;
  padding:10px;
}

#otpfrm input{
  display:inline-block;
  width:50px;
  height:50px;
  text-align:center;
  border: 1px solid #80808099;
}
</style>
@endpush

@push('otherscript')
<script>
let digitValidate = function(ele){ 
  ele.value = ele.value.replace(/[^0-9]/g,'');
}

let tabChange = function(val){
    let ele = $(".otp")
    if(ele[val-1].value != ''){
      ele[val].focus()
    }else if(ele[val-1].value == ''){
      ele[val-2].focus()
    }   
 }
</script>

<script>
    $("button.customBtn").click(function(e){
        e.preventDefault();
        var isValid = true;
        $("input.otp").each(function(){
            if($(this).val()==''){
                isValid = false;
                $(this).css({
                    "border": "1px solid red",
                    "background": "#FFCECE",
                    
                });
            }else{
                $(this).css({
                    "border": "",
                    "background": "",
                    
                });
            }

            if(isValid!=true){
                e.preventDefault();
                return false;
            }else{
                e.preventDefault();
                $("form#otpfrm").submit();        
            }
        })
    })
</script>


@endpush