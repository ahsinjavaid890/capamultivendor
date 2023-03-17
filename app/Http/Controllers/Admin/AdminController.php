<?php

namespace App\Http\Controllers\Admin;
use App\Helpers\Cmf;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Seller;
use App\Models\SellerDoc;
use App\Models\Customer;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\VarientAttr;
use App\Models\Product;
use App\Models\MembershipTransaction;
use App\Models\Membership;
use App\Models\orders;
use App\Models\designdeleterequests;
use App\Models\Transaction;
use App\Models\orderdetails;
use App\Models\orderstatus;
use App\Models\Size;
use App\Models\Product_attr;
use App\Models\Order_detail;
use App\Models\Addon_plan;
use App\Models\Member_order;
use App\Models\Addon_order;
use App\Models\Varient_name;
use App\Models\Coupon;
use App\Models\AssignCoupon;
use App\Models\DesignRequest;
use App\Models\RequestProposal;
use App\Models\ExpressDelivery;
use App\Models\ReturnRequest;
use App\Models\CustomNotification;
use App\Models\GuestUser;
use App\Models\GuestOrder;
use App\Models\Banner;
use App\Models\Service;
use App\Models\blogs;
use App\Models\productgallerimages;
use App\Models\allbrands;
use PDF;
use Mail;
use DB;
use Storage;
class AdminController extends Controller
{
    //

    public function dashboard(){
    //     $seller = Seller::orderBy('id','desc')->count();
    //     $activeVendor = Seller::where('status','=','2')->count();
    //     $pendingvendor = Seller::where('status','=','1')->count();
    //     $cust = Customer::orderBy('id','desc')->count();
    //     $orders = $this->orderDetails();
    //     $total_orders = count($orders);
    //     $cancelled = Order::where('status','=','3')->count();
    //     $delivered = Order::where('isDelivered','=','2')->count();
    //     $product = Product::count();
    //     $membership = Membership::count();
    //     $membership_active = Membership::where('status','=','2')->count();
    //     $totalcoupons = Coupon::count();
    //     $couponActive = Coupon::where('status','=','2')->count();
    //     $couponDeactivate = Coupon::where('status','=','3')->count();
    //     $couponpending = Coupon::where('status','=','1')->count();

    //     $ordersnotification = CustomNotification::where('notificationType','=','orders')
    //            ->where('status','=','1')
    //            ->count(); 
    // $design_requests_notification = CustomNotification::where('notificationType','=','request')
    //                                 ->where('status','=','1')->count();

        // return view('admin.dashboard',compact('seller','cust','total_orders','cancelled','delivered','product','activeVendor','pendingvendor','membership_active','membership','totalcoupons','couponActive','couponDeactivate','couponpending','ordersnotification','design_requests_notification'));

        return view('adminupdated.dashboard.index');
    }

    public function sellers(){
        $seller = Seller::orderBy('id','desc')->get();
        return view('adminupdated.seller.seller',compact('seller'));
    }

    public function customers(){
        $cust = Customer::orderBy('id','desc')->get();
        return view('adminupdated.customer.customers',compact('cust'));
    }

    public function updatecustomer(Request $request){
            $customerid = $request->cus_id;
            $update_customer = Customer::where('id','=',$customerid)->update([
                'fname'=>$request->fname,
                'lname'=>$request->lname,
                'email'=>$request->email,
                'mobile'=>$request->mobile,
            ]);
            if($update_customer==true){
                return back()->with('success','Customer Updated successfull');
            }else{
                return back()->with('error','something went wrong');
            }
        }
      
        
    // activate vendor

    public function vendorActive(Request $request){
        $active = Seller::where('id','=',$request->id)
                  ->update([
                      'status'=>'2'
                  ]);
          if($active==true){
              return response()->json('1');
          }else{
            return response()->json('2');
          }              
    }

    // deactivate vendor

    public function vendorDeactive(Request $request){
        $active = Seller::where('id','=',$request->id)
                  ->update([
                      'status'=>'1'
                  ]);
          if($active==true){
              return response()->json('1');
          }else{
            return response()->json('2');
          }              
    }

    // vendor delete

    public function vendorDelete(Request $request){
        $vendor_delete = Seller::where('id','=',$request->id)->delete();
        if($vendor_delete==true){
            return response()->json('1');
        }else{
            return response()->json('2'); 
        }
    }

    // customer activate

    public function customerActive(Request $request){
        $active = Customer::where('id','=',$request->id)
                  ->update([
                      'status'=>'2'
                  ]);
          if($active==true){
              return response()->json('1');
          }else{
            return response()->json('2');
          }              
    }

    // customer deactivate

    public function customerDeactive(Request $request){
        $active = Customer::where('id','=',$request->id)
                  ->update([
                      'status'=>'1'
                  ]);
          if($active==true){
              return response()->json('1');
          }else{
            return response()->json('2');
          }              
    }

    // customer delete

    public function customerDelete(Request $request){
        $vendor_delete = Customer::where('id','=',$request->id)->delete();
        if($vendor_delete==true){
            return response()->json('1');
        }else{
            return response()->json('2'); 
        }
    }

    public function product(){ 
        $cat = $this->listCategory();
        $subcat = $this->listSubCategory();  
        $varient = Varient_name::where('status','=','2')->orderBy('id','desc')->get();
        $attribute = VarientAttr::where('status','=','2')->orderBy('id','desc')->get();
        $sizes=[];
        
        $product_list=Product::leftJoin('categories','categories.id','=','products.category')
                       ->leftJoin('sub_categories','sub_categories.id','=','products.subcategory')                       
                       ->select('products.*','categories.id as cat_id','sub_categories.id as subcat_id','categories.category_name as cat_name','sub_categories.category_name as subparent_id','subcat_name')
                       ->orderBy('products.id','desc')
                       ->get();    
        return view('adminupdated.product.add_product',compact('cat','subcat','varient','attribute','sizes','product_list'));
    }
    public function editproduct($id)
    {
        $cat = $this->listCategory();
        $subcat = $this->listSubCategory();  
        $varient = Varient_name::where('status','=','2')->orderBy('id','desc')->get();
        $attribute = VarientAttr::where('status','=','2')->orderBy('id','desc')->get();
        $sizes = Size::where('status','=','2')->orderBy('id','desc')->get();
        $services = $this->listServices();
        $product = Product::find($id);
        return view('adminupdated.product.editproduct',compact('product','cat','subcat','varient','attribute','sizes'));
    }

    public function allproducts()
    {
        $cat = $this->listCategory();
        $subcat = $this->listSubCategory();  
        $varient = Varient_name::where('status','=','2')->orderBy('id','desc')->get();
        $attribute = VarientAttr::where('status','=','2')->orderBy('id','desc')->get();
        $sizes=[];
        
        $product_list=Product::leftJoin('categories','categories.id','=','products.category')
                       ->leftJoin('sub_categories','sub_categories.id','=','products.subcategory')                       
                       ->select('products.*','categories.id as cat_id','sub_categories.id as subcat_id','categories.category_name as cat_name','sub_categories.category_name as subparent_id','subcat_name')
                       ->orderBy('products.id','desc')
                       ->get();    
        return view('adminupdated.product.allproducts',compact('cat','subcat','varient','attribute','sizes','product_list'));
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
        return response()->json(["status"=>"200","msg"=>$subcat]);
    }

    // category 
    public function category(){
        $cat = Category::orderBy('id','desc')->get();
        return view('adminupdated.categories.category',compact('cat'));
    }

    // subcategory

    public function subcategory(){
        $cat = Category::where('status','=','2')->orderBy('id','desc')->get();
        $subcat = SubCategory::leftJoin('categories','sub_categories.category_name','=','categories.id')
                     ->select('categories.id as catid','sub_categories.id as subcatid','sub_categories.category_name as parentCat','sub_categories.status as subcat_status','categories.category_name as cat_name','categories.status as cat_status','subcat_name')   
                    ->orderBy('sub_categories.id','desc')
                    ->get();
        return view('adminupdated.categories.subcategory',compact('subcat','cat'));
    }

    // add category process

    public function addCategory(Request $request){
            $exitcat = Category::where('category_name','=',$request->catname)->get();
            if(count($exitcat)>0){
                return back()->with('error','Category already exist');
            }else{

                if($request->hasFile('caticon')){
                    $caticon = time().'.'.$request->caticon->extension();   
                    $request->caticon->move(public_path('products'), $caticon);
                }else{
                    $caticon='';
                } 

                $category = new Category;
                $category->category_name=$request->catname;
                $category->url=Cmf::shorten_url($request->catname);
                $category->icon=$caticon;
                $category->show_on_homepage=$request->show_on_homepage;
                $category->status='1';
                $category->save();
                if($category==true){
                    return back()->with('success','Category added successfull');
                }else{
                   return back()->with('error','Category Not Added');
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
                      'icon'=>$caticon,
                      'show_on_homepage'=>$request->show_on_homepage
                  ]);
        }else{
            $active = Category::where('id','=',$request->catid)
                  ->update([
                      'category_name'=>$request->catname,
                      'show_on_homepage'=>$request->show_on_homepage
                  ]);
        } 

        
          if($active==true){
            return back()->with('success','Category Updated Successfully');
              return response()->json('2');
          }else{

            return back()->with('error','Something Went Wrong');
          }              
    }

    // add sub category

    public function addsubCategory(Request $request){
        $exitcat = SubCategory::where('subcat_name','=',$request->subcatname)->get();
        if(count($exitcat)>0){
            return back()->with('error','Sub Category already exist');
        }else{
            $category = new SubCategory;
            $category->subcat_name=$request->subcatname;
            $category->url=Cmf::shorten_url($request->subcatname);
            $category->category_name=$request->selectcat;
            $category->status='1';
            $category->save();
            if($category==true){
            return back()->with('success','Sub Category Added Successfully');
            }else{
            return back()->with('error','Sub Category Not Added');
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
                  'category_name'=>$request->selectcat
              ]);
      if($active==true){
            return back()->with('success','Sub Category Updated Successfully');
      }else{
            return back()->with('error','Sub Category Not Updated');
      }              
}

// Brands


public function allbrands()
{
    $data = allbrands::all();
    return view('adminupdated.brands.all')->with(array('data'=>$data));
}

public function addbrand(Request $request)
{

    $exitcat = allbrands::where('name','=',$request->name)->get();
    if(count($exitcat)>0){
        return back()->with('error','Brand already exist');
    }else{
        $add = new allbrands();
        $add->name = $request->name;
        if($request->icon)
        {
            $add->icon = Cmf::sendimagetodirectory($request->icon);    
        }
        $add->save();
        return back()->with('success','Brand Added Successfully');
    }
    
}

public function updatebrand(Request $request)
{
    $add = allbrands::find($request->id);
    $add->name = $request->name;
    if($request->icon)
    {
        $add->icon = Cmf::sendimagetodirectory($request->icon);    
    }
    $add->save();
    return back()->with('success','Brand Updated Successfully');
}


// create varient 

public function varientAttribute(){
    $cat = Varient_name::orderBy('id','desc')->get();
    $varient_name = Varient_name::where('status','2')->orderBy('id','desc')->get();
    $attribute = VarientAttr::leftJoin('varient_names','varient_names.id','=','varient_attrs.varient_name')
                    ->select('varient_attrs.*','varient_names.id as varientid','varient_names.varient_name as varientName')
                    ->orderBy('id','desc')
                    ->get();
    return view('adminupdated.varients.varient',compact('cat','attribute','varient_name'));
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


    $added_by = Auth::guard('admin')->user()->id;
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
    $insertProd->cast_price=0;
    $insertProd->prodict_unit=$request->prod_unit;
    $insertProd->stock_alert=$request->stock;
    $insertProd->short_desc=$request->short_desc;
    $insertProd->long_desc=$request->long_desc;
    $insertProd->varient='0';        
    $insertProd->featured_img=$featured_img;
    $insertProd->status=2;
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
    

    
        // express delivery 

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
        $insertProd->save();



        if($insertProd == true){
            return back()->with('success','Product Updated Successfully');
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
    $prod_attr_delete = Product_attr::where('product_id','=',$request->id)->delete();
    if($category_delete==true){
        return response()->json('1');
    }else{
        return response()->json('2'); 
    }
}
// update membership plane //

public function allmembership(){
    $membership = Membership::orderBy('id','desc')->get();
    return view('adminupdated.membership.allmembership',compact('membership'));
}

// membership 


public function membership(){
    $membership = Membership::orderBy('id','desc')->get();
    return view('admin.membership',compact('membership'));
}

// create membership

public function create_membership(){
    return view('admin.create_membership');
}
public function createmembership(){
    return view('adminupdated.membership.createmembership');
}
// add membership process

public function addmemProcess(Request $request){
    $existplan = Membership::where('title','=',$request->plan_title)->get();
    if(count($existplan)>0){
        return back()->with('error','plan already exists');
    }else{
        $title = $request->plan_title;
        $amount = $request->amount;
        $desc = $request->plan_details;
        $plans = new Membership;        
        $plans->title=$title;
        $plans->amount=$amount;
        $plans->noproducts=$request->no_of_product;
        $plans->description=$desc;
        $plans->online_directory=$request->onlinedirectory;
        $plans->marketplace=$request->marketplace;
        $plans->isAdons=$request->plan_type;
        $plans->save();
        if($plans==true){
            return back()->with('success','plans created successfull');
        }else{
            return back()->with('error','something went wrong');
        }
    }
}

// membership activate

public function membershipActive(Request $request){
    $active = Membership::where('id','=',$request->id)
              ->update([
                  'status'=>'2'
              ]);
      if($active==true){
          return response()->json('1');
      }else{
        return response()->json('2');
      }              
}

// membership deactivate

public function membershipDeActive(Request $request){
    $active = Membership::where('id','=',$request->id)
              ->update([
                  'status'=>'1'
              ]);
      if($active==true){
          return response()->json('1');
      }else{
        return response()->json('2');
      }              
}

// membership delete 

public function membershipDelete(Request $request){
    $category_delete = Membership::where('id','=',$request->id)->delete();
    if($category_delete==true){
        return response()->json('1');
    }else{
        return response()->json('2'); 
    }
}

// update membership

public function update_membership(Request $request){
    $plan_id = decrypt($request->plan);
    $membership  = Membership::where('id',$plan_id)->first();
    return view('admin.update_membership',compact('membership','plan_id'));
}
public function updatemembership(Request $request){
    $plan_id = decrypt($request->plan);
    $membership  = Membership::where('id',$plan_id)->first();
    return view('adminupdated.membership.updatemembership',compact('membership','plan_id'));
}
// update process membership

public function updateMembershipProcess(Request $request){
    $plan = $request->plan_id;
    $update_plan = Membership::where('id',$plan)->update([
        'title'=>$request->plan_title,
        'amount'=>$request->amount,
        'noproducts'=>$request->no_of_product,
        'description'=>$request->plan_details,
        'online_directory'=>$request->onlinedirectory,
        'marketplace'=>$request->marketplace,
        'isAdons'=>$request->plan_type
    ]);
    if($update_plan==true){
        return back()->with('success','plans Updated successfull');
    }else{
        return back()->with('error','something went wrong');
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

// view vendors 

public function choosenMembership($vendors){
    $seller_id = $vendors;
    $choose = Membership::leftJoin('membership_transactions','memberships.id','=','membership_transactions.plan')
               ->select('memberships.id as membership_id','membership_transactions.id as trmem_id','memberships.status as member_status','membership_transactions.status as tr_status','order_id','transaction_id','plan','memberships.title as plan_title','memberships.amount as plan_amount','noproducts','description')
               ->where('membership_transactions.seller_id','=',$seller_id) 
               ->where('membership_transactions.status','=','2')
               ->first();
     return $choose;          
}
// New all addons Plan //

public function allAddons(){
    $getdata = Addon_plan::leftJoin('memberships','memberships.id','addon_plans.plan_id')
                    ->select('addon_plans.*','memberships.title')
                    ->orderBy('addon_plans.id','desc')                    
                    ->get();
    return view('adminupdated.membership.alladdons',compact('getdata'));
}
// view addons plan

public function viewAddons(){
    $getdata = Addon_plan::leftJoin('memberships','memberships.id','addon_plans.plan_id')
                    ->select('addon_plans.*','memberships.title')
                    ->orderBy('addon_plans.id','desc')                    
                    ->get();
    return view('admin.viewaddon',compact('getdata'));
}


// New addons Plane //

public function newaddons(){
    $plans = Membership::orderBy('id','desc')->where('status','=','2')->get();
    return view('adminupdated.membership.newaddons',compact('plans'));
}
// addons plan 

public function addons(){
    $plans = Membership::orderBy('id','desc')->where('status','=','2')->get();
    return view('admin.addons',compact('plans'));
}

// add add-ons process

public function addnsprocess(Request $request){
    $plan_id = $request->plan_type;
    $benefits = $request->benefits;
    $total_size = count($benefits);
    for($i=0;$i<$total_size;$i++){
        $addons = new Addon_plan;
        $addons->plan_id=$plan_id;
        $addons->benefits=$request->benefits[$i];
        $addons->qty=$request->qty[$i];
        $addons->price=$request->price[$i];
        $addons->save();
    }

    if($addons==true){
        return back()->with('success','Add-ons created successfull');
    }else{
        return back()->with('error','something went wrong');
    }
}

// activate addons

public function activateAddons(Request $request){
    $addon_id = $request->id;
    $activate_plans = Addon_plan::where('id','=',$addon_id)->update([
        'status'=>'2'
    ]);

    if($activate_plans==true){
        return response()->json('1');
    }else{
        return response()->json('2');
    }

}

// deactivate addons

public function deactivateAddons(Request $request){
    $addon_id = $request->id;
    $activate_plans = Addon_plan::where('id','=',$addon_id)->update([
        'status'=>'1'
    ]);

    if($activate_plans==true){
        return response()->json('1');
    }else{
        return response()->json('2');
    }

}

// delete addons

public function AdonsDelete(Request $request){
    $category_delete = Addon_plan::where('id','=',$request->id)->delete();
    if($category_delete==true){
        return response()->json('1');
    }else{
        return response()->json('2'); 
    }
}


public function viewVendors(Request $request){
    $vendors_id = decrypt($request->seller);
    $vendors = Seller::leftJoin('seller_docs','seller_docs.seller_id','=','sellers.id')
                ->select('sellers.*','seller_docs.id as docid','name_of_license','license_no','license_exp_date','company_logo','trade_license_img','passport_img','emirates_id_img','license_img','emirates_back_img')
                ->where('sellers.id','=',$vendors_id)
                ->first();
                $chooseplan = $this->choosenMembership($vendors_id);
                return view('adminupdated.seller.sellerdetail',compact('vendors','chooseplan'));

}


// edit vendor 

public function editVendor($id , $type){
    $vendors_id = $id;
    $vendors = Seller::leftJoin('seller_docs','seller_docs.seller_id','=','sellers.id')
                ->select('sellers.*','seller_docs.id as docid','name_of_license','license_no','license_exp_date','company_logo','trade_license_img','passport_img','emirates_id_img','license_img','emirates_back_img')
                ->where('sellers.id','=',$vendors_id)
                ->first();
    $chooseplan = $this->choosenMembership($vendors_id);

    if($type == 'basic')
    {
        return view('adminupdated.seller.editseller',compact('vendors','chooseplan','type'));
    }

    if($type == 'contact')
    {
        return view('adminupdated.seller.editsellercontact',compact('vendors','chooseplan','type'));
    }
    

}

// update process 

public function updatevendorprocess(Request $request){   
      $vendorid = $request->id; 

      $update_vendors = Seller::where('id','=',$vendorid)->update([
          'fname'=>$request->fname,
          'lname'=>$request->lname,
          'email'=>$request->email,
          'mobile'=>$request->mobile,
          'emirates_id'=>$request->emiratesid,
          'account_title'=>$request->accounttitle,
          'bank'=>$request->banktype,
          'account_no'=>$request->accountno,
          'registered_as'=>$request->registeras,
          'company_name'=>$request->companyname,
          'company_address'=>$request->companyadd,
          'payment_option'=>$request->paymentoption,
          'delivery_by'=>$request->delivery
          // 'contact_address'=>$request->vendoradd,
          // 'zipcode'=>$request->pincode,
          // 'city'=>$request->city
        ]);
        
        // $update_doc = SellerDoc::where('seller_id','=',$vendorid)->update([
        //     'name_of_license'=>$request->license_name,
        //     'license_no'=>$request->license_no,
        //     'license_exp_date'=>$request->license_exp
        // ]);

        if($update_vendors==true){
            return back()->with('success','vendor updated successfull !');
        }else{
            return back()->with('error','something went wrong!');
        }
         




}
// membership payment details

public function memberPayment(){
    $payment_details =Member_order::leftJoin('sellers','sellers.id','=','member_orders.seller_id')
                        ->leftJoin('membership_transactions','membership_transactions.order_id','=','member_orders.id')
                        ->leftJoin('memberships','memberships.id','=','member_orders.plan_id')
                      ->select('sellers.id as vendor_id','fname','lname','email','memberships.*','membership_transactions.transaction_id as paymentid','member_orders.status as planStatus')
                      ->orderBy('member_orders.id','desc')
                      ->get();   
    return view('adminupdated.payements.membership',compact('payment_details'));
}

// orders 

public function orders(){
    $data  = orders::where('payment_status' , 1)->where('status' , '!=' ,'payementpending' )->orderby('id' , 'desc')->paginate(10);
    $orderdetails = orderdetails::all();
    return view('adminupdated.orders.index')->with(array('data'=>$data,'orderdetails'=>$orderdetails));  
}


// orders details

public function orderDetails(){
    $order = Order::leftJoin('customers','customers.id','=','orders.cust_id')
            ->leftJoin('customer_addresses','customer_addresses.id','=','orders.cust_add_id')
            ->leftJoin('transactions','transactions.order_id','=','orders.id')
            ->select('customers.id as custid','fname','lname','email','mobile','customer_addresses.id as addid','emirates','area','address','cart_id','transactions.id as trid','payment_id','transactions.amount as tramt','payment_mode','orders.status as ord_status','orders.seller_id as vendors','isDelivered','orders.id as orderid')
            ->orderBy('orders.id','desc')
            ->get();
           

            return $order;
            
            
}


// cancel order by admin


public function cancelled(Request $request){
    $cancelled = Order::where('id','=',$request->cancel)->update([
        "status"=>"3"
    ]);
    if($cancelled == true){
        return back()->with('success','order cancelled successFull!');
    }else{
        return back()->with('error','something went wrong!');
    }
}


// delivered order 

public function delivered(Request $request){
    $cancelled = Order::where('id','=',$request->delivery)->update([
        "isDelivered"=>"2"
    ]);
    if($cancelled == true){
        return back()->with('success','order delivered successFull!');
    }else{
        return back()->with('error','something went wrong!');
    }
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
            ->leftJoin('sellers', 'orderdetails.users', '=', 'sellers.id')
            ->get();

    $orderstatus = orderstatus::where('order_id' , $id)->get();
    $address = DB::table('customer_addresses')->where('id'  , $data->addres_id)->get()->first();
    return view('adminupdated.orders.detail')->with(array('data'=>$data,'address'=>$address,'orderdetails'=>$orderdetails,'orderstatus'=>$orderstatus));
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
    $order_details = Order::leftJoin('products','products.id','=','orders.product_id')
                     ->select('orders.qty as quantity','sale_price','product_title','featured_img')
                     ->where('orders.id','=',$order_id)
                     ->get();
     return  $order_details;                  
}
// invoice

public function invoice()
{    
    return view('admin.invoice');
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
   
   $pdf_doc = PDF::loadView('admin.invoice',compact('data','product_details'));
   return $pdf_doc->download('invoice.pdf');
} 


// membership plan details of vendor

public function vendor_membership(Request $request){
    $vendor_id =  decrypt($request->id);
    $membership=Member_order::leftJoin('memberships','member_orders.plan_id','=','memberships.id')
                ->select('member_orders.id as order_id','member_orders.status as order_status','memberships.*')
                ->where('member_orders.seller_id','=',$vendor_id)
                ->orderBy('member_orders.id','desc')->get();
    $Addon_membership=Addon_order::leftJoin('addon_plans','addon_orders.plan_id','=','addon_plans.id')
                ->leftJoin('memberships','memberships.id','=','addon_plans.plan_id')    
                ->select('addon_orders.id as order_id','addon_orders.status as order_status','addon_plans.*','memberships.title as plan_title')
                ->where('addon_orders.seller_id','=',$vendor_id)
                ->orderBy('addon_orders.id','desc')->get();

    return view('adminupdated.seller.sellermembership',compact('membership','Addon_membership','vendor_id'));

}
 
// regular plan activate
public function regularactivate(Request $request){
    $update_status = Member_order::where('id','=',$request->id)->update([
        'status'=>'3'
    ]);
    $activate_membership=Seller::where('id','=',$request->vendor_id)->update([
        'isMembership'=>'2'
    ]);
    if($update_status==true){
        return response()->json('1');
    }else{
        return response()->json('2');
    }
}

// regular plan deactivate
public function regulardeactivate(Request $request){
    $update_status = Member_order::where('id','=',$request->id)->update([
        'status'=>'4'
    ]);
    $activate_membership=Seller::where('id','=',$request->vendor_id)->update([
        'isMembership'=>'1'
    ]);
    if($update_status==true){
        return response()->json('1');
    }else{
        return response()->json('2');
    }
}


// regular plan cancelled
public function regularaCancel(Request $request){
    $update_status = Member_order::where('id','=',$request->id)->update([
        'status'=>'5'
    ]);
    if($update_status==true){
        return response()->json('1');
    }else{
        return response()->json('2');
    }
}



// addon plan activate

public function Addonactivate(Request $request){
    $update_status = Addon_order::where('id','=',$request->id)->update([
        'status'=>'3'
    ]);
    if($update_status==true){
        return response()->json('1');
    }else{
        return response()->json('2');
    }
}

// addon plan deactivate

public function Addondeactivate(Request $request){
    $update_status = Addon_order::where('id','=',$request->id)->update([
        'status'=>'4'
    ]);
    if($update_status==true){
        return response()->json('1');
    }else{
        return response()->json('2');
    }
}

// addon cancel

public function addonCancel(Request $request){
    $update_status = Addon_order::where('id','=',$request->id)->update([
        'status'=>'5'
    ]);
    if($update_status==true){
        return response()->json('1');
    }else{
        return response()->json('2');
    }
}



// coupon  section start here

public function coupons(){
    $coupons = Coupon::orderBy('id','desc')->get();
    $vendors = Seller::where('status','=','2')->orderBy('id','desc')->get();
    // return view('adminupdated.coupons.addcoupons',compact('coupons','vendors'));
    // return view('admin.coupons',compact('coupons','vendors'));
}
public function allcoupons(){
    $coupons = Coupon::orderBy('id','desc')->get();
    $vendors = Seller::where('status','=','2')->orderBy('id','desc')->get();
    return view('adminupdated.coupons.allcoupons',compact('coupons','vendors'));
}


// add coupon

public function addCoupon(){
    return view('adminupdated.coupons.addcoupons');
}
public function addcoupons(){
    return view('adminupdated.coupons.addcoupons');
}
// add coupon process

public function AddCouponProcess(Request $request){
    $existCoupon = Coupon::where('coupon_title','=',$request->coupon_title)
                   ->orwhere('coupon_code','=',$request->coupon_code)
                   ->count();
      if($existCoupon>0){
          return back()->with('error','coupon already exists!');
          exit();
      }else{
          $createCoupon = new Coupon;
          $createCoupon->coupon_title=$request->coupon_title;
          $createCoupon->coupon_code=$request->coupon_code;
          $createCoupon->coupon_offer=$request->coupon_offer;
          $createCoupon->coupon_desc=$request->coupon_desc;
          $createCoupon->expiry_date=$request->coupon_date;
          $createCoupon->save();
          if($createCoupon==true){
              return back()->with('success','coupon created Successfull!!');
              exit();
          }else{
            return back()->with('error','something went wrong !');
            exit();
          }
      }              
}

// activate and deactivate coupon code

public function activateCoupon(Request $request){
    $id=decrypt($request->id);
    $activate = Coupon::where('id','=',$id)->update([
        'status'=>'2'
    ]);
    if($activate==true){
        return back()->with('success','coupon activated successfull!');
        exit();
    }else{
        return back()->with('error','something went wrong!');
        exit(); 
    }
}

// deactivate coupon code

public function deactivateCoupon(Request $request){
    $id=decrypt($request->id);
    $deactivate = Coupon::where('id','=',$id)->update([
        'status'=>'3'
    ]);
    if($deactivate==true){
        return back()->with('success','coupon deactivated successfull!');
        exit();
    }else{
        return back()->with('error','something went wrong!');
        exit(); 
    }
}

// delete coupon code

public function deleteCoupon(Request $request){
    $id = $request->id;
    $delete_coupon = Coupon::where('id','=',$id)->delete();
    if($delete_coupon==true){
        return response()->json('1');
        exit();
    }else{
        return response()->json('2');
        exit(); 
    }
}


// assigned coupon to vendor

public function assignedCoupon(Request $request){
    $coupon_id = explode(',',$request->coupon_id);
    $total_size = count($coupon_id);
    for($i=0;$i<$total_size;$i++){
        $assigned = new AssignCoupon;
        $assigned->seller_id=$request->vendor;
        $assigned->coupon_id=$coupon_id[$i];
        $assigned->save();
    }
    if($assigned==true){
        return response()->json('1');
        exit();
    }else{
        return response()->json('2');
        exit(); 
    }
}

// assigned coupon view 

public function AssignedCoupon_to_vendor(){
    $getAssigned_coupon = AssignCoupon::leftJoin('coupons','coupons.id','=','assign_coupons.coupon_id')
                        ->leftJoin('sellers','sellers.id','=','assign_coupons.seller_id')
                        ->select('fname','lname','email','coupon_title','coupon_code','coupon_offer','expiry_date','coupons.status as coupon_status','assign_coupons.status as assigned_status')
                        ->orderBy('assign_coupons.id')
                        ->get();
    return view('admin.assigned_coupon',compact('getAssigned_coupon'));
}

public function assignedcouponvendor(){
    $getAssigned_coupon = AssignCoupon::leftJoin('coupons','coupons.id','=','assign_coupons.coupon_id')
                        ->leftJoin('sellers','sellers.id','=','assign_coupons.seller_id')
                        ->select('fname','lname','email','coupon_title','coupon_code','coupon_offer','expiry_date','coupons.status as coupon_status','assign_coupons.status as assigned_status')
                        ->orderBy('assign_coupons.id')
                        ->get();
    return view('adminupdated.coupons.assignedcouponvendor',compact('getAssigned_coupon'));
}

// design request 

public function designRequest(){

    $designRequests = DesignRequest::leftJoin('customers','customers.id','=','design_requests.cust_id')
                        ->leftJoin('categories','categories.id','=','design_requests.cat_id')
                        ->leftJoin('sub_categories','sub_categories.id','=','design_requests.subcat_id')
                        ->select('fname','lname','email','categories.category_name as catname','subcat_name','design_requests.*')
                        ->orderBy('design_requests.id','desc')
                        ->paginate(10);
                    
    return view('adminupdated.request.design-request',compact('designRequests'));
}

// submit proposal 
public function allsubmitproposal()
{
    $data = RequestProposal::all();
    return view('adminupdated.request.submitedproposal',compact('data'));
}
public function submitproposal(Request $request){
    $seller_id = Auth::guard('admin')->user()->id;
    $proposal = new RequestProposal;
    $proposal->request_id=$request->requestID;
    $proposal->admin_id=$seller_id;
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
    $admin_id = Auth::guard('admin')->user()->id;
    $reject = DesignRequest::where('id','=',$reqid)->update([
        'status'=>'2',
        'byadmin'=>$admin_id       
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
    $add->user_id = Auth::guard('admin')->user()->id;
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
    return view('adminupdated.request.acceptRequest',compact('reqTitle','reqId','reqEmail'));
}


// submit accept form

public function requestAcceptMail(Request $request){  
    $data = array('Request'=>$request->reqTitle,'email'=>$request->reqemail,'questions'=>$request->reqQuestions,'msg'=>$request->reqMsg);  
       
    $sendmail = Mail::send('admin.acceptReqmail', $data, function($message) use ($data) {
       $message->to($data['email'],$data['Request'])->subject
          ('Accept Request design product');
       $message->from('luxurybooking.ae@gmail.com','Oben');
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
    return view('adminupdated.request.viewdesign-request',compact('designRequests'));
}


// list of return request

public function listReturnRequest(){
   
    $requestList = ReturnRequest::leftJoin('products','products.id','=','return_requests.product_id')
                    ->leftJoin('customers','customers.id','=','return_requests.cust_id')
                   ->select('return_requests.*','products.product_title as prodTitle','products.featured_img as productImg','fname','lname','email','mobile')                   
                   ->orderBy('return_requests.id','desc')
                   ->get();
    return view('adminupdated.request.return-requests',compact('requestList'));
}


public function accept_return_request(Request $request){
    $id = decrypt($request->id);
    $accept = ReturnRequest::where('id','=',$id)->update([
        'status'=>'2'
    ]);
    if($accept==true){
        return back()->with('success','request accepted');
        exit();
    }else{
        return back()->with('error','something went wrong');
        exit();
    }
}


public function reject_return_request(Request $request){
    $id = decrypt($request->id);
    $accept = ReturnRequest::where('id','=',$id)->update([
        'status'=>'3'
    ]);
    if($accept==true){
        return back()->with('success','request rejected');
        exit();
    }else{
        return back()->with('error','something went wrong');
        exit();
    }
}

// fetch notification

public function customNotification(Request $request){    
    $orders = CustomNotification::where('notificationType','=','orders')
               ->where('status','=','1')
               ->count(); 
    $design_requests = CustomNotification::where('notificationType','=','request')
                    ->where('status','=','1')->count();
    $notifications = $orders+$design_requests;
    return response()->json(["status"=>"200","msg"=>$notifications,"orders"=>$orders,"requests"=>$design_requests]); 
}


// guest orders details

public function guestorders(){  
    $orders = GuestOrder::leftJoin('guest_users','guest_users.id','=','guest_orders.guser_id')
                ->leftJoin('products','products.id','=','guest_orders.product_id')
              ->select('products.*','guest_users.id as guest_id','name','email','mobile','emirates','area','address','guest_orders.qty as gorderQty','payment_mode','payment_id','sale_price','amount','guest_orders.status as order_status','guest_orders.id as orderid')
              ->orderBy('guest_orders.id','desc')
              ->get();   
    return view('admin.guest_order',compact('orders'));
}


// cancelled guest user
public function guestcancelled(Request $request){
    $cancelled = GuestOrder::where('id','=',$request->cancel)->update([
        "status"=>"4"
    ]);
    if($cancelled == true){
        return back()->with('success','order cancelled successFull!');
    }else{
        return back()->with('error','something went wrong!');
    }
}

// delivered guest order

public function guestdelivered(Request $request){
    $cancelled = GuestOrder::where('id','=',$request->cancel)->update([
        "status"=>"5"
    ]);
    if($cancelled == true){
        return back()->with('success','order cancelled successFull!');
    }else{
        return back()->with('error','something went wrong!');
    }
}


// website banner option

public function Banner(){
    $banners = Banner::orderBy('id','desc')->get();
    return view('admin.banner',compact('banners'));
}
public function banners(){
    $banners = Banner::orderBy('id','desc')->get();
    return view('adminupdated.banner.banners',compact('banners'));
}


// website banner add process

    public function addBanner(Request $request){
   

        if($request->hasFile('caticon')){
            $caticon = time().'.'.$request->caticon->extension();   
            $request->caticon->move(public_path('uploads'), $caticon);
        }else{
            $caticon='';
        } 

        $category = new Banner;        
        $category->banner=$caticon;
        $category->type=$request->type;
        $category->url=$request->url;
        $category->status='1';
        $category->save();
        return back()->with('success','Banner Added successFull!');
    }

    // update Banner
     public function updateBanner(Request $request){
        if($request->hasFile('caticon')){
            $caticon = time().'.'.$request->caticon->extension();   
            $request->caticon->move(public_path('uploads'), $caticon);
        }else{
            $caticon='';
        } 
        $active = Banner::where('id','=',$request->id)
              ->update([
                'banner'=>$caticon,
                'type'=>$request->type,
                'url'=>$request->url,
                'status'=>'1',
              ]);

    
      if($active==true){
        return back()->with('success','Category Updated Successfully');
          return response()->json('2');
      }else{

        return back()->with('error','Something Went Wrong');
      }        


                $update_banner = Banner::where('id','=',$bannerid)->update([
                    'banner'=>$caticon,
                    'type'=>$request->type,
                    'url'=>$request->url,
                    'status'=>'1',
                ]);
                if($update_blog==true){
                    return back()->with('success','Banner Updated successfull');
                }else{
                    return back()->with('error','something went wrong');
                }
           
           
        }
    // banner delete

    public function deleteBanner(Request $request){
        $reqid = decrypt($request->id);
        $delete_req = Banner::where('id','=',$reqid)->delete();
        if($delete_req==true){
            return back()->with('success','Banner deleted successFull!');
            exit();
        }else{
            return back()->with('error','something went wrong');
            exit();
        }
    }

// services 

public function services(){
    $services = $this->listServices();
    return view('adminupdated.services.index',compact('services'));
}

public function listServices(){
   
    $services = Service::leftJoin('categories','categories.id','=','services.cat_id')
                ->leftJoin('sub_categories','sub_categories.id','=','services.subcat_id')
                ->select('services.*','categories.category_name as catname','subcat_name')               
                ->orderBy('services.id','desc')
                ->get();
       return $services;         
} 



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

// activate and deactivate services

public function activateService(Request $request){
    $service_id = decrypt($request->id);
    $service_activate = Service::where('id','=',$service_id)->update([
        'status'=>'2'
    ]);
    if($service_activate==true){
        return back()->with("success",'service activated successfull');
        exit();
    }else{
        return back()->with("error",'something went wrong');
        exit();
    }

}


// deactivate services

public function deactivateService(Request $request){
    $service_id = decrypt($request->id);
    $service_deactivate = Service::where('id','=',$service_id)->update([
        'status'=>'3'
    ]);
    if($service_deactivate==true){
        return back()->with("success",'service deactivated successfull');
        exit();
    }else{
        return back()->with("error",'something went wrong');
        exit();
    }

}

public function addblogs()
{
    return view('adminupdated.blogs.addblogs');
}

    
public function addblog(Request $request)
{
        $blog = new blogs;        
        $blog->blog_name=$request->blog_name;
        $blog->blog_content=$request->blog_content;
        if($request->blog_img)
        {
            $blog->blog_img = Cmf::sendimagetodirectory($request->blog_img);    
        }
        $blog->save();
    return back()->with("success",'Blog Add successfull');
}
public function allblogs()
{
    $blogs = blogs::all();
    return view('adminupdated.blogs.allblogs')->with(array('blogs' => $blogs)); 
}
public function editblogs($id)
{
    $data = blogs::find($id);
    return view('adminupdated.blogs.editblogs')->with(array('data' => $data)); 
}
public function editblog(Request $request)
{   
    $blogid = $request->id;
    $update_blog = blogs::where('id','=',$blogid)->update([
        'blog_name'=>$request->blog_name,
        'blog_content'=>$request->blog_content,
        'blog_img' => Cmf::sendimagetodirectory($request->blog_img),  
    ]);
    if($update_blog==true){
        return back()->with('success','Blog Updated successfull');
    }else{
        return back()->with('error','something went wrong');
    }
}
public function deleteblog(Request $request)
{
     $blog_delete = blogs::where('id','=',$request->id)->delete();
        if($blog_delete==true){
            return back()->with('success','Blog Delete successfull');
        }else{
        return back()->with('error','something went wrong');
        }
}

}
