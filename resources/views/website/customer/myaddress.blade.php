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
                       <table style=" border-color: #; " class="table table-bordered table-hover">
                                    <thead style=" background-color:  rgb(251, 251, 251) !important; " class="">
                                            <tr>
                                                <th>Emirates</th>                                                
                                                <th>Area</th>
                                                <th>Address</th> 
                                                <th>Action</th>                                          

                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                        @foreach($myaddress as $myadd)
                                        <tr>
                                            <td>
                                               {{$myadd->emirates}}
                                            </td>
                                            <td>{{$myadd->area}}</td>
                                            <td>{{$myadd->address}}</td>
                                            <td>
                                                <a href="{{route('website.deleteAddress',[encrypt($myadd->id)])}}"><button class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                                                <a href="{{route('website.updateAdd',[encrypt($myadd->id)])}}"><button class="btn btn-success"><i class="fa fa-pen"></i></button></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                                                                 
                                        </tbody>
                                    </table>

                                    <div class="us-empty-text mt-5">
                                    <!-- <h5 class="">You have no saved addresses</h5> -->
                                        <!-- <p class="">You will see your saved address when you add a new address</p> -->
                                            <!-- <img src="" alt="" class=""> -->
                                            
                                           <a href="{{ url('add-shiping-address') }}"> <button type="button" class="">Add a New Address</button></a>
                                </div>  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
 @stop 
 @push('otherscript')

 <script>
     $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
 </script>

 <script>
     $(function(){
         $("button.cancel").click(function(e){
             e.preventDefault();
             if(!confirm("Are you sure want to cancel this ")){
                 return false;
             }else{
                 $("#cover-spin").show();
                 $("form#cancelfrm").submit();
             }
         })

         $("button.delivery").click(function(e){
             e.preventDefault();
             if(!confirm("Are you sure want to change this ")){
                 return false;
             }else{
                 $("#cover-spin").show();
                 $("form#deliveryfrm").submit();
             }
         })
     })
 </script>

 @endpush