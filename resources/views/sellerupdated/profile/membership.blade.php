@extends('sellerupdated.layouts.main-layout')
@section('title','Membership Plane')
@section('content')
--!>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="d-flex flex-column-fluid">
    	<div class="container-fluid">
            <div class="tabs-main-block">
              <h1 class="mt-4 main-title mb-4">Membership Plan</h1>
               <div class="form-detail membership-plans">
                    <div class="row">
                      <div class="col-12">
                        <div class="card mb-4 bg-white shadow-sm">
                          @if($choosen_plan)
                            <div class="cart-header"><strong>Current Plan</strong> Want to Change? <a href="{{route('seller.upgradePackages')}}">Upgrade Now</a> 
                                <form action="{{route('seller.cancelledPlan')}}" method="POST" id="cancelationFrm" style="float:right">                                                    
                                    @csrf
                                    <input type="hidden" name="memberid" value="{{encrypt($choosen_plan->membership_order_id)}}"/>
                                    <button class="btn btn-outline-danger cancelplan" style="float:right" data="{{encrypt($choosen_plan->membership_order_id)}}">Cancel plan</button>
                                </form>
                            </div>
                            <div class="card-body">
                                <div class="col-md-12 plans_details">
                                    <h3 class="pricing-card-title">{{$choosen_plan->title}} 
                                        <sub class="monthly">{{$choosen_plan->amount}} AED/monthly</sub>
                                    </h3>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="membership_features">
                                                {!! $choosen_plan->description !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            @else
                            <div class="cart-header">
                                <p>Your plan under in approval process <br/></p>
                                <a href="{{route('seller.seller_membership')}}"><button class="btn btn-success">New plans</button></a>
                            </div>
                        @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div>
@endsection