<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Storage;


class AdminController extends Controller
{
    public function index(){

            return view('admin.pages.home');
        
        
    }
    public function profile(){

        return view('admin.pages.profile');
    
    
    }
    public function profileCreate(Request $request)
    {
       
        $users = User::findOrFail(Auth::user()->id);

        $users->name = $request->name;
        $users->email = $request->email;
        $users->username = $request->username;
        $users->website = $request->website;
        $users->number = $request->number;
        $users->area = $request->area;
        $users->address = $request->address;
        $users->postcode = $request->postcode;
        $users->state = $request->state;
        $users->education = $request->education;
        $users->gender = $request->gender;
        $users->country = $request->country;
        
      
        if( $request->file('profile_img') ){
            
                $file = $request->file('profile_img');
                Storage::putFile('public/image/',$file);
                $users->profile_img = 'storage/image/'.$file->hashName();
             
        }

        $users->save();
     


      
         
        return redirect()->route('admin.profile')->with('success','Data Update Successfully');
    }
   
    
}
