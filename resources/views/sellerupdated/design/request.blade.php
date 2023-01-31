@extends('sellerupdated.layouts.main-layout')
@section('title','Design Request')
@section('content')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Card-->
            <div class="card card-custom mt-5">
                <div class="card-header flex-wrap py-5">
                    <div class="card-title">
                        <h3 class="card-label">
                            Design Request
                            <div class="text-muted pt-2 font-size-sm">Manage All Design Request</div>
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                     <table id="example" class="table table-bordered table-hover table-centered mb-0">
                                    <thead>
                                    <tr>                                       
                                      <th>Image</th>
                                      <th>Name</th>
                                      <th class="text-center">Product Category</th>
                                      <th class="text-center">Product Variants</th>
                                      <th class="text-center">Name</th>
                                      <th class="text-center">Email</th>
                                      <th class="text-center">Status</th>
                                      <th class="text-center">Actions</th>
                                    </tr>
                                    </thead>
    
                                    <tbody>
                                    @foreach($designRequests as $requests)

                                    @if(DB::table('designdeleterequests')->where('request_id' , $requests->id)->where('user_id' , Auth::guard('seller')->user()->id)->count() == 0)
                                    <tr >                                        
                                        <td>
                                            <div style="height:100px;width: 100px;"><img style="width:100%;height:100%;" class="img-fluid img-thumbnail" src="{{asset('uploads/'.$requests->product_img)}}"/>
                                            </div>
                                        </td>
                                        <td>
                                            {{$requests->product_name}}
                                        </td>
                                        <td class="text-center"><div class="cat-name">
                                        <ul>
                                            <li>{{$requests->catname}}</li>
                                            
                                        </ul>
                                        </div>
                                        </td>
                                        <td class="text-center">
                                            <ul style="text-align:left">                                               
                                                <li><strong>Cost : </strong>{{$requests->cost}}</li>
                                                
                                            </ul>
                                        
                                        </td>  
                                        <td class="text-center">{{$requests->fname}} {{$requests->lname}}</td>    
                                        <td class="text-center">{{$requests->email}}</td> 
                                        <td class="text-center">
                                            @if($requests->status==1 && $requests->byvendor!=Auth::guard('seller')->user()->id)
                                            pending
                                            @elseif($requests->status==2 && $requests->byvendor==Auth::guard('seller')->user()->id)
                                            reject
                                            @endif
                                        </td>                                   
                                        <td class="text-center">
                                            <div class="btn-group">
                                                @if($requests->status==1 && $requests->byvendor!=Auth::guard('seller')->user()->id)
                                                <a class="btn btn-primary" href="{{route('seller.viewRequestDetails',[encrypt($requests->id)])}}">View Details</a>
                                                <button class="btn btn-success" data-toggle="modal" data-target="#viewDetails{{ $requests->id }}" >Submit Proposal</button>
                                                <a href="{{route('seller.rejectRequest',[encrypt($requests->id)])}}"><button class="btn btn-warning">Reject</button></a>
                                                <a href="{{route('seller.acceptRequest',[encrypt($requests->id),encrypt($requests->product_name),encrypt($requests->email)])}}"><button class="btn btn-success">Query</button></a>
                                                @elseif($requests->status==2 && $requests->byvendor==Auth::guard('seller')->user()->id)
                                                <div class="prod-btn"><button class=" btn " disabled>View Details</button><button class="btn sbmtproposal" data-bs-toggle="modal" data-bs-target="#viewDetails" data="{{$requests->id}}" disabled>Submit Proposal</button></div>
                                                <a href="javascript:void(0)"><button class="btn btn-warning" disabled>Reject</button></a>
                                                <a href="javascript:void(0)"><button class="btn btn-success" disabled>Accept</button></a>
                                                @endif
                                               <a href="{{route('seller.deleteRequest',[encrypt($requests->id)])}}"> <button class="btn btn-danger">Delete</button></a>
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
                                            @if(DB::table('request_proposals')->where('request_id' , $requests->id)->where('vendor_id' , Auth::guard('seller')->user()->id)->count() == 0)
                                              <form action="{{route('seller.submitproposal')}}" method="POST" id="proposalFrmReq">
                                              @csrf
                                              <input type="hidden" value="{{ $requests->id }}" name="requestID" id="requestID" />
                                               <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="info-input mb-20px">
                                                            <label>Product Cost <span class="link-danger">*</span></label>
                                                            <input required type="text" placeholder="Write Product Cost Here" name="proposal_cost" class="proposalform form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="info-input mb-20px">
                                                            <label>Timeline <span class="link-danger">*</span></label>
                                                            <input required type="text" placeholder="write product timeline" name="praposal_timeline" class="proposalform form-control" />

                                                            
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="info-input mb-20px">
                                                            <label>Your Message <span class="link-danger">*</span></label>
                                                            <textarea required placeholder="Write Your Message Here" rows="8" name="proposal_desc" class="proposalform form-control"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 text-center">
                                                        <div class="submit">
                                                            <button type="submit" class="btn btn-primary" >Submit Proposal</button>
                                                        </div>
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
                                      
                </div>
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
@endsection