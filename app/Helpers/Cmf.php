<?php

namespace App\Helpers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Carbon\Carbon;
use App\Models\orders;
use App\Models\orderdetails;
use Twilio\Rest\Client;
use App\Models\orderstatus;
use App\Models\Member_order;
use Mail;
use Illuminate\Support\Facades\Http;

use OneSignal;
class Cmf
{ 

    public static function current_currency()
    {
        return 'INR';
    }
    public static function updatevalue($columname , $value)
    {
      $array = array($columname=>$value);
      DB::table('site_settings')->update($array);
    }
    public static function choosenMembership(){
        $seller_id = Auth::guard('seller')->user()->id;
        $choose = Member_order::leftJoin('memberships','memberships.id','=','member_orders.plan_id')
                   ->select('member_orders.id as membership_order_id','member_orders.status as member_status','memberships.*','member_orders.created_at as ordered_date')
                   ->where('member_orders.seller_id','=',$seller_id) 
                   ->where('member_orders.status','=','3')
                   ->first();
        return $choose;            
    }
    public static function currency($value)
    {
       $data =  number_format((float)$value, 2, '.', '');
       return "INR ".$data;
    }

    public static function send_user_notifcation($userId , $notification)
    {

        $data = array('user_id' =>$userId,'notifcation' =>$notification,'read_status' =>0,'icon' =>'uil-briefcase');
        DB::table('usernotifications')->insert($data);
        $playerid = DB::table('users')->where('id' , $userId)->get()->first()->one_signal_id;
        if($playerid)
        {
            OneSignal::sendNotificationToUser(
                $notification,
                $playerid,
                $url = null,
                $data = null,
                $buttons = null,
                $schedule = null
            );
        }
        
    }

    public static function get_store_value($value)
    {
        return DB::table('site_settings')->where('id' , 1)->get()->first()->$value;
    }
    public static function date_format($data)
    {
        return date('d M Y, h:s a ', strtotime($data));
    }

    public static function changenewstatus($tablename , $id)
    {
        DB::table($tablename)->where('id' , $id)->update(array('new'=>1));
    }

    public static function add_user_walet_ammount($user_id , $order_id ,$order_detail_id ,  $wallet_amt , $reason)
    {
        $date = date('Y-m-d h:s');
        DB::statement("INSERT INTO `wallet_table` (`user_id`, `order_id`, `order_detail_id`, `wallet_amt`, `reason`, `status`, `created_at`)VALUES ('$user_id', '$order_id', '$order_detail_id', '$wallet_amt', '$reason' ,'onhold' , '$date')");
    }

    public static function sendemail($html , $subject , $toemail)
    {
        Mail::send(array('html' => 'frontend.email.allemail'), array('html' => $html), function($message) use ($toemail, $subject)
            {
                $message->to($toemail)->subject($subject);
            });
    }


    public static function sendMessage($message, $recipients)
    {
        $result = substr($recipients, 0, 2);
        if($result == '03')
        {
            $next_part = substr($recipients, 1, 10);
            $first_part = '+92';
            $recipients = $first_part.$next_part;
        }
        $account_sid = getenv("TWILIO_SID");
        $auth_token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_number = getenv("TWILIO_NUMBER");
        $client = new Client($account_sid, $auth_token);
        $client->messages->create($recipients, 
                ['from' => $twilio_number, 'body' => $message] );
    }

    public function wallet_withdraw($user_id, $request_payment , $transaction_status , $status)
    {
        $data = array('user_id' =>$user_id , 'amount' =>$request_payment, 'transaction_status' =>$transaction_status, 'status' =>$status);
        DB::table('wallet_withdraw')->insert($data);
    }



    public static function changeorderstatus($id , $status)
    {

        $order = orders::find($id);
        $data = DB::table('orderstatuses')->where('order_id' , $id)->where('status' , $status)->count();
        if($data == 0)
        {
            $newstatus = new orderstatus;
            $newstatus->order_id = $id;
            $newstatus->status = $status;
            $newstatus->save();
        }
        if($order->addres_id)
        {
            $user = DB::table('customers')->where('id' , $order->customer_id)->first();
            $email = $user->email;
            $name  = $user->fname.' '.$user->lname;
        }else{
            $email = $order->email;
            $name  = $order->fname.' '.$order->lname;
        }
        $subject = 'Order Status Changed | ORDER Number '.$order->order_number;
        Mail::send('email.statuschange', ['name' => $name,'previousstatus' => $order->status,'tostatus' => $status], function($message) use($email , $subject){
            $message->to($email);
            $message->subject($subject);
        });
        $order->status = $status;
        $order->save();
    }

    public static function get_site_settings_by_colum_name($name)
    {
        return DB::table('site_settings')->where('id' , 1)->get()->first()->$name;
    }

    public static function get_store_settings($value)
    {
       $userid = auth()->user()->id;
       return DB::table('store_settings')->where('user_id' , $userid)->get()->first()->$value;
    }

    public static function currenturl()
    {
       return $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    }
    public static function sendimagetodirectory($imagename)
    {
        $file = $imagename;
        $filename = rand() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('images'), $filename);
        return $filename;
    }
    public static function shorten_url($text)
    {
        $words = explode('-', $text);
        $five_words = array_slice($words,0,12);
        $String_of_five_words = implode('-',$five_words)."\n";

        $String_of_five_words = preg_replace('~[^\pL\d]+~u', '-', $String_of_five_words);
        $String_of_five_words = iconv('utf-8', 'us-ascii//TRANSLIT', $String_of_five_words);
        $String_of_five_words = preg_replace('~[^-\w]+~', '', $String_of_five_words);
        $String_of_five_words = trim($String_of_five_words, '-');
        $String_of_five_words = preg_replace('~-+~', '-', $String_of_five_words);
        $String_of_five_words = strtolower($String_of_five_words);
        if (empty($String_of_five_words)) {
          return 'n-a';
        }
        return $String_of_five_words;
    }
    public static function save_image_name($tablename ,$columname , $columid , $imagename)
    {
        $file = $imagename;
        $filename = rand() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('images'), $filename);
        $date = date('Y-m-d h:m:s');
        $userid = auth()->user()->id;
        DB::statement("INSERT INTO `$tablename` (`$columname`, `image_name`, `image_status`, `added_by`, `created_at`)VALUES ('$columid', '$filename', 'Active', $userid , '$date')");
    }
    public static function get_image_name($tablename ,$columname , $columid)
    {
        return DB::table($tablename)->where($columname , $columid)->get();
    }
    public static function save_admin_notification($notification , $url , $icon)
    {
        DB::statement("INSERT INTO `adminnotification` (`notification`, `url`, `icon`, `status`, `alertstatus`)VALUES ('$notification', '$url', '$icon', '1', '1')");
    }

    public static function save_vendor_notification($notification , $url , $icon, $vendor_id)
    {
        DB::statement("INSERT INTO `vendornotification` (`notification`, `url`, `icon`, `status`,  `vendor_id`,`alertstatus`)VALUES ('$notification', '$url', '$icon', '1','$vendor_id', '1')");
    }
    public static function checkuserrolparent($id)
    {
        $roleid = Auth::user()->role_id;
        return DB::table('rolesparent')->where('userroles' , $roleid)->where('parentid' , $id)->count();
    }
    public static function checkuserrolchild($id)
    {
        $roleid = Auth::user()->role_id;
        return DB::table('childroles')->where('role' , $roleid)->where('module' , $id)->count();
    }


    public static function delete_common_function($tablename , $columname , $id)
    {
        $data = array('delete_status'=>'Delete');
        DB::table($tablename)->where($columname , $id)->update($data);
    }
}
