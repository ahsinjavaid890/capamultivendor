<?php


Route::name('admin.')->namespace('App\Http\Controllers\Admin\Auth')->prefix('admin')->group(function(){
    Route::get('/login','LoginController@login')->name('login');
    Route::post('/login-process','LoginController@login_process')->name('login_process');
    Route::post('/logout','LoginController@logout')->name('logout');

});


Route::name('admin.')->namespace('App\Http\Controllers\Admin')->prefix('admin')->middleware(['auth:admin'])->group(function(){
    Route::get('/home','AdminController@dashboard')->name('home');
    Route::get('/vendor-list','AdminController@sellers')->name('sellers');
    Route::get('/customer-list','AdminController@customers')->name('customers');
    Route::get('/addblogs','AdminController@addblogs')->name('addblogs');
    Route::post('/addblog','AdminController@addblog')->name('addblog');
    Route::get('/allblogs','AdminController@allblogs')->name('allblogs');
    Route::get('/editblogs/{id}','AdminController@editblogs')->name('editblogs');
    Route::post('/editblog','AdminController@editblog')->name('editblog');
    Route::get('/deleteblog/{id}','AdminController@deleteblog')->name('deleteblog');
    





    Route::get('/settings','SettingsController@index')->name('settings');









    // activate and deactivate vendor route

    Route::post('/vendor-active','AdminController@vendorActive')->name('vendorActive');
    Route::post('/vendor-deactive','AdminController@vendorDeactive')->name('vendorDeactive');

    // vendor delete route
    Route::post('/vendor-delete','AdminController@vendorDelete')->name('vendorDelete');

    // customer activate and deactivate route

    Route::post('/customer-active','AdminController@customerActive')->name('customerActive');
    Route::post('/customer-deactive','AdminController@customerDeactive')->name('customerDeactive');

    // customer delete route
    Route::post('/customer-delete','AdminController@customerDelete')->name('customerDelete');
    Route::post('/updatecustomer','AdminController@updatecustomer')->name('updatecustomer');

    // add product route

    
    Route::get('/allproducts','AdminController@allproducts')->name('allproducts');
    Route::get('/add_product','AdminController@product')->name('product');
    Route::get('/editproduct/{id}','AdminController@editproduct')->name('editproduct');

    // category and sub-category route
    Route::get('/category','AdminController@category')->name('category');
    Route::get('/subcategory','AdminController@subcategory')->name('subcategory');

    // add category route

    Route::post('/add-category','AdminController@addCategory')->name('addCategory');
    
    // category active and deactive

    Route::post('/category-active','AdminController@categoryActive')->name('categoryActive');
    Route::post('/category-deactive','AdminController@categorydeactive')->name('categorydeactive');

    // category delete

    Route::post('/category-delete','AdminController@categoryDelete')->name('categoryDelete');

    // category update
    Route::post('/category-update','AdminController@categoryupdate')->name('categoryupdate');

    // add sub category route
    Route::post('/add-subcategory','AdminController@addsubCategory')->name('addsubCategory');

    // subcategory active and deactive

    Route::post('/sub-category-active','AdminController@subcategoryActive')->name('subcategoryActive');
    Route::post('/sub-category-deactive','AdminController@subcategoryDeactive')->name('subcategoryDeactive');

    // sub category delete

    Route::post('/sub-category-delete','AdminController@subcategoryDelete')->name('subcategoryDelete');

    // subcategory update

    Route::post('/sub-category-update','AdminController@subcategoryupdate')->name('subcategoryupdate');
    Route::post('/prod-sub-category','AdminController@listSubCat')->name('listSubCat');


    // Brand Route

    Route::get('/allbrands','AdminController@allbrands');
    Route::post('/addbrand','AdminController@addbrand');
    Route::post('/updatebrand','AdminController@updatebrand');
    

    // add varient route
    Route::get('/varient','AdminController@varientAttribute')->name('varientAttribute');
    Route::post('/add-varient','AdminController@Addvarient')->name('Addvarient');

    // varient active and deactive

    Route::get('/varient-active/{id}','AdminController@varientActive')->name('varientActive');
    Route::get('/varient-deactive/{id}','AdminController@varientdeactive')->name('varientdeactive');

    // varient delete

    Route::get('/varient-delete/{id}','AdminController@varientDelete')->name('varientDelete');

        // varient update
    Route::post('/varient-update','AdminController@varientupdate')->name('varientupdate');

    // size varient route
    Route::post('/add-attribute','AdminController@AddattributeProcess')->name('AddattributeProcess');
    // update size

    Route::post('/size-update','AdminController@Sizeupdate')->name('Sizeupdate');

    Route::get('/attribute-active/{id}','AdminController@AttributeActive')->name('AttributeActive');
    Route::get('/attribute-deactive/{id}','AdminController@Attributedeactive')->name('Attributedeactive');

    // varient delete

    Route::get('/attribute-delete/{id}','AdminController@AttributeDelete')->name('AttributeDelete');

     Route::post('/varient-attribute','AdminController@product_varient_attribute')->name('product_varient_attribute');   

    // add product process

    Route::post('/add-product-process','AdminController@addProductProcess')->name('addProductProcess');
    Route::post('/update-product-process','AdminController@updateProductProcess')->name('updateProductProcess');
    // product activate

    Route::post('/product-active','AdminController@productActive')->name('productActive');
    Route::post('/product-deactive','AdminController@productdeactive')->name('productdeactive');

    Route::post('/product-delete','AdminController@productDelete')->name('productDelete');

    // membership plan route

    Route::get('/membership','AdminController@membership')->name('membership');
    Route::get('/allmembership','AdminController@allmembership')->name('allmembership');
    // New create membership plane
    Route::get('/createmembership','AdminController@createmembership')->name('createmembership');
    // create membership
    Route::get('/create-membership','AdminController@create_membership')->name('create_membership');

    // membership add process

    Route::post('/create-membership-process','AdminController@addmemProcess')->name('addmemProcess');
    // membership activate route

    Route::post('/activate-membership','AdminController@membershipActive')->name('membershipActive');

    // membership deactivate

    Route::post('/deactivate-membership','AdminController@membershipDeActive')->name('membershipDeActive');
 
    // membership delete route
    Route::post('/delete-membership','AdminController@membershipDelete')->name('membershipDelete');

    // edit membership

    Route::get('/update-membership/{plan}','AdminController@update_membership')->name('update_membership');
    Route::get('/updatemembership/{plan}','AdminController@updatemembership')->name('updatemembership');
    Route::post('/update-membership-process','AdminController@updateMembershipProcess')->name('updateMembershipProcess');

    // addons
    Route::get('/alladdons','AdminController@allAddons')->name('allAddons');
    Route::get('/list-addons','AdminController@viewAddons')->name('viewAddons');
    Route::get('/addons','AdminController@addons')->name('addons');
    Route::get('/newaddons','AdminController@newaddons')->name('newaddons');
    Route::post('/create-addons','AdminController@addnsprocess')->name('addnsprocess');

    Route::post('/activate-addons','AdminController@activateAddons')->name('activateAddons');

    // membership deactivate

    Route::post('/deactivate-addons','AdminController@deactivateAddons')->name('deactivateAddons');

    Route::post('/delete-addons','AdminController@AdonsDelete')->name('AdonsDelete');



    // route product offer 

    Route::post('/make-offer-product','AdminController@productDfDAP')->name('productDfDAP');

    // view vendors route

    Route::get('/vendors/{seller}','AdminController@viewVendors')->name('viewVendors');

    Route::get('/editvendors/{seller}/{type}','AdminController@editVendor')->name('editVendor');

    Route::post('/vendor-update-process','AdminController@updatevendorprocess')->name('updatevendorprocess');

    Route::get('/orders','AdminController@orders')->name('orders');
    Route::get('/payment-details','AdminController@memberPayment')->name('memberPayment');

    Route::post('/cancelled','AdminController@cancelled')->name('cancelled');
    Route::post('/delivered','AdminController@delivered')->name('delivered');
    Route::get('/ecommerece/orderdetail/{order_id}','AdminController@order_details')->name('order_details');


    Route::get('/orders/changeorderstatus/{order_id}/{stastu}','AdminController@changeorderstatus');
    Route::get('/orders/downloadinvoice/{order_id}','AdminController@downloadinvoice');

    Route::get('/invoice','AdminController@invoice')->name('invoice');

    Route::get('/admin/product-invoice/{id}', 'AdminController@exportPDF')->name('exportPDF');

    // membership details

    Route::get('/vendor-membership/{id}', 'AdminController@vendor_membership')->name('vendor_membership');


    // regualr plan activate

    Route::post('/regular-activate','AdminController@regularactivate')->name('regularactivate');

    Route::post('/regular-deactivate','AdminController@regulardeactivate')->name('regulardeactivate');

    Route::post('/regular-cancelled','AdminController@regularaCancel')->name('regularaCancel');

    Route::post('/addon-activate','AdminController@Addonactivate')->name('Addonactivate');

    Route::post('/addon-deactivate','AdminController@Addondeactivate')->name('Addondeactivate');

    Route::post('/addon-cancelled','AdminController@addonCancel')->name('addonCancel');


    // coupon route start here

    Route::get('/coupons','AdminController@coupons')->name('coupons');
    Route::get('/allcoupons','AdminController@allcoupons')->name('allcoupons');

    // add coupon route
    Route::get('/add-coupons','AdminController@addCoupon')->name('addCoupon');
    Route::get('/addcoupons','AdminController@addcoupons')->name('addcoupons');
    Route::post('/add-coupons-process','AdminController@AddCouponProcess')->name('AddCouponProcess');

    // activate and deactivate coupon code

    Route::get('/activate-coupon/{id}','AdminController@activateCoupon')->name('activateCoupon');

    Route::get('/deactivate-coupon/{id}','AdminController@deactivateCoupon')->name('deactivateCoupon');

    // coupon delete route

    Route::post('/delete-coupon','AdminController@deleteCoupon')->name('deleteCoupon');

    // assigned coupon to vendor

    Route::post('/assigned-coupon','AdminController@assignedCoupon')->name('assignedCoupon');

    // vendor assigned coupon 

    Route::get('assigned-coupon-vendor','AdminController@AssignedCoupon_to_vendor')->name('AssignedCoupon_to_vendor');
     Route::get('assignedcouponvendor','AdminController@assignedcouponvendor')->name('assignedcouponvendor');

    // design request
    Route::get('/design-request','AdminController@designRequest')->name('designRequest');
    Route::get('/allsubmitproposal','AdminController@allsubmitproposal')->name('allsubmitproposal');
    Route::post('/proposal-submit-process','AdminController@submitproposal')->name('submitproposal');
    
    Route::get('/reject-request/{id}','AdminController@rejectRequest')->name('rejectRequest');
    Route::get('/delete-request/{id}','AdminController@deleteRequest')->name('deleteRequest');

    Route::get('/accept-request/{id}/{reqtitle}/{reqemail}','AdminController@acceptRequest')->name('acceptRequest');

    Route::post('/accept-mail','AdminController@requestAcceptMail')->name('requestAcceptMail');

    Route::get('/view-request/{id}','AdminController@viewRequestDetails')->name('viewRequestDetails');

    Route::get('/return-requests','AdminController@listReturnRequest')->name('listReturnRequest');

    Route::get('/return-requests-accept/{id}','AdminController@accept_return_request')->name('accept_return_request');

    Route::get('/return-requests-reject/{id}','AdminController@reject_return_request')->name('reject_return_request');
    
    Route::post('/custom-notification','AdminController@customNotification')->name('customNotification');


    // guest orders


    Route::get('/guest-orders','AdminController@guestorders')->name('guestorders');

    Route::post('/guest-cancell-orders','AdminController@guestcancelled')->name('guestcancelled');

    Route::post('/guest-delivered-orders','AdminController@guestdelivered')->name('guestdelivered');


    // website banner
     
    Route::get('/Banner','AdminController@Banner')->name('Banner');
    Route::get('/banners','AdminController@banners')->name('banners');
    Route::post('/add-banner-process','AdminController@addBanner')->name('addBanner');
    Route::get('/delete-banner/{id}','AdminController@deleteBanner')->name('deleteBanner');

    // service list

    Route::get('/services','AdminController@services')->name('services');

    Route::get('/delete-services/{id}','AdminController@servicesDelete')->name('servicesDelete');
    
    Route::get('/activate-services/{id}','AdminController@activateService')->name('activateService');
    Route::get('/deactivate-services/{id}','AdminController@deactivateService')->name('deactivateService');











    

    

});

