<?php

namespace App\Http\Controllers\Backend\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;

    use Route;



class LoginController extends Controller
{
       public function __construct()

        {

          $this->middleware('guest:admin', ['except' => ['logout']]);

        }


        public function showLoginForm()

        {

          return view('backend.admin_login');

        }


        public function login(Request $request)

        {

          //dd('tes');

          // Validate the form data

          // $this->validate($request, [

          //   'email'   => 'required|email',

          //   'password' => 'required|min:6'

          // ]);
// dd('tes');
// exit;

          // Attempt to log the user in

          if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
           // dd('tes');
            // if successful, then redirect to their intended location

            return redirect()->intended(route('admin.dashboard'));

          }else{
            //dd('tst');
            return redirect()->route('admin.auth.login')->with('flash_message_error','Invalid Username or Password');
          }

          // if unsuccessful, then redirect back to the login with the form data

           return redirect()->back()->withInput($request->only('email', 'remember'));

        }


        public function logout()

        {
          //dd('tes');
            Auth::guard('admin')->logout();
            
            return redirect()->route('admin.auth.login')->with('flash_message_success', 'Logged out successfully.');

        }

    }
