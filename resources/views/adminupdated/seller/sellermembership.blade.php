@extends('adminupdated.layouts.main-layout')
@section('title','Seller Membership')
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
                <div class="card-header flex-wrap py-5">
                    <div class="card-title">
                        <h3 class="card-label">
                            Seller Membership
                            <div class="text-muted pt-2 font-size-sm">Manage Seller Membership</div>
                        </h3>
                    </div>
                    <input type="hidden" name="vendor_id" id="vendor_id" value="{{$vendor_id}}" />
                            <ul class="nav nav-tabs border-0" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#pills-home" role="tab">Regular Plan</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#pills-profile" role="tab">Second Add-Ons</a>
                                </li>
                            </ul>
                                  </div>
                                <div class="card-body">
                                  <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        
                                    <table id="example" class="table table-bordered" >
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Status</th>
                                                <th>Action</th>                                                
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            @foreach($membership as $regular)
                                              <tr>
                                                   <td>{{$regular->title}}</td>
                                                   <td>
                                                       @if($regular->order_status==1)
                                                       <span class="badge badge-warning" style="font-size:12px;">expired</span>
                                                       @elseif($regular->order_status==2)
                                                       <span class="badge badge-warning" style="font-size:12px;">confirm</span>
                                                       @elseif($regular->order_status==3)
                                                       <span class="badge badge-success" style="font-size:12px;">Approved</span>
                                                       @elseif($regular->order_status==4)
                                                       <span class="badge badge-warning" style="font-size:12px;">Deactivate</span>
                                                       @elseif($regular->order_status==5)
                                                       <span class="badge badge-warning" style="font-size:12px;">Cancelled</span>
                                                       @endif
                                                   </td> 
                                                   <td>
                                                       
                                                       @if($regular->order_status==1)
                                                       <button class="btn btn-outline-primary" disabled>Cancel</button>
                                                       <button class="btn btn-outline-primary" disabled>activate</button>
                                                       @elseif($regular->order_status==2)
                                                       <button class="btn btn-outline-primary regular" data="{{$regular->order_id}}" disabled>Cancel</button>
                                                       <button class="btn btn-outline-primary regular_activate" data="{{$regular->order_id}}">activate</button>
                                                       @elseif($regular->order_status==3)
                                                       <button class="btn btn-outline-primary regularcancel" data="{{$regular->order_id}}">Cancel</button>
                                                       <button class="btn btn-outline-danger regular_deactivate" data="{{$regular->order_id}}">Deactivate</button>
                                                       @elseif($regular->order_status==4)
                                                       <button class="btn btn-outline-primary" data="{{$regular->order_id}}" disabled>Cancel</button>
                                                       <button class="btn btn-outline-success regular_activate" data="{{$regular->order_id}}">Activate</button>
                                                       @elseif($regular->order_status==5)
                                                       <button class="btn btn-outline-primary" data="{{$regular->order_id}}" disabled>Cancelled</button>
                                                       <button class="btn btn-outline-success regular_activate" data="{{$regular->order_id}}" disabled>Activate</button>
                                                       @endif
                                                      
                                                       
                                                   </td>
                                              </tr> 
                                              @endforeach                                        
                                        </tbody>
                                    </table>
                            </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">                        
                            <table class="table table-bordered" >
                                <thead>
                                    <tr>
                                        <th>Plan Type</th>
                                        <th>Benefits</th>
                                        <th>Status</th>
                                        <th>Action</th>                                                
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($Addon_membership as $addon)
                                              <tr>
                                                   <td>{{$addon->plan_title}}</td>
                                                   <td>
                                                       @if($addon->benefits=='online_support')
                                                       Online support
                                                       @elseif($addon->benefits=='no_of_product')
                                                       Adding Additional product
                                                       @elseif($addon->benefits=='upload_product')
                                                       Assist in uploading products info in account,per product
                                                       @elseif($addon->benefits=='taking_photo')
                                                       Assits in taking photo per products
                                                       @elseif($addon->benefits=='fullaccount')
                                                       full Account assist, 4 product, update once a weak/month
                                                       @endif

                                                   </td>
                                                   <td>
                                                       @if($addon->order_status==1)
                                                       <span class="badge badge-warning" style="font-size:12px;">expired</span>
                                                       @elseif($addon->order_status==2)
                                                       <span class="badge badge-warning" style="font-size:12px;">confirm</span>
                                                       @elseif($addon->order_status==3)
                                                       <span class="badge badge-success" style="font-size:12px;">Approved</span>
                                                       @elseif($addon->order_status==4)
                                                       <span class="badge badge-warning" style="font-size:12px;">Deactivate</span>
                                                       @elseif($addon->order_status==5)
                                                       <span class="badge badge-warning" style="font-size:12px;">Cancelled</span>
                                                       @endif
                                                   </td> 
                                                   <td>
                                                   @if($addon->order_status==1)
                                                       <button class="btn btn-outline-primary" disabled>Cancel</button>
                                                       <button class="btn btn-outline-primary" disabled>activate</button>
                                                       @elseif($addon->order_status==2)
                                                       <button class="btn btn-outline-primary" data="{{$addon->order_id}}" disabled>Cancel</button>
                                                       <button class="btn btn-outline-primary addon_activate" data="{{$addon->order_id}}">activate</button>
                                                       @elseif($addon->order_status==3)
                                                       <button class="btn btn-outline-primary addonCancel" data="{{$addon->order_id}}">Cancel</button>
                                                       <button class="btn btn-outline-danger addon_deactivate" data="{{$addon->order_id}}">Deactivate</button>
                                                       @elseif($addon->order_status==4)
                                                       <button class="btn btn-outline-primary" data="{{$addon->order_id}}" disabled>Cancel</button>
                                                       <button class="btn btn-outline-success addon_activate" data="{{$addon->order_id}}">Activate</button>
                                                       @elseif($addon->order_status==5)
                                                       <button class="btn btn-outline-primary" data="{{$addon->order_id}}" disabled>Cancelled</button>
                                                       <button class="btn btn-outline-success addon_activate" data="{{$addon->order_id}}" disabled>Activate</button>
                                                       @endif
                                                       
                                                   </td>
                                              </tr> 
                                              @endforeach                                            
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')

 <script>
     $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
 </script>

 <script>
     $(function(){
        $("button.regular_activate").click(function(e){
            e.preventDefault();
            if(!confirm("Are you sure want to change this status")){

                return false;
            }else{
                $("#cover-spin").show();
                var id = $(this).attr('data');
                var vendor_id = $("#vendor_id").val();
                var form = new FormData();
                form.append('id',id);
                form.append('vendor_id',vendor_id);
                $.ajax({
                    url:"{{route('admin.regularactivate')}}",
                    type:"POST",
                    data:form,
                    cache:false,
                    contentType:false,
                    processData:false,
                    success:function(res){
                        var js_data = JSON.parse(res);
                        $("#cover-spin").hide();
                        if(js_data==1){
                            toastr.success('plan activated successfull!');
                            location.reload();
                        }else{
                            toastr.error('somethign went wrong!');
                         return false;   
                    }
                }
                })
            }
        })

        // deactivate vendor
        $("button.regular_deactivate").click(function(e){
            e.preventDefault();
            if(!confirm("Are you sure want to change this status")){
                return false;
            }else{
                $("#cover-spin").show();
                var id = $(this).attr('data');
                var form = new FormData();
                form.append('id',id);
                $.ajax({
                    url:"{{route('admin.regulardeactivate')}}",
                    type:"POST",
                    data:form,
                    cache:false,
                    contentType:false,
                    processData:false,
                    success:function(res){
                        var js_data = JSON.parse(res);
                        $("#cover-spin").hide();
                        if(js_data==1){
                            toastr.success('plan deactivated successfull!');
                            location.reload();
                        }else{
                            toastr.error('somethign went wrong!');
                         return false;   
                    }
                }
                })
            }
        })


        // addon

        $("button.addon_activate").click(function(e){
            e.preventDefault();
            if(!confirm("Are you sure want to change this status")){
                return false;
            }else{
                $("#cover-spin").show();
                var id = $(this).attr('data');
                var vendor_id = $("#vendor_id").val();
                var form = new FormData();
                form.append('id',id);
                form.append('vendor_id',vendor_id);
                $.ajax({
                    url:"{{route('admin.Addonactivate')}}",
                    type:"POST",
                    data:form,
                    cache:false,
                    contentType:false,
                    processData:false,
                    success:function(res){
                        var js_data = JSON.parse(res);
                        $("#cover-spin").hide();
                        if(js_data==1){
                            toastr.success('plan activated successfull!');
                            location.reload();
                        }else{
                            toastr.error('somethign went wrong!');
                         return false;   
                    }
                }
                })
            }
        })

        // deactivate vendor
        $("button.addon_deactivate").click(function(e){
            e.preventDefault();
            if(!confirm("Are you sure want to change this status")){
                return false;
            }else{
                $("#cover-spin").show();
                var id = $(this).attr('data');
                var vendor_id = $("#vendor_id").val();
                var form = new FormData();
                form.append('id',id);               
                $.ajax({
                    url:"{{route('admin.Addondeactivate')}}",
                    type:"POST",
                    data:form,
                    cache:false,
                    contentType:false,
                    processData:false,
                    success:function(res){
                        var js_data = JSON.parse(res);
                        $("#cover-spin").hide();
                        if(js_data==1){
                            toastr.success('plan deactivated successfull!');
                            location.reload();
                        }else{
                            toastr.error('somethign went wrong!');
                         return false;   
                    }
                }
                })
            }
        })



        // regular plan cancelled

        $("button.regularcancel").click(function(e){
            e.preventDefault();
            if(!confirm("Are you sure want to cancel this status")){
                return false;
            }else{
                $("#cover-spin").show();
                var id = $(this).attr('data');
                var vendor_id=$("#vendor_id").val();
                var form = new FormData();
                form.append('id',id);
                form.append('vendor_id',vendor_id);
                $.ajax({
                    url:"{{route('admin.regularaCancel')}}",
                    type:"POST",
                    data:form,
                    cache:false,
                    contentType:false,
                    processData:false,
                    success:function(res){
                        var js_data = JSON.parse(res);
                        $("#cover-spin").hide();
                        if(js_data==1){
                            toastr.success('plan cancelled successfull!');
                            location.reload();
                        }else{
                            toastr.error('something went wrong!');
                         return false;   
                    }
                }
                })
            }
        })


        // addon cancel

        $("button.addonCancel").click(function(e){
            e.preventDefault();
            if(!confirm("Are you sure want to cancel this status")){
                return false;
            }else{
                $("#cover-spin").show();
                var id = $(this).attr('data');
                var form = new FormData();
                form.append('id',id);
                $.ajax({
                    url:"{{route('admin.addonCancel')}}",
                    type:"POST",
                    data:form,
                    cache:false,
                    contentType:false,
                    processData:false,
                    success:function(res){
                        var js_data = JSON.parse(res);
                        $("#cover-spin").hide();
                        if(js_data==1){
                            toastr.success('plan cancelled successfull!');
                            location.reload();
                        }else{
                            toastr.error('something went wrong!');
                         return false;   
                    }
                }
                })
            }
        })


      



     })
 </script>

@endsection