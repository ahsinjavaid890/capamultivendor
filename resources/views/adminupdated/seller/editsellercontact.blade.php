<div class="tabs-main-block">
                        <h1 class="mt-4 main-title">Contact Information</h1>
                            <div class="form-detail">
                                <div class="row">                                   
                                    <div class="col-md-6">
                                        <div class="info-input mb-20px">
                                            <label>Address <span style="color:red">*</span></label>
                                            <input type="text" class="form-control" placeholder="" value="{{$vendors->contact_address}}" name="vendoradd">
                                            <div class="map-pin icon"><img src="{{asset('seller/assets/img/location-pin.svg')}}"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="info-input mb-20px">
                                            <label>Phone No <span style="color:red">*</span></label>
                                            <input type="text" class="form-control" placeholder=""  value="{{$vendors->mobile }}" name="mobile">
                                            
                                        </div>
                                    </div>
                                    
                                    
                                </div>
                                <div class="row">                                   
                                    <div class="col-md-6">
                                        <div class="info-input mb-20px">
                                            <label>City <span style="color:red">*</span></label>
                                            <select class="selectcity form-control" name="city">
                                            <option value="0">select city</option>
                                            <option value="1">Dubai</option>
                                            <option value="2">Abu Dhabi</option>
                                            <option value="3">Dhayn</option>
                                        </select>
                                           
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="info-input mb-20px">
                                            <label>Zip Code/P.O.Box <span style="color:red">*</span></label>
                                            <input type="text" class="form-control" placeholder="" value="{{$vendors->zipcode }}" name="pincode">
                                            
                                        </div>
                                    </div>
                                    
                                    
                                </div>
                                
                            </div>
                        </div>







                        
                        <div class="tabs-main-block">
                        <h1 class="mt-4 main-title">Upload Documents</h1>
                            <div class="form-detail">
                                <div class="row"> 
                                                                     
                                        <div class="col-md-6 cmp_logo">
                                        <div class="info-input upload">
                                          <label class="control-label mb-2">Upload Company Logo <span class="link-danger">*</span></label>
                                         <input type="text" class="form-control" class="filestyle" placeholder="IMG-1.png" name="cmp_logo"> 
                                         <button class="btn">View</button>
                                        </div>
                                        </div>
                                        <div class="col-md-6 cmp_name">
                                        <div class="info-input">
                                          <label class="control-label mb-2">Company Name<span class="link-danger">*</span></label>
                                          <input type="text" class="filestyle form-control" placeholder="Diginite" value="{{$vendors->company_name}}" name="cmp_name">
                                        </div>
                                        </div>
                                        <div class="col-md-6 cmp_license">
                                        <div class="info-input">
                                          <label class="control-label mb-2">Name of License <span class="link-danger">*</span></label>
                                          <input type="text" class="filestyle form-control" value="{{$vendors->name_of_license}}" name="license_name">
                                        </div>
                                        </div>
                                        <div class="col-md-6 cmp_license_no">
                                        <div class="info-input">
                                          <label class="control-label mb-2">License Number<span class="link-danger">*</span></label>
                                          <input type="text" class="filestyle form-control" value="{{$vendors->license_no}}" name="license_no">
                                        </div>
                                        </div>
                                          <div class="col-md-4 cmp_exp">
                                        <div class="info-input">
                                          <label class="control-label mb-2">License Expiring Date<span class="link-danger">*</span></label>
                                          <input type="text" class="filestyle form-control" placeholder="26/02/2024" value="{{$vendors->license_exp_date}}" name="license_exp">
                                        </div>
                                        </div>
                                        <div class="col-md-4 cmp_logo">
                                        <div class="info-input upload">
                                            <img src="{{asset('public/uploads/'.$vendors->license_img)}}" style="width:50px;"/>
                                          <label class="control-label mb-2">Upload License<span class="link-danger">*</span></label>
                                         <input type="text" class="filestyle form-control" placeholder="IMG-1.png" value="{{$vendors->license_img}}" name="license_img"> 
                                         <button class="btn">View</button>
                                        </div>
                                        </div>
                                        <div class="col-md-4 cmp_logo">
                                        <div class="info-input upload">
                                        <img src="{{asset('public/uploads/'.$vendors->trade_license_img)}}" style="width:50px;"/>
                                          <label class="control-label mb-2">Upload Trade license <span class="link-danger">*</span></label>
                                         <input type="text" class="filestyle form-control" placeholder="IMG-1.png" value="{{$vendors->trade_license_img}}" name="trade_img"> 
                                         <button class="btn">View</button>
                                        </div>
                                        </div>
                                        <div class="col-md-4">
                                        <div class="info-input upload">
                                        <img src="{{asset('public/uploads/'.$vendors->passport_img)}}" style="width:50px;"/>
                                          <label class="control-label mb-2">Upload Passport <span class="link-danger">*</span></label>
                                         <input type="text" class="filestyle form-control" placeholder="IMG-1.png" value="{{$vendors->passport_img}}" name="passport_img"> 
                                         <button class="btn">View</button>
                                        </div>
                                        </div>
                                       
                                        <div class="col-md-4 ">
                                        <div class="info-input upload">
                                        <img src="{{asset('public/uploads/'.$vendors->emirates_id_img)}}" style="width:100px;"/>
                                          <label class="control-label mb-2">Emirates Id <span class="link-danger">*</span></label>
                                         <input type="text" class="filestyle form-control" placeholder="IMG-1.png" value="{{$vendors->emirates_id_img}}" name="emirates_fr_img"> 
                                         <button class="btn">View</button>
                                        </div>
                                        </div>
                                      
                                       
                                        
                                    </div>
                                    
                                    
                                    
                                </div>
                                
                               
                            </div>