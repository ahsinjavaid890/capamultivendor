@extends('admin.layouts.master')
@section('content')
<main>
<div class="container-fluid px-4">
                        <h1 class="mt-4 text-center main-title">Membership Plan</h1>                         

                        <div class="col-md-12">
                           <a href="{{route('admin.create_membership')}}"> <button class="btn btn-outline-success addcatbtn" title="Create membership"><i class="fa fa-plus"></i></button></a>
                           <a href="{{route('admin.viewAddons')}}"> <button class="btn btn-outline-success addcatbtn" title="Addons">Add-ons</button></a>
                        </div>
                        <div class="card mb-4">
                                <div class="card-body">
                                    <table id="datatablesSimple">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Amount</th>
                                                <th>No of Pruducts</th>
                                                <th>Feature</th>
                                                <th>Membership Type</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody id="membershiplist">
                                            @foreach($membership as $member)
                                            <tr>
                                                <td>{{$member->title}}</td>
                                                <td>{{$member->amount}}</td>
                                                <td>{{$member->noproducts}}</td>
                                                <td>{!!$member->description!!}</td>
                                                <td>
                                                    @if($member->isAdons==1)
                                                    Regular plan
                                                    @elseif($member->isAdons==2)
                                                    Add-Ons
                                                    @endif
                        
                                                </td>
                                                <td>
                                                @if($member->status==1)
                                                <span class="badge badge-warning" style="font-size:12px;">Deactivate</span>
                                                @else
                                                <span class="badge badge-success" style="font-size:12px;">Activate</span>
                                                @endif
                                                </td>
                                                <td>
                                                @if($member->status==1)
                                                <button class="btn btn-outline-warning activate" title="Block" data="{{$member->id}}"><i class="fa fa-ban"></i></button>
                                                @elseif($member->status==2)
                                               <button class="btn btn-outline-success deactivate" title="Active" data="{{$member->id}}"><i class="fa fa-check"></i></button>
                                                @endif
                                                <a href="{{route('admin.update_membership',[encrypt($member->id)])}}"><button class="btn btn-outline-primary" title="Edit"><i class="fa fa-pen"></i></button></a>
                                                <button class="btn btn-outline-danger delete" title="Delete" data="{{$member->id}}"><i class="fa fa-trash"></i></button>
                                                
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
                    url:"{{route('admin.membershipActive')}}",
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
                    url:"{{route('admin.membershipDeActive')}}",
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
                    url:"{{route('admin.membershipDelete')}}",
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
 @endpush
 