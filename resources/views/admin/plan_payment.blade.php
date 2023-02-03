@extends('admin.layouts.master')
@section('content')
<main>
<div class="container-fluid px-4">
                        <h1 class="mt-4 text-center main-title">Membership payment Details</h1>
                        <p class="mb-5 text-center main-para">Check all the details of Membership Payment</p>
                       
                    <div class="card mb-4">
                        
                                <div class="card-body">
                                    <table id="datatablesSimple" >
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

 @endpush