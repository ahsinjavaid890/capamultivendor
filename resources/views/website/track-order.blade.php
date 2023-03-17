@extends('website.layouts.master')
@section('content')
<div class="breadcrumb-area ptb-60px" style="background:#ecebeb;">
    <div class="container-fluid">
      <div class="archive-header mb-3">
         <div class="row align-items-center">
            <div class="col-xl-6">
               <h1 class="mb-4">Track Your Order</h1>
               <div class="breadcrumb">
                  <a href="{{ url(' ') }}" rel="nofollow"><i class="fa fa-home mx-1"></i>Home</a>
                  <span><i class="fa fa-angle-right mr-5"></i> Track Your Order</span> 
               </div>
            </div>
         </div>
      </div>
    </div>
</div>
<section class="track-order">        
	<div class="container">
		<p>To track your order please enter your Order ID in the box below and press the "Track" button. This was given to you on your receipt and in the confirmation email you should have received.</p>
	    <form class="d-block" action="#">
		    <div class="track-form">
		        <div class="tracking-id mb-20px">
		            <label>Order Number/ ID</label>
		            <input type="text" class="form-control" placeholder="6512">
		        </div>
		        <div class="tracking-email mb-20px">
		            <label>Billing Email</label>
		            <input type="email" class="form-control" placeholder="abc@gmail.com">
		        </div>
		        <div class="continue-btn submit"><a href="#">Track Your Order</a></div>
		    </div>
	    </form>
	</div>
</section>
@stop