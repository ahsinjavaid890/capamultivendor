@extends('admin.layouts.master')
@section('content')
<main>
<div class="container-fluid px-4">
                        <h1 class="mt-4 text-center main-title">Coupons details</h1>
                        <p class="mb-5 text-center main-para">Check all the details of Coupons</p>
                     <div class="col-md-12">
                         <a href="{{route('admin.addCoupon')}}"><button class="btn btn-outline-primary" style="float:right">Add Coupon</button></a>
                        <select class="select_vendor" name="vendor[]" id="vendor">
                            <option value="0">-select vendor-</option>
                            @foreach($vendors as $vendor)
                            <option value="{{$vendor->id}}">{{$vendor->fname}} {{$vendor->lname}}</option>
                            @endforeach
                        </select>
                        <button class="btn btn-outline-success assign">Assign Coupon</button>
                        <a href="{{route('admin.AssignedCoupon_to_vendor')}}"><button class="btn btn-outline-dark">Check Assigned Coupon</button></a>
                     </div>  
                    <div class="card mb-4">
                        
                                <div class="card-body">
                                    <table id="datatablesSimple" >
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Title</th>
                                                <th>Coupon Code</th>
                                                <th>Discount Offer</th>
                                                <th>Expiry date</th>
                                                <th>Status</th>
                                                <th>Action</th>                                                
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                        
                                               @foreach($coupons as $coupon)
                                               <tr id="{{$coupon->id}}">
                                                   <td>
                                                       @if($coupon->status==2)
                                                       <input type="checkbox" class="coupon_id" name="coupon_id" value="{{$coupon->id}}"/>
                                                       @endif
                                                    </td>
                                                   <td>{{$coupon->coupon_title}}</td>
                                                   <td>{{$coupon->coupon_code}}</td>
                                                   <td>{{$coupon->coupon_offer}}</td>
                                                   <td>{{$coupon->expiry_date}}</td>
                                                   <td>
                                                    @if($coupon->status==1)
                                                        <span class="badge badge-warning" style="font-size:12px;">Deactivate</span>
                                                     @else
                                                        <span class="badge badge-success" style="font-size:12px;">Activate</span>
                                                    @endif
                                                   </td>
                                                   <td>
                                                     @if($coupon->status==1)
                                                           <a href="{{route('admin.activateCoupon',[encrypt($coupon->id)])}}"><button class="btn btn-outline-warning activate" title="Block"><i class="fa fa-ban"></i></button></a>
                                                        @elseif($coupon->status==2)
                                                            <a href="{{route('admin.deactivateCoupon',[encrypt($coupon->id)])}}"><button class="btn btn-outline-success deactivate" title="Active"><i class="fa fa-check"></i></button></a>
                                                        @endif
                                                        
                                                        <button class="btn btn-outline-danger delete" title="Delete" data="{{$coupon->id}}"><i class="fa fa-trash"></i></button>
                                                       
                                                    </td>
                                               </tr>
                                              
                                               @endforeach                                  
                                        </tbody>
                                    </table>
                                </div>
                            </div>
</div>
                </main>
 @stop 
 @push('otherstyle')
 <style>
 .select_vendor{
    margin-left: 10px;
    margin-right: 10px;
    padding: 8px;
    border: 1px solid #80808087;
    border-radius: 4px;
 }
 </style>
 @endpush
 @push('otherscript')

<script>
    $(function(){
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $("button.delete").click(function(e){
            e.preventDefault();
            if(!confirm('are you sure want to delete!')){
                return false;
            }else{
                var data = $(this).attr('data');
                var form = new FormData();
                form.append('id',data);
                $("#cover-spin").show();
                $.ajax({
                    url:"{{route('admin.deleteCoupon')}}",
                    type:"POST",
                    data:form,
                    cache:false,
                    contentType:false,
                    processData:false,
                    success:function(res){
                        $("#cover-spin").hide();
                        var js_data = JSON.parse(res);
                        if(js_data==1){
                            toastr.success('coupon deleted successfull!');
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

<script>
    $(function(){
        $("button.assign").click(function(e){
            e.preventDefault();
            var isValid = true;
            var coupon_id=[];
            var vendor = $("#vendor").val();           

            $("input.coupon_id").each(function(){
                if($(this).is(":checked")){
                    coupon_id.push($(this).val());
                }
            })

            if(vendor=='0'){
                isValid= false;
                alert('please select vendor');
                return false;
            }else{
                isValid= true;
            }

            var total_coupon  = coupon_id.length;
            if(vendor=='0'){
                isValid= false;
                alert('please select coupon');
                return false;
            }else{
                isValid= true;
            }

            var form = new FormData();
            form.append('vendor',vendor);
            form.append('coupon_id',coupon_id);
            $("#cover-spin").show();

            $.ajax({
                url:"{{route('admin.assignedCoupon')}}",
                type:"POST",
                data:form,
                contentType:false,
                processData:false,
                cache:false,
                success:function(res){
                    var js_data = JSON.parse(res);
                    if(js_data==1){
                            toastr.success('coupon assigned successfull!');
                            location.reload();
                        }else{
                            toastr.error('something went wrong!');
                         return false;   
                    }
                }
            })

            

        })
    })
</script>

 @endpush