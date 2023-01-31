@extends('seller.layouts.master')
@section('content')
<main class="dash-add-products">
<div class="single-tab-content mt-4" style="background: #FBFBFB">
                                  <h3 class="text-center">Choose Your Membership Plan</h3>
                                  <div class="col-md-12 membershipsType">
                                      <div class="d-flex membership-tabs">
                                          <a href="javascript:void(0)" class="membershipstabs membershipTypeactive" onclick="openCity(event, 'online_directory')">Online directory</a>
                                          <a href="javascript:void(0)" class="membershipstabs" onclick="openCity(event, 'marketplace')">Market place</a>
                                       </div>
                                  </div>
                                  <div id="online_directory" class="tabcontent">
                                  <div class="col-md-12 card-header">
                                  <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                      <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Regular Plan</button>
                                      </li>

                                      <li class="nav-item" role="presentation">
                                      <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Add-Ons</button>
                                      </li>
                                  </ul>
                                  </div>
                                  <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                    <div class="form-detail membership-plans">
                                        <div class="row row-cols-1 row-cols-md-2 mb-3">                                          
                                          @foreach($online_directory as $member)
                                          @if($choosen->id!=$member->id)
                                          <form action="{{route('seller.planCheckout')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="plan_id" value="{{encrypt($member->id)}}"/> 
                                            <input type="hidden" name="benefits" value="0"/>
                                            <div class="col">
                                              <div class="card mb-4 bg-white shadow-sm">
                                                
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
 
                                               
                                                  </div>
                                                  
                                                  <button  class="w-100 btn btn-lg btn-outline-primary" data="{{$member->id}},{{$member->title}},{{$member->amount}}" >Get started</button>
                                                  
                                                </div>
                                              </div>
                                            </div>
                                          </form>
                                          @endif
                                           @endforeach     
                                          
                                          
                                        </div>
                                        
                                        <!-- <div class="next btn"><a href="#" id="nextbtn3">Next Step</a></div> -->
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                <div class="form-detail membership-plans">
                                        <div class="row row-cols-1 row-cols-md-2 mb-3">                                          
                                         
                                          <div class="col">
                                            <div class="card mb-4 bg-white shadow-sm">
                                              
                                              <div class="card-body">
                                              <form action="{{route('seller.planCheckout')}}" method="POST">
                                                @csrf
                                                <input type="hidden" name="plan_id" value="{{encrypt($choosen->id)}}"/>
                                                <div class="row">
                                                 
                                                @foreach($addons as $addon)
                                                  <div class="col-md-12 checkbox-input addonscard">
                                                   @if($addon->benefits=='online_support')
                                                    <input type="checkbox" name="benefits[]" value="{{encrypt($addon->id)}}" data="{{$addon->price}}"/>
                                                    <label>
                                                      Online Support <strong>@if($addon->qty==0)Free @else {{$addon->qty}} @endif</strong>
                                                    </label>
                                                 @endif

                                                 @if($addon->benefits=='no_of_product')
                                                 <input type="checkbox" name="benefits[]" value="{{encrypt($addon->id)}}" data="{{$addon->price}}"/>
                                                    <label>
                                                    Adding Additional Product <strong>{{$addon->qty}}</strong>
                                                    </label>
                                                 @endif

                                                 @if($addon->benefits=='upload_product')
                                                 <input type="checkbox" name="benefits[]" value="{{encrypt($addon->id)}}" data="{{$addon->price}}"/>
                                                    <label>
                                                    Assist in uploading product info in account,per products <strong>{{$addon->qty}}</strong> 
                                                    </label>
                                                 @endif

                                                 @if($addon->benefits=='taking_photo')
                                                 <input type="checkbox" name="benefits[]" value="{{encrypt($addon->id)}}" data="{{$addon->price}}"/>
                                                    <label>
                                                    Assist in taking photo per products <strong>{{$addon->qty}}</strong>
                                                    </label>
                                                 @endif

                                                 @if($addon->benefits=='fullaccount')
                                                 <input type="checkbox" name="benefits[]" value="{{encrypt($addon->id)}}" data="{{$addon->price}}"/>
                                                    <label>
                                                    Full account assist,4 product,update once a weeak/month <strong>{{$addon->qty}}</strong>
                                                    </label>
                                                 @endif
                                                  </div>
                                                  @endforeach

                                                </div>
                                                
                                                
                                               
                                                <button  class="w-100 btn btn-lg btn-outline-primary" id="getcheckout" >Get started</button>
                                            </form>
                                              </div>
                                            </div>
                                          </div>
                                             
                                          
                                          
                                        </div>
                                        
                                        <!-- <div class="next btn"><a href="#" id="nextbtn3">Next Step</a></div> -->
                                    </div>
                                </div>

                                </div>
                              
                                </div>



                          <div class="tabcontent" id="marketplace" style="display:none">
                          <div class="col-md-12 card-header">
                                  <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                      <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Regular Plan</button>
                                      </li>

                                      <li class="nav-item" role="presentation">
                                      <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Add-Ons</button>
                                      </li>
                                  </ul>
                                  </div>
                                  <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                    <div class="form-detail membership-plans">
                                        <div class="row row-cols-1 row-cols-md-2 mb-3">                                          
                                          @foreach($marketplace as $member)
                                          @if($choosen->id!=$member->id)
                                          <form action="{{route('seller.planCheckout')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="plan_id" value="{{encrypt($member->id)}}"/> 
                                            <input type="hidden" name="benefits" value="0"/>
                                            <div class="col">
                                              <div class="card mb-4 bg-white shadow-sm">
                                                
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
 
                                               
                                                  </div>
                                                  
                                                  <button  class="w-100 btn btn-lg btn-outline-primary" data="{{$member->id}},{{$member->title}},{{$member->amount}}" >Get started</button>
                                                  
                                                </div>
                                              </div>
                                            </div>
                                          </form>
                                          @endif
                                           @endforeach     
                                          
                                          
                                        </div>
                                        
                                        <!-- <div class="next btn"><a href="#" id="nextbtn3">Next Step</a></div> -->
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                <div class="form-detail membership-plans">
                                        <div class="row row-cols-1 row-cols-md-2 mb-3">                                          
                                         
                                          <div class="col">
                                            <div class="card mb-4 bg-white shadow-sm">
                                              
                                              <div class="card-body">
                                              <form action="{{route('seller.planCheckout')}}" method="POST">
                                                @csrf
                                                <input type="hidden" name="plan_id" value="{{encrypt($choosen->id)}}"/>
                                                <div class="row">
                                                 
                                                @foreach($addons as $addon)
                                                  <div class="col-md-12 checkbox-input addonscard">
                                                   @if($addon->benefits=='online_support')
                                                    <input type="checkbox" name="benefits[]" value="{{encrypt($addon->id)}}" data="{{$addon->price}}"/>
                                                    <label>
                                                      Online Support <strong>@if($addon->qty==0)Free @else {{$addon->qty}} @endif</strong>
                                                    </label>
                                                 @endif

                                                 @if($addon->benefits=='no_of_product')
                                                 <input type="checkbox" name="benefits[]" value="{{encrypt($addon->id)}}" data="{{$addon->price}}"/>
                                                    <label>
                                                    Adding Additional Product <strong>{{$addon->qty}}</strong>
                                                    </label>
                                                 @endif

                                                 @if($addon->benefits=='upload_product')
                                                 <input type="checkbox" name="benefits[]" value="{{encrypt($addon->id)}}" data="{{$addon->price}}"/>
                                                    <label>
                                                    Assist in uploading product info in account,per products <strong>{{$addon->qty}}</strong> 
                                                    </label>
                                                 @endif

                                                 @if($addon->benefits=='taking_photo')
                                                 <input type="checkbox" name="benefits[]" value="{{encrypt($addon->id)}}" data="{{$addon->price}}"/>
                                                    <label>
                                                    Assist in taking photo per products <strong>{{$addon->qty}}</strong>
                                                    </label>
                                                 @endif

                                                 @if($addon->benefits=='fullaccount')
                                                 <input type="checkbox" name="benefits[]" value="{{encrypt($addon->id)}}" data="{{$addon->price}}"/>
                                                    <label>
                                                    Full account assist,4 product,update once a weeak/month <strong>{{$addon->qty}}</strong>
                                                    </label>
                                                 @endif
                                                  </div>
                                                  @endforeach

                                                </div>
                                                
                                                
                                               
                                                <button  class="w-100 btn btn-lg btn-outline-primary" id="getcheckout" >Get started</button>
                                            </form>
                                              </div>
                                            </div>
                                          </div>
                                             
                                          
                                          
                                        </div>
                                        
                                        <!-- <div class="next btn"><a href="#" id="nextbtn3">Next Step</a></div> -->
                                    </div>
                                </div>
                            </div>

                          </div>
                              </div>
                          
                          </div>
</main>
@stop

@push('otherstyle')
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
@endpush

@push('otherscript')
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
                  toastr.success('membership upgraded successfull!');
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


@endpush