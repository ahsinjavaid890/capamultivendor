@extends('seller.layouts.master')
@section('content')
<main>
<div class="container-fluid px-4">
                        <h1 class="mt-4 text-center main-title">Assigned coupon</h1>
                        <p class="mb-5 text-center main-para">Check all the details of Coupons</p>
                     
                    <div class="card mb-4">
                        
                                <div class="card-body">
                                    <table id="datatablesSimple" >
                                        <thead>
                                            <tr> 
                                                                                             
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
                </main>
 @stop 

 @push('otherscript')



 @endpush