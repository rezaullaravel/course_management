<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserAuthController extends Controller
{
    //user login page
    public function index(){

      if(Auth::check()){
        return redirect('/user/dashboard');

      } else {
        return view('auth.login');
      }
    }//end method

    //user registration page
    public function signup(){
        if(Auth::check()){
            return redirect('/user/dashboard');

          } else {
            return view('auth.register');
          }
    }//end method


    //user post login
    public function login(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);

        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            if (session()->has('previous_url')) {
                $previousUrl = $request->session()->pull('previous_url'); // Retrieve and remove the URL
                return redirect($previousUrl);

            }
            return redirect('/user/dashboard');
        } else {
            if(session()->get('lang') == 'bangla'){
                $message = 'সতর্কতা! আপনার দেওয়া তথ্য সঠিক নয়। দয়া করে সঠিক তথ্য দিয়ে চেষ্টা করুন।';
            } else {
                $message ='Oops!Your credentials do not match our records.Please try again with correct info.';
            }
            return redirect()->back()->with('error_message',$message);
        }
    }//end method

    //user post register
    public function register(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
        ], [
            // Custom error messages
            'name.required' => session()->get('lang') == 'bangla'
                ? 'নাম প্রদান করা আবশ্যক।'
                : 'The name field is required.',
            'email.required' => session()->get('lang') == 'bangla'
                ? 'ইমেইল প্রদান করা আবশ্যক।'
                : 'The email field is required.',
            'email.unique' => session()->get('lang') == 'bangla'
                ? 'এই ইমেইল ঠিকানাটি ইতিমধ্যেই নিবন্ধিত।'
                : 'This email address is already registered.',
            'password.same' => session()->get('lang') == 'bangla'
                ? 'পাসওয়ার্ড এবং কনফার্ম পাসওয়ার্ড মেলেনি।'
                : 'The password and confirmation password do not match.',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        $role = 'user';

        $user->assignRole($role);

        if(session()->get('lang') == 'bangla'){
            $message = 'আপনার রেজিস্ট্রেশন সফলভাবে সম্পন্ন হয়েছে।';
        } else {
            $message ='Your registration has been completed successfully.';
        }

        return redirect('login')->with('message',$message);

    }//end method


    //admin dashboard
    public function userDashboard(){
        return view('admin.home.index');
    }//end method


    //admin logout
    public function userLogout(){
        Auth::logout();
        return redirect('/');
    }//end method
}

