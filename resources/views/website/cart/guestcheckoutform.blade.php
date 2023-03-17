<div class="row" id="custaddress" >
    <div class="col-lg-6 col-md-6">
        <div class="billing-info mb-20px">
            <label>First Name *</label>
            <input required type="text" name="fname" id="fname" class="form-control" placeholder="e.g.John"/>
        </div>
    </div>
    <div class="col-lg-6 col-md-6">
        <div class="billing-info mb-20px">
            <label>Last Name *</label>
            <input required type="text" name="lname" id="lname" class="form-control" placeholder="e.g.Smith"/>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="billing-info mb-20px">
            <label>Email Address *</label>
            <input required type="text" name="email" id="gemail" class="form-control" placeholder="e.g.mail@example.com"/>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="billing-info mb-20px">
            <label>Phone Number *</label>
            <input required type="tel" name="phonenumber" id="gmobile" class="form-control" placeholder="e.g.501234567"/>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="billing-select mb-20px">
            <label>Emirates *</label>
            <select required name="emirates" id="emirates" class="shippingadd form-control">
                <option value="">Select Emirates</option>
                <option>Mumbai</option>
                <option>Delhi</option>
                <option>Kolkata</option>
                <option>Behar</option>
            </select>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="billing-select mb-20px">
            <label>Area *</label>
            <select required name="area" class="shippingadd form-control" id="shiparea">
                <option>Select Area</option>
                <option>India</option>
            </select>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="billing-select mb-20px">
            <label>Delivery Date *</label>
            <input required type="date" name="delivery_date" id="delivery_date" class="form-control" placeholder="00/00/0000">
        </div>
    </div>
    <div class="col-lg-6">
        <div class="billing-select mb-20px">
            <label>Delivery Time *</label>
            <input required type="time" name="delivery_time" id="delivery_time" class="form-control" placeholder="00/00/0000">
        </div>
    </div>
    <div class="col-lg-12">
        <div class="billing-select mb-20px">
            <label>Delivery Address*</label>
            <textarea name="address" rows="3" name="delivery_Add" id="delivery_Add" class="shippingadd form-control" placeholder="Building name/street"></textarea>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="billing-select mb-20px">
            <label>Apartment / Hotel Room / Villa (optional)</label>
            <input type="text" name="appartment" class="form-control">  
        </div>
    </div>



    <div class="col-lg-12">
        <div class="billing-info google-map mb-20px">
            <h5>OR</h5>
            <label>Pick Your Location Through Google Map</label>
            <input type="text" name="google_location" id="personal_companyadd" class="form-control" />
            <img src="{{asset('public/website/assets/images/icons/location-pin.svg')}}"/>
        </div>
    </div>

       <!--  <div class="schedule-delivery checkout-radio">
            <h4 class="mb-25">Schedule Delivery</h4>
            <div class="radio-button">
                <div class="input-label">
                    <input checked value="free" type="radio" class="form-control" name="delivery" id="free"/>
                    <label for="free">Free Delivery (3 to 4 Working Days)</label>
                </div>
                <div class="text-right"><span>Free</span></div>
            </div>
            <div class="radio-button">
                <div class="input-label">
                    <input value="express" type="radio comform-control" name="delivery" id="express-delivery"/>
                    <label for="express-delivery">Express Delivery- within 1 Day</label>
                </div>
                <div class="text-right"><span>AED 30</span></div>
            </div>
        </div> -->

        <div class="col-lg-12 billing-select checkout-radio">
            <h4 class="mb-25">Payment Option*</h4>
            <div class="savedaddreess p-0">
                <div class="radio-button border-0" style="border-bottom: 1px solid #707070 !important;">
                    <div class="input-label">
                        <input checked required type="radio" name="payment_method" class="payment_mode form-control" id="payment_mode" value="1"/>
                        <label class="mb-0" for="payment_mode">Online Payment</label>
                    </div>
                </div>

                <div class="radio-button border-0" class="    border: 1px solid #707070;">
                    <div class="input-label">
                        <input required type="radio" name="payment_method" class="payment_mode form-control" id="payment_mode1" value="2"/>
                        <label class="mb-0" for="payment_mode1">Cash on Delivery </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="continue-btn" style="text-align:right;">
            <button class="btn btn-primary " type="submit">Continue</button>
        </div>
</div>
