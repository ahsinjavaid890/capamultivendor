@extends('sellerupdated.layouts.main-layout')
@section('title','Membership payment Details')
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
                            Membership payment Details
                            <div class="text-muted pt-2 font-size-sm">Check all the details of Membership Payment</div>
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <table id="example" class="table table-separate table-head-custom table-checkable" style="width:100%">
                        <thead>
                            <tr>
                                <th>Vendor</th>
                                <th>Email</th>
                                <th>Plan Title</th>
                                <th>Amount</th>
                                <th>Payment_id</th> 
                                <th>Status</th>                                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($payment_details as $vendor_plan)
                          <tr>
                              <td>{{$vendor_plan->fname}} {{$vendor_plan->lname}}</td>
                              <td>{{$vendor_plan->email}}</td>
                              <td>{{$vendor_plan->title}}</td>
                              <td>{{$vendor_plan->amount}}</td>
                              <td>{{$vendor_plan->paymentid}}</td>
                              <td>
                                  @if($vendor_plan->planStatus==1)
                                  Expired
                                  @elseif($vendor_plan->planStatus==2)
                                  Confirm
                                  @elseif($vendor_plan->planStatus==3)
                                    Activate
                                  @elseif($vendor_plan->planStatus==4)
                                  Deactivate
                                  @endif
                              </td>
                          </tr>  
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