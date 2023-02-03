<?php 

Route::name('seller.')->namespace('App\Http\Controllers\Seller\Auth')->group(function(){
    Route::get('/seller-register','RegisterController@register')->name('register'); 
    Route::post('/seller-register-process','RegisterController@registerProcess')->name('registerProcess');
    Route::get('/seller-login','LoginController@login')->name('login'); 
    Route::post('/seller-login-process','LoginController@login_process')->name('login_process'); 
    Route::post('/seller-logout','LoginController@logout')->name('logout'); 
    
    Route::get('/signup-mail','RegisterController@basic_email')->name('basic_email');
    Route::get('/signup-otp/{email}/{pass}','RegisterController@otp')->name('otp');
    Route::post('/verify-otp','RegisterController@verifyOtp')->name('verifyOtp');


    Route::get('/seller-forgot-password','RegisterController@forgotpassword')->name('forgotpassword');
    Route::post('/seller-forgot-password-process','RegisterController@forgotProcess')->name('forgotProcess');
    Route::get('/seller-reset-password/{email}','RegisterController@resetPage')->name('resetPage');
    Route::post('/seller-reset-password-process','RegisterController@resetpassword_process')->name('resetpassword_process');
});


    Route::name('seller.')->namespace('App\Http\Controllers\Seller')->prefix('seller')->middleware(['auth:seller'])->group(function(){
    Route::get('/home','SellerController@dashboard')->name('home');
    Route::get('/storesettings','SellerController@storesettings')->name('storesettings');
    Route::post('/updatestoresettings','SellerController@updatestoresettings')->name('updatestoresettings');
    Route::post('/updatestoresocialmedia','SellerController@updatestoresocialmedia')->name('updatestoresocialmedia');
    Route::post('/updatestorebanners','SellerController@updatestorebanners')->name('updatestorebanners');

    
    Route::post('/seller-personal-info','SellerController@completeProfile')->name('update_profile');
    Route::post('/seller-contact-info','SellerController@update_contact_info')->name('contact_info');
    Route::post('/seller-upload-docs','SellerController@upload_seller_docs')->name('upload_doc');

    Route::get('/seller-profile','SellerController@profilemgt')->name('profilemgt');
    Route::get('/membership','SellerController@membershipplan')->name('membershipplan');
        // add product route
        Route::get('/allproducts','SellerController@allproducts')->name('allproducts');
        Route::get('/add-product','SellerController@product')->name('product');
        Route::get('/editproduct/{id}','SellerController@editproduct');


        // category and sub-category route
        Route::get('/category','SellerController@category')->name('category');
        Route::get('/subcategory','SellerController@subcategory')->name('subcategory');
    
        // add category route
    
        Route::post('/add-category','SellerController@addCategory')->name('addCategory');
        
        // category active and deactive
    
        Route::post('/category-active','SellerController@categoryActive')->name('categoryActive');
        Route::post('/category-deactive','SellerController@categorydeactive')->name('categorydeactive');
    
        // category delete
    
        Route::post('/category-delete','SellerController@categoryDelete')->name('categoryDelete');
    
        // category update
        Route::post('/category-update','SellerController@categoryupdate')->name('categoryupdate');
    
        // add sub category route
        Route::post('/add-subcategory','SellerController@addsubCategory')->name('addsubCategory');
    
        // subcategory active and deactive
    
        Route::post('/sub-category-active','SellerController@subcategoryActive')->name('subcategoryActive');
        Route::post('/sub-category-deactive','SellerController@subcategoryDeactive')->name('subcategoryDeactive');
    
        // sub category delete
    
        Route::post('/sub-category-delete','SellerController@subcategoryDelete')->name('subcategoryDelete');
    
        // subcategory update
    
        Route::post('/sub-category-update','SellerController@subcategoryupdate')->name('subcategoryupdate');
        Route::post('/prod-sub-category','SellerController@listSubCat')->name('listSubCat');
    
    
         
    // add varient route
    Route::get('/varient','SellerController@varientAttribute')->name('varientAttribute');
    Route::post('/add-varient','SellerController@Addvarient')->name('Addvarient');

    // varient active and deactive

    Route::get('/varient-active/{id}','SellerController@varientActive')->name('varientActive');
    Route::get('/varient-deactive/{id}','SellerController@varientdeactive')->name('varientdeactive');

    // varient delete

    Route::get('/varient-delete/{id}','SellerController@varientDelete')->name('varientDelete');

        // varient update
    Route::post('/varient-update','SellerController@varientupdate')->name('varientupdate');

    // size varient route
    Route::post('/add-attribute','SellerController@AddattributeProcess')->name('AddattributeProcess');
    // update size

    Route::post('/size-update','SellerController@Sizeupdate')->name('Sizeupdate');

    Route::get('/attribute-active/{id}','SellerController@AttributeActive')->name('AttributeActive');
    Route::get('/attribute-deactive/{id}','SellerController@Attributedeactive')->name('Attributedeactive');

    // varient delete

    Route::get('/attribute-delete/{id}','SellerController@AttributeDelete')->name('AttributeDelete');

     Route::post('/varient-attribute','SellerController@product_varient_attribute')->name('product_varient_attribute');   

        // add product process
    
        Route::post('/add-product-process','SellerController@addProductProcess')->name('addProductProcess');
        Route::post('/update-product-process','SellerController@updateProductProcess')->name('updateProductProcess');
        // product activate
    
        Route::post('/product-active','SellerController@productActive')->name('productActive');
        Route::post('/product-deactive','SellerController@productdeactive')->name('productdeactive');
    
        Route::post('/product-delete','SellerController@productDelete')->name('productDelete');

        Route::post('/make-offer-product','SellerController@productDfDAP')->name('productDfDAP');

        // membership plans

        Route::post('/choose-membership','SellerController@membership')->name('membership');

        // upgrade membership packages

        Route::get('/upgrade-packages','SellerController@upgradePackages')->name('upgradePackages');

        // upgrade membership process

        Route::post('/upgrade-membership-process','SellerController@upgrademembership_plan')->name('upgrademembership_plan');
        // cancel membership plan
        Route::post('/cancel-membership','SellerController@cancelledPlan')->name('cancelledPlan');


        // stripe payment gateway

        Route::post('/stripe-payment-process','SellerController@StripePayment')->name('StripePayment');

        Route::get('/orders','SellerController@orders')->name('orders');
       
        Route::get('orders/changeorderstatus/{id}/{status}', 'SellerController@changeorderstatus');
        Route::get('orders/downloadinvoice/{id}', 'SellerController@downloadinvoice');
        Route::post('/cancelled','SellerController@cancelled')->name('cancelled');
        Route::post('/delivered','SellerController@delivered')->name('delivered');
        Route::get('/orders/{order_id}','SellerController@order_details')->name('order_details');
        Route::get('/product-invoice/{id}', 'SellerController@exportPDF')->name('exportPDF');

        // plan checkout

        Route::post('/checkout','SellerController@planCheckout')->name('planCheckout');
        Route::post('/checkoutplan','SellerController@checkoutplan')->name('checkoutplan');
        Route::post('/save-order','SellerController@addonTransaction')->name('addonTransaction');

        Route::get('/seller-memberships','SellerController@seller_membership')->name('seller_membership');
        Route::get('/sellermemberships','SellerController@sellermemberships')->name('sellermemberships');

        Route::get('/seller-memberships-payment','SellerController@memberPayment')->name('memberPayment');

        Route::get('/seller-assigned-coupon','SellerController@assignedCouponVendor')->name('assignedCouponVendor');

        // coupon code with amount route

        Route::post('/coupon-code','SellerController@get_offer_coupon')->name('get_offer_coupon');

        // design request route

        Route::get('/design-request','SellerController@designRequest')->name('designRequest');

        Route::post('/proposal-submit-process','SellerController@submitproposal')->name('submitproposal');
        
        Route::get('/reject-request/{id}','SellerController@rejectRequest')->name('rejectRequest');
        Route::get('/delete-request/{id}','SellerController@deleteRequest')->name('deleteRequest');

        Route::get('/accept-request/{id}/{reqtitle}/{reqemail}','SellerController@acceptRequest')->name('acceptRequest');

        Route::post('/accept-mail','SellerController@requestAcceptMail')->name('requestAcceptMail');

        Route::get('/view-request/{id}','SellerController@viewRequestDetails')->name('viewRequestDetails');

            // add service
        Route::get('/services','SellerController@services')->name('services');
        Route::get('/add-service','SellerController@addService')->name('addService');
        Route::post('/add-service-process','SellerController@addserviceProcess')->name('addserviceProcess');

        Route::get('/delete-services/{id}','SellerController@servicesDelete')->name('servicesDelete');

        // custom notfication

        Route::post('/custom-notification','SellerController@customNotification')->name('customNotification');

        Route::post('/update-bank-details','SellerController@updateprofile_bnak')->name('updateprofile_bnak');

        Route::get('/description','SellerController@description')->name('description');
        Route::post('/add-description-process','SellerController@add_description_process')->name('add_description_process');


        // submitted proposal

        Route::get('/proposals','SellerController@submitted_proposal')->name('submitted_proposal');
        


        
});