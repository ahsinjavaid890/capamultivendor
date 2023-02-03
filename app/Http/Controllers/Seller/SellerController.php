<?php

namespace App\Http\Controllers\Seller;
use App\Helpers\Cmf;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Seller;
use App\Models\SellerDoc;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\VarientAttr;
use App\Models\Varient_name;
use App\Models\Product;
use App\Models\MembershipTransaction;
use App\Models\Membership;
use App\Models\Member_order;
use App\Models\orders;
use App\Models\orderdetails;
use App\Models\orderstatus;
use App\Models\Transaction;
use App\Models\Size;
use App\Models\Product_attr;
use App\Models\Addon_plan;
use App\Models\Addon_order;
use App\Models\Addon_transaction;
use App\Models\AssignCoupon;
use App\Models\productgallerimages;
use App\Models\Coupon;
use App\Models\DesignRequest;
use App\Models\RequestProposal;
use App\Models\ExpressDelivery;
use App\Models\Service;
use App\Models\designdeleterequests;
use App\Models\CustomNotification;
use Stripe;
use PDF;
use DB;
use Mail;
use Validator;
use Storage;
class SellerController extends Controller
{
    //
    public function dashboard(){
        $seller_id  = Auth::guard('seller')->user()->id;
        $product = Product::where('added_by_seller','=',Auth::guard('seller')->user()->id)->count();
        $activateProducts = Product::where('added_by_seller','=',Auth::guard('seller')->user()->id)
                            ->where('status','=','2')->count();

       
    $ordersnotification = CustomNotification::where('seller_id','=',$seller_id)
                ->where('notificationType','=','orders')
               ->where('status','=','1')
               ->count(); 
    $design_requests_notification = CustomNotification::where('notificationType','=','request')
                                    ->where('status','=','1')->count();
        return view('sellerupdated.dashboard.index',compact('product','activateProducts','design_requests_notification'));
    }
    public function storesettings()
    {
        $seller_id  = Auth::guard('seller')->user()->id;
        $store = Seller::find($seller_id);
        return view('sellerupdated.store.settings',compact("store"));
    }
    public function updatestoresettings(Request $request)
    {
        $validator = Validator::make($request->all(),[ 
            'shop_name'  => 'required',
            'shop_phone'  => 'required',
            'shop_address'  => 'required',
            'meta_title'  => 'required',
            'meta_description'  => 'required',
            'shop_logo'  => 'required|mimes:png,jpg|max:2048',
        ]);
        $seller_id  = Auth::guard('seller')->user()->id;
        $store = Seller::find($seller_id);
        $store->shop_name = $request->shop_name;
        $store->shop_url = Cmf::shorten_url($request->shop_name);
        $store->shop_phone = $request->shop_phone;
        $store->shop_address = $request->shop_address;
        $store->shop_about = $request->shop_about;
        $store->shop_policy = $request->shop_policy;
        $store->meta_title = $request->meta_title;
        $store->meta_description = $request->meta_description;
        if(!empty($request->file('shop_logo')))
        {
            $store->shop_logo = Cmf::sendimagetodirectory($request->file('shop_logo'));
        }
        if(!empty($request->file('banner')))
        {
            $store->shop_banner = Cmf::sendimagetodirectory($request->file('banner'));
        }
        $store->save();
        return redirect()->back()->with('message', 'Store Settings Updated Successfully');
    }
    public function updatestoresocialmedia(Request $request)
    {
        $seller_id  = Auth::guard('seller')->user()->id;
        $store = Seller::find($seller_id);
        $store->facebook_link = $request->facebook;
        $store->twitter_link = $request->twitter;
        $store->youtube_link = $request->youtube;
        $store->google_link = $request->google;
        $store->save();
        return redirect()->back()->with('message', 'Social Media Links Updated Successfully');
    }
    public function updatestorebanners(Request $request)
    {
        $seller_id  = Auth::guard('seller')->user()->id;
        $store = Seller::find($seller_id);
        $store->shop_banner = Cmf::sendimagetodirectory($request->file('banner'));
        $store->save();
        return redirect()->back()->with('message', 'Store Banner Updated Successfully');
    }
    public function completeProfile(Request $request){
        $emirates = $request->emirates;
        $account_title = $request->account_title;
        $bank = $request->bank;
        $account_no = $request->account_no;
        $paypal_id = $request->paypal_id;
        $stripe_id = $request->stripe_id;
        $registered_as = $request->registered_as;
        $company_name = $request->company_name;
        $company_address = $request->company_address;
        $payment_option = $request->payment_option;
        $delivery_by = $request->delivery_by;
        $product_type = $request->product_type;
        $product_collection = collect($product_type)->implode(',');

        $seller_id = Auth::guard('seller')->user()->id;

        $update_seller_profile = Seller::where('id',$seller_id)
                                ->update([
                                    'emirates_id'=>$emirates,
                                    'account_title'=>$account_title,
                                    'bank'=>$bank,
                                    'account_no'=>$account_no,
                                    'paypal_id'=>$paypal_id,
                                    'stripe_id'=>$stripe_id,
                                    'registered_as'=>$registered_as,
                                    'company_name'=>$company_name,
                                    'company_address'=>$company_address,
                                    'payment_option'=>$payment_option,
                                    'delivery_by'=>$delivery_by,
                                    'product_type'=>$product_collection
                                ]);
               if($update_seller_profile==true){
                   return response()->json('1');
               }else{
                return response()->json('2');
               }                 
               
    }

    public function update_contact_info(Request $request){
        $seller_id = Auth::guard('seller')->user()->id;
        $update_contact_info = Seller::where('id',$seller_id)
                                ->update([
                                    'contact_address'=>$request->contact_add,
                                    'zipcode'=>$request->zipcode,
                                    'city'=>$request->contact_city,
                                    'mobile'=>$request->mobileno                                    
                                ]);
           if($update_contact_info==true){
                        return response()->json('1');
             }else{
                        return response()->json('2');
               }     
        
    }

    public function upload_seller_docs(Request $request){
        $seller_id = Auth::guard('seller')->user()->id;
        if($request->hasFile('company_logo')){
            
        $company_logo = time().$request->file('company_logo')->getClientOriginalName();   
        $request->company_logo->move(public_path('uploads'), $company_logo);
        }else{
            $company_logo='';
        }
        if($request->hasFile('tradelicense')){
        $trade_license = time().$request->file('tradelicense')->getClientOriginalName();  
        $request->tradelicense->move(public_path('uploads'), $trade_license);
        }else{
            $trade_license = '';
        }
        if($request->hasFile('passport')){
        $passport = time().$request->file('passport')->getClientOriginalName();   
        $request->passport->move(public_path('uploads'), $passport);
        }else{
            $passport='';
        }

        if($request->hasFile('emirates_img')){
        $emirates_img = time().$request->file('emirates_img')->getClientOriginalName();  
        $request->emirates_img->move(public_path('uploads'), $emirates_img);
        }else{
            $emirates_img='';
        }

        if($request->hasFile('licenseimage')){
            $licenseimage = time().$request->file('licenseimage')->getClientOriginalName();  
            $request->licenseimage->move(public_path('uploads'), $licenseimage);
            }else{
                $licenseimage='';
            }

            if($request->hasFile('emirates_img_back')){
                $emirates_img_back = time().$request->file('emirates_img_back')->getClientOriginalName();  
                $request->emirates_img_back->move(public_path('uploads'), $emirates_img_back);
                }else{
                    $emirates_img_back='';
                }

        $existSellerDocs = SellerDoc::where('seller_id','=',$seller_id)->get();
        if(count($existSellerDocs)>0){
                    $update_docs = SellerDoc::where('seller_id','=',$seller_id)
                                    ->update([
                                        'name_of_license'=>$request->name_of_license,
                                        'license_no'=>$request->license_no,
                                        'license_exp_date'=>$request->exp,
                                        'company_logo'=>$company_logo,
                                        'trade_license_img'=>$trade_license,
                                        'passport_img'=>$passport,
                                        'emirates_id_img'=>$emirates_img,
                                        'license_img'=>$licenseimage,
                                        'emirates_back_img'=>$emirates_img_back
                                    ]);

                                  
                          if($update_docs==true){
                              return response()->json('1');
                          }else{
                              return response()->json('2');
                          }          
        }else{
                $newrecords = new SellerDoc;
                $newrecords->seller_id=$seller_id;
                $newrecords->name_of_license=$request->name_of_license;
                $newrecords->license_no=$request->license_no;
                $newrecords->license_exp_date=$request->exp;
                $newrecords->company_logo=$company_logo;
                $newrecords->trade_license_img=$trade_license;
                $newrecords->passport_img=$passport;
                $newrecords->emirates_id_img=$emirates_img;
                $newrecords->status='1';
                $newrecords->save();
                if($newrecords==true){
                    return response()->json('1');
                }else{
                    return response()->json('2');
                }

        }
                           
        
    }

    // profile management

    public function profilemgt(Request $request){
        $id = Auth::guard('seller')->user()->id;
        $completed = Auth::guard('seller')->user()->isCompleted;
        $getdata = SellerDoc::where('seller_id','=',$id)->first();       
        $cat = $this->listCategory();
        $membership = $this->listmembership();
        $choosen_plan = $this->choosenMembership();
        $online_directory = $this->online_directory();
        $marketplace = $this->online_marketplace();
        if($completed==1){
            // return view('sellerupdated.profile.complete_profile',compact('cat','membership','online_directory','marketplace'));
            return view('seller.complete_profile',compact('cat','membership','online_directory','marketplace'));
        }else{
            return view('sellerupdated.profile.profile',compact('getdata','choosen_plan'));
        }
    }
    public function membershipplan(Request $request)
    {
        $membership = $this->listmembership();
        $choosen_plan = $this->choosenMembership();
        $online_directory = $this->online_directory();
        $marketplace = $this->online_marketplace();
            return view('sellerupdated.profile.membership',compact('choosen_plan'));
    }
    public function product(){ 
        $added_seller = Auth::guard('seller')->user()->id;
        $cat = $this->listCategory();
        $subcat = $this->listSubCategory();  
        $choosen_plan = $this->choosenMembership();
        $varient = Varient_name::where('status','=','2')->orderBy('id','desc')->get();
        $attribute = VarientAttr::where('status','=','2')->orderBy('id','desc')->get();
        $sizes = Size::where('status','=','2')->orderBy('id','desc')->get();
        $services = $this->listServices();
        $product_list=Product::leftJoin('categories','categories.id','=','products.category')
                       ->leftJoin('sub_categories','sub_categories.id','=','products.subcategory')                       
                       ->select('products.*','categories.id as cat_id','sub_categories.id as subcat_id','categories.category_name as cat_name','sub_categories.category_name as subparent_id','subcat_name')
                       ->where('added_by_seller','=',$added_seller)
                       ->orderBy('products.id','desc')
                       ->get();
        if($choosen_plan)
        {
            if($choosen_plan['online_directory']==1 && $choosen_plan['marketplace']==0){
                return view('sellerupdated.service.allservices',compact('services'));
            }else{                   
                return view('sellerupdated.products.add_product',compact('cat','subcat','varient','attribute','sizes','product_list','choosen_plan'));
            }
        }else{
           return redirect()->route('seller.home')->with('warning','Your Plan is Not Active!');
        } 
    }

    public function editproduct($id)
    {
        $added_seller = Auth::guard('seller')->user()->id;
        $cat = $this->listCategory();
        $subcat = $this->listSubCategory();  
        $choosen_plan = $this->choosenMembership();
        $varient = Varient_name::where('status','=','2')->orderBy('id','desc')->get();
        $attribute = VarientAttr::where('status','=','2')->orderBy('id','desc')->get();
        $sizes = Size::where('status','=','2')->orderBy('id','desc')->get();
        $services = $this->listServices();
        $product = Product::find($id);
        return view('sellerupdated.products.edit_product',compact('product','cat','subcat','varient','attribute','sizes','choosen_plan'));
    }

    public function allproducts()
    {
        $added_seller = Auth::guard('seller')->user()->id;
        $product_list=Product::leftJoin('categories','categories.id','=','products.category')
                       ->leftJoin('sub_categories','sub_categories.id','=','products.subcategory')                       
                       ->select('products.*','categories.id as cat_id','sub_categories.id as subcat_id','categories.category_name as cat_name','sub_categories.category_name as subparent_id','subcat_name')
                       ->where('added_by_seller','=',$added_seller)
                       ->orderBy('products.id','desc')
                       ->get();
        return view('sellerupdated.products.allproducts',compact('product_list'));
    }
    

    // attribute with varient
    public function product_varient_attribute(Request $request){
        $varient = $request->varient;
        $varient_attribute = VarientAttr::where('varient_name','=',$varient)
                             ->where('status','=','2')
                             ->orderBy('id','desc')
                             ->get();
         return response()->json(['status'=>'200','msg'=>$varient_attribute]);                         
    }

    public function listCategory(){
        $cat = Category::where('status','=','2')->orderBy('id','desc')->get();
        return $cat;
    }

    public function listSubCategory(){
        $subcat = SubCategory::where('status','=','2')->orderBy('id','desc')->get();
        return $subcat;
    }

    // list sub category at product page

    public function listSubCat(Request $request){
        $subcat = SubCategory::where('category_name','=',$request->prod_cat)
                        ->where('status','=','2')
                        ->orderBy('id','desc')->get();
          if(count($subcat)>0){              
            return response()->json(["status"=>"200","msg"=>$subcat]);
          }else{
            return response()->json(["status"=>"400","msg"=>'1']); 
          }
    }

        // category 
        public function category(){
            $cat = Category::orderBy('id','desc')->get();
            return view('seller.category',compact('cat'));
        }
    
        // subcategory
    
        public function subcategory(){
            $cat = Category::where('status','=','2')->orderBy('id','desc')->get();
            $subcat = SubCategory::leftJoin('categories','sub_categories.category_name','=','categories.id')
                         ->select('categories.id as catid','sub_categories.id as subcatid','sub_categories.category_name as parentCat','sub_categories.status as subcat_status','categories.category_name as cat_name','categories.status as cat_status','subcat_name')   
                        ->orderBy('sub_categories.id','desc')
                        ->get();
            return view('seller.subcategory',compact('subcat','cat'));
        }
    
        // add category process
    
      
        public function addCategory(Request $request){
            $exitcat = Category::where('category_name','=',$request->catname)->get();
            if(count($exitcat)>0){
                return response()->json('1');
            }else{

                if($request->hasFile('caticon')){
                    $caticon = time().'.'.$request->caticon->extension();   
                    $request->caticon->move(public_path('products'), $caticon);
                }else{
                    $caticon='';
                } 

                $category = new Category;
                $category->category_name=$request->catname;
                $category->icon=$caticon;
                $category->status='1';
                $category->save();
                if($category==true){
                    return response()->json('2');
                }else{
                    return response()->json('3');
                }
            }
    }
        
    
        // category activate
    
        public function categoryActive(Request $request){
            $active = Category::where('id','=',$request->id)
                      ->update([
                          'status'=>'2'
                      ]);
              if($active==true){
                  return response()->json('1');
              }else{
                return response()->json('2');
              }              
        }
    
        // category deactive
    
        public function categorydeactive(Request $request){
            $active = Category::where('id','=',$request->id)
                      ->update([
                          'status'=>'1'
                      ]);
              if($active==true){
                  return response()->json('1');
              }else{
                return response()->json('2');
              }              
        }
    
        // category delete
    
        public function categoryDelete(Request $request){
            $category_delete = Category::where('id','=',$request->id)->delete();
            if($category_delete==true){
                return response()->json('1');
            }else{
                return response()->json('2'); 
            }
        }
    
        // category update
    
        public function categoryupdate(Request $request){

            if($request->hasFile('caticon')){
                $caticon = time().'.'.$request->caticon->extension();   
                $request->caticon->move(public_path('products'), $caticon);
                $active = Category::where('id','=',$request->catid)
                      ->update([
                          'category_name'=>$request->catname,
                          'icon'=>$caticon
                      ]);
            }else{
                $active = Category::where('id','=',$request->catid)
                      ->update([
                          'category_name'=>$request->catname
                      ]);
            } 
    
            
              if($active==true){
                  return response()->json('2');
              }else{
                return response()->json('3');
              }              
        }
    
        // add sub category
    
        public function addsubCategory(Request $request){
            $exitcat = SubCategory::where('subcat_name','=',$request->subcatname)->get();
            if(count($exitcat)>0){
                return response()->json('1');
            }else{
                $category = new SubCategory;
                $category->subcat_name=$request->subcatname;
                $category->category_name=$request->parentcat;
                $category->status='1';
                $category->save();
                if($category==true){
                    return response()->json('2');
                }else{
                    return response()->json('3');
                }
            }
    }
    
    // sub category active
    
    public function subcategoryActive(Request $request){
        $active = SubCategory::where('id','=',$request->id)
                  ->update([
                      'status'=>'2'
                  ]);
          if($active==true){
              return response()->json('1');
          }else{
            return response()->json('2');
          }              
    }
    
    // sub category deactive
    
    public function subcategoryDeactive(Request $request){
        $active = SubCategory::where('id','=',$request->id)
                  ->update([
                      'status'=>'1'
                  ]);
          if($active==true){
              return response()->json('1');
          }else{
            return response()->json('2');
          }              
    }
    
    // sub category delete
    
    public function subcategoryDelete(Request $request){
        $category_delete = SubCategory::where('id','=',$request->id)->delete();
        if($category_delete==true){
            return response()->json('1');
        }else{
            return response()->json('2'); 
        }
    }
    
    // update sub category
    
    public function subcategoryupdate(Request $request){
        $active = SubCategory::where('id','=',$request->subcat_id)
                  ->update([
                      'subcat_name'=>$request->subcatname,
                      'category_name'=>$request->parentcat
                  ]);
          if($active==true){
              return response()->json('2');
          }else{
            return response()->json('3');
          }              
    }
    
    // create varient 

public function varientAttribute(){
    $cat = Varient_name::orderBy('id','desc')->get();
    $varient_name = Varient_name::where('status','2')->orderBy('id','desc')->get();
    $attribute = VarientAttr::leftJoin('varient_names','varient_names.id','=','varient_attrs.varient_name')
                    ->select('varient_attrs.*','varient_names.id as varientid','varient_names.varient_name as varientName')
                    ->orderBy('id','desc')
                    ->get();
    return view('seller.varient',compact('cat','attribute','varient_name'));
}

    // add category process

public function Addvarient(Request $request){
       $varient_size = count($request->varient_name);
       for($i=0;$i<$varient_size;$i++){
           $exist_varient = Varient_name::where('varient_name','=',$request->varient_name[$i])->count();
           if($exist_varient>0){
               return back()->with('error','varient already exist');
               exit();
           }else{
               $varient = new Varient_name;
               $varient->varient_name=$request->varient_name[$i];
               $varient->status='1';
               $varient->save();
           }           
       } 
       
       if($varient==true){
           return back()->with('success','varient added successfull');
       }else{
           return back()->with('error','something went wrong');
       }
}


// varient activate

public function varientActive(Request $request){
    $id = decrypt($request->id);
    $active = Varient_name::where('id','=',$id)
              ->update([
                  'status'=>'2'
              ]);
      if($active==true){
          return back()->with('success','varient activated successfull');
      }else{
        return back()->with('error','something went wrong');
      }              
}

// varient deactive

public function varientdeactive(Request $request){
    $id = decrypt($request->id);
    $active = Varient_name::where('id','=',$id)
              ->update([
                  'status'=>'1'
              ]);
              if($active==true){
                return back()->with('success','varient deactivated successfull');
            }else{
              return back()->with('error','something went wrong');
            }              
}

// varient delete

public function varientDelete(Request $request){
    $id = decrypt($request->id);
    $category_delete = Varient_name::where('id','=',$id)->delete();
    if($category_delete==true){
        return back()->with('success','varient deleted successfull');
    }else{
        return back()->with('error','something went wrong');
    }
}

// varient update

public function varientupdate(Request $request){
    $active = VarientAttr::where('id','=',$request->catid)
              ->update([
                  'varient'=>$request->catname
              ]);
      if($active==true){
          return response()->json('2');
      }else{
        return response()->json('3');
      }              
}


// size attribute

public function AddattributeProcess(Request $request){
    $total_size = count($request->varient_name_id);
    for($i=0;$i<$total_size;$i++){
        $exist_attribute = VarientAttr::where('attribute_name','=',$request->attribute_name[$i])->count();
        if($exist_attribute>0){
            return back()->with('error','attribute already exists');
            exit();
        }else{
            $attribute = new VarientAttr;
            $attribute->varient_name=$request->varient_name_id[$i];
            $attribute->attribute_name=$request->attribute_name[$i];
            $attribute->status='1';
            $attribute->save();
        }
    }

    if($attribute==true){
        return back()->with('success','attribute added successfull');
    }else{
        return back()->with('error','something went wrong');
    }

}

// update size process

public function Sizeupdate(Request $request){
    $active = Size::where('id','=',$request->sizeid)
              ->update([
                  'size'=>$request->size
              ]);
      if($active==true){
          return response()->json('2');
      }else{
        return response()->json('3');
      }              
}

// varient activate

public function AttributeActive(Request $request){
    $activate_id = decrypt($request->id);
    $active = VarientAttr::where('id','=',$activate_id)
              ->update([
                  'status'=>'2'
              ]);
      if($active==true){
          return back()->with('success','attribute activated successfull');
      }else{
        return back()->with('error','something went wrong');
      }             
}

// varient deactive

public function Attributedeactive(Request $request){
    $activate_id = decrypt($request->id);
    $active = VarientAttr::where('id','=',$activate_id)
              ->update([
                  'status'=>'1'
              ]);
      if($active==true){
          return back()->with('success','attribute deactivated successfull');
      }else{
        return back()->with('error','something went wrong');
      }             
}

//Size delete

public function AttributeDelete(Request $request){
    $id = decrypt($request->id);
    $size_delete = VarientAttr::where('id','=',$id)->delete();
    if($size_delete==true){
        return back()->with('success','attribute deleted successfull');
    }else{
        return back()->with('error','something went wrong');
    }
}

    
    
    // add product process
    
    public function addProductProcess(Request $request){
    
        $added_by = Auth::guard('seller')->user()->id;
        $featured_img = time().'.'.$request->featured_img->extension();   
        $request->featured_img->move(public_path('products'), $featured_img);
        $returnrefundable = $request->returnrefundable;
        $warranty=$request->warranty;
        $insertProd = new Product;
        $insertProd->product_title=$request->prod_title;
        $insertProd->url=Cmf::shorten_url($request->prod_title);
        $insertProd->product_code=$request->prod_code;
        $insertProd->category=$request->prod_cat;
        $insertProd->subcategory=$request->prod_subcat;
        $insertProd->prod_price=$request->prod_price;
        $insertProd->sale_price=$request->sale_price;
        $insertProd->cast_price=$request->cost_price;
        $insertProd->prodict_unit=$request->prod_unit;
        $insertProd->stock_alert=$request->stock;
        $insertProd->short_desc=$request->short_desc;
        $insertProd->long_desc=$request->long_desc;
        $insertProd->varient='0';        
        $insertProd->featured_img=$featured_img;
        // $insertProd->video=$prod_video;
        $insertProd->warranty=$warranty;
        $insertProd->added_by_seller=$added_by;
        $insertProd->refund_return=$returnrefundable;
        $insertProd->save();
        if($request->product_gallery_img)
        {
            foreach($request->product_gallery_img as $r){
                $gallery = new productgallerimages();
                $gallery->product_id = $insertProd->id;
                $gallery->image = Cmf::sendimagetodirectory($r);
                $gallery->save();
            }
        }
        $last_id = $insertProd->id;
        if($request->variated == 'on')
        {
            $prod_att_price = $request->cprice;
            $lenth_prod = count($prod_att_price);
            for($i=0;$i<$lenth_prod;$i++){
                $image_attr = time().'.'.$request->image_attr[$i]->extension();   
                $request->image_attr[$i]->move(public_path('products'), $image_attr);
                $prod_attr = new Product_attr;
                $prod_attr->product_id=$last_id;
                $prod_attr->qty=$request->qty[$i];
                $prod_attr->price=$request->cprice[$i];
                $prod_attr->varient=$request->varient[$i];
                $prod_attr->attribute=$request->attribute[$i];
                $prod_attr->img_attr=$image_attr[$i];
                $prod_attr->save();
            }
        }
        

        
            // express delivery 

        $express_delivery = $request->express_delivery;
        $time_days = $request->timedays;
        $express_area = $request->selectarea;
        $cast = $request->cast;
        $toal_express_size = count($express_delivery);
        for($j=0;$j<$toal_express_size;$j++){
            $save_express = new ExpressDelivery;
            $save_express->product_id=$last_id;
            $save_express->express_delivery=$express_delivery[$j];
            $save_express->time_days=$time_days[$j];
            $save_express->delivery_area=$express_area[$j];
            $save_express->delivery_cast=$cast[$j];
            $save_express->save();
        }
    
    
        if($insertProd == true){
            return back()->with('success','product added successfull!');
        }else{
            return back()->with('error','something went wrong !'); 
        }
    }
    public function updateProductProcess(Request $request)
    {
        if($request->featured_img)
        {
            $featured_img = time().'.'.$request->featured_img->extension();   
            $request->featured_img->move(public_path('products'), $featured_img);
        }

        if($request->product_gallery_img)
        {
            foreach($request->product_gallery_img as $r){
                $gallery = new productgallerimages();
                $gallery->product_id = $request->product_id;
                $gallery->image = Cmf::sendimagetodirectory($r);
                $gallery->save();
            }
        }

        


        $insertProd = Product::find($request->product_id);
        $insertProd->product_title=$request->prod_title;
        $insertProd->url=Cmf::shorten_url($request->prod_title);
        $insertProd->product_code=$request->prod_code;
        $insertProd->category=$request->prod_cat;
        $insertProd->subcategory=$request->prod_subcat;
        $insertProd->prod_price=$request->prod_price;
        $insertProd->sale_price=$request->sale_price;
        $insertProd->cast_price=$request->cost_price;
        $insertProd->prodict_unit=$request->prod_unit;
        $insertProd->stock_alert=$request->stock;
        $insertProd->short_desc=$request->short_desc;
        $insertProd->long_desc=$request->long_desc;
        $insertProd->varient='0';   
        if($request->featured_img)
        {
            $insertProd->featured_img=$featured_img;
        }
        $insertProd->warranty=$request->warranty;
        $insertProd->refund_return=$request->returnrefundable;
        $insertProd->save();
        if($request->variated == 'on')
        {
            $prod_att_price = $request->cprice;
            $lenth_prod = count($prod_att_price);
            for($i=0;$i<$lenth_prod;$i++){
                $image_attr = time().'.'.$request->image_attr[$i]->extension();   
                $request->image_attr[$i]->move(public_path('products'), $image_attr);
                $prod_attr = new Product_attr;
                $prod_attr->product_id=$last_id;
                $prod_attr->qty=$request->qty[$i];
                $prod_attr->price=$request->cprice[$i];
                $prod_attr->varient=$request->varient[$i];
                $prod_attr->attribute=$request->attribute[$i];
                $prod_attr->img_attr=$image_attr[$i];
                $prod_attr->save();
            }
        }
        ExpressDelivery::where('product_id' , $request->product_id)->delete();
        $express_delivery = $request->express_delivery;
        $time_days = $request->timedays;
        $express_area = $request->selectarea;
        $cast = $request->cast;
        $toal_express_size = count($express_delivery);
        for($j=0;$j<$toal_express_size;$j++){
            $save_express = new ExpressDelivery;
            $save_express->product_id=$request->product_id;
            $save_express->express_delivery=$express_delivery[$j];
            $save_express->time_days=$time_days[$j];
            $save_express->delivery_area=$express_area[$j];
            $save_express->delivery_cast=$cast[$j];
            $save_express->save();
        }

        if($insertProd == true){
            return back()->with('success','product Updated Successfully');
        }else{
            return back()->with('error','something went wrong !'); 
        }
    }
    public function productActive(Request $request){
        $active = Product::where('id','=',$request->id)
                  ->update([
                      'status'=>'2'
                  ]);
          if($active==true){
              return response()->json('1');
          }else{
            return response()->json('2');
          }              
    }
    
    public function productdeactive(Request $request){
        $active = Product::where('id','=',$request->id)
                  ->update([
                      'status'=>'1'
                  ]);
          if($active==true){
              return response()->json('1');
          }else{
            return response()->json('2');
          }              
    }
    
    public function productDelete(Request $request){
        $category_delete = Product::where('id','=',$request->id)->delete();
        if($category_delete==true){
            return response()->json('1');
        }else{
            return response()->json('2'); 
        }
    }

    
// make product deals of the day,arrivals,top pics

public function productDfDAP(Request $request){
    $typeof_pr = $request->typeof_pr;
    $products = explode(',',$request->prod_id);
    foreach($products as $prod){
        $update = Product::where('id','=',$prod)->update([
            'prod_offer'=>$typeof_pr
        ]);
    }

    if($update==true){
        return response()->json('1');
    }else{
        return response()->json('2');
    }
}


    // buy membership plan

    public function membership(Request $request){
        
        $seller_id = Auth::guard('seller')->user()->id;           
            $title = $request->title;
            $amount = $request->amount;

            // create order
            
            $save_order = new Member_order;
            $save_order->seller_id=$seller_id;
            $save_order->plan_id=$request->plan_id;
            $save_order->status='1';
            $save_order->save();
            $last_order_id=$save_order->id;

            // create transaction table

            $membeship = new MembershipTransaction;
            $membeship->seller_id=$seller_id;
            $membeship->plan=$request->plan_id;
            $membeship->title=$title;
            $membeship->amount=$amount;
            $membeship->order_id=$last_order_id;
            $membeship->transaction_id=$request->payment_id;
            $membeship->status='2';
            $membeship->save();

            

            $updatestatus = Seller::where('id','=',$seller_id)->update([
                    'isMembership'=>'2',
                    'isCompleted'=>'2'
            ]);
            if($membeship==true){
                $update_order_status = Member_order::where('id','=',$last_order_id)->update([
                    'status'=>'2'
                ]);
                return response()->json('1');
            }else{
                return response()->json('2');
            }


    }


    // membership listing plans

    public function listmembership(){
        $membershiplist = Membership::where('status','=','2')
                            ->where('isAdons','=','1')
                            ->orderBy('id','asc')->get();
        return $membershiplist;
    }


    // online directory 
    public function online_directory(){
        $membershiplist = Membership::where('status','=','2')
                            ->where('online_directory','=','1')
                            ->orderBy('id','asc')->get();
        return $membershiplist;
    }

     // market place
     public function online_marketplace(){
        $membershiplist = Membership::where('status','=','2')
                            ->where('marketplace','=','1')
                            ->orderBy('id','asc')->get();
        return $membershiplist;
    }

    // adons membership

    public function AddonsPlans($plan_id){
        $Addons = Addon_plan::where('status','=','2')
                            ->where('plan_id','=',$plan_id)
                            ->orderBy('id','asc')->get();
        return $Addons;
    }


    // activated choosen membership by seller

    public function choosenMembership(){
        $seller_id = Auth::guard('seller')->user()->id;
        $choose = Member_order::leftJoin('memberships','memberships.id','=','member_orders.plan_id')
                   ->select('member_orders.id as membership_order_id','member_orders.status as member_status','memberships.*','member_orders.created_at as ordered_date')
                   ->where('member_orders.seller_id','=',$seller_id) 
                   ->where('member_orders.status','=','3')
                   ->first();
        return $choose;            
    }

    // plan with addons

    public function AddonsPlans_with_plan(){
        $Addons = Addon_plan::where('status','=','2')                            
                            ->orderBy('id','asc')->get();
        return $Addons;
    }


    // seller membership

    public function seller_membership(){
        $membership = $this->listmembership(); 
        $addon_with_plan = $this->AddonsPlans_with_plan();
        $online_directory = $this->online_directory();
        $marketplace = $this->online_marketplace();
        return view('seller.seller-memberships',compact('membership','addon_with_plan','online_directory','marketplace'));
    }
    public function sellermemberships(){
        $membership = $this->listmembership(); 
        $addon_with_plan = $this->AddonsPlans_with_plan();
        $online_directory = $this->online_directory();
        $marketplace = $this->online_marketplace();
        return view('sellerupdated.membership.sellermemberships',compact('membership','addon_with_plan','online_directory','marketplace'));
    }


    // seller upgrade packages

    public function upgradePackages(){  
       
        $membership = $this->listmembership();        
        $choosen =$this->choosenMembership();
        $addons = $this->AddonsPlans($choosen['id']);
        $addon_with_plan = $this->AddonsPlans_with_plan();
        $online_directory = $this->online_directory();
        $marketplace = $this->online_marketplace();
        return view('sellerupdated.upgradepackage.upgrade',compact('membership','addons','choosen','addon_with_plan','online_directory','marketplace'));
        
    }

    


    // upgrade membership  process

    public function upgrademembership_plan(Request $request){
            
            $seller_id = Auth::guard('seller')->user()->id;            
            $title = $request->title;
            $amount = $request->amount;

            $deactivate_cur_plant = Member_order::where('seller_id','=',$seller_id)->update([
                'status'=>'1'
            ]);
            // create order
            
            $save_order = new Member_order;
            $save_order->seller_id=$seller_id;
            $save_order->plan_id=$request->plan_id;
            $save_order->status='1';
            $save_order->save();
            $last_order_id=$save_order->id;

            // save transaction history

                $membeship = new MembershipTransaction;
                $membeship->seller_id=$seller_id;
                $membeship->plan=$request->plan_id;
                $membeship->title=$title;
                $membeship->amount=$amount;
                $membeship->order_id=$last_order_id;
                $membeship->transaction_id=$request->payment_id;
                $membeship->status='2';
                $membeship->save();
                $last_id=$membeship->id;
                $updatestatus = Seller::where('id','=',$seller_id)->update([
                        'isMembership'=>'2',
                        'isCompleted'=>'2'
                ]);

                

                if($membeship==true){
                    $update_order_status = Member_order::where('id','=',$last_order_id)->update([
                        'status'=>'2'
                    ]);
                    return response()->json('1');
                }else{
                    return response()->json('2');
                }
           


    }

    // strip payment gateway

    public function StripePayment(Request $request){
       Stripe\Stripe::setApiKey(Cmf::get_store_value('secret_stripe'));
       $test =  Stripe\Charge::create ([
                "amount" => $request->amount*100,
                "currency" => "AED",
                "source" => $request->stripeToken,
                "description" => "This payment is tested purpose"
        ]);
        if($test==true){
       return response()->json(["status"=>'200',"msg"=>$test]);
        }else{
            return response()->json('2');
        }
           
        
  
        
    }

    // orders details

    public function orders(){  
        
        $data = orderdetails::select(
            "orderdetails.order_id",
            "orders.order_number",
            "orderdetails.users",
            "orderdetails.newstatus",
            "orders.status",
            "orders.status",
            "orders.new_vendor_status",
            "orders.payment_method",
            "orders.created_at",
            "orders.id  as order_id",
            "orders.customer_id",
                  
                        )

            ->where('orderdetails.users'  ,Auth::user()->id)
            ->groupby('orderdetails.order_id')
            ->where('orders.status' ,'!=', 'payementpending')
            ->orderby('orders.id' , 'desc')
            ->leftJoin('orders', 'orderdetails.order_id', '=', 'orders.id')
            ->get();
        $orderdetails = orderdetails::all();
        return view('sellerupdated.orders.index')->with(array('data'=>$data,'orderdetails'=>$orderdetails)); 
    }

    // order details

public function order_details($id){
    $data = array('newstatus' => 0);
    DB::table('orderdetails')->where('order_id' , $id)->update($data);
    $data  = orders::where('payment_status' , 1)->where('id' , $id)->get()->first();
     $orderdetails = orderdetails::select(
            "orderdetails.id",
            "orderdetails.order_id",
            "orderdetails.product_id",
            "orderdetails.quantity",
            "orderdetails.price",
            "orders.order_number",
            "orderdetails.users",
            "products.product_title",
            "products.url",
            "products.sale_price",
            "sellers.shop_name",
                  
                        )
            ->leftJoin('orders', 'orderdetails.order_id', '=', 'orders.id')
            ->leftJoin('products', 'orderdetails.product_id', '=', 'products.id')
            ->where('order_id' , $id)
            ->where('users' , Auth::user()->id)
            ->leftJoin('sellers', 'orderdetails.users', '=', 'sellers.id')
            ->get();

    $orderstatus = orderstatus::where('order_id' , $id)->get();
    $address = DB::table('customer_addresses')->where('id'  , $data->addres_id)->get()->first();
    return view('sellerupdated.orders.detail')->with(array('data'=>$data,'address'=>$address,'orderdetails'=>$orderdetails,'orderstatus'=>$orderstatus));
}


public function changeorderstatus($id , $status)
{
    Cmf::changeorderstatus($id , $status);
    return redirect()->back()->with('message', 'Status Change Successfully.....' );
}

public function downloadinvoice($id)
{
    $orders = orders::where('payment_status' , 1)->where('id' , $id)->get()->first();
    if(!empty($orders))
    {
        $pdf = PDF::loadView('sellerupdated.orders.invoice', ['id'=>$orders->id,'created_at'=>$orders->created_at]);
        Storage::put('public/pdf/invoice.pdf', $pdf->output());
        return $pdf->download('OBEN( Order ID = '.$id.').pdf');
    }else{
        return response()->view('frontend.errors.404', [], 404);
    }
}

// order details with product

public function order_product($order){
    $order_id = $order;
    $seller_id = auth::guard('seller')->user()->id;
    $order_details = Order::leftJoin('products','products.id','=','orders.product_id')
                     ->select('orders.qty as quantity','sale_price','product_title','featured_img')
                     ->where('orders.id','=',$order_id)                     
                     ->get();
     return  $order_details;                  
}



// invoice generated

public function exportPDF(Request $request) {
    $order_id = decrypt($request->id); 
    $data = Order::leftJoin('customers','customers.id','=','orders.cust_id')
            ->leftJoin('customer_addresses','customer_addresses.id','=','orders.cust_add_id')
            ->leftJoin('transactions','transactions.order_id','=','orders.id')
            ->select('customers.id as custid','fname','lname','email','mobile','customer_addresses.id as addid','emirates','area','address','cart_id','transactions.id as trid','payment_id','transactions.amount as tramt','payment_mode','orders.status as ord_status','orders.seller_id as vendors','isDelivered','orders.id as orderid')
            ->where('orders.id','=',$order_id)
            ->first();
    $product_details = $this->order_product($order_id);                                    
   
   $pdf_doc = PDF::loadView('seller.invoice',compact('data','product_details'));
   return $pdf_doc->download('invoice.pdf');
} 



// plan checkout

public function planCheckout(Request $request){
    $seller_id = Auth::guard('seller')->user()->id;
    $plan_id = decrypt($request->plan_id);
    if($request->benefits==0){
        $selected_benefit=[];
    }else{
        $selected_benefit = $request->benefits;
    }
 
    $existorder = Member_order::where('plan_id','=',$plan_id)
                ->where('seller_id','=',$seller_id)
                ->where('status','=','3')
                ->count();
       if($existorder==0){
           $newplan_orders = Membership::where('id','=',$plan_id)->first();
           $plan_amount = $newplan_orders['amount'];          
           
       }else{
        $plan_amount=0;       
        
       }
       
    //    $emptysellerPlan = Member_order::where('seller_id','=',$seller_id)
    //                                     ->where('status','=','3')
    //                                     ->count();

    //      if($emptysellerPlan==0){
    //         $addons = [];
    //      }else{
    //         $addons = $this->AddonsPlans($plan_id);
    //      }       

    $addons = $this->AddonsPlans($plan_id);
    $assigned_coupon = $this->assignedCoupon($seller_id);
    return view('seller.plan_checkout',compact('plan_amount','selected_benefit','addons','plan_id','assigned_coupon'));
}

public function checkoutplan(Request $request){
    $seller_id = Auth::guard('seller')->user()->id;
    $plan_id = decrypt($request->plan_id);
    if($request->benefits==0){
        $selected_benefit=[];
    }else{
        $selected_benefit = $request->benefits;
    }
 
    $existorder = Member_order::where('plan_id','=',$plan_id)
                ->where('seller_id','=',$seller_id)
                ->where('status','=','3')
                ->count();
       if($existorder==0){
           $newplan_orders = Membership::where('id','=',$plan_id)->first();
           $plan_amount = $newplan_orders['amount'];          
           
       }else{
        $plan_amount=0;       
        
       }
       
    //    $emptysellerPlan = Member_order::where('seller_id','=',$seller_id)
    //                                     ->where('status','=','3')
    //                                     ->count();

    //      if($emptysellerPlan==0){
    //         $addons = [];
    //      }else{
    //         $addons = $this->AddonsPlans($plan_id);
    //      }       

    $addons = $this->AddonsPlans($plan_id);
    $assigned_coupon = $this->assignedCoupon($seller_id);
    return view('sellerupdated.checkout.checkoutplan',compact('plan_amount','selected_benefit','addons','plan_id','assigned_coupon'));
}
// save addon transaction 

public function addonTransaction(Request $request){
    $seller_id = Auth::guard('seller')->user()->id;
    $plan_id = explode(",",$request->plan_id);
    $regular_plan  = $request->reg_plan_id;
    $amount = $request->amount;
    $payment_id = $request->payment_id;
    $title = '';
    $coupon_id = $request->coupon_id;
    $total_size = count($plan_id);
   
    // existing plan 
    $existorder = Member_order::where('plan_id','=',$regular_plan)
                    ->where('seller_id','=',$seller_id)
                    ->where('status','=','3')
                    ->count();
                    
    // coupon code status change
    if($coupon_id!=0){
        $change_coupon_status = AssignCoupon::where('id','=',$coupon_id)->update([
            'status'=>'2'
        ]);
    }

// case 1 :when plan already exist and selected addons
    if($existorder!=0 && $total_size!=1){
    
   
    $orders = array();
    for($i=0;$i<$total_size;$i++){
        $saveorder = new Addon_order;
        $saveorder->plan_id=$plan_id[$i];
        $saveorder->seller_id=$seller_id;
        $saveorder->save(); 
        $orders[] = $saveorder->id;
        $last_id = $saveorder->id;        
        $save_trans = new Addon_transaction;
        $save_trans->order_id=$last_id;
        $save_trans->seller_id=$seller_id;
        $save_trans->payment_id=$payment_id;
        $save_trans->amount=$amount;
        $save_trans->status='2';
        $save_trans->save(); 
    }
    if($save_trans==true){
        $total_orders = count($orders);
        for($i=0;$i<$total_orders;$i++){
            $update_status = Addon_order::where('id','=',$orders[$i])->update([
                'status'=>'2'
            ]);
        }
        if($update_status==true){
            return response()->json(['status'=>'200','msg'=>'1']);
        }else{
            return response()->json(['status'=>'400','msg'=>'2']);
        }
    }else{
        return response()->json(['status'=>'400','msg'=>'3']);
    }

// case 2: when new selected regular plan with addons
}else if($existorder==0 && $total_size!=1){

    $deactivate_cur_plant = Member_order::where('seller_id','=',$seller_id)->update([
        'status'=>'4'
    ]);
    // create order
    
    $save_order = new Member_order;
    $save_order->seller_id=$seller_id;
    $save_order->plan_id=$regular_plan;
    $save_order->status='1';
    $save_order->save();
    $last_order_id=$save_order->id;

    // save transaction history

        $membeship = new MembershipTransaction;
        $membeship->seller_id=$seller_id;
        $membeship->plan=$regular_plan;
        $membeship->title=$title;
        $membeship->amount=$amount;
        $membeship->order_id=$last_order_id;
        $membeship->transaction_id=$request->payment_id;
        $membeship->status='2';
        $membeship->save();
        $last_id=$membeship->id;
        $updatestatus = Seller::where('id','=',$seller_id)->update([
                'isMembership'=>'1',
                'isCompleted'=>'2'
        ]);
        $change_Status = Member_order::where('id','=',$last_order_id)->where('seller_id','=',$seller_id)->update([
            'status'=>'2'
        ]);
        $orders = array();
        for($i=0;$i<$total_size;$i++){
            $saveorder = new Addon_order;
            $saveorder->plan_id=$plan_id[$i];
            $saveorder->seller_id=$seller_id;
            $saveorder->save(); 
            $orders[] = $saveorder->id;
            $last_id = $saveorder->id;        
            $save_trans = new Addon_transaction;
            $save_trans->order_id=$last_id;
            $save_trans->seller_id=$seller_id;
            $save_trans->payment_id=$payment_id;
            $save_trans->amount=$amount;
            $save_trans->status='2';
            $save_trans->save(); 
        }
        if($save_trans==true){
            $total_orders = count($orders);
            for($i=0;$i<$total_orders;$i++){
                $update_status = Addon_order::where('id','=',$orders[$i])->update([
                    'status'=>'2'
                ]);
            }
            if($update_status==true){
                return response()->json(['status'=>'200','msg'=>'1']);
            }else{
                return response()->json(['status'=>'400','msg'=>'2']);
            }
        }else{
            return response()->json(['status'=>'400','msg'=>'3']);
        }

// case 3. when new plan selected without addons
}else if($existorder==0 && $total_size==1){
    $deactivate_cur_plant = Member_order::where('seller_id','=',$seller_id)->update([
        'status'=>'4'
    ]);
    // create order
    
    $save_order = new Member_order;
    $save_order->seller_id=$seller_id;
    $save_order->plan_id=$regular_plan;
    $save_order->status='1';
    $save_order->save();
    $last_order_id=$save_order->id;

    // save transaction history

        $membeship = new MembershipTransaction;
        $membeship->seller_id=$seller_id;
        $membeship->plan=$regular_plan;
        $membeship->title=$title;
        $membeship->amount=$amount;
        $membeship->order_id=$last_order_id;
        $membeship->transaction_id=$request->payment_id;
        $membeship->status='2';
        $membeship->save();
        $last_id=$membeship->id;
        $updatestatus = Seller::where('id','=',$seller_id)->update([
                'isMembership'=>'2',
                'isCompleted'=>'2'
        ]);

        if($membeship==true){ 
            $change_Status = Member_order::where('id','=',$last_order_id)->where('seller_id','=',$seller_id)->update([
                'status'=>'2'
            ]);           
           
                return response()->json(['status'=>'200','msg'=>'1']);
            
        }else{
            return response()->json(['status'=>'400','msg'=>'3']);
        }

}

   
}


// coupon at checkout page
public function assignedCoupon($seller_id){
    $getassigned = AssignCoupon::leftJoin('coupons','coupons.id','=','assign_coupons.coupon_id')
                    ->select('coupons.*','assign_coupons.id as assignedID','assign_coupons.status as assigned_status')
                    ->where('assign_coupons.seller_id','=',$seller_id)                    
                    ->orderBy('assign_coupons.id','desc')
                    ->get();
     return $getassigned;               
}


// membership payment details

public function memberPayment(){
    $seller_id = Auth::guard('seller')->user()->id;
    $payment_details =Member_order::leftJoin('sellers','sellers.id','=','member_orders.seller_id')
                        ->leftJoin('membership_transactions','membership_transactions.order_id','=','member_orders.id')
                        ->leftJoin('memberships','memberships.id','=','member_orders.plan_id')
                      ->select('sellers.id as vendor_id','fname','lname','email','memberships.*','membership_transactions.transaction_id as paymentid','member_orders.status as planStatus')
                      ->where('member_orders.seller_id','=',$seller_id)
                      ->orderBy('member_orders.id','desc')
                      ->get();   
    return view('sellerupdated.payements.index',compact('payment_details'));
}

// assigned coupon

public function assignedCouponVendor(){
    $seller_id = Auth::guard('seller')->user()->id;
    $getAssigned_coupon=$this->assignedCoupon($seller_id);
    return view('seller.assignedCoupon',compact('getAssigned_coupon'));
}


// coupon code with amount
public function get_offer_coupon(Request $request){
    $seller_id = Auth::guard('seller')->user()->id;
    $coupon_code = $request->coupon_code;
    $coupons = Coupon::where('coupon_code','=',$coupon_code)                            
                            ->first();
     if($coupons){
         return response()->json(["status"=>"200","msg"=>$coupons]);
     }else{
        return response()->json(["status"=>"400","msg"=>"2"]);
     }                       
}

// design request 

public function designRequest(){
    $customNotification = CustomNotification::where('notificationType','=','request')->update([
        'status'=>'2'
    ]);  

    $designRequests = DesignRequest::leftJoin('customers','customers.id','=','design_requests.cust_id')
                        ->leftJoin('categories','categories.id','=','design_requests.cat_id')
                        ->leftJoin('sub_categories','sub_categories.id','=','design_requests.subcat_id')
                        ->select('fname','lname','email','categories.category_name as catname','subcat_name','design_requests.*')
                        ->orderBy('design_requests.id','desc')
                        ->get();
                    
    return view('sellerupdated.design.request',compact('designRequests'));
}

// submit proposal 

public function submitproposal(Request $request){
    $seller_id = Auth::guard('seller')->user()->id;
    $proposal = new RequestProposal;
    $proposal->request_id=$request->requestID;
    $proposal->vendor_id=$seller_id;
    $proposal->product_cost=$request->proposal_cost;
    $proposal->product_timeline=$request->praposal_timeline;
    $proposal->message=$request->proposal_desc;
    $proposal->save();
    if($proposal==true){
        return back()->with('success','proposal submited successfull');
        exit();
    }else{
        return back()->with('error','something went wrong');
        exit();
    }
}

// reject proposal 

public function rejectRequest(Request $request){
    $reqid = decrypt($request->id);
    $seller_id = Auth::guard('seller')->user()->id;
    $reject = DesignRequest::where('id','=',$reqid)->update([
        'status'=>'2',
        'byvendor'=>$seller_id
    ]);
    if($reject==true){
        return back()->with('success','request rejected successFull!');
        exit();
    }else{
        return back()->with('error','something went wrong');
        exit();
    }
}

// delete request

public function deleteRequest(Request $request){
    $reqid = decrypt($request->id);
    
    $add = new designdeleterequests();
    $add->request_id = $reqid;
    $add->user_id = Auth::guard('seller')->user()->id;
    $add->save();
    if($add==true){
        return back()->with('success','request deleted successFull!');
        exit();
    }else{
        return back()->with('error','something went wrong');
        exit();
    }
}


// accept request
public function acceptRequest(Request $request){
    $reqTitle = decrypt($request->reqtitle);
    $reqId = decrypt($request->id);
    $reqEmail = decrypt($request->reqemail);
    return view('sellerupdated.design.acceptRequest',compact('reqTitle','reqId','reqEmail'));
}


// submit accept form

public function requestAcceptMail(Request $request){  
        $seller_email = Auth::guard('seller')->user()->email;  
        $data = array('Request'=>$request->reqTitle,'email'=>$request->reqemail,'questions'=>$request->reqQuestions,'msg'=>$request->reqMsg);  
           
        $sendmail = Mail::send('seller.acceptReqmail', $data, function($message) use ($data,$seller_email) {
           $message->to($data['email'],$data['Request'])->subject
              ('Accept Request design product');
           $message->from('luxurybooking.ae@gmail.com','Oben');
           $message->replyTo($seller_email, 'oben');
        });

        
            return back()->with('success','accept request send successfull!');
            exit();
        
        
    
}

// view details

public function viewRequestDetails(Request $request){
    $requestId = decrypt($request->id);
    $designRequests = DesignRequest::leftJoin('customers','customers.id','=','design_requests.cust_id')
                        ->leftJoin('categories','categories.id','=','design_requests.cat_id')
                        ->leftJoin('sub_categories','sub_categories.id','=','design_requests.subcat_id')
                        ->select('fname','lname','email','categories.category_name as catname','subcat_name','design_requests.*')
                        ->where('design_requests.id','=',$requestId)
                        ->first();
    return view('sellerupdated.design.viewReqDetail',compact('designRequests'));
}



// cancel membership plan

public function cancelledPlan(Request $request){
    $memid = decrypt($request->memberid);
    $cancelled = Member_order::where('id','=',$memid)->update([
        'status'=>'4'
    ]);
$seller_id = Auth::guard('seller')->user()->id;
    $deactivate_plan = Seller::where('id','=',$seller_id)->update([
        'isMembership'=>'1'
    ]);
    if($cancelled==true){
        return back()->with('success','membership plan cancelled');
        exit();
    }else{
        return back()->with('error','something went wrong');
        exit();
    }
}

// add service

public function services(){
    $services = $this->listServices();
    return view('sellerupdated.service.allservices',compact('services'));
}

public function addService(){
    $categories = $this->listCategory();
    return view('sellerupdated.service.addservice',compact('categories'));
}


// list of services
public function listServices(){
    $seller_id = Auth::guard('seller')->user()->id;
    $services = Service::leftJoin('categories','categories.id','=','services.cat_id')
                ->leftJoin('sub_categories','sub_categories.id','=','services.subcat_id')
                ->select('services.*','categories.category_name as catname','subcat_name')
                ->where('services.seller_id','=',$seller_id)
                ->orderBy('services.id','desc')
                ->get();
       return $services;         
} 



// add service process

public function addserviceProcess(Request $request){
    $seller_id = Auth::guard('seller')->user()->id;
    $exist_service = Service::where('service_name','=',$request->service_title)->count();
    if($exist_service>0){
        return back()->with("error","service already exist");
        exit();
    }else{

        $service_img = time().'.'.$request->file('service_img')->getClientOriginalName();  
        $request->service_img->move(public_path('uploads'), $service_img);


        $service = new Service;
        $service->seller_id=$seller_id;
        $service->service_name=$request->service_title;
        $service->cat_id = $request->category;
        $service->subcat_id=$request->sub_cat;
        $service->image=$service_img;
        $service->contact_details=$request->contact_details;
        $service->save();
        if($service==true){
            return back()->with("message",'service added successFull!');
            exit();
        }else{
            return back()->with("warning",'something went wrong');
            exit();
        }
    }
}


// delete services

public function servicesDelete(Request $request){
    $service_id = decrypt($request->id);
    $service_delete = Service::where('id','=',$service_id)->delete();
    if($service_delete==true){
        return back()->with("success",'service deleted successfull');
        exit();
    }else{
        return back()->with("error",'something went wrong');
        exit();
    }
}

// fetch notification

public function customNotification(Request $request){
    $seller_id = Auth::guard('seller')->user()->id;
    $orders = CustomNotification::where('seller_id','=',$seller_id)
                ->where('notificationType','=','orders')
               ->where('status','=','1')
               ->count(); 
    $design_requests = CustomNotification::where('notificationType','=','request')
                    ->where('status','=','1')->count();
    $notifications = $orders+$design_requests;
    return response()->json(["status"=>"200","msg"=>$notifications,"orders"=>$orders,"requests"=>$design_requests]); 
}


// update profile

public function updateprofile_bnak(Request $request){
    $sellerid = Auth::guard('seller')->user()->id;
    $update_bank = Seller::where('id','=',$sellerid)->update([
        'payment_option'=>$request->payment_option,
        'account_title'=>$request->accountTitle,
        'bank'=>$request->banktype,
        'account_no'=>$request->ibanno,
        'paypal_id'=>$request->paypal,
        'stripe_id'=>$request->stripe_id,
        'email'=>$request->vendor_email,
        'emirates_id'=>$request->emirates_id,
        'mobile'=>$request->venmobile,
        'contact_address'=>$request->venaddress,
        'zipcode'=>$request->venzipcode,
        'city'=>$request->vencity,
        'company_name'=>$request->cmp_name,
        'company_address'=>$request->cmd_address        
    ]);
    $update_other = SellerDoc::where('seller_id','=',$sellerid)->update([
        'name_of_license'=>$request->license_name,
        'license_no'=>$request->license_no,
        'license_exp_date'=>$request->license_expiry
    ]);
    if($update_bank == true){
        return response()->json("1");
        exit();
    }else{
        return response()->json("2");
        exit();
    }
}


// add description

public function description(){
    $seller_id = Auth::guard('seller')->user()->id;
    $descriptions = SellerDoc::where('seller_id','=',$seller_id)->first();
    return view('seller.add_description',compact('descriptions'));
}

public function add_description_process(Request $request){
    $seller_id = Auth::guard('seller')->user()->id;
    $desc = $request->desc;
    $update_description = SellerDoc::where('seller_id','=',$seller_id)->update([
        'description'=>$desc
    ]);
    if($update_description==true){
        return back()->with('success','description added successfull');
        exit();
    }else{
        return back()->with('error','something went wrong');
        exit();
    }
}


// submitted proposal 

public function submitted_proposal(){
    $seller_id = Auth::guard('seller')->user()->id;
    $proposals = RequestProposal::leftJoin('design_requests','design_requests.id','=','request_proposals.request_id')
                ->leftJoin('customers','customers.id','design_requests.cust_id')
                ->select('request_proposals.*','product_name','fname','lname','email')
                ->where('request_proposals.vendor_id','=',$seller_id)
                ->orderBy('request_proposals.id')
                ->get();
    return view('sellerupdated.proposal.index',compact('proposals'));
}


    




}
