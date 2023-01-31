@extends('website.layouts.master')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('website/assets/css/customerdashboard.css') }}">

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
                       <form action="{{route('website.addnewsaveaddress')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        
                                    <div class="row">
                                            <div class="col-md-12 col-left">
                                                <div class="shadow-block" id="pills-tabContent">
                                                    <div class="form-detail us-form">
                                                    
                                                           
                                                        <div class="row">                                 
                                                        <div class="col-md-6">
                                                                    <div class="info-input mb-20px">
                                                                    <label>Emirates *</label>
                                                                        <select required name="emirates" id="emirates" class="shippingadd">
                                                                            <option value="0">-select emirates-</option>
                                                                            <option>Dubai</option>
                                                                            <option>Abu Dhabi</option>
                                                                            <option>Sharjah</option>
                                                                            <option>Ajman</option>
                                                                            <option>Tarif</option>
                                                                            <option>Dhayd</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="info-input mb-20px">
                                                                    <label>Area *</label>
                                                                    <input required type="text" name="area" class="shippingadd" id="shiparea" placeholder="eg.Business Bay"/>
                                                                       
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="info-input mb-20px">
                                                                    <label>Apartment# / Hotel Room# / Villa# * *</label>
                                                                    <input required type="text" name="aprtment" class="shippingadd" id="aprtment" placeholder="eg.Apartment 2101"/>
                                                                       
                                                                    </div>
                                                                </div>
                                                              
                                                                <div class="col-md-12">
                                                                    <div class="info-input mb-20px">
                                                                    <label>Delivery Address*</label>
                                                                     <textarea required name="address" rows="3" name="delivery_Add" id="delivery_Add" class="shippingadd" placeholder="Building name/street"></textarea>
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