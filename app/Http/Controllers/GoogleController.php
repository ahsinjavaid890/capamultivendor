<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;
use App\Models\productgallerimages;

use Illuminate\Support\Facades\Hash;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
  
class GoogleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
        
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function deletegalleryimages($id)
    {
        $getallimages = productgallerimages::where('id' , $id)->first();

        $productid = $getallimages->product_id;

        productgallerimages::where('id' , $id)->delete();
        
        $getallimages = productgallerimages::where('product_id' , $productid)->get();


        foreach ($getallimages as $r) {
            echo '<div class="col-md-3"> 
                  <div class="uploaded-img"> 
                     <img style="width:120px;height:120px;" class="img-thumbnail" src="'.url('images').'/'.$r->image.'"/> 
                     <div class="edit-trash d-flex"> 
                        <i onclick="deletegalleryimages('.$r->id.')" class="fa fa-times-circle white remove_prod_mul_img"></i>
                     </div>
                  </div>
               </div>';
        }

    }
    public function handleGoogleCallback()
    {
        try {
      
            $user = Socialite::driver('google')->user();
            $finduser = Customer::where('email', $user->email)->first();
            if($finduser){
       
                if(Auth::guard('cust')->attempt(['email'=>$finduser->email,'password'=>$finduser->google_password,'isVerify'=>'2'])){
                    return redirect()->intended('/')->with('success','You are Logged in as customer!');
                }
       
            }else{
                $setcustomer = new Customer;
                $setcustomer->fname = $user->name;
                $setcustomer->lname = ' ';
                $setcustomer->email = $user->email;
                $setcustomer->password = Hash::make($user->id);
                $setcustomer->google_password = $user->id;
                $setcustomer->status='2';
                $setcustomer->isVerify='2';
                $setcustomer->save();
                if(Auth::guard('cust')->attempt(['email'=>$finduser->email,'password'=>$finduser->google_password,'isVerify'=>'2'])){
                    return redirect()->intended('/')->with('success','You are Logged in as customer!');
                }
            }
      
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}