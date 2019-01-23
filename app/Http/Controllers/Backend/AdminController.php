<?php

namespace App\Http\Controllers\Backend;
use App\User;
use App\Models\Admin;
use Session;
use Auth;
use Illuminate\Support\Facades\Hash;


use Illuminate\Http\Request;

class AdminController extends Controller
{
    // function login(Request $request){
	   // if($request->isMethod('post')){
		  //  	$data = $request->input();
		  //  	if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password'],'admin'=>'1']))
		  //  	{
		  //  		Session::put('adminSession', $data['email']);
		  //       return redirect('/admin/dashboard');
		               
		  //  	}else
		  //  	{
		  //  		return redirect('/admin')->with('flash_message_error','Invalid Username or Password');
		  //  	}	
		    
		  //  	}
		  //  	return view('admin.admin_login');
    // }

     public function dashboard(){
        /*if(Session::has('adminSession')){
            // Perform all actions
        }else{
            //return redirect()->action('AdminController@login')->with('flash_message_error', 'Please Login');
            return redirect('/admin')->with('flash_message_error','Please Login');
        }*/
        return view('backend.dashboard');
    }

    //  public function logout(){
    //     Session::flush();
    //     return redirect('/admin')->with('flash_message_success', 'Logged out successfully.');
       
    // }

    public function settings(){
      //  dd(Auth::User()->email);
         $adminDetails = Admin::where(['email'=>Auth::User()->email])->first();

        // //echo "<pre>"; print_r($adminDetails); die;

        return view('backend.settings')->with(compact('adminDetails'));
    }
     public function chkPassword(Request $request){
        // dd('trs');
        // exit;
        $data = $request->all();
        //echo "<pre>"; print_r($data); die;
        $current_password = $data['current_pwd'];
        $chk_password = Admin::where(['email' => Auth::User()->email])->first(); 

		if(Hash::check($current_password,$chk_password->password)){
			echo "true";
			exit;
		}else{
			echo "false";
			exit;
		}

        //$adminCount = User::where(['email' => Session::get('adminSession'),'password'=>md5($data['current_pwd'])])->count(); 
            // if ($adminCount == 1) {
            //     //echo '{"valid":true}';die;
            //     echo "true"; die;
            // } else {
            //     //echo '{"valid":false}';die;
            //     echo "false"; die;
            // }

    }

     public function updatePassword(Request $request){
     	if($request->isMethod('post')){
     		  $data = $request->all();
     		 $current_password = $data['current_pwd'];
            $data = $request->all();
             $chk_password = Admin::where(['email' => Auth::User()->email])->first(); 
             if(Hash::check($current_password,$chk_password->password)){

			$password = bcrypt($data['new_pwd']);
                Admin::where('email',Session::get('adminSession'))->update(['password'=>$password]);
                return redirect()->route('admin.settings')->with('flash_message_success', 'Password updated successfully.');
			exit;
		}else{
			return redirect()->route('backend.settings')->with('flash_message_error', 'Current Password entered is incorrect.');
		}
        }
            
     }	

}

