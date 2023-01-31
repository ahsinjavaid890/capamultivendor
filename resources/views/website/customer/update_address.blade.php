@extends('website.layouts.master')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('public/website/assets/css/customerdashboard.css') }}">

<main class="main bg-grey min-height-600">
    <div class="page-content pt-2">
        <div class="container">
            <div class="tab tab-vertical row gutter-lg us-nav-cover-cls">
                @include('website.customer.sidebar')
                <div class="tab-content mb-6 bg-white p-4 us-md-cls">
                <div class="tab-body-head">
                    <div class="">
                        <h2 class="">
                            My Addresses
                        </h2>
                    </div>
                </div>
                    <div class="tab-pane active in" id="account-dashboard">                                
                       <form action="{{route('website.updateAddressProcess')}}" method="POST" enctype="multipart/form-data">
                @csrf
               <input type="hidden" name="addid" value="{{$addID}}" /> 
               <input type="hidden"  value="{{$cust_add->area}}" id="areaprev"/>
            <div class="row">
                    <div class="col-md-12 col-left">
                        <div class="shadow-block" id="pills-tabContent">
                            <div class="form-detail">
                             
                                   
                                <div class="row">                                 
                                <div class="col-md-6">
                                            <div class="info-input mb-20px">
                                            <label>Emirates *</label>
                                                <select name="emirates" id="emirates" class="shippingadd">
                                                    <option value="0">-select emirates-</option>
                                                    <option @if($cust_add->emirates == 'Dubai') selected @endif value="Dubai">Dubai</option>
                                                    <option @if($cust_add->emirates == 'Abu Dhabi') selected @endif value="Abu Dhabi">Abu Dhabi</option>
                                                    <option @if($cust_add->emirates == 'Sharjah') selected @endif value="Sharjah">Sharjah</option>
                                                    <option @if($cust_add->emirates == 'Ajman') selected @endif value="Ajman">Ajman</option>
                                                    <option @if($cust_add->emirates == 'Tarif') selected @endif value="Tarif">Tarif</option>
                                                    <option @if($cust_add->emirates == 'Dhayd') selected @endif value="Dhayd">Dhayd</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="info-input mb-20px">
                                            <label>Area *</label>
                                            <select name="area" class="shippingadd" id="shiparea">
                                                <option value="0">-select area-</option>
                                                <option @if($cust_add->area == 'Dubai') selected @endif value="Dubai">Dubai</option>
                                                <option @if($cust_add->area == 'Abu Dubai') selected @endif value="Abu Dhabi">Abu Dhabi</option>
                                                <option @if($cust_add->area == 'Sharjah') selected @endif value="Sharjah">Sharjah</option>
                                            </select>
                                            </div>
                                        </div>
                                      
                                        <div class="col-md-12">
                                            <div class="info-input mb-20px">
                                            <label>Delivery Address*</label>
                                             <textarea name="address" rows="3" name="delivery_Add" id="delivery_Add" class="shippingadd">{{$cust_add->address}}</textarea>
                                            </div>
                                        </div>
                                
                                </div>
                                <div class="col-md-12" style="margin-top:20px;">
                                    <div class="info-input mb-20px">
                                        <button type="submit" class="btn btn-success submit">Submit</button>
                                        
                                
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
            </div>
        </div>
    </main>
 @stop 
@section('script')
<script>
    $(function(){
        var emiratesprev = $("#emiratesprev").val();
        var areaprev = $("#areaprev").val();
        $("#emirates option").each(function(){
            if($(this).val()==emiratesprev){
                $(this).attr('selected','selected');
            }
        })

        $("#shiparea option").each(function(){
            if($(this).val()==areaprev){
                $(this).attr('selected','selected');
            }
        })
    })
</script>
<script>
    $(function(){
        $("button.submit").click(function(e){
              e.preventDefault();
              var isValid = true;                          
             $("input.shippingadd").each(function(){
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
                
                $("textarea.shippingadd").each(function(){
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

                $("select.shippingadd").each(function(){
                    if($.trim($(this).val())=='0'){
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