@extends('adminupdated.layouts.main-layout')
@section('title','Assigned coupon to vendor')
@section('content')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
       <div class="container-fluid">
            <div class="card mb-4">
                <div class="card-header flex-wrap py-5 d-flex justify-content-between">
                    <div class="card-title">
                        <h3 class="card-label">
                            Assigned coupon to vendor
                            <div class="text-muted pt-2 font-size-sm">Check all the details of Coupons</div>
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <table id="example" class="table table-bordered" >
                        <thead>
                            <tr> 
                                <th>Vendor name</th>
                                <th>vendor Email</th>                                               
                                <th>Coupon Title</th>
                                <th>Coupon Code</th>
                                <th>Discount Offer</th>
                                <th>Expiry date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($getAssigned_coupon as $assigned_coupon)
                            <tr>
                            <td>{{$assigned_coupon->fname}} {{$assigned_coupon->lname}}</td>
                            <td>{{$assigned_coupon->email}}</td>
                            <td>{{$assigned_coupon->coupon_title}}</td>
                            <td>{{$assigned_coupon->coupon_code}}</td>
                            <td>{{$assigned_coupon->coupon_offer}}</td>
                            <td>{{$assigned_coupon->expiry_date}}</td>
                            <td>
                                @if($assigned_coupon->assigned_status==1)
                                <span class="badge badge-warning" style="font-size:12px;">unused</span>
                                @elseif($assigned_coupon->assigned_status==2)
                                <span class="badge badge-success" style="font-size:12px;">used</span>
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
@endsection
@section('script')

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

 
 @endsection