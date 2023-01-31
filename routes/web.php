<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('website.index');
// });

// Auth::routes();

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);
Route::get('deletegalleryimages/{id}', [GoogleController::class, 'deletegalleryimages']);


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::name('website.')->namespace('App\Http\Controllers\Website\Auth')->group(function(){
    Route::get('/customer-register','CustomerRegisterController@register')->name('register');
    Route::post('/customer-register-process','CustomerRegisterController@registerProcess')->name('registerProcess');
    Route::get('/customer-login','CustomerLoginController@login')->name('login');

    // Route::get('/test-login','CustomerLoginController@testlogin')->name('testlogin');

    Route::post('/customer-login-process','CustomerLoginController@login_process')->name('login_process');
    Route::post('/customer-logout','CustomerLoginController@logout')->name('logout');
    Route::get('/customer-otp/{email}/{pass}','CustomerRegisterController@otp')->name('otp');
    Route::post('/verify-otp-process','CustomerRegisterController@verifyOtp')->name('verifyOtp');

});
Route::name('website.')->namespace('App\Http\Controllers\Website')->group(function(){
    Route::get('/','WebsiteController@index')->name('index');

    Route::post('/search','WebsiteController@search')->name('search');

    Route::get('/addtocart/{id}','WebsiteController@addtocartgetmethod');
    Route::get('/showcart','WebsiteController@showcart');
    Route::get('/removecart/{id}','WebsiteController@removecartcartgetmethod');
    Route::get('/quickproductview/{id}','WebsiteController@quickproductview');

    Route::get('/removecartpage/{id}','WebsiteController@removecartpage');
    

    Route::get('/thankyou','WebsiteController@thankyou')->name('thankyou');
    Route::get('/vendors','WebsiteController@vendors')->name('vendors');
    // venodrs details
    Route::get('/vendor/{id}','WebsiteController@vendorDetails')->name('vendorDetails');
    
    Route::get('/product','WebsiteController@productpage')->name('productpage');
    Route::get('/product/{id}','WebsiteController@productDetails')->name('productDetails');
    
    // category details page

    Route::get('/category/{id}','WebsiteController@catDetails')->name('cat_products');

    // add to cart

    Route::post('/addTocart','WebsiteController@addTocart')->name('addTocart');
    Route::get('/cart','WebsiteController@cartpage')->name('cartpage');
    // removed product from cart

    Route::post('/remove-products','WebsiteController@removedcartProd')->name('removedcartProd');

    // header cart
    Route::post('/cart-header','WebsiteController@headerCart')->name('headerCart'); 
    Route::post('/update-cart','WebsiteController@updateQTY')->name('updateQTY'); 

    // checkout page

    Route::get('/checkout','WebsiteController@checkoutpage')->name('checkoutpage');
    Route::post('/continuetopayement','WebsiteController@continuetopayement'); 
    Route::get('/ordercomplete/{id}', 'WebsiteController@ordercomplete'); 
    Route::get('/payement/{id}', 'WebsiteController@payement'); 
    Route::post('stripe', 'WebsiteController@stripePost')->name('stripe.post');
    // shipping address 

    Route::post('/shipping-address','WebsiteController@shippingAddress')->name('shippingAddress'); 
    Route::post('/stripe-payment-process','WebsiteController@StripePayment')->name('StripePayment');
    Route::post('/create-order','WebsiteController@placeOrder')->name('placeOrder');
    Route::post('/confirm-order','WebsiteController@ordertransaction')->name('confirmOrder');

    // design your products

    Route::get('/design-products','WebsiteController@designProducts')->name('designProducts');
    
    // subcategory on design products page route
    Route::get('getsubcategory/{id}','WebsiteController@subcategory_design');
    Route::post('/design-products-subcategory','WebsiteController@subcategory_design')->name('subcategory_design');
    Route::post('/design-request-process','WebsiteController@desginRequestProcess')->name('desginRequestProcess');


    Route::get('/contact','WebsiteController@contact')->name('contact');
    Route::get('/track-order','WebsiteController@trackorder')->name('trackorder');
    Route::get('/play-event','WebsiteController@playevent')->name('playevent');
    Route::post('/submitplanevent','WebsiteController@submitplanevent');


    Route::get('/coming-soon','WebsiteController@comingsoon')->name('comingsoon');
    Route::get('/categories','WebsiteController@categoriesPage')->name('categoriesPage');
    
    Route::get('/forgot-password','WebsiteController@forgotpassword')->name('forgotpassword');
    Route::post('/forgot-password-process','WebsiteController@forgotProcess')->name('forgotProcess');
    Route::get('/reset-password/{email}','WebsiteController@resetPage')->name('resetPage');
    Route::post('/reset-password-process','WebsiteController@resetpassword_process')->name('resetpassword_process');

    // guest checkout
    Route::post('/guest-checkout','WebsiteController@guestCheckout')->name('guestCheckout');

    Route::post('/guest-shipping-address','WebsiteController@guestUserDetails')->name('guestUserDetails');    
    Route::post('/guest-create-order','WebsiteController@guestplaceOrder')->name('guestplaceOrder');
    Route::post('/guest-confirm-order','WebsiteController@guestordertransaction')->name('guestordertransaction');

    Route::get('/services','WebsiteController@servicePage')->name('servicePage');  
    
    Route::post('/get-allcategories','WebsiteController@allcategories')->name('allcategories');

    Route::get('/search-form-cat','WebsiteController@searchFRM')->name('searchFRM'); 
    
    Route::post('/filter-by-price','WebsiteController@filterprice')->name('filterprice');

    Route::post('/filter-by-price-vendor','WebsiteController@filterpricebyVendor')->name('filterpricebyVendor');

});

Route::name('website.')->namespace('App\Http\Controllers\Website')->middleware(['auth:cust'])->group(function(){

    // customer dashboard

        Route::get('/customer-dashboard','WebsiteController@customerDashboard')->name('customerDashboard');

        Route::get('/customer-orders','WebsiteController@cust_order')->name('cust_order');
        Route::get('/customer-design-request','WebsiteController@cust_designReq')->name('cust_designReq');
        Route::get('/delete-design-request/{id}','WebsiteController@deleteReq')->name('deleteReq');
        Route::get('/profile/orders/{id}','WebsiteController@orderdetal');
 
        Route::get('/return-product/{orderid}','WebsiteController@refund_return');
        Route::post('/return-product-process','WebsiteController@returnRequestProcess')->name('returnRequestProcess');
        Route::get('/return-requests','WebsiteController@listReturnRequest')->name('listReturnRequest');

        // wish list 
        Route::get('/wishlist','WebsiteController@wishlist')->name('wishlist');
        Route::post('/add-wishlist-process','WebsiteController@add_to_wishlist')->name('add_to_wishlist');
        Route::get('/deletewishlist/{id}','WebsiteController@remove_wishlist')->name('remove_wishlist');

        Route::post('removewishlistfromproduct','WebsiteController@removewishlistfromproduct')->name('removewishlistfromproduct');
        // customer address

        Route::get('/customer-address','WebsiteController@myaddress')->name('myaddress');
        Route::get('/add-shiping-address','WebsiteController@saveaddress')->name('saveaddress');
        Route::post('/add-shiping-address-process','WebsiteController@addnewsaveaddress')->name('addnewsaveaddress');

        // delete cusotmer address

        Route::get('/delete-customer-address/{id}','WebsiteController@deleteAddress')->name('deleteAddress');

        // edit customer address

        Route::get('/update-customer-address/{id}','WebsiteController@updateAdd')->name('updateAdd');

        Route::post('/update-customer-address-process','WebsiteController@updateAddressProcess')->name('updateAddressProcess');

        Route::get('/cancel-order/{id}','WebsiteController@cancelOrder')->name('cancelOrder');
        Route::get('orders/downloadinvoice/{id}', 'WebsiteController@downloadinvoice');
        Route::get('/delete-order/{id}','WebsiteController@deleteOrders')->name('deleteOrders');

        // customer profile

        Route::get('/customer-profile','WebsiteController@custProfile')->name('custProfile');
        Route::post('/customer-profile-update','WebsiteController@custProfileUpdateProcess')->name('custProfileUpdateProcess');
        Route::post('/add-reviews','WebsiteController@addreviews')->name('addreviews');

        Route::get('/proposals','WebsiteController@submitted_proposal')->name('submitted_proposal');

        //  dashboard profile
});


require __DIR__.'/seller.php';

require __DIR__.'/admin.php';


