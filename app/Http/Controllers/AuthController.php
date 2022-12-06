<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function index()
    { 
        if(Auth::user()){
            return redirect()->route('admin.dashboard');
        }else{
            return view('frontEnd.auth.login');
        }
       
    }  
      
    public function createLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('admin.dashboard')
                        ->withSuccess('Signed in');
        }
  
        return redirect()->route('login')->with('danger','Login details are not valid');
    }

    public function register()
    {
       
        if(Auth::user()){
            return redirect()->route('admin.dashboard');
        }else{
            return view('frontEnd.auth.register');
        }
    }
      
    public function createRegister(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'username' => 'required|unique:users',
            'password' => 'required|min:6',
            'password_confirmation' => 'required_with:password|same:password|min:6',
            'terms' =>'required'


        ]);
           
        $data = $request->all();
        $check = $this->create($data);
         
        return redirect()->route('login')->with('success','Accout Create Successfully');
    }

    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'username' => $data['username'],
        'password' => Hash::make($data['password'])
      ]);
    }    
    
    
    public function logout() {
        Session::flush();
        Auth::logout();
  
        return redirect()->route('login');
    }
}
