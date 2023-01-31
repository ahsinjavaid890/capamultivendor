@extends('sellerupdated.layouts.main-layout')
@section('title','Seller Membership')
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Card-->
            <div class="col-md-12 membershipsType" style="margin-bottom:20px;">
                <div class="d-flex membership-tabs">
                    <a href="javascript:void(0)" class="membershipstabs membershipTypeactive" onclick="openCity(event, 'online_directory')">Online directory</a>
                    <a href="javascript:void(0)" class="membershipstabs" onclick="openCity(event, 'marketplace')">Market place</a>
                </div>
            </div>
            <div class="tabcontent" id="online_directory">
                 @foreach($online_directory as $members)
                <form action="{{route('seller.planCheckout')}}" method="POST">
                      @csrf
                      <input type="hidden" name="plan_id" value="{{encrypt($members->id)}}"/> 
                      <input type="hidden" name="benefits" value="0"/>
                <div class="card card-custom mt-5">
                    <div class="card-header flex-wrap py-5">
                        <div class="card-title">
                            <h3 class="card-label">
                                Seller Membership Silver
                                <div class="text-muted pt-2 font-size-sm">Check all the details of Seller Membership Silver</div>
                            </h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title text-center">{{$members->title}} <sub class="monthly"> {{$members->amount}}/month</sub></h1>
                        
                        <div class="membership_features">
                          {!! $members->description !!}
                        </div>

                        <hr/>
                        <h5>Add-ons</h5>
                        <hr/>
                        <div class="col-md-12">
                      
                      
                      @foreach($addon_with_plan as $addon_with)
                      @if($addon_with->plan_id==$members->id)
                        <div class="col-md-12 checkbox-input addonscard">
                          @if($addon_with->benefits=='online_support')
                          <input type="checkbox" name="benefits[]" value="{{encrypt($addon_with->id)}}" data="{{$addon_with->price}}"/>
                          <label>
                            Online Support <strong>@if($addon_with->qty==0)Free @else {{$addon_with->qty}} @endif</strong>
                          </label>
                        @endif

                        @if($addon_with->benefits=='no_of_product')
                        <input type="checkbox" name="benefits[]" value="{{encrypt($addon_with->id)}}" data="{{$addon_with->price}}"/>
                          <label>
                          Adding Additional Product <strong>{{$addon_with->qty}}</strong>
                          </label>
                        @endif

                        @if($addon_with->benefits=='upload_product')
                        <input type="checkbox" name="benefits[]" value="{{encrypt($addon_with->id)}}" data="{{$addon_with->price}}"/>
                          <label>
                          Assist in uploading product info in account,per products <strong>{{$addon_with->qty}}</strong> 
                          </label>
                        @endif

                        @if($addon_with->benefits=='taking_photo')
                        <input type="checkbox" name="benefits[]" value="{{encrypt($addon_with->id)}}" data="{{$addon_with->price}}"/>
                          <label>
                          Assist in taking photo per products <strong>{{$addon_with->qty}}</strong>
                          </label>
                        @endif

                        @if($addon_with->benefits=='fullaccount')
                        <input type="checkbox" name="benefits[]" value="{{encrypt($addon_with->id)}}" data="{{$addon_with->price}}"/>
                          <label>
                          Full account assist,4 product,update once a weeak/month <strong>{{$addon_with->qty}}</strong>
                          </label>
                        @endif
                        </div>
                        @endif
                        @endforeach
                              
                        <button  class="w-100 btn btn-lg btn-outline-primary mt-3" data="{{$members->id}},{{$members->title}},{{$members->amount}}" >Get started</button>
                        
                      </div>
                    </div>
                  </div>
                </form>
                    @endforeach       
            </div>

            <div class="tabcontent" id="marketplace" style="display:none">
                  @foreach($marketplace as $member)
                <form action="{{route('seller.planCheckout')}}" method="POST">
                  @csrf
                  <input type="hidden" name="plan_id" value="{{encrypt($member->id)}}"/> 
                  <input type="hidden" name="benefits" value="0"/>
                    <div class="card card-custom mt-5">
                        <div class="card-header flex-wrap py-5">
                            <div class="card-title">
                                <h3 class="card-label">
                                    Seller Membership Basic
                                    <div class="text-muted pt-2 font-size-sm">Check all the details of Seller Membership Basic</div>
                                </h3>
                            </div>
                        </div>
                      <div class="card-body">
                        <h1 class="card-title pricing-card-title text-center">{{$member->title}} <sub class="monthly"> {{$member->amount}}/month</sub></h1>
                        
                        <div class="membership_features">
                          {!! $member->description !!}
                        </div>

                        <hr/>
                        <h5>Add-ons</h5>
                        <hr/>
                        <div class="col-md-12">
                      
                      
                      @foreach($addon_with_plan as $addon_with)
                      @if($addon_with->plan_id==$member->id)
                        <div class="col-md-12 checkbox-input addonscard">
                          @if($addon_with->benefits=='online_support')
                          <input type="checkbox" name="benefits[]" value="{{encrypt($addon_with->id)}}" data="{{$addon_with->price}}"/>
                          <label>
                            Online Support <strong>@if($addon_with->qty==0)Free @else {{$addon_with->qty}} @endif</strong>
                          </label>
                        @endif

                        @if($addon_with->benefits=='no_of_product')
                        <input type="checkbox" name="benefits[]" value="{{encrypt($addon_with->id)}}" data="{{$addon_with->price}}"/>
                          <label>
                          Adding Additional Product <strong>{{$addon_with->qty}}</strong>
                          </label>
                        @endif

                        @if($addon_with->benefits=='upload_product')
                        <input type="checkbox" name="benefits[]" value="{{encrypt($addon_with->id)}}" data="{{$addon_with->price}}"/>
                          <label>
                          Assist in uploading product info in account,per products <strong>{{$addon_with->qty}}</strong> 
                          </label>
                        @endif

                        @if($addon_with->benefits=='taking_photo')
                        <input type="checkbox" name="benefits[]" value="{{encrypt($addon_with->id)}}" data="{{$addon_with->price}}"/>
                          <label>
                          Assist in taking photo per products <strong>{{$addon_with->qty}}</strong>
                          </label>
                        @endif

                        @if($addon_with->benefits=='fullaccount')
                        <input type="checkbox" name="benefits[]" value="{{encrypt($addon_with->id)}}" data="{{$addon_with->price}}"/>
                          <label>
                          Full account assist,4 product,update once a weeak/month <strong>{{$addon_with->qty}}</strong>
                          </label>
                        @endif
                        </div>
                        @endif
                        @endforeach
                              
                        <button  class="w-100 btn btn-lg btn-outline-primary" data="{{$member->id}},{{$member->title}},{{$member->amount}}" >Get started</button>
                        
                      </div>
                    </div>
                  </div>
                </form>
                @endforeach         
            </div>
        </div>
    </div>
</div>
@endsection
@section('style')
<style>
.addonscard{
    margin-bottom:10px;
    display:block!important;
    margin-top:10px;
    
  }
  .addonscard input{
   
    width: 26px !important;
    height: 20px !important;
    margin-right:5px !important;
   
  }
  .addonscard label,.addonscard input{
    
    vertical-align: middle;
}
.addonscard label{
  display:contents;
}

.membershipstabs{
  text-decoration:none;
}

.membershipsType .membership-tabs .membershipstabs {
    background: #009fbd;
    color: #fff;
    padding: 15px;
    text-align: center;
    width: 200px;
    font-size: 16px;
    font-weight: 600;
    border-radius: 5px 5px 0 0;
}  
.membershipsType .membership-tabs .membershipstabs:focus, .membershipsType .membership-tabs .membershipstabs:.membershipTypeactive {
    background: #d8d8d8;
    color: #009fbd;
} 

.membershipsType .membership-tabs{
  justify-content: center;
    column-gap: 10px;
}

.membershipTypeactive{
  background: #d8d8d8 !important;
    color: #009fbd !important;
}
</style>
@endsection
@section('script')
<script>
function openCity(evt, cityName) {
  var i, tabcontent, membershipstabs;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("membershipstabs");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" membershipTypeactive", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " membershipTypeactive";
}
</script>

<script src = "https://checkout.stripe.com/checkout.js" > </script> 


<script>
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


function stripePay(amount,id,title) {
  if(!confirm('are you sure want to change your plan')){
          return false;
        }else{
    var handler = StripeCheckout.configure({
        key: 'pk_test_51Ixa8eDW7P9bN5xryCA6eKBVeO9Wk7npmovyDnbHTTAXQ7tzAhRvzwecsek84pZ37afwOee3hghhlphpnaZ1InXk00B17tscwd', // your publisher key id
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
                   
                    savetransaction(id,title,amount,js_data.msg.id);
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
} 


</script>
<script>

  function savetransaction(id,title,amount,payment_id){          
                  
          var trid = $("#tr_id").val();
          var form = new FormData();
          form.append('plan_id',id);
          form.append('title',title);
          form.append('amount',amount);
          form.append('payment_id',payment_id);
          form.append('trid',trid);
          $.ajax({
            url:"{{route('seller.upgrademembership_plan')}}",
            type:"POST",
            data:form,
            cache:false,
            contentType:false,
            processData:false,
            success:function(res){
              $("#cover-spin").hide();
              var js_data = JSON.parse(res);
              if(js_data==1){
                  toastr.success('membership Added successfull!');
                   location.href="{{route('seller.profilemgt')}}"
                }else{
                    toastr.error('something went wrong!');
                     return false;   
                    }
            }
          })



  

    }

</script>

<script>
  $(document).ready(function(){

  })
</script>
@endsection