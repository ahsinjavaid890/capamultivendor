<?php

namespace App\Http\Controllers\Website;
use App\Helpers\Cmf;
use Auth;
use App\Http\Controllers\Controller;
use App\Http\Resources\SearchProductResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Customer;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\VarientAttr;
use App\Models\Product;
use App\Models\Product_attr;
use App\Models\Seller;
use App\Models\SellerDoc;
use App\Models\Cart;
use App\Models\Blogs;
use App\Models\CustomerAddress;
use App\Models\orders; 
use App\Models\orderdetails;
use App\Models\orderstatus;
use App\Models\Transaction;
use App\Models\DesignRequest;
use App\Models\RequestProposal;
use App\Models\CustomNotification;
use App\Models\ReturnRequest;
use App\Models\Wishlist;
use App\Models\GuestUser;
use App\Models\GuestOrder;
use App\Models\Service;
use App\Models\Banner;
use App\Models\Review;
use Illuminate\Support\Str;
use Stripe;
use Mail;
use DB;
use Session;
use Redirect;
use URL;
use Storage;
use PDF;
class WebsiteController extends Controller
{
    public function removecartpage($id)
    {
        if($id) {
            $cart = session()->get('cart');
            if(isset($cart[$id])) {
                unset($cart[$id]);
                session()->put('cart', $cart);
            }
        }


        
    }
    public function removewishlistfromproduct(Request $request)
    {
        
        $wishlist = Wishlist::where('cust_id',Auth::guard('cust')->user()->id)->where('prod_id',$request->prod_id)->delete();
        if($wishlist==true){
            return back()->with('success','product removed from wishlist');
            exit();
        }else{
            return back()->with('error','something went wrong');
            exit();
        }
    }
    public function continuetopayement(Request $request)
    {
        $order_number = 'CAPA-'.strtoupper(Str::random(10));
        $previusorder =   DB::table('orders')->where('order_number' , $order_number)->get()->first();
        if(!empty($previusorder))
        {
            $order_number = 'CAPA-'.strtoupper(Str::random(11));
        }else{
            $order_number = 'CAPA-'.strtoupper(Str::random(10));
        }

        $order = new orders;
        $order->order_number = $order_number;
        if(Auth::guard('cust')->check())
        {
            $order->customer_id = Auth::guard('cust')->user()->id;
            $order->addres_id = $request->cus_address;
        }else{
            $order->fname = $request->fname;
            $order->lname = $request->lname;
            $order->email = $request->email;
            $order->phonenumber = $request->phonenumber;
            $order->emirates   = $request->emirates;
            $order->area = $request->area;
            $order->delivery_date   = $request->delivery_date;
            $order->delivery_time = $request->delivery_time;
            $order->address = $request->address;
            $order->google_location = $request->google_location;
        }
        if($request->payment_method == 2)
        {
            $order->status = 'completed';
        }else{
            $order->status = 'payementpending';
        }
        
        $order->payment_method = $request->payment_method;
        $order->ordernotes = $request->ordernotes;
        $order->delivery = $request->delivery;
        $order->newstatus = 'new';
        $order->newstatustwo = 'new';
        $order->new_vendor_status = 'new';
        $order->save();

        $cart = session()->get('cart');
        $subtotal = 0;
        $shippingcost = 0;
        foreach ($cart as $r) {
            $productid = $r['id'];
            $quantity = $r['quantity'];
            $product = DB::table('products')->where('id' , $productid)->get()->first();

            if(!empty($product->sale_price))
            {
                $price = $product->sale_price;
            }else{
                $price = $product->prod_price;
            }


            $total_price = $price;
            $orderdetails = new orderdetails;
            $orderdetails->order_id = $order->id;
            $orderdetails->product_id = $productid;
            $orderdetails->quantity = $quantity;
            $orderdetails->newstatus = 'new';
            $orderdetails->price = $quantity*$total_price;
            $orderdetails->users = $product->added_by_seller;        
            $orderdetails->save();

            if(isset($r['variations']))
            {
                
                foreach ($r['variations'] as $v) {
                    $insertarray = array('main_variation' => $v['main'],'variation_name' => $v['childattrubute'],'orderdetails' => $orderdetails->id);
                    DB::table('order_variations')->insert($insertarray);
                }
            }

            $subtotal += $price*$quantity;
        }

            
        $total = $subtotal;
        $updateorder = orders::find($order->id);
        $updateorder->sub_total = $subtotal;
        $updateorder->grand_total = $total;
        $updateorder->save();


        if($request->payment_method == 2)
        {
            $order = orders::find($order->id);
            $order->payment_status = 1;
            $order->payement_id = 'cod';
            $order->status = 'completed';
            $order->save();
            Session::forget('cart');
            
            $allproducts = orderdetails::where('order_id' , $order->id)->get();
            foreach ($allproducts as $r) {
                $this->stockdeduct($r->product_id , $r->quantity);
            }
            // Save Admin Notification
            $notification = 'One New Order';
            $url = url('admin/ecommerece/orderdetail/').'/'.$order->id;
            $icon = '<div class="notify-icon bg-primary"> <i class="mdi mdi-comment-account-outline"></i> </div>';
            Cmf::save_admin_notification($notification , $url , $icon);
            // Save Vendor Notification

            $order_detail_by_user = orderdetails::where('order_id' , $order->id)->groupby('users')->get();

            foreach ($order_detail_by_user as $r) {
                $notification = 'One New Order Recieved';
                $vendorurl = url('vendor/orders/orderdetail/').'/'.$order->id;
                $icon = '<div class="notify-icon bg-primary"> <i class="mdi mdi-comment-account-outline"></i> </div>';
                Cmf::save_vendor_notification($notification , $vendorurl , $icon , $r->users); 
            }
            $ordernumber = DB::table('orders')->where('id' , $order->id)->get()->first();
            $url = url('ordercomplete').'/'.$ordernumber->order_number;
            return Redirect::to($url);
        }else{
            $url = url('payement').'/'.$order->order_number;
            return Redirect::to($url);
        }


    }
    public function downloadinvoice($id)
    {
        $orders = orders::where('payment_status' , 1)->where('id' , $id)->get()->first();
        if(!empty($orders))
        {
            $pdf = PDF::loadView('sellerupdated.orders.invoice', ['id'=>$orders->id,'created_at'=>$orders->created_at]);
            Storage::put('public/pdf/invoice.pdf', $pdf->output());
            return $pdf->download('CAPA( Order ID = '.$id.').pdf');
        }else{
            return response()->view('frontend.errors.404', [], 404);
        }
    }
    public function ordercomplete($id)
    {
        $order =   DB::table('orders')->where('order_number' , $id)->get()->first();
        if(!empty($order->payment_status == 1))
        {
            $orderdetails = orderdetails::where('order_id' , $order->id)->get();
            return view('website.cart.ordercomplete')->with(array('order'=>$order,'orderdetails'=>$orderdetails));
        }
        else
        {
            
        }
    }
    public function payement($id)
    {
        $order =   DB::table('orders')->where('order_number' , $id)->get()->first();
        if(!empty($order))
        {
            $cart = session()->get('cart');
            return view('website.cart.payement')->with(array('cart'=>$cart,'order'=>$order));
        }
        else
        {
            
        }
    }
    public function stripePost(Request $request)
    {
        $order = orders::where('id' , $request->orderid)->first();
        $delivery = $order->delivery;
        if($delivery == 'free')
        {
            $price = orders::where('id' , $request->orderid)->sum('grand_total');
            $totalprice = round($price);
        }else{
            $price = orders::where('id' , $request->orderid)->sum('grand_total');
            $totalprice = round($price+30);
        }
        Stripe\Stripe::setApiKey(Cmf::get_site_settings_by_colum_name('secret_stripe'));
        $payement = Stripe\Charge::create ([
                "amount" => $totalprice*100,
                "currency" => "aed",
                "source" => $request->stripeToken,
                "description" => "This payment is tested purpose phpcodingstuff.com"
        ]);
        if(!empty($payement->id))
        {
            $order = orders::find($request->orderid);
            $order->payment_status = 1;
            $order->payement_id = $payement->id;
            $order->status = 'completed';
            $order->save();
            Session::forget('cart');
            
            $allproducts = orderdetails::where('order_id' , $request->orderid)->get();
            foreach ($allproducts as $r) {
                $this->stockdeduct($r->product_id , $r->quantity);
            }
            // Save Admin Notification
            $notification = 'One New Order With Payment';
            $url = url('admin/ecommerece/orderdetail/').'/'.$request->orderid;
            $icon = '<div class="notify-icon bg-primary"> <i class="mdi mdi-comment-account-outline"></i> </div>';
            Cmf::save_admin_notification($notification , $url , $icon);
            // Save Vendor Notification
            $order_detail_by_user = orderdetails::where('order_id' , $request->orderid)->groupby('users')->get();
            foreach ($order_detail_by_user as $r) {
                $notification = 'One New Order Recieved';
                $vendorurl = url('vendor/orders/orderdetail/').'/'.$request->orderid;
                $icon = '<div class="notify-icon bg-primary"> <i class="mdi mdi-comment-account-outline"></i> </div>';
                Cmf::save_vendor_notification($notification , $vendorurl , $icon , $r->users); 
            }
            $ordernumber = DB::table('orders')->where('id' , $request->orderid)->get()->first();
            $url = url('ordercomplete').'/'.$ordernumber->order_number;

            return Redirect::to($url);
        }
        else
        {
            return back();
        }   
    }
    public function stockdeduct($productid  , $stock)
    {
        $product_stock = Product::where('id' , $productid)->get()->first()->stock_alert;
        $detuct = $product_stock-$stock;
        $productupdate = Product::find($productid);
        $productupdate->stock_alert = $detuct;
        $productupdate->save();
    }
    public function thankyou(){
        return view('website.thankyou');
    }
    public function index(){
        $getcatlist = Category::limit(2)->get();
        $vendors = $this->listVendors();
        $Deals = $this->DOD();
        $topPics = $this->topPicsProduct();
        $arrivals = $this->arrovalsProduct();
        $newcat = Category::orderBy('id','desc')->where('show_on_homepage' , 1)->limit(4)->get();
        $banners = Banner::orderBy('id','desc')->get();
        return view('website.index',compact('getcatlist','vendors','Deals','topPics','arrivals','banners', 'newcat'));
    }

    public function search(Request $request) {
        $products = Product::with('category', 'subCategory')->active();
        $categories = Category::query();
        $subCategories = SubCategory::with(['parentCategory' => fn($q) => $q->select('id', 'url')]);
        $request->whenFilled('search', function($search) use ($products, $categories, $subCategories) {
            $products->where(function($q) use ($search) {
                $q->where('product_title', 'LIKE', "%$search%")
                    ->orWhere('product_code', 'LIKE', "%$search%")
                    ->orWhere('url', 'LIKE', "%$search%");
            });
            $categories = $categories->where('category_name', 'LIKE', "%{$search}%");
            $subCategories = $subCategories->where('subcat_name', 'LIKE', "%{$search}%");
        });
        $products = $products->limit(4)->get();
        $categories = $categories->limit(4)->select('category_name', 'url')->get()
            ->map(function($item) {
                $item->url = route('website.cat_products', ['id' => $item->url]);
                return $item;
            });

        return SearchProductResource::collection($products)->additional([
            'categories' => $categories,
        ]);
    }

    public function addtocartgetmethod($id , $pricetype)
    {
        $product = Product::find($id);
        if(!empty($pricetype == 'basicprice'))
        {
            $price = $product->prod_price;
        }else{
            $price = $product->sale_price;
        }
        if(!$product) {
            abort(404);
        }
        $cart = session()->get('cart', []);
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "id" => $product->id,
                "name" => $product->product_title,
                "url" => $product->url,
                "quantity" => 1,
                "price" => $price,
                "pricetype" => $pricetype,
                "image" => $product->featured_img
            ];
        }
        session()->put('cart', $cart);
        echo count((array) session('cart'));
    }

    public function quickproductview($id)
    {
        
    }

    public function showcart()
    {
        $cart = session()->get('cart');

        if(!empty($cart))
        {

        echo '<div  class="body customScroll">

                <ul class="minicart-product-list" id="headercart">';
                    $subtotal = 0;
                     foreach ($cart as $r) {
                  
                    echo '<li>
                        <a href="'.url("product").'/'.$r['url'].'" class="image"><img class="img-thumbnail" src="'.asset('public/products').'/'.$r['image'].'" alt="Cart product Image"></a>
                        <div class="content">
                            <a href="'.url("product").'/'.$r['url'].'" class="title">Outdoor Fairy Light</a>
                            <span class="quantity-price">'.$r['quantity'].' x <span class="amount">'.$r['price'].' '.Cmf::current_currency().'</span></span>
                            <a href="javascript::void(0)" onclick="removecart('.$r['id'].')" class="remove"><i class="fa fa-times"></i></a>
                        </div>
                    </li>';
                    $subtotal += $r['price']*$r['quantity'];
                }
                  
                echo '</ul>
            </div>


            <div class="foot">
                <div class="sub-total">
                    <strong>Subtotal :</strong>
                    <span class="amount" id="total_header_cart_amt">'.$subtotal.' '.Cmf::current_currency().'</span>
                </div>
                <div class="buttons">
                    <a href="'.url('cart').'" class="btn btn-dark btn-hover-primary mb-30px">view cart</a>
                    <a href="'.url('checkout').'" class="btn btn-outline-dark current-btn">checkout</a>
                </div>
                <p class="minicart-message">Free Shipping on All Orders Over 200.00 AED</p>
            </div>
            ';
        }else{
            echo '<img style="width:300px;" src="https://geekgodreview.files.wordpress.com/2019/02/shopping.gif"><br><span style="margin-left:40px;text-align:center;font-size:18px;">No Products In the Cart</span>';
        }
    }
    public function removecartcartgetmethod($id)
    {
        if($id) {
            $cart = session()->get('cart');
            if(isset($cart[$id])) {
                unset($cart[$id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }
    public function listcat(){
        $getcat  = Category::where('status','=','2')->orderBy('id','desc')->get();
        return $getcat;
    }

    public function listsubcat(){
        $getsubcat  = SubCategory::where('status','=','2')->orderBy('id','desc')->get();
        return $getsubcat;
    }

    public function listVendors(){
        $vendors = Seller::leftJoin('seller_docs','seller_docs.seller_id','=','sellers.id')
                   ->select('sellers.*','seller_docs.id as docid','name_of_license','license_no','license_exp_date','company_logo','trade_license_img','passport_img','emirates_id_img','license_img','emirates_back_img')
                   ->where('sellers.status','=','2')
                   ->orderBy('sellers.id','desc')
                   ->limit(3)
                   ->get(); 
                   return $vendors;
    }


    public function listAllproducts(){
        $listallproduct=Product::leftJoin('categories','categories.id','=','products.category')
                       ->leftJoin('sub_categories','sub_categories.id','=','products.subcategory') 
                       ->leftJoin('varient_attrs','varient_attrs.id','=','products.varient')
                       ->select('products.*','categories.id as cat_id','sub_categories.id as subcat_id','categories.category_name as cat_name','sub_categories.category_name as subparent_id','subcat_name')
                       ->where('products.status','=','2')
                       ->orderBy('products.id','desc')
                       ->get(); 
         return $listallproduct;
    }

    // list of deals of the day products

    public function DOD(){
        $deal_of_day=Product::leftJoin('categories','categories.id','=','products.category')
                       ->leftJoin('sub_categories','sub_categories.id','=','products.subcategory') 
                       ->leftJoin('varient_attrs','varient_attrs.id','=','products.varient')
                       ->leftJoin('reviews','reviews.prod_id','=','products.id')
                       ->select('products.*','categories.id as cat_id','sub_categories.id as subcat_id','categories.category_name as cat_name','sub_categories.category_name as subparent_id','subcat_name','rating','message')
                       ->where('prod_offer','=','1')
                       ->where('products.status','=','2')
                       ->orderBy('products.id','desc')
                       ->get(); 
         return $deal_of_day;             
    }

    // list of top pics products
    public function topPicsProduct(){
        $toppics=Product::leftJoin('categories','categories.id','=','products.category')
                       ->leftJoin('sub_categories','sub_categories.id','=','products.subcategory') 
                       ->leftJoin('varient_attrs','varient_attrs.id','=','products.varient')
                       ->leftJoin('reviews','reviews.prod_id','=','products.id')
                       ->select('products.*','categories.id as cat_id','sub_categories.id as subcat_id','categories.category_name as cat_name','sub_categories.category_name as subparent_id','subcat_name','rating','message')
                       ->where('prod_offer','=','3')
                       ->where('products.status','=','2')
                       ->orderBy('products.id','desc')
                       ->get(); 
         return $toppics;             
    }

    // list of new arrival products

    public function arrovalsProduct(){
        $arrivals=Product::leftJoin('categories','categories.id','=','products.category')
                       ->leftJoin('sub_categories','sub_categories.id','=','products.subcategory') 
                       ->leftJoin('varient_attrs','varient_attrs.id','=','products.varient')
                       ->leftJoin('reviews','reviews.prod_id','=','products.id')
                       ->select('products.*','categories.id as cat_id','sub_categories.id as subcat_id','categories.category_name as cat_name','sub_categories.category_name as subparent_id','subcat_name','rating','message')
                       ->where('prod_offer','=','2')
                       ->where('products.status','=','2')
                       ->orderBy('products.id','desc')
                       ->get(); 
         return $arrivals;             
    }

   
    // vendors page

    public function vendors(){
        $vendors = $this->listVendors();
        return view('website.vendors',compact('vendors'));
    }

    // vendors details

    public function vendorDetails($id){

        $vendor_id = Seller::where('shop_url' , $id)->first()->id;
        $vendors = Seller::leftJoin('seller_docs','seller_docs.seller_id','=','sellers.id')
                   ->select('sellers.*','seller_docs.*')
                   ->where('sellers.id','=',$vendor_id)
                   ->first();
        $vendorsProd=Product::leftJoin('categories','categories.id','=','products.category')
                       ->leftJoin('sub_categories','sub_categories.id','=','products.subcategory') 
                       ->leftJoin('reviews','reviews.prod_id','=','products.id')
                       ->select('products.*','categories.id as cat_id','sub_categories.id as subcat_id','categories.category_name as cat_name','sub_categories.category_name as subparent_id','subcat_name','rating','message')
                       ->where('added_by_seller','=',$vendor_id)
                       ->where('products.status','=','2')
                       ->orderBy('products.id','desc')
                       ->get(); 
         $allvendors = $this->listVendors();
        $getcatlist = $this->listcat();
        return view('website.vendor-details',compact('vendors','vendorsProd','allvendors','getcatlist','vendor_id'));
    }


    // product page

    public function productpage(){
        $products = $this->listAllproducts();
        return view('website.product',compact('products'));
    }

    // product details page

    public function productDetails($id){
        $product = Product::where('url', $id)->first();
        $product_id = $product->id;
        $products=Product::leftJoin('categories','categories.id','=','products.category')
        ->leftJoin('sub_categories','sub_categories.id','=','products.subcategory') 
        ->leftJoin('varient_attrs','varient_attrs.id','=','products.varient')
        ->leftJoin('reviews','reviews.prod_id','=','products.id')
        ->select('products.*','categories.id as cat_id','sub_categories.id as subcat_id','categories.category_name as cat_name','categories.url as cat_url','sub_categories.category_name as subparent_id','subcat_name','rating','message')
        ->where('products.id','=',$product_id)
        ->first();
        $productsattrs = Product_attr::leftJoin('varient_names','varient_names.id','=','product_attrs.varient')
                                ->leftJoin('varient_attrs','varient_attrs.id','=','product_attrs.attribute')
                                ->select('product_attrs.*','varient_names.varient_name as varientName','attribute_name')
                                ->where('product_attrs.product_id','=',$products['id'])
                                ->orderBy('product_attrs.id')
                                ->get();
                             
        $deliveriesbyy = Seller::where('id','=',$products['added_by_seller'])->first();

        $catproducts=Product::leftJoin('categories','categories.id','=','products.category')
        ->leftJoin('sub_categories','sub_categories.id','=','products.subcategory') 
        ->leftJoin('varient_attrs','varient_attrs.id','=','products.varient')
        ->leftJoin('reviews','reviews.prod_id','=','products.id')
        ->select('products.*','categories.id as cat_id','sub_categories.id as subcat_id','categories.category_name as cat_name','sub_categories.category_name as subparent_id','subcat_name','rating','message')
        ->where('products.category','=',$products['cat_id'])
        ->where('products.status','=','2')
        ->orderBy('products.id','desc')
        ->limit(3)
        ->get(); 
        
        return view('website.product-details',compact('products','catproducts','productsattrs','deliveriesbyy'));
    }


    // public function category details

    public function catDetails($id){

        $category_id = Category::where('url' , $id)->get()->first()->id;
        $products=Product::leftJoin('categories','categories.id','=','products.category')
        ->leftJoin('sub_categories','sub_categories.id','=','products.subcategory') 
        ->leftJoin('reviews','reviews.prod_id','=','products.id')
        ->select('products.*','categories.id as cat_id','sub_categories.id as subcat_id','categories.category_name as cat_name','sub_categories.category_name as subparent_id','subcat_name','rating','message')
        ->where('products.category','=',$category_id)
        ->where('products.status','=','2')
        ->orderBy('products.id','desc')
        ->paginate(9); 
        $vendors = $this->listVendors();
        $getcatlist = $this->listcat();
        $categories_detail = Category::where('id' , $category_id)->get()->first();
        return view('website.category-details',compact('products','categories_detail','vendors','getcatlist','category_id'));
    }

public function subcatDetails($id,$subcat){

        $subcategory_id = SubCategory::where('url' , $subcat)->get()->first()->id;
        $products=Product::leftJoin('categories','categories.id','=','products.category')
        ->leftJoin('sub_categories','sub_categories.id','=','products.subcategory') 
        ->leftJoin('reviews','reviews.prod_id','=','products.id')
        ->select('products.*','categories.id as cat_id','sub_categories.id as subcat_id','categories.category_name as cat_name','sub_categories.category_name as subparent_id','subcat_name','rating','message')
        ->where('products.subcategory','=',$subcategory_id)
        ->where('products.status','=','2')
        ->orderBy('products.id','desc')
        ->paginate(9); 
        $vendors = $this->listVendors();
        $getcatlist = $this->listcat();
        $subcategories_detail = SubCategory::where('id' , $subcategory_id)->get()->first();
        return view('website.subcategory-details',compact('products','subcategories_detail','vendors','getcatlist','subcategory_id'));
    }
    // cart process


    public function addTocart(Request $request){
           
        $cust = $request->cust;
        $prod_id = $request->prod;
        $qty = $request->qty;
        $existcart = Cart::where('cust_id','=',$cust)->where('product_id','=',$prod_id)->count();        
        if($existcart>0){
            $existqty = Cart::where('cust_id','=',$cust)->where('product_id','=',$prod_id)->first();
            $updateqty = $existqty['qty']+$qty;
            $qtyupdate = Cart::where('cust_id','=',$cust)->where('product_id','=',$prod_id)
                        ->update([
                            'qty'=>$updateqty
                        ]);
                        if($qtyupdate==true){
                            return response()->json(["status"=>"200","msg"=>"1"]);
                        }else{
                            return response()->json(["status"=>"400","msg"=>"2"]); 
                        }
        }else{
            $addTo = new Cart;
            $addTo->cust_id=$cust;
            $addTo->product_id=$prod_id;
            $addTo->qty = $qty;
            $addTo->save();
            if($addTo==true){
                return response()->json(["status"=>"200","msg"=>"1"]);
            }else{
                return response()->json(["status"=>"400","msg"=>"2"]); 
            }
        }
    }


    // get cart value in header

    public function cartdetails($cust_id){       
       $cust_id = $cust_id;
       $data = Cart::leftJoin('products','products.id','=','carts.product_id')
         ->leftJoin('categories','categories.id','=','products.category')
       ->leftJoin('sub_categories','sub_categories.id','=','products.subcategory')        
       ->select('carts.id as crtid','qty','products.*','categories.id as cat_id','sub_categories.id as subcat_id','categories.category_name as cat_name','sub_categories.category_name as subparent_id','subcat_name')
       ->where('carts.cust_id','=',$cust_id)
       ->where('carts.status','=','1')
       ->orderBy('carts.id','desc')
       ->get();
       return $data; 
        
    }
    
    // cart page
    public function cartpage(){

        session()->put('redirecturl', Cmf::currenturl());
        $cart = session()->get('cart');
        if(!empty($cart))
        {   
            $cart = session()->get('cart');
            return view('website.cart')->with(array('cart'=>$cart));
        }
        else{
            return redirect('/');
        }
    }

    // remove product from cart

    public function removedcartProd(Request $request){
        $removed = Cart::where('id','=',$request->cartid)->delete();
        if($removed==true){
            return response()->json(["status"=>"200","msg"=>"1"]);
        }else{
            return response()->json(["status"=>"400","msg"=>"2"]); 
        }

    }


    // cart in header 

    public function headerCart(Request $request){
        $cust_id = $request->cust_id;
        $data = Cart::leftJoin('products','products.id','=','carts.product_id')
          ->leftJoin('categories','categories.id','=','products.category')
        ->leftJoin('sub_categories','sub_categories.id','=','products.subcategory')         
        ->select('carts.id as crtid','qty','products.*','categories.id as cat_id','sub_categories.id as subcat_id','categories.category_name as cat_name','sub_categories.category_name as subparent_id','subcat_name')
        ->where('carts.cust_id','=',$cust_id)
        ->where('carts.status','=','1')
        ->orderBy('carts.id','desc')
        ->get();
        if(count($data)!=0){
            return response()->json(["status"=>"200","msg"=>$data]);
        }else{
            return response()->json(["status"=>"400","msg"=>"1"]);
        } 
    }

    // update cart qty

    public function updateQTY(Request $request){
        $updateQty = Cart::where('id','=',$request->cart_id)->update([
            'qty'=>$request->qty
        ]);
        if($updateQty == true){
            return response()->json(["status"=>"200","msg"=>"1"]);
        }else{
            return response()->json(["status"=>"200","msg"=>"1"]);
        }
    }

    public function customerAddress($cust){
        $address = CustomerAddress::where('cust_id','=',$cust)->get();
        return $address;
    }



    // checkout page

    public function checkoutpage(){


        session()->put('redirecturl', Cmf::currenturl());
        $cart = session()->get('cart');
        if(!empty($cart))
        {
            if(Auth::guard('cust')->check()){
                $cust_id = Auth::guard('cust')->user()->id;
                $address = $this->customerAddress($cust_id);
                return view('website.cart.checkout')->with(array('cart'=>$cart,'address'=>$address));
            }else{
                return view('website.cart.checkout')->with(array('cart'=>$cart));    
            }
        }
        else{
            return redirect('/');
        }


        // if(Auth::guard('cust')->check()){
        //     $cust_id = Auth::guard('cust')->user()->id;            
        //     $cartproduct = $this->cartdetails($cust_id);
        //     $address = $this->customerAddress($cust_id);
        //     if(count($cartproduct)>0){
        //         return view('website.checkout',compact('cartproduct','address'));
        //     }else{
        //         return redirect('/');
        //     }
            
        // }else{
        //     return redirect('/customer-login');
        // }
    }


    // add shiping address

    public function shippingAddress(Request $request){
        $cust_id = $request->custid;
        $emirates = $request->emirates;
        $area = $request->shiparea;
        $del_add = $request->delivery_Add;
        $apprtment = $request->apprtment;
        $saveadd = new CustomerAddress;
        $saveadd->cust_id=$cust_id;
        $saveadd->emirates=$emirates;
        $saveadd->area=$area;
        $saveadd->apartment=$apprtment;
        $saveadd->address=$del_add;
        $saveadd->save();
        $last_id = $saveadd->id;
        if($saveadd==true){
            return response()->json(["status"=>"200","msg"=>$last_id]);
        }else{
            return response()->json(["status"=>"400","msg"=>"2"]);
        }

    }


    // online payment stripe

    public function StripePayment(Request $request){

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
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

    // create order 

    public function placeOrder(Request $request){

        $cust_id = Auth::guard('cust')->user()->id;
        $cust_add_id = $request->cust_address_id;
        $cart_id = $request->cartid;
        $seller_id = explode(',',$request->seller_id);
        $payment_mode = $request->payment_mode;
        $total_product = explode(',',$request->prodid);
        $total_qty = explode(',',$request->qty);
        $total_product_size = count($total_product);
        $order_id = array();
        for($i=0;$i<$total_product_size;$i++){
        $createOrder = new Order;
        $createOrder->seller_id=$seller_id[$i];            
        $createOrder->cust_id=$cust_id;
        $createOrder->cust_add_id=$cust_add_id;  
        $createOrder->product_id=$total_product[$i]; 
        $createOrder->qty=$total_qty[$i];       
        $createOrder->payment_mode=$payment_mode;
        $createOrder->status='1';
        $createOrder->save();
        array_push($order_id, $createOrder->id);

            // notfication 

            $customnotification = new CustomNotification;
            $customnotification->seller_id=$seller_id[$i];
            $customnotification->cust_id=$cust_id;
            $customnotification->notificationType='orders';
            $customnotification->save();

        }
        // $order_id = $createOrder->id;
        // $cart_details = explode(',',$cart_id);
        // foreach($cart_details as $cart){
        //     $order_details = new Order_detail;
        //     $order_details->order_id=$order_id;
        //     $order_details->cart_id=$cart;
        //     $order_details->save();
        // }
        

        if($createOrder == true){
            return response()->json(["status"=>"200","msg"=>$order_id]);
        }else{
            return response()->json(["status"=>"400","msg"=>"2"]);
        }
    }

    // create transaction

    public function ordertransaction(Request $request){
        $cust_id = Auth::guard('cust')->user()->id;
        $amount = $request->amount;
        $order_id = explode(',',$request->order);
        $payment_id = $request->payment_id;
        foreach($order_id as $order){
        $order_cnf = new Transaction;
        $order_cnf->order_id=$order;
        $order_cnf->payment_id=$payment_id;
        $order_cnf->cust_id=$cust_id;
        $order_cnf->amount=$amount;
        $order_cnf->status='1';
        $order_cnf->save();       
        }
        if($order_cnf==true){
            foreach($order_id as $orders){
            $order_confirm = Order::where('id','=',$orders)->update([
                'status'=>'2'
            ]);
        }

           
                $updateCart = Cart::where('cust_id','=',$cust_id)->delete();
           
            
            return response()->json(["status"=>"200","msg"=>"1"]);
        }else{
            return response()->json(["status"=>"400","msg"=>"2"]);
        }


    }

    // design your products

    public function designProducts(){
        if(Auth::guard('cust')->check()){
            $categories = $this->listcat();
            return view('website.design_products',compact('categories'));
        }else{
            return redirect('/customer-login');
        }
    }

    // subcategory design your products

    public function subcategory_design(Request $request){
        $catid = $request->id;
        $subcategory  = SubCategory::where('category_name','=',$catid)->where('status','=','2')->orderBy('id','desc')->get();
        if($subcategory){
            return response()->json(['status'=>'200','msg'=>$subcategory]);
        }else{
            return response()->json(['status'=>'400','msg'=>'2']);
        }
    }

    // submit design request to seller as well admin

    public function desginRequestProcess(Request $request){
        $catid = $request->prodCat;
        $subcatid = $request->prodSubCat;
        $product_name = $request->prodName;
        $product_Desc = $request->prodDesc;
        $cust_id = Auth::guard('cust')->user()->id;
        if($request->hasFile('img_logo')){
            $img_logo = time().$request->file('img_logo')->getClientOriginalName();  
            $request->img_logo->move(public_path('uploads'), $img_logo);
         }else{
                $img_logo='';
          }

          $designrequest = new DesignRequest;
          $designrequest->cat_id=$catid;
          $designrequest->cust_id=$cust_id;
          $designrequest->subcat_id=$subcatid;
          $designrequest->product_name=$product_name;
          $designrequest->product_desc=$product_Desc;
          $designrequest->product_img=$img_logo;          
          $designrequest->cost=$request->prodRange;          
          $designrequest->delivery_date=$request->deliveryDate;
          $designrequest->delivery_area=$request->prodArea;
          $designrequest->save();
          if($designrequest==true){
            //   notification
            $customnotification = new CustomNotification;            
            $customnotification->cust_id=$cust_id;
            $customnotification->notificationType='request';
            $customnotification->save();

              return redirect('/customer-design-request')->with('success','request sent to vendor');
              exit();
          }else{
            return back()->with('error','something went wrong');
            exit(); 
          }



    }


    // customer dashboard



    public function customerDashboard(){
        $id = Auth::guard('cust')->user()->id;
        $orders = orders::where('customer_id' , $id)->where('payment_status' , 1)->get();
        return view('website.customer.dashboard')->with(array('orders'=>$orders));
    }

    public function cust_order(){
        $cust_id = Auth::guard('cust')->user()->id;
        $orders = orders::where('payment_status' , 1)->where('customer_id' , $cust_id)->get();
        return view('website.customer.orders',compact('orders'));
    }
    public function orderdetal($id)
    {
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
        return view('website.customer.ordersdetails')->with(array('data'=>$data,'address'=>$address,'orderdetails'=>$orderdetails,'orderstatus'=>$orderstatus));
    }

    public function cust_designReq(){
        $cust_id = Auth::guard('cust')->user()->id;
        $designReq = DesignRequest::leftJoin('customers','customers.id','=','design_requests.cust_id')
                    ->leftJoin('categories','categories.id','=','design_requests.cat_id')
                    ->leftJoin('sub_categories','sub_categories.id','=','design_requests.subcat_id')
                    ->select('fname','lname','email','categories.category_name as catname','subcat_name','design_requests.*')
                    ->where('design_requests.cust_id','=',$cust_id)
                    ->orderBy('design_requests.id','desc')
                    ->get();
        return view('website.customer.designRequest',compact('designReq'));
    }


    // delete design request

    public function deleteReq(Request $request){
        $reqId = decrypt($request->id);
        $reQuest = DesignRequest::where('id','=',$reqId)->delete();
        if($reQuest==true){
            return back()->with('success','request deleted successFull!');
            exit();
        }else{
            return back()->with('error','something went wrong');
            exit();
        }
    }


    // coming soon page

    public function comingsoon(){
        return view('website.comingsoon');
    }
    // Play event
    public function playevent(){
        return view('website.play-event');
    }
    public function submitplanevent(Request $request)
    {
        $data = Category::find($request->categories);
        return view('website.play-event')->with(array('data'=>$data));
    }
    // Track Order
    public function trackorder(){
        return view('website.track-order');
    }
    public function blogs()
    {

        return view('website.blogs');
    }
    public function blogsdetail($id)
    {
        $blogs = Blogs::where('id' , $id)->get()->first();
        return view('website.blogsdetail',compact('blogs'));
    }
    // Contact
    public function contact(){
        return view('website.contact');
    } 
    // categories page

    public function categoriesPage(){
        $categories = Category::where('status','=','2')->orderBy('id','desc')->get();
        return view('website.categories',compact('categories'));
    }



    // forgot password

    public function forgotpassword(){
        return view('website.forgotPass');
    }

    public function forgotProcess(Request $request){
        $registerd_email = $request->email;
        $exist = Customer::where('email','=',$registerd_email)->count();
        if($exist>0){
            $recovery_mail = Customer::where('email','=',$registerd_email)->first();
            $forgotpassword = $recovery_mail['email'];
           $link =  $this->reset_password($forgotpassword);
          
          return back()->with('success','please check your mail');
           exit();
           
            
        }else{
            return back()->with('error','customer not found');
            exit();
        }
    }

    public function reset_password($email) {
        $data = array('email'=>$email);  
           
        Mail::send('website.resetMail', $data, function($message) use ($data) {
           $message->to($data['email'])->subject
              ('oben password reset');
           $message->from('luxurybooking.ae@gmail.com','Oben Multivendor');
        });
        
     }



    //  reset password page

    public function resetPage(Request $request){
        $resetEmail = decrypt($request->email);
        return view('website.resetPass',compact('resetEmail'));
    }

    // reset password process

    public function resetpassword_process(Request $request){
        $email = $request->custemail;
        $cnfpassword = $request->cnf_new_password;
        $reset = Customer::where('email','=',$email)->update([
            'password'=>Hash::make($cnfpassword)
        ]);
        if($reset==true){
            return back()->with('success','password has been changed');
            exit();
        }else{
            return back()->with('error','something went wrong');
            exit();
        }
    }



    // return product

    public function refund_return($id){
        $order = orders::where('payment_status' , 1)->where('id' , $id)->first();
        return view('website.customer.return_product',compact('order'));
    }


    public function returnRequestProcess(Request $request){
        $cust_id = Auth::guard('cust')->user()->id;
        $returnRequest = new ReturnRequest;
        $returnRequest->order_id=$request->order_id;
        $returnRequest->product_id=$request->prod_id;
        $returnRequest->cust_id=$cust_id;
        $returnRequest->productdetails=$request->productdetails;        
        $returnRequest->reason=$request->reason;
        $returnRequest->message=$request->message;
        $returnRequest->save();
        if($returnRequest==true){
            return back()->with('success','Request successfull sent');
            exit();
        }else{
            return back()->with('error','something went wrong');
            exit();
        }

    }


    // list of return request

    public function listReturnRequest(){
        $cust_id = Auth::guard('cust')->user()->id;
        $requestList = ReturnRequest::leftJoin('products','products.id','=','return_requests.product_id')
                       ->select('return_requests.*','products.product_title as prodTitle','products.featured_img as productImg')
                       ->where('return_requests.cust_id','=',$cust_id)
                       ->orderBy('return_requests.id','desc')
                       ->get();
        return view('website.customer.return_request',compact('requestList'));
    }



    // wish list of product

    public function add_to_wishlist(Request $request){
        $cust_id = Auth::guard('cust')->user()->id;
        $prod_id = $request->prod_id;
        $exist_wishlist = Wishlist::where('cust_id','=',$cust_id)->where('prod_id','=',$prod_id)->count();
        if($exist_wishlist>0){
            return back()->with('error','product already added in wishlist');
            exit();
        }else{
            $addtowishlist = new Wishlist;
            $addtowishlist->cust_id=$cust_id;
            $addtowishlist->prod_id=$prod_id;
            $addtowishlist->save();
            if($addtowishlist==true){
                return back()->with('success','product added in wishlist');
                exit();
            }else{
                return back()->with('error','something went wrong');
                exit();
            }
        }
    }


    // wishlist 

    public function wishlist(){
        $cust_id = Auth::guard('cust')->user()->id;
        $wishlists = Wishlist::leftJoin('products','products.id','=','wishlists.prod_id')
                    ->select('products.*','wishlists.id as wishlistID','wishlists.status as wishlistStatus')
                    ->orderBy('wishlists.id','desc')
                    ->get();
        return view('website.customer.wishlist',compact('wishlists'));
    }

    // remove product wishlist

    public function remove_wishlist($id){
        $wishlist = Wishlist::where('id',$id)->delete();
        if($wishlist==true){
            return back()->with('success','product removed from wishlist');
            exit();
        }else{
            return back()->with('error','something went wrong');
            exit();
        }
    }

    // customer address

    public function myaddress(){
        $cust_id = Auth::guard('cust')->user()->id;
        $myaddress = CustomerAddress::where('cust_id','=',$cust_id)->orderBy('id','desc')->get();
        return view('website.customer.myaddress',compact('myaddress'));
    }


    // customer address 

    public function saveaddress(){
        return view('website.customer.add-address');
    }

    public function addnewsaveaddress(Request $request){
        $cust_id = Auth::guard('cust')->user()->id;
        $saveaddress = new CustomerAddress;
        $saveaddress->cust_id=$cust_id;
        $saveaddress->emirates=$request->emirates;
        $saveaddress->area=$request->area;
        $saveaddress->apartment=$request->aprtment;
        $saveaddress->address=$request->address;
        $saveaddress->save();
        if($saveaddress==true){

            $cart = session()->get('cart');

            if($cart)
            {
                $url = url('checkout');
                return Redirect::to($url);
            }else{
                return back()->with('success','saved new address');
            }


            
            exit();
        }else{
            return back()->with('error','something went wrong');
            exit();
        }

    }


    // delete address

    public function deleteAddress(Request $request){
        $addID = decrypt($request->id);
        $delete = CustomerAddress::where('id','=',$addID)->delete();
        if($delete==true){
            return back()->with('success','address deleted successfull');
            exit();
        }else{
            return back()->with('error','something went wrong');
            exit();
        }
    }


    // edit customer address

    public function updateAdd(Request $request){
        $addID = decrypt($request->id);
        $cust_add = CustomerAddress::where('id','=',$addID)->first();
        return view('website.customer.update_address',compact('cust_add','addID'));

    }

    // update customer address process

    public function updateAddressProcess(Request $request){
        $addID = $request->addid;
        $emirates = $request->emirates;
        $area = $request->area;
        $address = $request->address;

        $update_address = CustomerAddress::where('id','=',$addID)->update([
            'emirates'=>$emirates,
            'area'=>$area,
            'address'=>$address
        ]);
        if($update_address==true){
            return back()->with('success','address updated successfull');
            exit();
        }else{
            return back()->with('error','something went wrong');
            exit();
        }
    }


    // cancel customer order

    public function cancelOrder(Request $request){
        $order_id = decrypt($request->id);
        $cancelled = Order::where('id','=',$order_id)->update([
            'status'=>'3'
        ]);
        if($cancelled==true){
            return back()->with('success','order cancelled successFull');
            exit();
        }else{
            return back()->with('error','something went wrong');
            exit();
        }
    }
    

    // delete orders

    public function deleteOrders(Request $request){
        $ID = decrypt($request->id);
        $delete = Order::where('id','=',$ID)->delete();
        if($delete==true){
            return back()->with('success','orders deleted successfull');
            exit();
        }else{
            return back()->with('error','something went wrong');
            exit();
        }
    }

// customer profile 

public function custProfile(){
    return view('website.customer.profile');
}

public function customerProfile(){
    return view('website.customer.layout.profile');
}
public function customerorder(){
    return view('website.customer.layout.order');
}
// customer profile update process


public function custProfileUpdateProcess(Request $request){
    $cust_id = $request->cust_id;
    $fname = $request->fname;
    $lname = $request->lname;
    $email = $request->email;
    $mobile = $request->mobile;
    $update_profile = Customer::where('id','=',$cust_id)->update([
        'fname'=>$fname,
        'lname'=>$lname,
        'email'=>$email,
        'mobile'=>$mobile
    ]);
    if($update_profile==true){
        return back()->with('success','customer profile updated');
        exit();
    }else{
        return back()->with('error','something went wrong');
        exit();
    }
}


// guest checkout


public function guestCheckout(Request $request){
    $product_id = $request->product_id;
    $qty = $request->qtybutton;
    $cartproduct=Product::leftJoin('categories','categories.id','=','products.category')
        ->leftJoin('sub_categories','sub_categories.id','=','products.subcategory') 
        ->leftJoin('varient_attrs','varient_attrs.id','=','products.varient')
        ->select('products.*','categories.id as cat_id','sub_categories.id as subcat_id','categories.category_name as cat_name','sub_categories.category_name as subparent_id','subcat_name')
        ->where('products.id','=',$product_id)
        ->get();
    return view('website.gcheckout',compact('cartproduct','product_id','qty'));
}


public function guestUserDetails(Request $request){
    $name = $request->name;
    $emirates = $request->emirates;
    $area = $request->shiparea;
    $del_add = $request->delivery_Add;
    $gemail = $request->gemail;
    $gmobile = $request->gmobile;
    $saveadd = new GuestUser;
    $saveadd->name=$name;
    $saveadd->email=$gemail;
    $saveadd->mobile=$gmobile;
    $saveadd->emirates=$emirates;
    $saveadd->area=$area;    
    $saveadd->address=$del_add;
    $saveadd->save();
    $last_id = $saveadd->id;
    if($saveadd==true){
        return response()->json(["status"=>"200","msg"=>$last_id]);
    }else{
        return response()->json(["status"=>"400","msg"=>"2"]);
    }

}



// create order 

public function guestplaceOrder(Request $request){
    
    $cust_add_id = $request->cust_address_id;
    $cart_id = $request->cartid;
    $seller_id = explode(',',$request->seller_id);
    $payment_mode = $request->payment_mode;
    $total_product = explode(',',$request->prodid);
    $total_qty = explode(',',$request->qty);
    $total_product_size = count($total_product);
    $order_id = array();
    for($i=0;$i<$total_product_size;$i++){
    $createOrder = new GuestOrder;
    $createOrder->guser_id=$cust_add_id;       
    $createOrder->seller_id=$seller_id[$i]; 
    $createOrder->product_id=$total_product[$i];  
    $createOrder->qty=$total_qty[$i];         
    $createOrder->payment_mode=$payment_mode;
    $createOrder->status='1';
    $createOrder->save();
    array_push($order_id, $createOrder->id);

        // notfication 

        // $customnotification = new CustomNotification;
        // $customnotification->seller_id=$seller_id[$i];
        // $customnotification->cust_id=$cust_id;
        // $customnotification->notificationType='orders';
        // $customnotification->save();

    }
    // $order_id = $createOrder->id;
    // $cart_details = explode(',',$cart_id);
    // foreach($cart_details as $cart){
    //     $order_details = new Order_detail;
    //     $order_details->order_id=$order_id;
    //     $order_details->cart_id=$cart;
    //     $order_details->save();
    // }
    

    if($createOrder == true){
        return response()->json(["status"=>"200","msg"=>$order_id]);
    }else{
        return response()->json(["status"=>"400","msg"=>"2"]);
    }
}

// guest create transaction

public function guestordertransaction(Request $request){
    //$cust_id = Auth::guard('cust')->user()->id;
    $amount = $request->amount;
    $order_id = explode(',',$request->order);
    $payment_id = $request->payment_id;
    foreach($order_id as $order){
    $update_order = GuestOrder::where('id','=',$order)->update([
        'payment_id'=>$payment_id,
        'amount'=>$amount,
        'status'=>'2'
    ]) ;      
    }
    if($update_order==true){
        return response()->json(["status"=>"200","msg"=>"1"]);
    }else{
        return response()->json(["status"=>"400","msg"=>"2"]);
    }


}

// services


public function servicePage(){
    $services = Service::where('status','=','2')->orderBy('id','desc')->get();
    return view('website.services',compact('services'));
}

// search category 

public function allcategories(){
    $categories = Category::orderBy('id','desc')->get();
    if(count($categories)>0){
        return response()->json(["status"=>"200","msg"=>$categories]);
        exit();
    }else{
        return response()->json(["status"=>"400","msg"=>"2"]);
        exit();
    }
}
public function dealoftheday()
{
    $products = $this->listAllproducts();
    $Deals = $this->DOD();
    return view('website.dealoftheday',compact('products' , 'Deals'));
}
public function toppickup()
{
    $products = $this->listAllproducts();
    $topPics = $this->topPicsProduct();
    return view('website.toppickup',compact('products' , 'topPics'));
}

public function newarrival()
{
    $products = $this->listAllproducts();
    $arrivals = $this->arrovalsProduct();
    return view('website.newarrival',compact('products' , 'arrivals'));
}
// search form

public function searchFRM(Request $request){
    $q = $request->searchq;
    $cat = Category::where('category_name','=',$q)->first();
    if($cat){
    $products=Product::leftJoin('categories','categories.id','=','products.category')
    ->leftJoin('sub_categories','sub_categories.id','=','products.subcategory') 
    
    ->select('products.*','categories.id as cat_id','sub_categories.id as subcat_id','categories.category_name as cat_name','sub_categories.category_name as subparent_id','subcat_name')
    ->where('products.category','=',$cat['id'])
    ->where('products.status','=','2')
    ->orderBy('products.id','desc')
    ->get(); 
    } else{
        $products=[];
    } 
    return view('website.category-details',compact('products'));

}


// review forms

public function addreviews(Request $request){
    $reviews = new Review;
    $reviews->cust_id=$request->cust_id;
    $reviews->prod_id=$request->prod_id;
    $reviews->rating=$request->rating;
    $reviews->message=$request->msg;
    $reviews->save();
    if($reviews==true){
        return back()->with("success","reviews added successfull");
        exit();
    }else{
        return back()->with("error","something went wrong");
        exit(); 
    }
}


// proposal 


public function submitted_proposal(){
    $cust_id = Auth::guard('cust')->user()->id;
    $proposals = RequestProposal::leftJoin('design_requests','design_requests.id','=','request_proposals.request_id')
                ->leftJoin('sellers','sellers.id','request_proposals.vendor_id')
                ->select('request_proposals.*','product_name','fname','lname','email','company_name')
                ->where('design_requests.cust_id','=',$cust_id)
                ->orderBy('request_proposals.id')
                ->get();
    return view('website.customer.submitted_proposal',compact('proposals'));
}


// filter category details

public function filterprice(Request $request){
    $minprice = $request->minprice;
    $maxprice = $request->maxprice;
    $catid = $request->catid;
    $products=Product::leftJoin('categories','categories.id','=','products.category')
        ->leftJoin('sub_categories','sub_categories.id','=','products.subcategory') 
        ->leftJoin('reviews','reviews.prod_id','=','products.id')
        ->select('products.*','categories.id as cat_id','sub_categories.id as subcat_id','categories.category_name as cat_name','sub_categories.category_name as subparent_id','subcat_name','rating','message')
        ->where('products.category','=',$catid)
        ->where('products.status','=','2')
        ->whereBetween('products.sale_price',[$minprice,$maxprice])
        ->orderBy('products.id','desc')
        ->get(); 
    
    if(count($products)>0){
        return response()->json(["status"=>"200","msg"=>$products]);
        exit();
    }else{
        return response()->json(["status"=>"400","msg"=>"2"]);
        exit();
    }                    
}

// filter price in vendor page

public function filterpricebyVendor(Request $request){
    $minprice = $request->minprice;
    $maxprice = $request->maxprice;
    $catid = $request->catid;
    $products=Product::leftJoin('categories','categories.id','=','products.category')
        ->leftJoin('sub_categories','sub_categories.id','=','products.subcategory') 
        ->leftJoin('reviews','reviews.prod_id','=','products.id')
        ->select('products.*','categories.id as cat_id','sub_categories.id as subcat_id','categories.category_name as cat_name','sub_categories.category_name as subparent_id','subcat_name','rating','message')
        ->where('products.added_by_seller','=',$catid)
        ->where('products.status','=','2')
        ->whereBetween('products.sale_price',[$minprice,$maxprice])
        ->orderBy('products.id','desc')
        ->get(); 
    
    if(count($products)>0){
        return response()->json(["status"=>"200","msg"=>$products]);
        exit();
    }else{
        return response()->json(["status"=>"400","msg"=>"2"]);
        exit();
    }                    
}
    



    

    


}
