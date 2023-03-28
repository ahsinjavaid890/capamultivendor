<?php

namespace App\Http\Controllers\Seller\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Seller;
use App\Models\SellerDoc;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Auth;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Mail;

class RegisterController extends Controller
{
    //

    public function register(){
        return view('seller.auth.seller_register');
    }

    public function registerProcess(Request $request){
        $request->validate([
            'fname' => 'required',
            'lname'=>'required',
            'terms_and_condition'=>'required',
            'email' => 'required|email|unique:sellers',
            'password' => 'required|min:6',                      
        ]);

        

        $existcutomer = Seller::where('email','=',$request->email)                       
                        ->where('isVerify','=','1')
                        ->get();
        if(count($existcutomer)>0){
            $existingseller = Seller::where('email','=',$request->email)                                
                                ->first();
              $fullname = $request->fname.$request->lname;
              $otp1 = $existingseller['otp'];                  
            $this->basic_email($existingseller['email'],$fullname,$otp1);
            return redirect('/signup-otp'.'/'.encrypt($request->email).'/'.encrypt($request->password))->with('success','please check your inbox to verify your email!');
        }else{
            $otp = mt_rand(1000,9999);
            $setcustomer = new Seller;
            $setcustomer->fname = $request->fname;
            $setcustomer->lname = $request->lname;
            $setcustomer->email = $request->email;           
            $setcustomer->password = Hash::make($request->password);
            $setcustomer->city = $request->city;
            $setcustomer->otp = $otp;
            $setcustomer->isVerify = 2;
            $setcustomer->status='1';
            $setcustomer->save();
            $lastid = $setcustomer->id;            
            $last_email = $setcustomer->email;
            $last_password = $setcustomer->password;

            $sellerDocs = new SellerDoc;
            $sellerDocs->seller_id=$lastid;
            $sellerDocs->save();               
            $fullname = $request->fname.' '.$request->lname; 
            if($setcustomer==true){                
            // $this->basic_email($last_email,$fullname,$otp);
            Auth::guard('seller')->attempt(['email'=>$request->email,'password'=>$request->password]);
            return redirect()->intended('seller/seller-profile')->with('success','Seller Verfied Successfull!');
              // return redirect('/signup-otp'.'/'.encrypt($last_email).'/'.encrypt($request->password))->with('success','please check your inbox to verify your email!');

                // if(Auth::guard('seller')->attempt(['email'=>$last_email,'password'=>$request->password])){
                //     return redirect()->intended('seller/seller-profile')->with('success','Seller Registered Successfull!');
                // }else{
                //     return redirect('/seller-register')->with('error','login failed !'); 
                // }

            }else{
                return redirect('/seller-register')->with('error','something went wrong !'); 
            }
        }                
    }


    public function otp(Request $request){
        $email = decrypt($request->email);
        $password = decrypt($request->pass);
        return view('seller.auth.otp',compact('email','password'));
    }

 

    // verify email by vendor

public function basic_email($email,$name,$otp) {
    $data = array('name'=>$name,'email'=>$email,'otp'=>$otp);  
       
    Mail::send('seller.verifymail', $data, function($message) use ($data) {
       $message->to($data['email'],$data['name'])->subject
          ('Verify Your Account');
       $message->from('luxurybooking.ae@gmail.com','Oben Multivendor');
    });
    
 }

//  verify otp

public function verifyOtp(Request $request){
    $email = $request->email;
    $password = $request->password;
    $otp = $request->otp1.$request->otp2.$request->otp3.$request->otp4;

    $seller = Seller::where('email','=',$email)->first();

    if($seller->otp == $otp)
    {
        $update = Seller::where('email','=',$email)->update(['isVerify'=>'2']);
        Auth::guard('seller')->attempt(['email'=>$email,'password'=>$password]);
        return redirect()->intended('seller/seller-profile')->with('success','Seller Verfied Successfull!');
    }else{
        return back()->with('error','Enter Correct OTP');
    }                 

}



 // forgot password

 public function forgotpassword(){
    return view('seller.forgotPass');
}

public function forgotProcess(Request $request){
    $registerd_email = $request->email;
    $exist = Seller::where('email','=',$registerd_email)->count();
    if($exist>0){
        $recovery_mail = Seller::where('email','=',$registerd_email)->first();
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
       
    Mail::send('seller.resetMail', $data, function($message) use ($data) {
       $message->to($data['email'])->subject
          ('oben password reset');
       $message->from('luxurybooking.ae@gmail.com','Oben Multivendor');
    });
    
 }



//  reset password page

public function resetPage(Request $request){
    $resetEmail = decrypt($request->email);
    return view('seller.resetPass',compact('resetEmail'));
}

// reset password process

public function resetpassword_process(Request $request){
    $email = $request->custemail;
    $cnfpassword = $request->cnf_new_password;
    $reset = Seller::where('email','=',$email)->update([
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


}
