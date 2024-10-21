<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserAuthController extends Controller
{
    //user login page
    public function index(){
      
      if(Auth::check()){
        $user = Auth::user();
        if($user->role=='1'){
            return redirect('/admin/dashboard');
        } else {
            return redirect('/user/dashboard');
        }
      } else {
        return view('auth.login');
      } 
    }//end method


    //user post login
    public function login(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
 
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            $user = Auth::user();
            if($user->role=='1'){
                return redirect('/admin/dashboard');
            } else {
                return redirect('/user/dashboard');
            }
        } else {
            return redirect()->back()->with('error_message','Oops!Your credentials do not match our records. Please try again.');
        }
    }//end method


    //admin dashboard
    public function adminDashboard(){
        return view('admin.home.index');
    }//end method

    //user dashboard
    public function userDashboard(){
        return view('admin.home.index');
    }//end method

    //user logout
    public function logout(){
        Auth::logout();
        return redirect('/');
    }

    //admin logout
    public function adminLogout(){
        Auth::logout();
        return redirect('/');
    }//end method
}

