@extends('adminupdated.layouts.main-layout')
@section('title','All Addons')
@section('content')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Entry-->
    <div class="flex-column-fluid">
        <div class="container-fluid">
            <div class="card mb-4">
                <div class="card-header flex-wrap py-5 d-flex justify-content-between">
                    <div class="card-title">
                        <h3 class="card-label">
                            All List Addons
                            <div class="text-muted pt-2 font-size-sm">All List Addons</div>
                        </h3>
                    </div>
                    <div class="card-btn text-end">
                        <a href="{{route('admin.newaddons')}}"> <button class="btn btn-outline-success addcatbtn" title="Create membership"><i class="fa fa-plus"></i>Create Addons</button></a>
                    </div>
                </div>
                <div class="card-body">
                    <table id="example" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Plan type</th>
                                <th>Amount</th>
                                <th>benefits</th>                                                
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="membershiplist">
                            @foreach($getdata as $addon)
                            <tr>
                                <td>{{$addon->title}}</td>
                                <td>{{$addon->price}}</td>
                                <td>{{$addon->benefits}}</td>
                                <td>
                                @if($addon->status==1)
                                <span class="badge badge-warning" style="font-size:12px;">Deactivate</span>
                                @else
                                <span class="badge badge-success" style="font-size:12px;">Activate</span>
                                @endif
                                </td>
                                <td>
                                @if($addon->status==1)
                                <button class="btn btn-outline-warning activate" title="Block" data="{{$addon->id}}"><i class="fa fa-ban"></i></button>
                                @elseif($addon->status==2)
                               <button class="btn btn-outline-success deactivate" title="Active" data="{{$addon->id}}"><i class="fa fa-check"></i></button>
                                @endif
                                <a href="{{route('admin.update_membership',[encrypt($addon->id)])}}"><button class="btn btn-outline-primary" title="Edit"><i class="fa fa-pen"></i></button></a>
                                <button class="btn btn-outline-danger delete" title="Delete" data="{{$addon->id}}"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
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
                    url:"{{route('admin.activateAddons')}}",
                    type:"POST",
                    data:form,
                    cache:false,
                    contentType:false,
                    processData:false,
                    success:function(res){
                        var js_data = JSON.parse(res);
                        $("#cover-spin").hide();
                        if(js_data==1){
                            toastr.success('Membership activated successfull!');
                            location.reload();
                        }else{
                            toastr.error('something went wrong!');
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
                    url:"{{route('admin.deactivateAddons')}}",
                    type:"POST",
                    data:form,
                    cache:false,
                    contentType:false,
                    processData:false,
                    success:function(res){
                        var js_data = JSON.parse(res);
                        $("#cover-spin").hide();
                        if(js_data==1){
                            toastr.success('Membership deactivated successfull!');
                            location.reload();
                        }else{
                            toastr.error('something went wrong!');
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
                    url:"{{route('admin.AdonsDelete')}}",
                    type:"POST",
                    data:form,
                    cache:false,
                    contentType:false,
                    processData:false,
                    success:function(res){
                        var js_data = JSON.parse(res);
                        $("#cover-spin").hide();
                        if(js_data==1){
                            toastr.success('Membership deleted successfull!');
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