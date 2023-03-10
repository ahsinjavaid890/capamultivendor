<?php

namespace App\Http\Controllers\Website\Auth;
use Auth;
use App\Models\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;

class CustomerLoginController extends Controller
{
    //

    public function login(){
        return view('website.auth.customerlogin');
    }

    public function testlogin(){
        return view('website.auth.test');
    }

    public function login_process(Request $request)
    {
        //Validation...
        
        //Login the admin...
        
        //Redirect the admin...
        // $request->only('email','password')
        $data = $request->all();
           
        $this->validator($request);
    
        if(Auth::guard('cust')->attempt(['email'=>$data['email'],'password'=>$data['password'],'isVerify'=>'2'],$request->filled('remember'))){
            return redirect()->intended('/')->with('success','You are Logged in as customer!');
            return response()->json('1');
            
        }
    
        //Authentication failed...
        return $this->loginFailed();
    }

    /**
     * Logout the admin.
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
      //logout the admin....

      Auth::guard('cust')->logout();
      return redirect()
          ->route('website.login')
          ->with('success','customer has been logged out!');

    }

    /**
     * Validate the form data.
     * 
     * @param \Illuminate\Http\Request $request
     * @return 
     */
    private function validator(Request $request)
    {
      //validate the form...

              //validation rules.
    $rules = [
        'email'    => 'required|email|exists:customers|min:5|max:191',
        'password' => 'required|string|min:4|max:255',
    ];

    //custom validation error messages.
    $messages = [
        'email.exists' => 'These credentials do not match our records.',
    ];

    //validate the request.
    $request->validate($rules,$messages);

    }

    /**
     * Redirect back after a failed login.
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    private function loginFailed()
    {
      //Login failed...

      return redirect()
      ->back()
      ->withInput()
      ->with('error','Login failed, please try again!');
    }
}
