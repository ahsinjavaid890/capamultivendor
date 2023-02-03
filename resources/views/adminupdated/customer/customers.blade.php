@extends('adminupdated.layouts.main-layout')
@section('title','Customer')
@section('content')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class=" container-fluid ">
            <div class="row">
                 <div class="col-lg-12">
                    @include('website.layouts.flash')
                 </div>
            </div>
            <!--begin::Card-->
            <div class="card card-custom mt-5">
                <div class="card-header flex-wrap py-5">
                    <div class="card-title">
                        <h3 class="card-label">
                            All Customers
                            <div class="text-muted pt-2 font-size-sm">Manage All Customers</div>
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <table id="example" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                @foreach($cust as $customer)
                                <tr>
                                    <td>{{$customer->fname}}</td>
                                    <td>{{$customer->lname}}</td>
                                    <td>{{$customer->email}}</td>
                                    <td>{{$customer->mobile}}</td>
                                    <td>
                                    @if($customer->status==1)
                                    <span class="badge badge-warning" style="font-size:12px;">Pending</span>
                                    @else
                                    <span class="badge badge-success" style="font-size:12px;">Approved</span>
                                    @endif
                                    </td>
                                    <td>
                                    @if($customer->status==1)
                                    <button class="btn btn-outline-warning activate" title="Block" data="{{$customer->id}}"><i class="fa fa-ban"></i></button>
                                    @elseif($customer->status==2)
                                   <button class="btn btn-outline-success deactivate" title="Active" data="{{$customer->id}}"><i class="fa fa-check"></i></button>
                                    @endif
                                    <button class="btn btn-outline-primary"  data-toggle="modal" data-target="#updatecustomer{{ $customer->id }}" title="Edit"><i class="fa fa-pen"></i></button>
                                    <button class="btn btn-outline-danger delete" title="Delete" data="{{$customer->id}}"><i class="fa fa-trash"></i></button>
                                    <!-- <button class="btn btn-outline-dark" title="View More"><i class="fa fa-eye"></i></button> -->
                                    </td>
                                </tr>
                                    <div class="modal fade" id="updatecustomer{{ $customer->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Update Category</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <form enctype="multipart/form-data" action="{{route('admin.updatecustomer')}}" method="POST">
                                            @csrf
                                            <input type="hidden" value="{{ $customer->id }}" name="cus_id">
                                          <div class="modal-body">
                                            <div class="form-group">
                                                <input value="{{$customer->fname}}" type="text" name="fname" class="form-control " placeholder="Enter First Name"/>
                                            </div>
                                            <div class="form-group">
                                                <input value="{{$customer->lname}}" type="text" name="lname" class="form-control " placeholder="Enter Last Name"/>
                                            </div>
                                            <div class="form-group">
                                                <input value="{{$customer->email}}" type="email" name="email" class="form-control " placeholder="Enter Email"/>
                                            </div>
                                            <div class="form-group">
                                                <input value="{{$customer->mobile}}" type="number" name="mobile" class="form-control " placeholder="Enter mobile"/>
                                            </div>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-success">Update Customer</button>
                                          </div>
                                          </form>
                                        </div>
                                      </div>
                                     </div> 
                                 @endforeach                                              
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
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
        $("button.activate").click(function(e){
            e.preventDefault();
            if(!confirm("Are you sure want to change this status")){
                return false;
            }else{
                $("#cover-spin").show();
                var id = $(this).attr('data');
                var form = new FormData();
                form.append('id',id);
                $.ajax({
                    url:"{{route('admin.customerActive')}}",
                    type:"POST",
                    data:form,
                    cache:false,
                    contentType:false,
                    processData:false,
                    success:function(res){
                        var js_data = JSON.parse(res);
                        $("#cover-spin").hide();
                        if(js_data==1){
                            toastr.success('Customer activated successfull!');
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
        $("button.deactivate").click(function(e){
            e.preventDefault();
            if(!confirm("Are you sure want to change this status")){
                return false;
            }else{
                $("#cover-spin").show();
                var id = $(this).attr('data');
                var form = new FormData();
                form.append('id',id);
                $.ajax({
                    url:"{{route('admin.customerDeactive')}}",
                    type:"POST",
                    data:form,
                    cache:false,
                    contentType:false,
                    processData:false,
                    success:function(res){
                        var js_data = JSON.parse(res);
                        $("#cover-spin").hide();
                        if(js_data==1){
                            toastr.success('Customer deactivated successfull!');
                            location.reload();
                        }else{
                            toastr.error('somethign went wrong!');
                         return false;   
                    }
                }
                })
            }
        })

        // delete vendor

        $("button.delete").click(function(e){
            e.preventDefault();
            if(!confirm("Are you sure want to delete this")){
                return false;
            }else{
                $("#cover-spin").show();
                var id = $(this).attr('data');
                var form = new FormData();
                form.append('id',id);
                $.ajax({
                    url:"{{route('admin.customerDelete')}}",
                    type:"POST",
                    data:form,
                    cache:false,
                    contentType:false,
                    processData:false,
                    success:function(res){
                        var js_data = JSON.parse(res);
                        $("#cover-spin").hide();
                        if(js_data==1){
                            toastr.success('Customer deleted successfull!');
                            location.reload();
                        }else{
                            toastr.error('somethign went wrong!');
                         return false;   
                    }
                }
                })
            }
        })



     })
 </script>
 
 @endsection