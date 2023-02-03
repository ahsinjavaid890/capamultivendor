@extends('admin.layouts.master')
@section('content')
<main>
<div class="container-fluid px-4">
                        <h1 class="mt-4 text-center main-title">Vendors List </h1>
                        <p class="mb-5 text-center main-para">Check all the details of vendors</p>
                        <div class="col-md-12">
                                <button class="btn btn-outline-success"><i class="fa fa-user" style="margin-right:10px"></i>Add new</button>
                            </div>
                    <div class="card mb-4">
                        
                                <div class="card-body">
                                    <table id="datatablesSimple" >
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
                                            @foreach($seller as $vendor)
                                            <tr>
                                                <td>{{$vendor->fname}}</td>
                                                <td>{{$vendor->lname}}</td>
                                                <td>{{$vendor->email}}</td>
                                                <td>{{$vendor->mobile}}</td>
                                                <td>
                                                    @if($vendor->status==1)
                                                <span class="badge badge-warning" style="font-size:12px;">Pending</span>
                                                @else
                                                <span class="badge badge-success" style="font-size:12px;">Approved</span>
                                                @endif
                                                </td>
                                                <td>
                                                @if($vendor->status==1)
                                                <button class="btn btn-outline-warning activate" title="Block" data="{{$vendor->id}}"><i class="fa fa-ban"></i></button>
                                                @elseif($vendor->status==2)
                                               <button class="btn btn-outline-success deactivate" title="Active" data="{{$vendor->id}}"><i class="fa fa-check"></i></button>
                                                @endif
                                                <a href="{{route('admin.editVendor',[encrypt($vendor->id)])}}"><button class="btn btn-outline-primary" title="Edit"><i class="fa fa-pen"></i></button></a>
                                                <button class="btn btn-outline-danger delete" title="Delete" data="{{$vendor->id}}"><i class="fa fa-trash"></i></button>
                                                <a href="{{route('admin.viewVendors',[encrypt($vendor->id)])}}"><button class="btn btn-outline-dark" title="View More"><i class="fa fa-eye"></i></button></a>
                                                <a href="{{route('admin.vendor_membership',[encrypt($vendor->id)])}}"><button class="btn btn-outline-warning mt-2" title="Plan details">Membership</button></a>
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
                    url:"{{route('admin.vendorActive')}}",
                    type:"POST",
                    data:form,
                    cache:false,
                    contentType:false,
                    processData:false,
                    success:function(res){
                        var js_data = JSON.parse(res);
                        $("#cover-spin").hide();
                        if(js_data==1){
                            toastr.success('Vendor deactivated successfull!');
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
                    url:"{{route('admin.vendorDeactive')}}",
                    type:"POST",
                    data:form,
                    cache:false,
                    contentType:false,
                    processData:false,
                    success:function(res){
                        var js_data = JSON.parse(res);
                        $("#cover-spin").hide();
                        if(js_data==1){
                            toastr.success('Vendor deactivated successfull!');
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
                    url:"{{route('admin.vendorDelete')}}",
                    type:"POST",
                    data:form,
                    cache:false,
                    contentType:false,
                    processData:false,
                    success:function(res){
                        var js_data = JSON.parse(res);
                        $("#cover-spin").hide();
                        if(js_data==1){
                            toastr.success('Vendor Deleted successfull!');
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
 
 @endpush