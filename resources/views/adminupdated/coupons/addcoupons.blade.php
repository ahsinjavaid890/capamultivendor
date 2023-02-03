@extends('adminupdated.layouts.main-layout')
@section('title','Add Coupons')
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <div class="container-fluid">
        <form action="{{route('admin.AddCouponProcess')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card mb-4">
                <div class="card-header flex-wrap py-5 d-flex justify-content-between">
                    <div class="card-title">
                        <h3 class="card-label">
                            Coupons details
                            <div class="text-muted pt-2 font-size-sm">Check all the details of Coupons</div>
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-detail">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="info-input mb-20px">
                                    <label>Coupon Title <span class="link-danger">*</span></label>
                                    <input type="text" class="coupons form-control" placeholder="Write coupon title here" id="coupon_title" name="coupon_title" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-input mb-20px">
                                    <label>Coupon Code <span class="link-danger">*</span></label>
                                    <input type="text" class="coupons form-control" placeholder="Write coupon code here" id="coupon_code" name="coupon_code" readonly/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-input mb-20px">
                                    <label>Coupon discount Offer<span class="link-danger">*</span></label>
                                    <input type="text" class="coupons form-control" placeholder="Write coupon offer here" id="coupon_offer" name="coupon_offer" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="info-input mb-20px">
                                    <label>Coupon expiry date<span class="link-danger">*</span></label>
                                    <input type="date" class="coupons form-control" placeholder="Write coupon offer here" id="coupon_date" name="coupon_date" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="info-input mb-20px">
                                    <label>Coupon Desctiption <span class="link-danger">*</span></label>
                                    <textarea type="text" class="coupons form-control" placeholder="Coupon description" id="coupon_desc" name="coupon_desc" ></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12" style="margin-top:20px;">
                            <div class="info-input mb-20px">
                                <button type="submit" class="btn btn-success submit">Submit</button>
                                <!-- <button type="button" class="btn btn-danger addmore">Add more</button> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>
@endsection
@section('script')
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
 @endsection