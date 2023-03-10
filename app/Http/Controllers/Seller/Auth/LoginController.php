<?php

namespace App\Http\Controllers\Seller\Auth;
use Auth;
use App\Models\Seller;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;

class LoginController extends Controller
{
    //

    public function login(){
        return view('seller.auth.selller_login');
    }


    public function login_process(Request $request)
    {
        $data = $request->all();
        $this->validator($request);
        if(Auth::guard('seller')->attempt(['email'=>$request['email'],'password'=>$data['password']],$request->filled('remember')))
        {


            if(Auth::guard('seller')->user()->isVerify == 2)
            {
                return redirect()->intended('seller/home')->with('success','You are Logged in as seller!');
            }else{
                Auth::guard('seller')->logout();
                return redirect()->route('seller.login')->with('warning','Your Account is Not Verified');
            }

            
        }
        return $this->loginFailed();
    }

    /**
     * Logout the admin.
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
      //logout the admin...

      Auth::guard('seller')->logout();
      return redirect()
          ->route('seller.login')
          ->with('success','seller has been logged out!');

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
        'email'    => 'required|email|exists:sellers|min:5|max:191',
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
