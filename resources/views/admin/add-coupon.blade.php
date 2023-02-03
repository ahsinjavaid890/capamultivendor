@extends('admin.layouts.master')
@section('content')
<main>
    <div class="container-fluid px-4">
         <h1 class="mt-4 text-center main-title">Create Coupons</h1> 
            <form action="{{route('admin.AddCouponProcess')}}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="row">
                <div class="col-md-12 col-left">
                    <div class="shadow-block" id="pills-tabContent">
                        <div class="form-detail">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="info-input mb-20px">
                                        <label>Coupon Title <span class="link-danger">*</span></label>
                                        <input type="text" class="coupons" placeholder="Write coupon title here" id="coupon_title" name="coupon_title" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="info-input mb-20px">
                                        <label>Coupon Code <span class="link-danger">*</span></label>
                                        <input type="text" class="coupons" placeholder="Write coupon code here" id="coupon_code" name="coupon_code" readonly/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="info-input mb-20px">
                                        <label>Coupon discount Offer<span class="link-danger">*</span></label>
                                        <input type="text" class="coupons" placeholder="Write coupon offer here" id="coupon_offer" name="coupon_offer" />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="info-input mb-20px">
                                        <label>Coupon expiry date<span class="link-danger">*</span></label>
                                        <input type="date" class="coupons" placeholder="Write coupon offer here" id="coupon_date" name="coupon_date" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="info-input mb-20px">
                                        <label>Coupon Desctiption <span class="link-danger">*</span></label>
                                        <textarea type="text" class="coupons" placeholder="Coupon description" id="coupon_desc" name="coupon_desc" ></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12" style="margin-top:20px;">
                                <div class="info-input mb-20px">
                                    <button type="submit" class="btn btn-success submit">Submit</button>
                                    <button type="button" class="btn btn-danger addmore">Add more</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
</main>


@stop
@push('otherscript')
<script>
    $(function(){
        $("#coupon_title").on("blur",function(){
            var title = $(this).val();
            if(title==''){
                $("#coupon_code").val('');
                return false;
            }else{
                var update_title = title.substring(0,3);
                var generate_code = Math.random().toString(16).substr(2, 8);
                var couponCode = update_title+generate_code;
                $("#coupon_code").val(couponCode);
                //console.log(couponCode);
            }
        })
    })
</script>
<script>
    $(function(){
        $("button.submit").click(function(e){
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