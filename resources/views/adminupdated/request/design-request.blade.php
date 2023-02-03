@extends('adminupdated.layouts.main-layout')
@section('title','Design Request')
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
                            Design Request
                            <div class="text-muted pt-2 font-size-sm">Manage Design Request</div>
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                	<table class="table table-condensed table-bordered" id="datatablesSimple">
                        <thead>
                        <tr>
                          <th>Image</th>                                       
                          <th>Product Name</th>
                          <th>Product Category</th>
                          <th>Product Variants</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Status</th>
                          <th>Actions</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($designRequests as $requests)
                        @if(DB::table('designdeleterequests')->where('request_id' , $requests->id)->where('user_id' , Auth::guard('admin')->user()->id)->count() == 0)
                        <tr >                                        
                            <td>
                                <img class="img-thumbnail" src="{{asset('public/public/uploads/'.$requests->product_img)}}" style="width: 100px;height: 100px;" />
                            </td>
                            <td>{{$requests->product_name}}</td>
                            <td>{{$requests->catname}}</td>
                            <td>Cost:{{$requests->cost}}</td>  
                            <td>{{$requests->fname}} {{$requests->lname}}</td>    
                            <td>{{$requests->email}}</td> 
                            <td>
                                @if($requests->status==1 && $requests->byadmin!=Auth::guard('admin')->user()->id)
                                <div class="badge badge-warning">Pending</div>
                                @elseif($requests->status==2 && $requests->byadmin==Auth::guard('admin')->user()->id)
                                <div class="badge badge-danger">Reject</div>
                                
                                @endif
                            </td>                                   
                            <td class="text-center">
                            <div class="btn-group">
                                @if($requests->status==1 && $requests->byadmin!=Auth::guard('admin')->user()->id)
                                <a class="btn btn-primary" href="{{route('admin.viewRequestDetails',[encrypt($requests->id)])}}">View Details</a>
                                <button class="btn btn-success" data-toggle="modal" data-target="#viewDetails{{ $requests->id }}" >Submit Proposal</button>
                                <a class="btn btn-warning" href="{{route('admin.rejectRequest',[encrypt($requests->id)])}}">Reject</a>
                                <a class="btn btn-success" href="{{route('admin.acceptRequest',[encrypt($requests->id),encrypt($requests->product_name),encrypt($requests->email)])}}">Query</a>
                                @elseif($requests->status==2 && $requests->byadmin==Auth::guard('admin')->user()->id)
                                <button class="btn" disabled>View Details</button>
                                <button class="btn sbmtproposal" data-bs-toggle="modal" data-bs-target="#viewDetails" data="{{$requests->id}}" disabled>Submit Proposal</button>
                                <a href="javascript:void(0)"><button class="btn btn-warning" disabled>Reject</button></a>
                                <a href="javascript:void(0)"><button class="btn btn-success" disabled>Accept</button></a>
                                @endif
                                <a class="btn btn-danger" href="{{route('admin.deleteRequest',[encrypt($requests->id)])}}">Delete</a>
                            </div>
                        </td>
                        </tr>
                        @endif
                         <div class="modal fade" id="viewDetails{{ $requests->id }}" tabindex="-1" aria-labelledby="viewDetailsLabel" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title">Submit Proposal</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    @if(DB::table('request_proposals')->where('request_id' , $requests->id)->where('admin_id' , Auth::guard('admin')->user()->id)->count() == 0)
                                      <form action="{{route('admin.submitproposal')}}" method="POST" id="proposalFrmReq">
                                      @csrf
                                      <input type="hidden" value="{{ $requests->id }}" name="requestID" id="requestID" />
                                       <div class="row">
                                            <div class="col-md-12">
                                                <div class="info-input mb-20px">
                                                    <label>Product Cost <span class="link-danger">*</span></label>
                                                    <input type="text" placeholder="Write Product Cost Here" name="proposal_cost" class="proposalform form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="info-input mb-20px">
                                                    <label>Timeline <span class="link-danger">*</span></label>
                                                    <input type="text" placeholder="write product timeline" name="praposal_timeline" class="proposalform form-control" />

                                                    
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="info-input mb-20px">
                                                    <label>Your Message <span class="link-danger">*</span></label>
                                                    <textarea placeholder="Write Your Message Here" rows="8" name="proposal_desc" class="proposalform form-control"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12 text-center">
                                                <div class="submit"><a class=" btn btn-primary" href="javascript:void(0)" id="sbmtproposalFrm">Submit Proposal</a></div>
                                            </div>
                                       </div>
                                    </form>

                                    @else
                                        <div class="alert alert-warning">You Already Submit Proposal <a href="{{route('admin.allsubmitproposal')}}">View All Submited Proposals</a> </div>

                                    @endif
                                  </div>
                                  
                                </div>
                              </div>
                            </div>  
                        @endforeach
                    
                        </tbody>
                        </table>
                            <!-- Modal -->
                             
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
 <script>
                    $(function(){
                        $('button.sbmtproposal').click(function(e){
                            e.preventDefault();
                            var req = $(this).attr('data');
                            $("#requestID").val(req);
                            console.log(req)
                        })
                    })
                </script>
                <script>
                    $(function(){
                        $("#sbmtproposalFrm").click(function(e){
                            e.preventDefault();
                            var isValid = true;
                            $('input.proposalform').each(function(){
                                if($(this).val()==''){
                                    isValid = false;
                                    $(this).css({
                                        "border": "1px solid red",
                                        "background": "#FFCECE",
                                    })
                                }else{
                                    $(this).css({
                                        "border": " ",
                                        "background": " ",
                                    }) 
                                }
                            })

                            $('select.proposalform').each(function(){
                                if($(this).val()=='0'){
                                    isValid = false;
                                    $(this).css({
                                        "border": "1px solid red",
                                        "background": "#FFCECE",
                                    })
                                }else{
                                    $(this).css({
                                        "border": " ",
                                        "background": " ",
                                    }) 
                                }
                            })

                            $('textarea.proposalform').each(function(){
                                if($(this).val()==''){
                                    isValid = false;
                                    $(this).css({
                                        "border": "1px solid red",
                                        "background": "#FFCECE",
                                    })
                                }else{
                                    $(this).css({
                                        "border": " ",
                                        "background": " ",
                                    }) 
                                }
                            })

                            if(isValid!=true){
                                e.preventDefault();
                                return false;
                            }else{
                                e.preventDefault();
                                $("#cover-spin").show();
                                $("form#proposalFrmReq").submit();
                            }

                        })
                    })
                </script>
@endsection