@extends('sellerupdated.layouts.main-layout')
@section('title','Membership Plane')
@section('content')
--!>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="d-flex flex-column-fluid">
      <div class="container-fluid">
            <div class="tabs-main-block">
              <h1 class="mt-4 main-title mb-4">Plan Checkout</h1>
               <div class="form-detail membership-plans">
                    <div class="row">
                      <div class="col-12">
                        <div class="card mb-4 bg-white shadow-sm">
                           <div class="card-body">
                             @if(count($addons)>0)
                              <h4>Add-ons plan</h4>
                              <table class="table table-bordered">
                                 <thead>
                                    <tr>
                                       <th>Benefits</th>
                                       <th>Price(in AED)</th>
                                    </tr>
                                 </thead>
                                    <tbody>
                                        @foreach($selected_benefit as $benefit)
                                        <input type="hidden" name="selected_benefit" value="{{decrypt($benefit)}}" class="selected_benefit"/>
                                         @endforeach                                                        
                                        @foreach($addons as $addon)
                                           
                                        <div class="col-md-12 addonscard">
                                        @if($addon->benefits=='online_support')
                                        <tr>
                                          <td>  
                                        <input type="checkbox" name="benefits[]" value="{{$addon->id}}" class="benefits" id="{{$addon->id}}" data="{{$addon->price}}"/>
                                        <label>
                                        Online Support <strong>@if($addon->qty==0)Free @else {{$addon->qty}} @endif</strong>
                                        </label>
                                        </td>
                                        <td>{{$addon->price}}</td>
                                                </tr>
                                              
                                        @endif
                                               
                                        @if($addon->benefits=='no_of_product')
                                        <tr>
                                                  <td> 
                                        <input type="checkbox" name="benefits[]" value="{{$addon->id}}" id="{{$addon->id}}" class="benefits" data="{{$addon->price}}"/>
                                        <label>
                                        Adding Additional Product <strong>{{$addon->qty}}</strong>
                                        </label>
                                        </td>
                                        <td>{{$addon->price}}</td>
                                        </tr>
                                        @endif
                                        
                                                
                                        @if($addon->benefits=='upload_product')
                                        <tr>
                                                <td>
                                        <input type="checkbox" name="benefits[]" value="{{$addon->id}}" id="{{$addon->id}}" class="benefits" data="{{$addon->price}}"/>
                                        <label>
                                        Assist in uploading product info in account,per products <strong>{{$addon->qty}}</strong>
                                        </label>
                                        </td>
                                        <td>{{$addon->price}}</td>
                                                </tr>
                                        @endif
                                                
                                                
                                        @if($addon->benefits=='taking_photo')
                                        <tr>
                                                        <td>
                                        <input type="checkbox" name="benefits[]" value="{{$addon->id}}" id="{{$addon->id}}" class="benefits" data="{{$addon->price}}"/>
                                        <label>
                                        Assist in taking photo per products <strong>{{$addon->qty}}</strong>
                                        </label>
                                        </td>
                                        <td>{{$addon->price}}</td>
                                        </tr>
                                        @endif
                                        
                                               
                                        @if($addon->benefits=='fullaccount')
                                        <tr>
                                                        <td>
                                        <input type="checkbox" name="benefits[]" value="{{$addon->id}}" id="{{$addon->id}}" class="benefits" data="{{$addon->price}}"/>
                                        <label>
                                        Full account assist,4 product,update once a weeak/month <strong>{{$addon->qty}}</strong>
                                        </label>
                                        </td>
                                        <td>{{$addon->price}}</td>
                                        </tr>
                                        @endif
                                        
                                        </div>
                                        @endforeach
                                    </tbody>
                                 </table>                      
                              @endif
                             
                              <hr/>
                              <div class="row">
                                <div class="col-md-6">
                                <!-- <table class="table table-bordered">
                                            <thead>
                                                    <tr>
                                                            <th>Coupon Title</th>                                                     
                                                            <th>Offer</th>
                                                    </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($assigned_coupon as $coupons) 
                                                @if($coupons->assigned_status==1)   
                                              <tr>
                                                  <td>
                                                      <input type="checkbox" name="coupons[]" value="{{$coupons->id}}" id="{{$coupons->assignedID}}" class="coupons" data="{{$coupons->coupon_offer}}"/>
                                                      <label>
                                                      {{$coupons->coupon_title}}
                                                      </label>
                                                  </td>
                                        
                                                      <td>{{$coupons->coupon_offer}}</td>
                                              </tr>
                                              @endif
                                              @endforeach
                                              </tbody>
                                      </table> -->

                                </div>      
                              <div class="col-md-6">
                                    
                                      <table class="table table-bordered">
                                             
                                             <tr>
                                                   <td colspan="3"><strong>Subtotal (in AED)</strong></td> 
                                                   <td><input type="text" name="subtotal" class="form-control subtotal" id="subtotal" value="{{$plan_amount}}" readonly/></td> 
                                                   
                                             </tr>
                                             <tr>
                                                   <td colspan="3"><strong>Coupon</strong></td> 
                                                   <td><input type="text" name="coupon" class="form-control coupon" id="coupon_code" data="0"/></td> 
                                                   
                                             </tr> 
                                             <tr>
                                                   <td colspan="3"><strong>Coupon offer</strong></td> 
                                                   <td><input type="text" name="coupon_offer" class="form-control coupon" id="coupon_offer" readonly value="0" data="0"/></td> 
                                                   
                                             </tr>  

                                             <tr>
                                                   <td colspan="3"><strong>Total (in AED)</strong></td> 
                                                   <td><input type="text" name="total" class="form-control total" id="total" value="{{$plan_amount}}" readonly/></td> 
                                                   <input type="hidden" name="reg_plan_id" value="{{$plan_id}}" id="plan_id"/>
                                                   <input type="hidden" name="prev_total" id="prev_total" value="{{$plan_amount}}}" />
                                             </tr> 
                                      </table>
                                      <button class="btn btn-success" id="proceedpay">Proceed to pay</button>
                              </div>
                              </div>
                      </div>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div>
@endsection
@section('style')
<style>
  .addonscard{
    margin-bottom:10px;
    display:flex;
    margin-top:10px;
  }
  .addonscard input{
   
    width: 26px;
    height: 20px;
   
  }
  .addonscard label,.addonscard input{
    display: inline-block;
    vertical-align: middle;
}
</style>
@endsection
@section('script')
<script>
         $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>
<script src = "https://checkout.stripe.com/checkout.js" > </script> 
<script>
        $(function(){
                $("input.benefits").each(function(){
                        var init_ben = $(this).val();                      
                        
                $('input.selected_benefit').each(function(){
                  var selected_ben = $(this).val();                        
                  if(init_ben==selected_ben){
                          $("input#"+selected_ben).prop('checked',true);                      
                          
                  }                    
             })              
        })

        })
</script>
<script>
        $(function(){
                var subtotal=$("#subtotal").val();
                var subtotal_init = parseInt(subtotal);
                var price = $("#total").val();
                var price_init = parseInt(price);
                $("input.benefits").each(function(){
                        if($(this).is(':checked')){
                            var amt= $(this).attr('data');
                            price_init +=parseInt(amt);
                            subtotal_init+=parseInt(amt);
                        }
                })
                $("#total").val(price_init);
                $("#prev_total").val(price_init);
                $("#subtotal").val(subtotal_init);

                $("input.benefits").click(function(){
                        var total_amt = $("#total").val();
                        var total_amt1 = parseInt(total_amt);
                        var subtotal_amt = $("#subtotal").val();
                        var subtotal_amt1 = parseInt(subtotal_amt);
                        if($(this).is(":checked")){
                           var addamt= $(this).attr('data');
                           total_amt1+=parseInt(addamt);
                           subtotal_amt1+=parseInt(addamt);

                        }else{
                          var addamt= $(this).attr('data');
                          total_amt1-=parseInt(addamt);
                          subtotal_amt1-=parseInt(addamt);     
                        }
                        $("#total").val(total_amt1);
                        $("#prev_total").val(total_amt1);
                        $("#subtotal").val(subtotal_amt1);
                })
        })
</script>

<script>
        $("button#proceedpay").click(function(e){
                e.preventDefault();
                var amount = $("#total").val();
                if(amount==0){
                        alert('please select any add-ons');
                        return false;
                }else{
                        var addon_id = [];
                        $("input.benefits").each(function(){
                                if($(this).is(":checked")){
                                        addon_id.push($(this).val());
                                }
                        })
                        
                        stripePay(amount,addon_id);
                }
        })
</script>
<script>
        
function stripePay(amount,id) {
  
    var handler = StripeCheckout.configure({
        key: '{{Cmf::get_store_value("published_stripe")}}', // your publisher key id
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
                    savetransaction(id,amount,js_data.msg.id);
                   
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

// save addons plan orders

function savetransaction(id,amount,payment_id){  
                 var regular_plan =  $("#plan_id").val();
                 var coupon_id = $("#coupon_code").attr('data');
                 console.log(id)
                  $("#cover-spin").show();
                  var form = new FormData();
                  form.append('plan_id',id);                 
                  form.append('amount',amount);
                  form.append('payment_id',payment_id); 
                  form.append('reg_plan_id',regular_plan);
                  form.append('coupon_id',coupon_id);                
                  $.ajax({
                    url:"{{route('seller.addonTransaction')}}",
                    type:"POST",
                    data:form,
                    cache:false,
                    contentType:false,
                    processData:false,
                    success:function(res){
                      $("#cover-spin").hide();
                      var js_data = JSON.parse(JSON.stringify(res));
                      if(js_data.msg==1){
                          toastr.success('membership addon added successfull!');
                           window.location.href="seller-profile";
                        }else{
                            toastr.error('something went wrong!');
                             return false;   
                            }
                    }
                  })
        
        
        
          
        
            }
        
</script>
<script>
         $("input#coupon_code").on('blur',function () {                   
         
                var prev_total = $("#prev_total").val();
                $("#total").val(prev_total);
            if($(this).val()!=''){
              var coupon_code = $(this).val();
               var form = new FormData();
               form.append('coupon_code',coupon_code);
               $("#cover-spin").show();
               $.ajax({
                       url:"{{route('seller.get_offer_coupon')}}",
                       type:"POST",
                       data:form,
                       cache:false,
                       contentType:false,
                       processData:false,
                       success:function(res){
                               $("#cover-spin").hide();
                               var js_data = JSON.parse(JSON.stringify(res));
                               if(js_data.status==200){
                                        $("#coupon_code").attr("data",js_data.msg.assignedID);
                                       $('#coupon_offer').val(js_data.msg.coupon_offer);
                                       var coupon_offer = parseInt(js_data.msg.coupon_offer);
                                        var total = $("#total").val();
                                        var total_amt_with_coupon = parseInt(total)-coupon_offer;
                                        $("#total").val(total_amt_with_coupon);
                                        
                                        //console.log(js_data.msg.assignedID)

                               }else{
                                var coupon_offer = 0;
                                $('#coupon_offer').val(0);
                                $("#coupon_code").attr("data",'0');
                                var total = $("#total").val();
                                var total_amt_with_coupon = parseInt(total)-coupon_offer;
                                $("#total").val(total_amt_with_coupon);
                                $(this).attr("data",'0');
                               }
                       }
               }) 
            }else{
                $('#coupon_offer').val(0);
                $("#coupon_code").attr("data",'0');
                   
            }
          })
</script>
#endsection