@extends('website.layouts.master')
@section('content')
<section id="contant-banner" class="text-center ptb-60px" style="background:#ecebeb">
    <div class="container-fluid">
      <div class="archive-header mb-3">
         <div class="row align-items-center">
            <div class="col-xl-6">
               <h1 class="mb-4">Contact US</h1>
               <div class="breadcrumb">
                  <a href="{{ url(' ') }}" rel="nofollow"><i class="fa fa-home mx-1"></i>Home</a>
                  <span><i class="fa fa-angle-right mr-5"></i> Contact US</span> 
               </div>
            </div>
         </div>
      </div>
    </div>
</section>
<section id="contact-form"  style="background:#f5eff7">
    <div class="container-fluid">
        <div class="row p-5">
            <div class="col-lg-6 col-sm-12">
                <div id="contact-tabs">
                      <div class="contact-tab-block order-md-first">
                        <div class="contact-tab-top-bar">
                            <!-- Left Side start -->
                            <h2>Pick a topic to find related FAQ's</h2>
                            <div class="contact-tab nav">
                                <a href="#promotion" data-bs-toggle="tab">
                                    <span>Promotion</span>
                                </a>
                                <a class="" href="#orders" data-bs-toggle="tab">
                                    <span>Orders</span>
                                </a>
                                <a class="" href="#payments" data-bs-toggle="tab">
                                    <span>Payments</span>
                                </a>
                                <a class="" href="#shipping-delivery" data-bs-toggle="tab">
                                    <span>Shipping Delivery</span>
                                </a>
                                <a class="" href="#loyalty-program" data-bs-toggle="tab">
                                    <span>Loyalty Program</span>
                                </a>
                            </div>       
                        </div>
                        <!-- Tabs Top Area End -->

                        <div class="mt-35">
                            <h2 class="mt-30px">People usually ask these:</h2>
                            <div class="tab-content jump">
                                <!-- Tab One Start -->
                                <div id="promotion" class="tab-pane">
                                <div class="contact-area mt-30px mb-40px">
                                    <div class="accordion" id="accordionExample">
                                        <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">What is promotion 1?</button>
                                        </h2>
                                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
                                        </div>
                                        </div>
                                        </div>
                                        <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">What is promotion 2?</button>
                                        </h2>
                                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
                                        </div>
                                        </div>
                                        </div>
                                        <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">What is promotion 3?</button>
                                        </h2>
                                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
                                        </div>
                                        </div>
                                        </div>
                                        <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingFour">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">What is promotion 4?</button>
                                        </h2>
                                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
                                        </div>
                                        </div>
                                        </div>
                                        <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingFive">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">What is promotion 5?</button>
                                        </h2>
                                        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
                                        </div>
                                        </div>
                                        </div>
                                    </div>   
                                </div>
                                </div>
                                <!-- Tab Two End -->
                                <!-- Tab One Start -->
                                <div id="orders" class="tab-pane active">
                                <div class="contact-area mt-30px mb-40px">
                                    <div class="accordion" id="accordionExample2">
                                        <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">How can I cancel my order?</button>
                                        </h2>
                                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample2">
                                        <div class="accordion-body">
                                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
                                        </div>
                                        </div>
                                        </div>
                                        <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Why is my registration delayed?</button>
                                        </h2>
                                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample2">
                                        <div class="accordion-body">
                                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
                                        </div>
                                        </div>
                                        </div>
                                        <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">How can I track my order?</button>
                                        </h2>
                                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample2">
                                        <div class="accordion-body">
                                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
                                        </div>
                                        </div>
                                        </div>
                                        <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingFour">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">How can I get my money back?</button>
                                        </h2>
                                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample2">
                                        <div class="accordion-body">
                                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
                                        </div>
                                        </div>
                                        </div>
                                        <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingFive">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">How can I become a seller?</button>
                                        </h2>
                                        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample2">
                                        <div class="accordion-body">
                                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
                                        </div>
                                        </div>
                                        </div>
                                    </div>   
                                </div>
                                </div>
                                <!-- Tab Two End -->
                                
                                <!-- Tab Three Start -->
                                <div id="payments" class="tab-pane">
                                    <div class="contact-area mt-30px mb-40px">
                                    <div class="accordion" id="accordionExample3">
                                        <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">How can I refund my payment?</button>
                                        </h2>
                                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample3">
                                        <div class="accordion-body">
                                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
                                        </div>
                                        </div>
                                        </div>
                                        <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Can I bill a customer immediately?</button>
                                        </h2>
                                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample3">
                                        <div class="accordion-body">
                                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
                                        </div>
                                        </div>
                                        </div>
                                        <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Can one customer pay for another customer's bill?</button>
                                        </h2>
                                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample3">
                                        <div class="accordion-body">
                                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
                                        </div>
                                        </div>
                                        </div>
                                        <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingFour">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">Can a bill carry forward a past due amount form the previous bill?</button>
                                        </h2>
                                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample3">
                                        <div class="accordion-body">
                                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
                                        </div>
                                        </div>
                                        </div>
                                        <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingFive">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">How do I handle failed payments?</button>
                                        </h2>
                                        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample3">
                                        <div class="accordion-body">
                                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
                                        </div>
                                        </div>
                                        </div>
                                    </div>   
                                </div>        
                                </div>
                                <!-- Tab Three End -->
                                
                                <!-- Tab Four Start -->
                                <div id="shipping-delivery" class="tab-pane">
                                    <div class="contact-area mt-30px mb-40px">
                                    <div class="accordion" id="accordionExample4">
                                        <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">How can I recieve shipping order?</button>
                                        </h2>
                                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample4">
                                        <div class="accordion-body">
                                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
                                        </div>
                                        </div>
                                        </div>
                                        <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">How long will it take?</button>
                                        </h2>
                                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample4">
                                        <div class="accordion-body">
                                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
                                        </div>
                                        </div>
                                        </div>
                                        <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Will you deliver to my door? </button>
                                        </h2>
                                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample4">
                                        <div class="accordion-body">
                                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
                                        </div>
                                        </div>
                                        </div>
                                        <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingFour">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">What transport will be used?</button>
                                        </h2>
                                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample4">
                                        <div class="accordion-body">
                                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
                                        </div>
                                        </div>
                                        </div>
                                        <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingFive">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">How much will it cost?</button>
                                        </h2>
                                        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample4">
                                        <div class="accordion-body">
                                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
                                        </div>
                                        </div>
                                        </div>
                                    </div>   
                                </div>        
                                </div>
                                <!-- Tab Four End -->
                                
                                <!-- Tab Five Start -->
                                <div id="loyalty-program" class="tab-pane">
                                    <div class="contact-area mt-30px mb-40px">
                                    <div class="accordion" id="accordionExample5">
                                        <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">What questions should you ask when considering a loyalty program?</button>
                                        </h2>
                                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample5">
                                        <div class="accordion-body">
                                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
                                        </div>
                                        </div>
                                        </div>
                                        <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">What makes a good loyalty program?</button>
                                        </h2>
                                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample5">
                                        <div class="accordion-body">
                                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
                                        </div>
                                        </div>
                                        </div>
                                        <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">How do I choose a good loyalty program?</button>
                                        </h2>
                                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample5">
                                        <div class="accordion-body">
                                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
                                        </div>
                                        </div>
                                        </div>
                                        <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingFour">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">Why are loyalty programs popular?</button>
                                        </h2>
                                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample5">
                                        <div class="accordion-body">
                                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
                                        </div>
                                        </div>
                                        </div>
                                        <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingFive">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">What are types of loyalty programs?</button>
                                        </h2>
                                        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample5">
                                        <div class="accordion-body">
                                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
                                        </div>
                                        </div>
                                        </div>
                                    </div>   
                                </div>        
                                </div>
                                <!-- Tab Five End -->
                            </div>
                        </div>
                    </div>
                </div>      
            </div>
            <div class="col-lg-6 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h2 class="mb-30px">Send us a message</h2>
                        <form method="POST" action="">
                            <div class="billing-info-wrap">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="billing-info mb-20px">
                                            <label>First Name <span class="link-danger">*</span></label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="billing-info mb-20px">
                                            <label>Last Name <span class="link-danger">*</span></label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="billing-info mb-20px">
                                            <label>Your Email Address <span class="link-danger">*</span></label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="billing-info mb-20px">
                                            <label>Your Phone Number <span class="link-danger">*</span></label>
                                            <input type="tel" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="billing-select mb-20px">
                                            <label>Subject <span class="link-danger">*</span></label>
                                            <select class="form-control">
                                                <option></option>
                                                <option>Subject 1</option>
                                                <option>Subject 2</option>
                                                <option>Subject 3</option>
                                                <option>Subject 4</option>
                                                <option>Subject 5</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="billing-select mb-20px">
                                            <label>Your Message <span class="link-danger">*</span></label>
                                            <textarea rows="5" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="register-yourself checkout-radio">
                                        <h6 class="mb-25">Your preferred way of communication</h6>
                                        <div class="both-radio d-flex">
                                            <div class="radio-button">
                                        <div class="input-label me-3">
                                        <input type="radio" name="delivery" class="form-control" id="L-seller">
                                        <label for="L-seller">By Phone</label>
                                        </div>
                                        </div>
                                            <div class="radio-button">
                                        <div class="input-label">
                                        <input type="radio" class="form-control" name="delivery" id="F-seller">
                                        <label for="F-seller">By Email</label>
                                        </div>
                                        </div> 
                                        </div>    
                                    </div>
                                    <div class="col-lg-12 checkbox-input d-flex">
                                        <input type="checkbox" class="form-control" id="html">
                                        <label for="html">Subscribe to receive exclusive sales &amp; sales offers, trend alerts &amp; new arrivals</label>
                                    </div>
                                </div>
                                <div class="continue-btn submit"><a href="#">Send Now</a></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="map-sec">
    <div class="container-fluid">
        <div class="row">
            <div class="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d462560.3012030251!2d54.9475610883428!3d25.076381466775658!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f43496ad9c645%3A0xbde66e5084295162!2sDubai%20-%20United%20Arab%20Emirates!5e0!3m2!1sen!2s!4v1641633616394!5m2!1sen!2s" width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>
</section>
@endsection