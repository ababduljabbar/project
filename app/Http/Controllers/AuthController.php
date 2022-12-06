<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    
    // Login Function

    public function login(Request $request)
    {

        // check request method
        if ($request->isMethod('post')) {

            //  Login Validation

            $request->validate([
               'email' => 'required|email',
               'password' => 'required',
            ]);

            //Login User

           $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
               return redirect()->route('admin.dashboard')
                     ->withSuccess('Signed in');
             }
  
          return redirect()->route('login')->with('danger','Login details are not valid');
        
        }
        else{
            // Login Or Dashboard Show
            if(Auth::user()){
                //Dashboard Page Show
                return redirect()->route('admin.dashboard');

            }else{
                // Login Page Show
                return view('frontEnd.auth.login');

            }
       }
       
    }
      
    //Register Function
    public function register(Request $request)
    {  
        // check request method
        if ($request->isMethod('post')) {

            // Register Input Validation

            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6',
                'password_confirmation' => 'required_with:password|same:password|min:6',
                'terms' =>'required'
            ]);

             // Register User

            $user = new User;

            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();
             
            return redirect()->route('login')->with('success','Accout Create Successfully');
        
        }else{

             // Register Show Or Dashboard Show
            if(Auth::user()){

                 // Dashboard Show
                return redirect()->route('admin.dashboard');

            }else{

                 // Register Show
                return view('frontEnd.auth.register');

            }
        }    
     
    }
      
    // Log Out Function
    public function logout() {

        Auth::logout();
        return redirect()->route('login');

    }
}
