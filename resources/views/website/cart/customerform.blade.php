<div class="schedule-delivery checkout-radio">
    <h4 class="mb-25">Schedule Delivery</h4>
    <div class="radio-button">
        <div class="input-label"> 
            <input value="free" checked type="radio" name="delivery" id="free"/>
            <label for="free">Free Delivery (3 to 4 Working Days)</label>
        </div>
        <div class="text-right"><span>Free</span></div>
    </div>
    <div class="radio-button">
        <div class="input-label">
            <input value="express" type="radio" name="delivery" id="express-delivery"/>
            <label for="express-delivery">Express Delivery- within 1 Day</label>
        </div>
        <div class="text-right"><span>AED 30</span></div>
    </div>
</div>
<div class="schedule-delivery checkout-radio">
    <h4 class="mb-25">Payment Mode</h4>
    <div class="radio-button">
        <div class="input-label">
            <input checked id="stripe" type="radio" name="payment_method" class="payment_mode" value="1">
            <label for="stripe">Online Payment</label>
        </div>
        <!-- <div class="text-right"><span>Free</span></div> -->
    </div>
    <div class="radio-button">
        <div class="input-label">
            <input id="cod" type="radio" name="payment_method" class="payment_mode" value="2">
            <label for="cod">Cash on Delivery</label>
        </div>
        <!-- <div class="text-right"><span>AED 10</span></div> -->
    </div>
</div>
<div class="continue-btn" style="text-align:right;">
    <button class="btn btn-primary" type="submit">Place Order</button>
</div>