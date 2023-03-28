@extends('adminupdated.layouts.main-layout')
@section('title','Edit Seller')
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class=" container-fluid ">
            <!--begin::Card-->
            <div class="row">
            	 <div class="col-lg-12">
            	 	@include('website.layouts.flash')
            	 </div>
            </div>
            <div class="card card-custom mt-5">
                <div class="card-body">
                	<form action="{{route('admin.updatevendorprocess')}}" method="POST" enctype="multipart/form-data" id="updatevendor">
                        @csrf
                        <div class="row form-detail">
                           <div class="col-md-6">
                              <label>Email Address</label>
                              <div class="info-input mb-20px">
                                 <input style="height:52px;"  type="email" value="{{$vendors->email}}" class="form-control" name="personal_eamil" readonly/>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <label>Shop Name</label>
                              <div class="info-input mb-20px">
                                 <input required style="height:52px;"  name="shop_name" type="text" value="{{$vendors->shop_name}}" class="form-control" name="shop_name"/>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <label>Shop Logo</label>
                              <div class="info-input mb-20px">
                                 <input  name="shop_logo" type="file" style="height:52px;" class="form-control" name="shop_logo"/>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <label>Shop Banner</label>
                              <div class="info-input mb-20px">
                                 <input  name="shop_banner" type="file" style="height:52px;" class="form-control"/>
                              </div>
                           </div>
                           <div class="col-md-12">
                              <label>Shop Address</label>
                              <div class="info-input mb-20px">
                                 <input value="{{$vendors->shop_address}}" required name="shop_address" type="text" style="height:52px;" class="form-control"/>
                              </div>
                           </div>
                           
                        </div>
                       </div> 
                        
                        <div class="card card-custom mt-5">
                <div class="card-header flex-wrap py-5">
                    <div class="card-title">
                        <h3 class="card-label">
                            Complete Your Seller Profile (Payement Details)
                            <div class="text-muted pt-2 font-size-sm">Payement Details</div>
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-pane show active px-7" id="kt_user_edit_tab_1" role="tabpanel">
                        <div class="row form-detail">
                            <div class="col-md-12 bank_details">
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="info-input mb-20px">
                                       <label>Account holder name<span style="color:red">*</span></label>
                                       <input style="height:52px;" type="text" class="form-control" name="personal_accountTitle" value="{{$vendors->account_title}}"/>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="payment-detail info-input">
                                       <label>Bank Name<span class="link-danger">*</span></label>
                                       <input style="height:52px;" type="text" class="form-control" name="bank" value="{{$vendors->bank}}"/>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-12 bank_details">
                              <div class="info-input mb-20px">
                                 <label>Account Number (IBAN)<span style="color:red">*</span></label>
                                 <input style="height:52px;" type="text" class="form-control" name="personal_accountno" value="{{$vendors->account_no}}"  maxlength="23"/>
                              </div>
                           </div>
                           <br><br><br><br><br><br><br>
                           <div class="col-md-12">
                               <button type="submit" class="btn btn-success">Save</button>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>        
@endsection
@section('script')
<script>
    $(function(){
        var bankname = $("#bankname").val();
        $("#banktype option").each(function(){
            if($(this).val()==bankname){
                $(this).attr('selected','selected');
            }
        })
        var registered_as = $("#registered_as").val();
        $(".registeras").each(function(){
            if($(this).val()==registered_as){
                $(this).prop('checked',true);
                if(registered_as=='Freelancer'){
                    $(".cmp_name").hide();
                    $(".cmp_add").hide();
                    $(".cmp_logo").hide();
                    $(".cmp_license").hide();
                    $(".cmp_license_no").hide();
                    $(".cmp_exp").hide();
                   
                }else if(registered_as == 'Licensed'){
                    $(".cmp_name").show();
                    $(".cmp_add").show();
                    $(".cmp_logo").show();
                    $(".cmp_license").show();
                    $(".cmp_license_no").show();
                    $(".cmp_exp").show();
                }
            }
        })

        var delivery_by = $("#delivery_by").val();

        $(".deliveryvia").each(function(){
            if($(this).val()==delivery_by){
                $(this).prop('checked',true);
            }
        })
        
        var payment_option = $("#payment_option").val();
        $(".paymentOption option").each(function(){
            if($(this).val()==payment_option){
                $(this).attr('selected','selected');
            }
        })

        $("input.registeras").click(function () {   
       
       $('input.registeras').not(this).prop('checked', false);

       
               if($(this).is(':checked')){
                if($(this).val()=='Freelancer'){
                    $(".cmp_name").hide();
                    $(".cmp_add").hide();
                    $(".cmp_logo").hide();
                    $(".cmp_license").hide();
                    $(".cmp_license_no").hide();
                   
                }else if($(this).val() == 'Licensed'){
                    $(".cmp_name").show();
                    $(".cmp_add").show();
                    $(".cmp_logo").show();
                    $(".cmp_license").show();
                    $(".cmp_license_no").show();
                }
            }
            
        });

        $("input.deliveryvia").click(function () {   
         
         $('input.deliveryvia').not(this).prop('checked', false);
            
          })

        var city = $("#city").val();
        $(".selectcity option").each(function(){
            if($(this).val()==city){
                $(this).attr('selected','selected');
            }
        })
    })
</script>

<script>
    $("button.vendorupdate").click(function(e){
        e.preventDefault();
        $("#cover-spin").show();
        $("form#updatevendor").submit();

    })
</script>
<script>
  $(function(){
    $("#payment_option").change(function(){
      var option = $(this).val();
      if(option=='paypal'){
        $(".paypal_section").show();
        $(".stripe_section").hide();
        $(".bank_details").hide();
      }else if(option=='stripe'){
        $(".stripe_section").show();
        $(".paypal_section").hide();
        $(".bank_details").hide();
      }else if(option=='bank'){
        $(".bank_details").show();
        $(".stripe_section").hide();
        $(".paypal_section").hide();
      }else{
        $(".bank_details").hide();
        $(".stripe_section").hide();
        $(".paypal_section").hide();
      }

    })
  })
</script>
<script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCPraI53LsplwhkIsXED0pMxPniz3YKYfg&libraries=places&callback=initMap">
</script>

<script>
  function initMap(){
const center = { lat: 50.064192, lng: -130.605469 };
// Create a bounding box with sides ~10km away from the center point
const defaultBounds = {
  north: center.lat + 0.1,
  south: center.lat - 0.1,
  east: center.lng + 0.1,
  west: center.lng - 0.1,
};
const input = document.getElementById("personal_companyadd");
const options = {
  bounds: defaultBounds,
  componentRestrictions: { country: "ae" },
  fields: ["place_id", "geometry", "name"],
  strictBounds: false,
  types: ["establishment"],
};
const autocomplete = new google.maps.places.Autocomplete(input, options);
// contact address
const input2 = document.getElementById("contact_add");
const options2 = {
  bounds: defaultBounds,
  componentRestrictions: { country: "ae" },
  fields: ["place_id", "geometry", "name"],
  strictBounds: false,
  types: ["establishment"],
};
const autocomplete2 = new google.maps.places.Autocomplete(input2, options2);

}


</script>

<script>
  $("#personal_companyadd").on("blur",function(){
    var place = $(this).val();   
    $("#ifrm_preview").attr('src',"https://www.google.com/maps/embed/v1/place?key=AIzaSyCPraI53LsplwhkIsXED0pMxPniz3YKYfg&q="+place);
    
  })
</script>
@endsection