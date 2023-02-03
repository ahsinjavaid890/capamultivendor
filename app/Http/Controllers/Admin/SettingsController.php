<?php

namespace App\Http\Controllers\Admin;
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
use App\Models\Order;
use App\Models\Transaction;
use App\Models\Cart;
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
use PDF;
use Mail;


class SettingsController extends Controller
{
   public function index()
   {
        return view('admin.settings.index');
   }

}