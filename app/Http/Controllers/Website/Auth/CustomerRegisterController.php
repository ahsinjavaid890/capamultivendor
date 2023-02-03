<?php

namespace App\Http\Controllers\Website\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Mail;
use Auth;

class CustomerRegisterController extends Controller
{
    //

    public function register(){
        return view('website.auth.customer_register');
    }

    public function registerProcess(Request $request){
        $request->validate([
            'fname' => 'required',
            'lname'=>'required',
            'email' => 'required|email|unique:customers',
            'password' => 'required|min:6',
            'mobile'=>'required',
        ]);
        $existcutomer = Customer::where('email','=',$request->email)
                        ->orwhere('mobile','=',$request->mobile)
                        ->get();
        if(count($existcutomer)>0){
            return redirect('/customer-register')->with('error','Customer already exists');
        }else{
            $otp = mt_rand(1000,9999);
            $setcustomer = new Customer;
            $setcustomer->fname = $request->fname;
            $setcustomer->lname = $request->lname;
            $setcustomer->email = $request->email;
            $setcustomer->mobile = $request->mobile;
            $setcustomer->password = Hash::make($request->password);
            $setcustomer->google_password = $request->password;
            $setcustomer->status='1';
            $setcustomer->otp=$otp;
            $setcustomer->save();
            $last_email = $setcustomer->email;
            $fullname = $request->fname.' '.$request->lname; 
            if($setcustomer==true){
                $this->basic_email($last_email,$fullname,$otp);

                return redirect('/customer-otp'.'/'.encrypt($last_email).'/'.encrypt($request->password))->with('success','please check your inbox to verify your email!');
               // return redirect('/thankyou')->with('success','Customer Registered Successfull!');

            }else{
                return redirect('/customer-register')->with('error','something went wrong !'); 
            }
        }                
    }


    public function otp(Request $request){
        $email = decrypt($request->email);
        $password = decrypt($request->pass);
        return view('website.auth.otp',compact('email','password'));
    }



    // verify email by vendor

public function basic_email($email,$name,$otp) {
    $data = array('name'=>$name,'email'=>$email,'otp'=>$otp);  
       
    Mail::send('website.verifymail', $data, function($message) use ($data) {
       $message->to($data['email'],$data['name'])->subject
          ('Testing Mail');
       $message->from('luxurybooking.ae@gmail.com','Oben Multivendor');
    });
    
 }

//  verify otp

public function verifyOtp(Request $request){
    $email = $request->email;
    $password = $request->password;
    $defaultotp = mt_rand(1000,9999);
    $otp = $request->otp1.$request->otp2.$request->otp3.$request->otp4;
    $update = Customer::where('email','=',$email)
                    ->where('otp','=',$otp)
                    ->update([
                        'otp'=>$defaultotp,
                        'isVerify'=>'2'                        
                    ]);
     if($update==true){
         if(Auth::guard('cust')->attempt(['email'=>$email,'password'=>$password])){
                    return redirect()->intended('/customer-dashboard')->with('success','customer Registered Successfull!');
                }else{
                    return redirect('/customer-register')->with('error','login failed !'); 
                }
     }else{
        return redirect('/customer-register')->with('error','something went wrong !'); 
     }                    


    }

}
