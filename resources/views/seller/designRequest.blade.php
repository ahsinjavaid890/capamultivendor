@extends('seller.layouts.master')
@section('content')
<main>
                    <div class="container-fluid px-4">
                        <div class="row">
                                
                                 <table class="table table-condensed table-striped" id="datatablesSimple">
                                    <thead>
                                    <tr>                                       
                                      <th width="35%">Product Details</th>
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
                                    
                                    <tr >                                        
                                        <td class="">
                                            <img src="{{asset('uploads/'.$requests->product_img)}}" style="width: 100px;" />
                                            <div class="product-title">
                                                <h2>{{$requests->product_name}}</h2>
                                                
                                            </div>
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
                                        @if($requests->status==1 && $requests->byvendor!=Auth::guard('seller')->user()->id)
                                            <div class="prod-btn"><a href="{{route('seller.viewRequestDetails',[encrypt($requests->id)])}}"><button class=" btn " >View Details</button></a><button class="btn sbmtproposal" data-bs-toggle="modal" data-bs-target="#viewDetails" data="{{$requests->id}}" >Submit Proposal</button></div>
                                        <a href="{{route('seller.rejectRequest',[encrypt($requests->id)])}}"><button class="btn btn-warning">Reject</button></a>
                                        <a href="{{route('seller.acceptRequest',[encrypt($requests->id),encrypt($requests->product_name),encrypt($requests->email)])}}"><button class="btn btn-success">Query</button></a>
                                        @elseif($requests->status==2 && $requests->byvendor==Auth::guard('seller')->user()->id)
                                        <div class="prod-btn"><button class=" btn " disabled>View Details</button><button class="btn sbmtproposal" data-bs-toggle="modal" data-bs-target="#viewDetails" data="{{$requests->id}}" disabled>Submit Proposal</button></div>
                                        <a href="javascript:void(0)"><button class="btn btn-warning" disabled>Reject</button></a>
                                        <a href="javascript:void(0)"><button class="btn btn-success" disabled>Accept</button></a>
                                        @endif
                                       <a href="{{route('seller.deleteRequest',[encrypt($requests->id)])}}"> <button class="btn btn-danger">Delete</button></a>
                                    </td>
                                    </tr>
                                    @endforeach
                                
                                    </tbody>
                                    </table>
                                      

                                        <!-- Modal -->
                                        <div class="modal fade" id="viewDetails" tabindex="-1" aria-labelledby="viewDetailsLabel" aria-hidden="true">
                                          <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h5 class="modal-title"></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                              </div>
                                              <div class="modal-body">
                                              <form action="{{route('seller.submitproposal')}}" method="POST" id="proposalFrmReq">
                                              @csrf
                                              <input type="hidden" name="requestID" id="requestID" />
                                               <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="info-input mb-20px">
                                                            <label>Product Cost <span class="link-danger">*</span></label>
                                                            <input type="text" placeholder="Write Product Cost Here" name="proposal_cost" class="proposalform">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="info-input mb-20px">
                                                            <label>Timeline <span class="link-danger">*</span></label>
                                                            <input type="text" placeholder="write product timeline" name="praposal_timeline" class="proposalform" />
                                                            <!-- <select class="form-select proposalform" name="praposal_timeline">
                                                                <option value="0">Write Required Time Period Here or Choose from Dropdown</option>
                                                                <option value="30">30</option>
                                                                <option value="45">45</option>
                                                                <option value="60">60</option>
                                                                <option value="90">90</option>
                                                                
                                                            </select> -->
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="info-input mb-20px">
                                                            <label>Your Message <span class="link-danger">*</span></label>
                                                            <textarea placeholder="Write Your Message Here" rows="8" name="proposal_desc" class="proposalform"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 text-center">
                                                    	<div class="submit btn"><a href="javascript:void(0)" id="sbmtproposalFrm">Submit Proposal</a></div>
                                                    </div>
                                               </div>
                                            </form>
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
                @endpush
                
