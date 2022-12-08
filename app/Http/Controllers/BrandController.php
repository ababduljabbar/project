<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Facades\Storage;


class BrandController extends Controller
{
    public function brand(){

        $brands = Brand::all();
        return view('admin.pages.brand.list',compact('brands'));

    }
    public function create(Request $request){
                // check request method
                if ($request->isMethod('post')) {

                    //  Brand Validation
        
                    $request->validate([
                       'name' => 'required|unique:brands',
                       'status' => 'required',
                       'photo' => 'required | mimes:jpeg,jpg,png | max:1000',
                    ]);  
                    
                    $brand = new Brand;

                    $brand->name = $request->name;
                    $brand->slug = strtolower(str_replace(' ', '-', $request->name));
                    $brand->status = $request->status;
                    //  Image Upload
                    if ($request->file('photo')) {

                        $file = $request->file('photo');
                        Storage::putFile('public/image/', $file);
                        $brand->photo = 'storage/image/' . $file->hashName();
                        
                    }

                    $brand->save();
          
                  return redirect()->route('brand.create')->with('success','Brand Create Successfully');
                
                }
                else{

                    // Brand Table Page
                    return view('admin.pages.brand.add');
         
               }
      
    }

    public function update(Request $request , $id){
                // check request method
                if ($request->isMethod('post')) {

                    //  Brand Validation
                    $brand = Brand::find($id);
                    $request->validate([
                       'name' => 'required|unique:brands',
                       'status' => 'required',
                       'photo' => ' mimes:jpeg,jpg,png | max:1000',
                    ]);  
                    
                    

                    $brand->name = $request->name;
                    $brand->slug = strtolower(str_replace(' ', '-', $request->name));
                    $brand->status = $request->status;
                    // User Image Upload
                    if ($request->file('photo')) {

                        $file = $request->file('photo');
                        Storage::putFile('public/image/', $file);
                        $brand->photo = 'storage/image/' . $file->hashName();
                        
                    }

                    $brand->save();
          
                  return redirect()->route('brand.update',$brand->id)->with('success','Brand Update Successfully');
                
                }
                else{

                    // Brand Table Page
                    $brand = Brand::find($id);
                    return view('admin.pages.brand.edit', compact('brand'));
         
               }
    }

    public function delete($id){

        $brand = Brand::find($id);
        $brand->delete();
        return redirect()->route('admin.brand')->with('success','Brand Delete Successfully');

    }

}
