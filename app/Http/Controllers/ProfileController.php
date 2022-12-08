<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{
     // function to Update user profile
     public function profile(Request $request)
     {
         // check request method
         if ($request->isMethod('post'))
         {

             // Find User And Update Data
             $user = User::findOrFail(Auth::user()->id);

             // Find User Update Data
             $user->name = $request->name;
             $user->email = $request->email;
             $user->username = $request->username;
             $user->website = $request->website;
             $user->number = $request->number;
             $user->area = $request->area;
             $user->address = $request->address;
             $user->postcode = $request->postcode;
             $user->state = $request->state;
             $user->education = $request->education;
             $user->gender = $request->gender;
             $user->country = $request->country;

             // User Image Upload
             if ($request->file('profile_img')) {

                 $file = $request->file('profile_img');
                 Storage::putFile('public/image/', $file);
                 $user->profile_img = 'storage/image/' . $file->hashName();
                 
             }
 
             $user->save();

             return redirect()->route('admin.profile')->with('success', 'Data Update Successfully');
 
            }
             else {
                
                // show profile page
                return view('admin.pages.profile');
         
              }
        }
}
