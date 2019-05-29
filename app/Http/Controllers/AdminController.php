<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use Session;

class AdminController extends Controller
{
     public function login(Request $request){    

    	if($request->isMethod('post')){

    		$data = $request->input();

	    	if(Auth::attempt([
                'email'=> $data['email'],
                'password'=>$data['password'],
                'identity' => '0',
                'active'   => 1,
            ])){                

                $user = User::where('email','=',$data['email'])->get();                
                Session::put('adminsession', $user[0]->name);                                  
              

	    	  return redirect('/admin/dashboard');
	    	}else{
                return redirect('/admin')->with('flash_msg_err','invalid username or password');	    		
	    	}	
    	}

    	return view('Admin.pages.admin_login');
    }


 public function dashboard(){
        if(Session::has('adminsession')){
            $users = User::where('identity','=','1')->get();            

            return view('Admin.pages.admin_dashboard')
                                        ->with('scount',count($users));
        }else{
            return redirect('/admin')->with('flash_msg_err','invalid username or password');                
        }        
    }

    public function logout(){        
        Session::flush();
        return redirect('/admin')->with('flash_msg_success','Successfully logged out');        
    }

    //to show the form to add the users...
    public function register_users(Request $request){
        
        if(Session::has('adminsession')){

            if($request->isMethod('get')){
                return view('Admin.pages.admin_add');
             }else{
                $this->validate($request,[
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|  unique:users',
                'password_confirmation' => 'required',
                'password' => 'required|min:6|confirmed',                
                'roles' => 'required'
                ]);                

                $user = new User;
                $user->name = $request->input('name');
                $user->email = $request->input('email');                                    
                $user->password = Hash::make($request->input('password'));                
                $user->identity = $request->input('roles');                              
                
                $user->active = 1;                          //added by admin so already active...
                $user->save();

                if($request->input('roles') == '0')
                     return redirect('/admin/view2');   //view list of admins after adding admin
                else return redirect('/admin/view');    //else if users are added, view list of users                
                
            }
        }else{
            return redirect('/admin')->with('flash_msg_err','You must login to access');
        }        
    }
}