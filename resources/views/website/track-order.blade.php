@extends('website.layouts.master')
@section('content')
<div class="breadcrumb-area" style="background:#ecebeb;">
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
<section class="bs-status">
        	
		<div class="order-details">
	        <div class="order-id">ORDER# <span>6512</span></div>
	        <div class="order-arrival">Expected Arrival  <span>6/12/2021</span></div>            
	    </div>
	<div class="bs-wizard">
		<div class="bs-wizard-step complete">
	      <div class="bs-wizard-stepnum">Order Processed</div>
	      <div class="progress"><div class="progress-bar"></div></div>
	      <a href="#" class="bs-wizard-dot"><img src="{{ asset('public/website/assets/images/icons/event-poster-with-white-details.png')}}"></a>
	     
	    </div>
	    
	    <div class="bs-wizard-step complete"><!-- complete -->
	      <div class="bs-wizard-stepnum">Order Designing/Packaging</div>
	      <div class="progress"><div class="progress-bar"></div></div>
	      <a href="#" class="bs-wizard-dot"><img src="{{ asset('public/website/assets/images/icons/design-thinking.png')}}"></a>
	      
	    </div>
	    
	    <div class="bs-wizard-step active"><!-- complete -->
	      <div class="bs-wizard-stepnum">Order Shipped</div>
	      <div class="progress"><div class="progress-bar"></div></div>
	      <a href="#" class="bs-wizard-dot"><img src="{{ asset('public/website/assets/images/icons/new-product.png')}}"></a>
	     
	    </div>
	    
	    <div class="bs-wizard-step disabled"><!-- active -->
	      <div class="bs-wizard-stepnum">On the Way for Delivery</div>
	      <div class="progress"><div class="progress-bar"></div></div>
	      <a href="#" class="bs-wizard-dot"><img src="{{ asset('public/website/assets/images/icons/fast-delivery.png')}}"></a>
	      
	    </div>
	    <div class="bs-wizard-step disabled"><!-- active -->
	      <div class="bs-wizard-stepnum">Order Arrived</div>
	      <div class="progress"><div class="progress-bar"></div></div>
	      <a href="#" class="bs-wizard-dot"><img src="{{ asset('public/website/assets/images/icons/home.png')}}"></a>
	      
	    </div>
	</div>

</section>
@stop